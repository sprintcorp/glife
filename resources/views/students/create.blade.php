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

                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                    </div>
                        <div class="custom-file mt-3 pb-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select id="programme" name="programme" class="form-control">
                                        <option selected>Select programme</option>
                                        <option value="NCE">NCE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select id="level" name="level" class="form-control">
                                        <option selected>Select level</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select id="departments" name="departments" class="form-control">
                                        <option selected>Select departments</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                                    <input type="hidden" name="faculty" id="faculty" value="{{$faculty->id}}">


                        <div class="mt-3">
                    </div>
                        <div class="custom-file mt-3">
                            <input type="file" name="file" class="custom-file-input" id="file" required>
                            <label class="custom-file-label" name="file" for="validatedCustomFile">Import Student From Sheet...</label>
                        </div>

                    <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
