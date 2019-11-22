@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Price</label>
                            <input type="number" name="price" class="form-control"  placeholder="price">
                        </div>
                    </div>
                        <div class="custom-file mt-3">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" name="image" for="validatedCustomFile">Choose an image for product...</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection