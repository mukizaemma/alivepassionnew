@extends('layouts.frontbase')

@section('content')

    @include('frontend.includes.page-hero', [
        'title' => 'Our Programs',
        'subtitle' => 'Practical compassion and Gospel-centered care across Bugesera, Rwanda.',
    ])

    <section class="alive-programs alive-programs--page">
        <div class="container">
            <div class="row">
                @foreach ($programs as $program)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">
                        @include('frontend.includes.program-card', ['program' => $program])
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.includes.backImage')
    @include('frontend.includes.partners')
@endsection
