@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @if(session('error_message'))
                    <div class="alert alert-error">
                        {{session('error_message')}}
                    </div>
                @endif

                @if(session('success_message'))
                    <div class="alert alert-success">
                        {{session('success_message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        {{Auth::user()->name}} Profile
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('account.update',Auth::user()->id)}}">
                            @method('PATCH')
                            @csrf
                            <small id="personal_information" class="form-text text-muted">Personal Information.</small>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account Name</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" id="name" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="matric_no" value="{{Auth::user()->matric_no}}" id="name" aria-describedby="emailHelp">
                            </div>
                            <hr>
                            <small id="security_information" class="form-text text-muted">Security Information.</small>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password" name="old_password" class="form-control" value="" id="old_password">
                                <span class="text-danger">{{$errors->first('old_password')}}</span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" name="new_password" class="form-control" id="new_password">
                                <span class="text-danger">{{$errors->first('new_password')}}</span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" id="confirm_password">
                                <span class="text-danger">{{$errors->first('new_password_confirmation')}}</span>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </form>

                    </div>
                    <div class="card-footer text-muted text-center">
                        Adeyemi College of Education
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

