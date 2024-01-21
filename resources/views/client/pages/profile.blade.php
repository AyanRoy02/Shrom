@extends('client.master')
@section('client')


    <section class="candidate-details pt-100 pb-100">
        <div class="container">



            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate-profile">
                        {{--  @dd($profile);  --}}
                        <h3>Name: {{ Auth::user()->name }}</h3>
                        <p>Email: {{ Auth::user()->email }}</p>

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
