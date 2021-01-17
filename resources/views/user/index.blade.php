@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student Overview</div>
                    <div class="row p-5 d-flex justify-content-center">
                        
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Matric no</th>
                                <th scope="col">Faculty</th>
                                <th scope="col">Department</th>
                                <th scope="col">Programme</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delele</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($users as $user)
                                        <th scope="row">{{$sn++}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->level}}</td>
                                        <td>{{$user->matric_no}}</td>
                                        <td>{{$user->faculties->name}}</td>
                                        <td>{{$user->departments->name}}</td>
                                        <td>{{$user->programme}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td><button class="btn btn-info" data-toggle="modal" data-target="#student{{$user->id}}"><i class="fa fa-edit"></i></button></td>
                                        <td><form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form></td>
                                </tr>        
                                    @endforeach
                                
                            </tbody>
                        </table>


                        
                       <div class=""> {{$users->links()}}</div>

                        @foreach($users as $user)
                        <div class="modal fade" id="student{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$user->name}} Profile</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">
                                <form method="post" action="{{route('users.update',$user->id)}}">
                                @method('PATCH')
                                @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Email</label>
                                        <input type="email" name="email"  value="{{$user->email}}"class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Matric number</label>
                                        <input type="text" name="matric_no"  value="{{$user->matric_no}}"class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </form>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
