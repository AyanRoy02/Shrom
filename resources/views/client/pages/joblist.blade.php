@extends('client.master')
@section('client')

<section class="page-title title-bg4">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>Job List</h2>
            <ul>
                <li>
                    <a href="{{ url('/') }}">Home</a>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>
        </div>
{{--        @dd($jobPosts);--}}
        <div class="row">
            @foreach($jobPosts as $job)
            <div class="col-lg-12">
                <div class="job-card-two">
                    <div class="row align-items-center">
                        <div class="col-md-1">
                            <div class="company-logo">
                                <a href=""></a>
                                <img src="{{ asset('images/jobpost' . '/' . $job->image) }}" alt="logo">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="job-info">
                                <h3>
                                    <a href="job-details.html">{{ $job->title }}</a>
                                </h3>
                                <ul>
                                    <li>
                                        <i class='bx bx-briefcase'></i>
                                        {{$job->designation}}
                                    </li>
                                    <li>
                                    @if ($job->discount_price)
                                        <p class="product-price" name="price"><b></i>
                                                &#2547;{{ $job->discount_price }}</b> <del
                                                class="product-old-price"></i>&#2547;{{ $job->price }}</del></p>
                                    @else
                                        <p class="product-price" name="price"><b>
                                                </i>&#2547; {{ $job->price }}</b>
                                    @endif
                                    </li>
{{--                                    <li>--}}
{{--                                        <i class='bx bx-briefcase'></i>--}}
{{--                                        {{ $job->price }}--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <i class='bx bx-location-plus'></i>--}}
{{--                                        Wellesley Rd, London--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <i class='bx bx-stopwatch'></i>--}}
{{--                                        {{ $job->duration }}--}}
{{--                                    </li>--}}
                                </ul>
                                <span>{{ $job->duration }}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="theme-btn text-end">
                                <a href="{{ url('/job-details/' . $job->id) }}" class="default-btn">
                                    Browse
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
            {{--  <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <i class='bx bx-chevrons-left bx-fade-left'></i>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link active" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class='bx bx-chevrons-right bx-fade-right'></i>
                    </a>
                </li>
            </ul>  --}}
        </nav>
    </div>
</section>
@endsection






