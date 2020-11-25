@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome {{Auth::user()->name ?  Auth::user()->name : 'Profile not updated'}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
{{--                        {{Auth::user()->isAdmin}}--}}
                        You are logged in as a Staff!
                    </div>
                </div>

                <div class="card mb-3 mt-3" style="max-width: 800px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 pt-3 pl-3 pb-3">
                            @if(!empty(Auth::user()->image))
                                <img src="{{ asset(Auth::user()->image)}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                            @else
                                <img src="{{asset('photo/images.png')}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                  Name :  @if(Auth::user()->name !== '')
                                        {{ Auth::user()->name }}
                                    @else
                                        Update Profile
                                    @endif
                                </h5>
                                <p class="card-text">Staff ID : {{Auth::user()->matric_no}}</p>
                                <p class="card-text">Department : {{Auth::user()->department->name}}</p>
                                <p class="card-text">Designation : {{Auth::user()->designation}}</p>
                                <p class="card-text"><small class="text-muted">Last updated {{date('d-F-Y', strtotime(Auth::user()->updated_at))}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
