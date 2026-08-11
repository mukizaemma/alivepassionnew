@extends('layouts.frontbase')

@section('content')

    @include('frontend.includes.page-hero', [
        'title' => 'About Alive Passion Ministries',
        'subtitle' => 'A faith-driven initiative in Bugesera, Rwanda — loving, serving, and transforming lives through the Gospel.',
        'page' => 'about',
    ])

    <section class="alive-initiative alive-initiative--page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <p class="alive-eyebrow">Our Background</p>
                    <h2 class="alive-heading">Called to restore dignity</h2>
                    <div class="alive-program-detail__text">
                        {!! $about->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.includes.mission')

    @include('frontend.includes.founder')

    @include('frontend.includes.backImage')

    @include('frontend.includes.partners')
@endsection
