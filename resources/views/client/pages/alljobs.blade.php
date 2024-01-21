@extends('client.master')
@section('client')


    <section class="page-title title-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Job List</h2>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Job List</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>


    <section class="job-style-two job-list-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Jobs You May Be Interested In</h2>
            </div>
            <div class="row">
                @foreach ($jobPosts as $post)


                <div class="col-lg-12">
                    <div class="job-card-two">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <div class="company-logo">
                                    <a href="#"></a>
                                    <img src="{{ asset('images/jobpost' . '/' . $post->image) }}" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="job-info">
                                    <h3>
                                        <a href="#">{{ $post->title }}</a>
                                    </h3>
                                    <ul>
                                        <li>
                                            <i class='bx bx-briefcase'></i>
                                            {{ $post->designation }}
                                        </li>
                                        <li>

                                            @if ($post->discount_price)
                                                                <p class="product-price" name="price"><b>
                                                                        &#2547;{{ $post->discount_price }}</b>
                                                                    <del
                                                                        class="product-old-price">
                                                                        &#2547;{{ $post->price }}</del>
                                                                </p>
                                                            @else
                                                                <p class="product-price" name="price"><b>
                                                                        &#2547; {{ $post->price }}</b>
                                                            @endif
                                        </li>

                                        <li>
                                            <i class='bx bx-stopwatch'></i>
                                            {{ $post->duration }}
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="theme-btn text-end">
                                    <a href="{{ url('/job-details/' . $post->id) }}" class="default-btn">
                                        Browse
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection


