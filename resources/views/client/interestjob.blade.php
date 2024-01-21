<section class="job-style-two pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Jobs You May Be Interested In</h2>
            {{--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>  --}}
        </div>
        <div class="row">
            @foreach ($jobPosts as $job)
                <div class="col-lg-12">
                    <div class="job-card-two">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <div class="company-logo">
                                    <a href="{{ url('/job-details/' . $job->id) }}">
                                        <img src="{{ asset('images/jobpost' . '/' . $job->image) }}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="job-info">
                                    <h3>
                                        <a href="{{ url('/job-details/' . $job->id) }}">{{ $job->title }} </a>
                                    </h3>
                                    <ul>
                                        <li>
                                            <i class='bx bx-briefcase'></i>
                                            {{ $job->designation }}
                                        </li>
                                        <li>
                                            @if ($job->discount_price)
                                                <p class="product-price" name="price"><b></i>
                                                        &#2547;{{ $job->discount_price }}</b> <del
                                                        class="product-old-price"></i>&#2547;{{ $job->price }}</del>
                                                </p>
                                            @else
                                                <p class="product-price" name="price"><b>
                                                        </i>&#2547; {{ $job->price }}</b>
                                            @endif
                                        </li>
                                        <li>
                                            <i class='bx bx-stopwatch'></i>
                                            {{ $job->duration }}
                                        </li>
                                    </ul>

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
    </div>
</section>
