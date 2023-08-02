@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Create
                    JobPost</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ url('/jobpost') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Title :</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1"
                            placeholder="Title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <textarea type="text" class="form-control" name="description" id="exampleTextarea1" placeholder="Description"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Product Category</label>
                        <select class="form-control" name="category">
                            <option>Choose Category</option>
                            @foreach ($category as $categories)
                                <option value="{{ $categories->category }}">{{ $categories->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control">
                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Url</label>
                        <input type="text" class="form-control" name="url" id="exampleInputName1" placeholder="Url">
                        @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Price" required>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Discount Price</label>
                        <input type="text" class="form-control" name="discount_price" placeholder="Discount price">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
