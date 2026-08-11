@extends('layouts.frontbase')

@section('content')

    @include('frontend.includes.page-hero', [
        'title' => 'Our Impact',
        'subtitle' => 'Lives restored, families strengthened, and communities reached with the love of Christ.',
        'page' => 'impact',
    ])

    @include('frontend.includes.impact', ['variant' => 'light'])

    @if(isset($impacts) && $impacts->count())
            <section class="alive-programs alive-programs--page">
                <div class="container">
                    <div class="text-center pb-40">
                        <p class="alive-eyebrow">Stories of Change</p>
                        <h2 class="alive-heading">How hope takes root</h2>
                    </div>
                    <div class="row">
                        @foreach ($impacts as $item)
                            <div class="col-xl-4 col-md-6 mb-30">
                                <article class="alive-activity-card">
                                    <div class="alive-activity-card__media">
                                        <img src="{{ asset('storage/images/impacts/' . $item->image) }}" alt="{{ $item->title }}">
                                    </div>
                                    <div class="alive-activity-card__body">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 160) }}</p>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

    @include('frontend.includes.backImage')
    @include('frontend.includes.partners')
@endsection
