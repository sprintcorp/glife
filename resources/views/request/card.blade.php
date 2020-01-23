@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @if(session('success_message'))
                <div class="alert alert-success">
                    {{session('success_message')}}
                </div>
            @endif

            <div class="col-md-12">
                <div class="row">

                        <div class="col-sm-12 p-3">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('requests.store')}}">
                                    @csrf
                                        <button type="submit" class="btn btn-primary btn-block">REQUEST NEW CARD</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection
