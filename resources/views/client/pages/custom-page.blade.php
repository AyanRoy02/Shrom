@extends('client.master')
@section('client')


    <div class="privacy-section pt-100 pb-100">
        <div class="container">
            <div class="privacy-text">



                <h2>{{ $pageInfo->title }}</h2>
                <p>{!! $pageInfo->description !!}</p>
            </div>
        </div>
    </div>




@endsection
