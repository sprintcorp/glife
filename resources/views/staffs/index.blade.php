@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('success_message'))
                    <div class="alert alert-success">
                        {{session('success_message')}}
                    </div>
                @endif
                <div class="col-md-12">
                <div class="">
                    <a href="{{route('staffs.create')}}" class="btn btn-outline-primary">Create Staff Profile</a>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($staffs as $staff)
                                        <div class="card ml-3 mb-3" style="max-width: 330px;">
                                            <div class="row no-gutters">
                                                <div class="col-md-5 p-1">
                                                    @if(!empty($staff->image))
                                                        <img src="{{ asset($staff->image)}}" class="card-img" alt="..." style="width: 125px;height: 150px">
                                                    @else
                                                        <img src="{{asset('photo/images.png')}}" class="card-img" alt="..." style="width: 125px;height: 150px">
                                                    @endif
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{$staff->name ? $staff->name :'Incomplete Profile' }}</h6>


                                                        <p class="card-text"><small class="text-muted">Last updated {{date('d-F-Y', strtotime($staff->updated_at))}}</small></p>
                                                    </div>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $staff->id}}" data-whatever="@mdo">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{ $staff->id}}" data-whatever="@mdo">
                                                        <i class="fa fa-trash"></i>
                                                    </button>


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @foreach($staffs as $staff)
                        <div class="modal fade" id="exampleModal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New message </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('staffs.update',$staff->id)}}" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input type="email" name="email" value="{{$staff->email}}" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Staff ID:</label>
                                                <input type="text" name="matric_no" value="{{$staff->matric_no}}" class="form-control" id="recipient-name">
                                            </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Designation:</label>
                                                    <select name="designation" class="form-control" id="exampleFormControlSelect1">
                                                        <option>{{preg_replace('/[^A-Za-z0-9\-]/', '',$staff->designation)}}</option>

                                                        <option value="Junior Staff">Junior Staff</option>
                                                        <option value="Senior Staff">Senior Staff</option>
                                                        <option value="Academic Staff">Academic Staff</option>

                                                    </select>
                                                </div>

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Password:</label>
                                                <input type="password" name="password" value="" class="form-control" id="recipient-name">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i>Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>



                    @foreach($staffs as $staff)
                        <div class="modal fade" id="exampleModalCenter{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to delete {{$staff->name}} </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <form action="{{ route('staffs.destroy',$staff->id) }}" method="POST">
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
                   <div class="mt-4 justify-content-center">{{$staffs->links()}}</div>
                </div>
            </div>
        </div>
    </div>

@endsection
