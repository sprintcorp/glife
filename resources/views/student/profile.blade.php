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
                        <form method="post" action="{{route('students.update',Auth::user()->id)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <small id="personal_information" class="form-text text-muted">Personal Information.</small>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fullname</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" id="name" aria-describedby="emailHelp">
                            </div>
                            <label class="text-danger">N:B Maximum 12 Kilobytes</label>
                            <div class="row pl-3">

                                <div class="col-md-8 form-group">

                                    <input type="file" name="file" class="custom-file-input" id="file" onchange="readURL(this);">
                                    <label class="custom-file-label" name="file" for="validatedCustomFile">Select a profile Image...</label>
                                </div>

                                <div class="col-md-3 pl-5 form-group">
                                    @if(empty(Auth::user()->image))
                                    <img id="blah" src="{{asset('photo/images.png')}}" alt="your image" style="max-width: 180px" />
                                        @else
                                        <img id="blah" src="{{ asset(Auth::user()->image)}}" alt="your image" style="max-width: 180px" />
                                        @endif
                                </div>
                            </div>

                            <label class="text-danger">N:B Maximum 12 Kilobytes</label>
                            <div class="row pl-3">

                                <div class="col-md-8 form-group">

                                    <input type="file" name="sign" class="custom-file-input" id="sign">
                                    <label class="custom-file-label" name="sign" for="validatedCustomFile">Select a Signature...</label>
                                </div>

                                <div class="col-md-3 pl-5 form-group">
                                    @if(empty(Auth::user()->signature))
                                        <img id="signature" src="{{asset('photo/art-signature-drawing-handwriting-chase.jpg')}}" alt="your image" style="max-width: 180px" />
                                    @else
                                        <img id="signature" src="{{ asset(Auth::user()->signature)}}" alt="your image" style="max-width: 180px" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Blood Group</label>
                                <select class="form-control" name="blood" id="exampleFormControlSelect1">
                                    <option value="{{Auth::user()->blood}}">{{Auth::user()->blood}}</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB">AB</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                    <option value="{{Auth::user()->gender}}">{{Auth::user()->gender}}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Next of kin</label>
                                <input type="text" class="form-control" name="kin" value="{{Auth::user()->kin}}" id="kin">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address (Next of Kin)</label>
                                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{Auth::user()->address}}</textarea>
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

                            <button type="submit" class="btn btn-primary btn-block">Update My Record</button>
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

{{--<script>--}}
{{--    function readURL(input) {--}}
{{--        if (input.files && input.files[1]) {--}}
{{--            var reader = new FileReader();--}}

{{--            reader.onload = function (e) {--}}
{{--                $('#signature')--}}
{{--                    .attr('src', e.target.result);--}}
{{--            };--}}

{{--            reader.readAsDataURL(input.files[1]);--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
