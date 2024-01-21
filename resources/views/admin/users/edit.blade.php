@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Edit Category</h4>
                <p class="card-description">
                    Please fill out the form below.
                </p>

                <form action="{{url('/update-users/'.$users->id)}}" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="1" {{$users->status=='1' ? 'selected' : ''}}>
                                Active
                            </option>
                            <option value="0" {{$users->status=='0' ? 'selected' : ''}}>
                                Inactive
                            </option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
