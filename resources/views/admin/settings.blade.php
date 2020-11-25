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
                
                @if(session('error_message'))
                        <div class="alert alert-error">
                            {{session('error_message')}}
                        </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">Search for staff id or student matric no</div>

                    <div class="row p-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <form action="{{route('settings.store')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="matric_no" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" placeholder="Staff id / Student matric no" id="matric_no" name="matric_no">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block mb-lg-5">Proceed</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    @if($user != null)
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card mb-3 mt-3" style="max-width: 800px;">
                            <div class="row no-gutters">
                                <div class="col-md-4 pt-3 pl-3 pb-3">
                                    @if(!empty($user->image))
                                        <img src="{{ asset($user->image)}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                                    @else
                                        <img src="{{asset('photo/images.png')}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Name :  {{$user->name ? $user->name : 'Incomplete profile'}}
                                        </h5>
                                        <p class="card-text">User ID : {{$user->matric_no}}</p>
                                       
                                        @if($user->isAdmin == 2)
                                        <p class="card-text">Designation : {{$user->designation}}</p>
                                       
                                            @endif
                                        <p class="card-text"><small class="text-muted">Last updated {{date('d-F-Y', strtotime($user->updated_at))}}</small></p>
                                    </div>
                                    <button type="button" class="mb-3 btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $user->id}}" data-whatever="@mdo">
                                        Restore
                                    </button>
                                </div>

                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to restore {{$user->name}} request activity</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <form action="{{ route('settings.update',$user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
{{--                                                <input type="hidden" name="id" value="{{$user->id}}">--}}
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

                    @endif
                </div>
            </div>

        </div>





    </div>
@endsection
