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
                        <label for="exampleInputName1">Name</label>
                        <textarea type="text" class="form-control" name="name" id="exampleTextarea1" placeholder="Name"></textarea>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Phone</label>
                        <textarea type="text" class="form-control" name="phone" id="exampleTextarea1" placeholder="Phone"></textarea>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Education</label>
                        <textarea type="text" class="form-control" name="education" id="exampleTextarea1" placeholder="Education"></textarea>
                        @error('education')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
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
                        <textarea id="editor" type="text" class="form-control" name="description"  placeholder="Write The Description"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="category">
                            <option>Choose Category</option>
                            @foreach ($category as $categories)
                                <option value="{{ $categories->category }}">{{ $categories->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Designation</label>
                        <input type="text" class="form-control" name="designation" id="exampleInputName1" placeholder="Designation">
                        @error('designation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control">
                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Duration</label>
                        <input type="text" class="form-control" name="duration" id="exampleInputName1" placeholder="Duration">
                        @error('duration')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Work Experience</label>
                        <textarea id="editor1" type="text" class="form-control" name="work_experience"  placeholder="Write The Work Experience"></textarea>
                        @error('work_experience')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Qualification</label>
                        <textarea id="editor2" type="text" class="form-control" name="qualification"  placeholder="Write The Qualification"></textarea>
                        @error('qualification')
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
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
