@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit
                    Slider</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{ url('slider/' . $slider->id) }}" method="POST" class="forms-sample"
                      enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Second Title</label>
                        <input type="text" class="form-control" name="sec_title" value="{{ $slider->sec_title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <textarea id="editor" type="text" class="form-control" name="description" >{{ $slider->description }}</textarea>
                    </div>
                  
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
