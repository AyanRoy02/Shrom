@extends('client.master')
@section('client')
    <section class="candidate-details pt-100 pb-100">
        <div class="container">

            <form action="{{ url('/pay') }}" method="POST">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                @foreach ($carts as $cart)
                    <div class="row">

                        <div class="col-lg-4">
                            <a href="{{ url('/delete_cart/'.$cart->id) }}" style="float: right;" class="btn btn-danger btn-sm">Remove</a>
                            <div class="candidate-profile">

                                <img src="{{ asset('images/jobpost' . '/' . $cart->jobPost->image) }}" alt="candidate image">
                                <h3>{{ $cart->jobPost->name }}</h3>
                                <p><i class='btn btn-success'>{{ $cart->jobPost->designation }}</i> </p>
                                @if ($cart->jobPost->discount_price)
                                    <p class="product-price" name="price"><b>
                                            &#2547;{{ $cart->jobPost->discount_price }}</b>
                                        <del class="product-old-price">
                                            &#2547;{{ $cart->jobPost->price }}</del>
                                    </p>
                                @else
                                    <p class="product-price" name="price"><b>
                                            &#2547; {{ $cart->jobPost->price }}</b></p>
                                @endif

                                <i class='bx bx-paper-plane'></i>
                                Duration: {{ $cart->jobPost->duration }}</span>

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="candidate-info-text">
                                <h3>Description</h3>
                                <p>{!! $cart->jobPost->description !!}</p>

                                <div class="candidate-info-text candidate-experience">
                                    <h3>Work Experience</h3>

                                    <ul>
                                        <li>{!! $cart->jobPost->work_experience !!}</li>

                                    </ul>
                                </div>

                            </div>
                        </div>
                @endforeach

                <div class="candidate-info-text text-center">
                    <div class="theme-btn">
                        <?php
                                    $totalitem = 0;
                                    $total_cart_price = 0;
                                    ?>
                                    @foreach ($carts as $cart)
                                        <?php
                                        $total_cart_price = $total_cart_price + $cart->jobPost->total_price;

                                        ?>
                                    @endforeach
                        <p class="default-btn">Total Amount: &#2547; {{ $total_cart_price }}</p>
                        <button type="submit" href="#" class="default-btn">Hire Worker</button>
                    </div>
                </div>
            </form>


        </div>
    </section>
@endsection
