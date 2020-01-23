@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('success_message'))
                    <div class="alert alert-success">
                        {{session('success_message')}}
                    </div>
                    @endif
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="row p-3">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Add Faculty</h5>
                                    <form action="{{route('faculties.store')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="faculty" class="col-sm-2 col-form-label">Faculty</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="faculty" name="faculty">
                                            </div>
                                        </div>

                                    <button type="submit" class="btn btn-primary mb-lg-5">Add Faculty</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Add Department</h5>
                                    <form action="{{route('departments.store')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="faculty" class="col-sm-3 col-form-label">Faculty</label>
                                            <div class="col-sm-8">
                                                <select id="faculty" name="faculty" class="form-control">
                                                    <option selected>Select faculty</option>
                                                    @foreach($faculties as $faculty)
                                                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Department" class="col-sm-3 col-form-label">Department</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="department" name="department">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-lg-5">Add Department</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="accordion mt-5" id="accordionExample">
            @foreach($faculties as $faculty)
            <div class="card">
                <div class="card-header" id="headingOne{{$faculty->id}}">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne{{$faculty->id}}" aria-expanded="true" aria-controls="collapseOne">
                            <b class="justify-content-between align-items-center">{{$faculty->name}}
                                @if($faculty->department->count() > 1)
                                <span class="badge badge-primary badge-pill">{{$faculty->department->count()}} departments</span>
                                    @else
                                    <span class="badge badge-primary badge-pill">{{$faculty->department->count()}} department</span>
                                @endif
                            </b>

                        </button>
                        <i _ngcontent-pyh-c19="" class="material-icons icon-image-preview float-right" data-toggle="modal" data-target="#exampleModalCente{{$faculty->id}}">delete</i>
                    </h2>
                </div>

                <div id="collapseOne{{$faculty->id}}" class="collapse" aria-labelledby="headingOne{{$faculty->id}}" data-parent="#accordionExample">
                    <div class="card-body">

                            <ul class="list-group">
                                @foreach($faculty->department as $department)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$department->name}}
{{--                                    <span class="badge badge-primary badge-pill">14</span>--}}
                                    <i _ngcontent-pyh-c19="" class="material-icons icon-image-preview" data-toggle="modal" data-target="#exampleModalCenter{{$department->id}}">delete</i>
                                </li>
                                @endforeach
                            </ul>

                    </div>
                </div>


                @foreach($faculties as $faculty)
                    <div class="modal fade" id="exampleModalCente{{$faculty->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to delete {{$faculty->name}} faculty</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <form action="{{ route('faculties.destroy',$faculty->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Yes,Proceed with action</button>
                                        </form>
                                        <button type="button" class="btn btn-primary ml-3" data-dismiss="modal">No, I don't</button>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach






                @foreach($faculty->department as $department)
                <div class="modal fade" id="exampleModalCenter{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to delete {{$department->name}} department</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <form action="{{ route('departments.destroy',$department->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                <button type="submit" class="btn btn-danger">Yes,Proceed with action</button>
                                    </form>
                                <button type="button" class="btn btn-primary ml-3" data-dismiss="modal">No, I don't</button>
                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                @endforeach
        </div>



    </div>
@endsection
