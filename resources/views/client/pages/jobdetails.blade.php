@extends('client.master')
@section('client')
    <div class="navbar-area">

        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="assets/img/logo.png" alt="logo">
            </a>
        </div>
    </div>


    <section class="page-title title-bg6">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Job Details</h2>
                <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>Job Details</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>


    <section class="job-details ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="job-details-text">
                                <form action="{{ url('/add_cart/' . $jobPost->id) }}" method="post">
                                    @csrf
                                    {{--                            @dd($jobPosts);--}}
                                    <div class="job-card">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <div class="company-logo">
                                                    <img src="{{ asset('images/jobpost' . '/' . $jobPost->image) }}"
                                                         alt="logo">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="job-info">
                                                    <h3>{{ $jobPost->title }}</h3>
                                                    <ul>
                                                        <li>
                                                            <i class='bx bx-filter-alt'></i>
                                                            {{ $jobPost->category }}
                                                        </li>
                                                        <li>
                                                            <i class='bx bx-briefcase'></i>
                                                            {{ $jobPost->designation }}
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            @if ($jobPost->discount_price)
                                                                <p class="product-price" name="price"><b>
                                                                        &#2547;{{ $jobPost->discount_price }}</b>
                                                                    <del
                                                                        class="product-old-price">
                                                                        &#2547;{{ $jobPost->price }}</del>
                                                                </p>
                                                            @else
                                                                <p class="product-price" name="price"><b>
                                                                        &#2547; {{ $jobPost->price }}</b>
                                                            @endif
                                                        </li>
                                                    </ul>

                                                    <span>
                                                    <ul>
                                                    <li>
                                                        @if ($jobPost->url)
                                                            <p class="product-price" name="url"><b>
                                                                    <i class='bx bx-filter-alt'></i> {{ $jobPost->url }}</b>
                                                            </p>
                                                            <i class='bx bx-paper-plane'></i>Duration: {{ $jobPost->duration }}</span>
                                                    @else
                                                        <i class='bx bx-paper-plane'></i>
                                                        Duration: {{ $jobPost->duration }}</span>

                                                        @endif
                                                        </li>
                                                        </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="details-text">
                                        <h3>Qualification</h3>
                                        <p> {!! $jobPost->qualification !!}</p>
                                    </div>
                                    <div class="details-text">
                                        <h4>Job Experience
                                            : {!! $jobPost->work_experience !!} </h4>

                                    </div>

                                    <div class="theme-btn">
                                        <button class="default-btn">
                                            Apply Now
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <h3>{!! $jobPost->description !!}</h3>

                    </div>
                </div>
            </div>
        </div>
    </section>

@include('client.interestjob')
@endsection




