@extends('client.master')
@section('client')
    <section class="page-title title-bg3">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Post a Job</h2>
                <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>Post a Job</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>


    <div class="job-post ptb-100">
        <div class="container">
            <form action="{{ url('/job-request') }}" method="post" class="job-post-from" enctype="multipart/form-data">
                @csrf
         
            <h2>Fillll Up Your Job information</h2>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="Name" name="name"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="Phone" name="phone"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Education</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="Education"
                                name="education" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="Job Title"
                                name="title" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control description-area" id="editor" rows="6" name="description"
                                placeholder="Job Description" required></textarea>
                            {{--                            <textarea id="editor" type="text" type="text" class="form-control" id="exampleInput2" placeholder="Description" name="description" --}}
                            {{--                                      required></textarea> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label><br>
                            <select class="category" name="category">

                                <option>Choose Category</option>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->category }}">{{ $categories->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" id="exampleInput4" name="designation"
                                placeholder="Designation">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" class="form-control" id="exampleInput6" name="duration"
                                placeholder="Duration" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Work Experience</label>
                            <textarea  rows="6" class="form-control" id="exampleInput7" name="work_experience"
                                placeholder="Write The Work Experience"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Qualification</label>
                            <textarea class="form-control description-area" id="exampleFormControlTextarea1" rows="6" name="qualification"
                                placeholder="Write The Qualification" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Url</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="Url" name="url">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Price</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="Price"
                                name="price">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Discount Price</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="Discount Price"
                                name="discount_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="category" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="post-btn">
                            Post A Job
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
