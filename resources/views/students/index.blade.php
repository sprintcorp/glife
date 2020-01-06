@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach($faculties as $faculty)
                    <div class="col-sm-6 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$faculty->name}}</h5>
                                <p class="card-text">No of Student {{$faculty->student->count()}}</p>
                                <p class="card-text">No of Department {{$faculty->department->count()}}</p>
                                <a href="{{route('students.show',$faculty->id)}}" class="btn btn-primary">Select Faculty</a>
                                <a href="{{route('faculties.show',$faculty->id)}}" class="btn btn-outline-info ml-3">View Department</a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection
