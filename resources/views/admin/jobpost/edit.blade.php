@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit
                    Category</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ url('jobpost/' . $jobPost->id) }}" method="POST" class="forms-sample"
                      enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $jobPost->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $jobPost->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Education</label>
                        <input type="text" class="form-control" name="education" value="{{ $jobPost->education }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $jobPost->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <textarea id="editor" type="text" class="form-control" name="description" >{{ $jobPost->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Category</label>
                        {{--  <input type="text" class="form-control" name="category" value="{{ $jobPost->category }}">  --}}
                        <select class="form-control" name="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->category }}" >{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Designation</label>
                        <input type="text" class="form-control" name="designation" value="{{ $jobPost->designation }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1"><b>Image :</b></label>
                        <input type="file" class="form-control" name="image" value="{{ $jobPost->image }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Duration</label>
                        <input type="text" class="form-control" name="duration" value="{{ $jobPost->duration }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Qualification</label>
                        <textarea id="editor1" type="text" class="form-control" name="qualification" >{{ $jobPost->qualification }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">How many Works You Done From This Side</label>
                        <textarea id="editor2" type="text" class="form-control" name="work_experience" >{{ $jobPost->work_experience }}</textarea>
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
                    <div class="form-group">
                        <label for="exampleInputName1">Status</label>
                        <select class="form-control" name="status" value="{{ $jobPost->status }}">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
