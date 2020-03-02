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

                        <form action="{{route('staffs.store')}}" method="post">
                            @csrf
                            <div class="input_fields_wrap">
                                <div class="row">
                                    <div class="col">
                                        <input type="email" name="email[]" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="matric_no[]" class="form-control" placeholder="ID number" required>
                                    </div>
                                    <div class="col">
                                        <input type="password" name="password[]" class="form-control" placeholder="Password" required>
                                    </div>
                                    <button class="btn btn-info add_field_button"><i class="fa fa-plus"></i></button>

                                </div>
                            </div>
                            <div class="row mt-5">
                                <button type="submit" class="btn btn-outline-info btn-block">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('' +
                        ' <div class="row mt-3 mb-3"><div class="col"><input type="email" name="email[]" class="form-control" placeholder="Email" required></div>' +

                        ' <div class="col"><input type="text" name="matric_no[]" class="form-control" placeholder="ID number" required></div>' +

                        ' <div class="col"><input type="password" name="password[]" class="form-control" placeholder="Password" required></div>' +
                        '' +
                        '<button class="btn btn-info remove_field"><i class="fa fa-minus"></i></button></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>

@endsection
