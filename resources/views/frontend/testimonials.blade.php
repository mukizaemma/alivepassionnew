@extends('layouts.frontbase')

@section('title', 'Home Page')

@section('content')


    @include('frontend.includes.page-hero', [
        'title' => 'Testimonials',
        'subtitle' => 'Voices of hope from the people and communities we serve.',
        'image' => $about->image2 ?? $about->image ?? null,
    ])

    <!-- testimonial-area-start -->
    @include('frontend.includes.testimonials')
    <!-- testimonial-area-end -->

        <!-- cta-area-start -->
            @include('frontend.includes.backImage')
        <!-- cta-area-end -->

  @include('frontend.includes.partners')
@endsection
