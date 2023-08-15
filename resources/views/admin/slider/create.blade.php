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

                <form action="{{ url('/slider') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <textarea type="text" class="form-control" name="title" id="exampleTextarea1" placeholder="Title"></textarea>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Second Title</label>
                        <textarea type="text" class="form-control" name="sec_title" id="exampleTextarea1" placeholder="Second Title"></textarea>
                        @error('sec_title')
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


                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
