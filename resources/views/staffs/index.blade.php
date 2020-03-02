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
                                        <div class="card ml-3 mb-3" style="max-width: 350px;">
                                            <div class="row no-gutters">
                                                <div class="col-md-5 p-1">
                                                    @if(!empty($staff->image))
                                                        <img src="{{ asset($staff->image)}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                                                    @else
                                                        <img src="{{asset('photo/images.png')}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                                                    @endif
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$staff->name}}</h5>


                                                        <p class="card-text"><small class="text-muted">Last updated {{date('d-F-Y', strtotime($staff->updated_at))}}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
