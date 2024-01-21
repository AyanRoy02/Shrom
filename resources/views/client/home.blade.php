@extends('client.master')
@section('client')
    <div class="banner-style-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    @foreach ($slider as $slide)
                        <div class="banner-text">
                            <span>{{ $slide->title }}</span>
                            <h1>{{ $slide->sec_title }}</h1>
                            <p>{!! $slide->description !!}</p>
                            <div class="theme-btn">
                                <a href="{{ url('/find-job') }}" class="default-btn active">Need Job</a>
                                <a href="{{ url('/all-jobs') }}" class="default-btn">Hire Someone</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div><br>
    <div class="category-style-two pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Popular Jobs Category</h2>
    
            </div>
            <div class="row">

                @foreach ($cat as $categories)
                    <div class="col-lg-3 col-sm-6">
                        <a href="{{ url('/jobpostbycat/' . $categories->category) }}">
                            <div class="category-item">
                                <i class="flaticon-wrench-and-screwdriver-in-cross"></i>
                                <h3>{{ $categories->category }}</h3>
                                <p></p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="grow-business pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="grow-text">
                        <div class="section-title">
                            <h2>{{  $setting['title'] }}</h2>
                        </div>
                        <p>{{ $setting['description'] }}
                        </p>
                        <div class="theme-btn">
                            <a href="{{ url('/login') }}" class="default-btn">Login</a>
                            <a href="{{ url('/register') }}" class="default-btn">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="grow-img">
                        <img src="{{ asset('client/assets/img/grow-img.jpg') }}" alt="grow image">
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('client.interestjob')

    <div class="counter-section pt-100 pb-70">
        <div class="container">
            <div class="row counter-area">
                <div class="col-lg-4 col-6">
                    <div class="counter-text">
                        <i class="flaticon-resume"></i>
                        <?php
                        $job = DB::table('jobposts')
                            ->where('status', 1)
                            ->count();
                        ?>
                        <h2><span>{{ $job }}</span></h2>
                        <p>Job Posted</p>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="counter-text">
                        <i class="flaticon-recruitment"></i>
                        <?php
                        $categ = DB::table('categories')->count();
                        ?>
                        <h2><span>{{ $categ }}</span></h2>
                        <p>Total Categories</p>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="counter-text">
                        <i class="flaticon-employee"></i>
                        <?php
                        $member = DB::table('users')
                            ->where('role', '=', 'client')
                            ->count();
                        ?>
                        <h2><span>{{ $member }}</span></h2>
                        <p>Members</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
