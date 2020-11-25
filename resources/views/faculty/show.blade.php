@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach($department as $departments)
                        <div class="col-sm-6 pb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$departments->name}}</h5>
                                    <p class="card-text">No of Student {{$departments->students->count()}}</p>

                                    <!--<a href="{{route('departments.show',$departments->id)}}" class="btn btn-outline-info ml-3">View Student</a>-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
