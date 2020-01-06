@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Auth::user()->isAdmin}}
                    You are logged in as a User!
                </div>
            </div>

            <div class="card mb-3 mt-3" style="max-width: 800px;">
                <div class="row no-gutters">
                    <div class="col-md-4 pt-3 pl-3 pb-3">
                        @if(!empty(Auth::user()->image))
                        <img src="{{ asset(Auth::user()->image)}}" class="card-img" alt="...">
                            @else
                        <img src="{{asset('photo/images.png')}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                            @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{Auth::user()->name}}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated {{date('d-F-Y', strtotime(Auth::user()->updated_at))}}</small></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
