@extends('admin.master')
@section('admin.content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Website setup
                   </h4>
                <p class="card-description">
                    Body Part.
                </p>

                <form action="{{ url('/update-setting') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Title :</b></label>
                        <input type="text" class="form-control" name="title" value="{{ $setting['title'] }}"  placeholder="Write The Title">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Description :</b></label>
                        <input type="text" class="form-control" name="description" value="{{ $setting['description'] }}"  placeholder="Write The Description">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>

            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">First Footer
                   </h4>
                <p class="card-description">
                    First Footer Part
                </p>

                <form action="{{ url('/update-setting') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Description: </b></label>
                        <input type="text" class="form-control" name="desp" value="{{ $setting['desp'] }}"  placeholder="Write The Description">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Fb Url</b></label>
                        <input type="text" class="form-control" name="fb" value="{{ $setting['fb'] }}"  placeholder="Write The Fb url">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Twitter Url</b></label>
                        <input type="text" class="form-control" name="twitter" value="{{ $setting['twitter'] }}"  placeholder="Write The Twitter url">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Instagram Url</b></label>
                        <input type="text" class="form-control" name="insta" value="{{ $setting['insta'] }}"  placeholder="Write The Instagram url">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Youtube Url</b></label>
                        <input type="text" class="form-control" name="youtube" value="{{ $setting['youtube'] }}"  placeholder="Write The Youtube url">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>

            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Third Footer
                   </h4>
                <p class="card-description">
                    Third Footer Part
                </p>

                <form action="{{ url('/update-setting') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Phone Number: </b></label>
                        <input type="text" class="form-control" name="phn" value="{{ $setting['phn'] }}"  placeholder="Write The Description">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email :</b></label>
                        <input type="text" class="form-control" name="email" value="{{ $setting['email'] }}"  placeholder="Write The Fb url">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Address :</b></label>
                        <input type="text" class="form-control" name="add" value="{{ $setting['add'] }}"  placeholder="Write The Twitter url">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
