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

                <form action="{{ url('update-page/' . $pages->id) }}" method="POST" class="forms-sample"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $pages->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <input type="text" class="form-control" name="description" value="{!! $pages->description !!}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $pages->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Status</label>
                        <select class="form-control" name="status" value="{{ $pages->status }}">
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
