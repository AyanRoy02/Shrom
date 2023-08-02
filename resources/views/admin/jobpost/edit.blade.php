@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Category</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ url('jobpost/' . $jobPost->id) }}" method="POST" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $jobPost->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $jobPost->description }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Category</label>
                        <input type="text" class="form-control" name="category" value="{{ $jobPost->category }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1"><b>Image :</b></label>
                        <input type="file" class="form-control" name="image" value="{{ $jobPost->image }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Url</label>
                        <input type="text" class="form-control" name="url" value="{{ $jobPost->url }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $jobPost->price }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Discount Price</label>
                        <input type="text" class="form-control" name="discount_price"
                            value="{{ $jobPost->discount_price }}">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
