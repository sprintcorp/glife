@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session('success_message'))
            <div class="alert alert-success">
                {{session('success_message')}}
            </div>
        @endif
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
                                <a href="{{route('students.show',$faculty->id)}}" class="btn btn-primary">Add Student</a>
                                <a href="{{route('faculties.show',$faculty->id)}}" class="btn btn-outline-info ml-3">View Department</a>
                                <a href="{{route('student.show',$faculty->id)}}" class="btn btn-outline-primary  ml-3">View Student</a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection
