@extends('layouts.frontbase')

@section('content')

    @include('frontend.includes.page-hero', [
        'title' => $program->title,
        'subtitle' => $program->summary(160),
        'page' => 'programs',
    ])

    <section class="alive-program-detail">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <article class="alive-program-detail__main">
                        <div class="alive-program-detail__image">
                            <img src="{{ $program->imageUrl() }}" alt="{{ $program->title }}">
                            <span class="alive-program-detail__badge">
                                <i class="{{ $program->iconClass() }}"></i>
                            </span>
                        </div>
                        <div class="alive-program-detail__body">
                            <p class="alive-eyebrow">Our Programs</p>
                            <h2 class="alive-heading">{{ $program->title }}</h2>
                            <div class="alive-program-detail__text">
                                {!! $program->description !!}
                            </div>
                            <div class="alive-program-detail__cta">
                                <a class="tp-btn theme-2-bg" href="{{ $setting->getDonateUrl() }}" target="_blank" rel="noopener noreferrer">Get Involved</a>
                                <a class="alive-btn-outline alive-btn-outline--navy" href="{{ route('contacts') }}">Partner With Us</a>
                            </div>
                        </div>

                        @if($gallery->count())
                            <div class="alive-program-gallery">
                                <h3>In the field</h3>
                                <div class="row">
                                    @foreach ($gallery as $image)
                                        @php
                                            $gallerySrc = asset('storage/images/gallery/' . ltrim($image->image, '/'));
                                        @endphp
                                        <div class="col-md-4 col-6 mb-20">
                                            <a class="popup-image alive-program-gallery__item" href="{{ $gallerySrc }}">
                                                <img src="{{ $gallerySrc }}" alt="{{ $image->caption ?? $program->title }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </article>
                </div>

                <aside class="col-xl-4 col-lg-4">
                    <div class="alive-sidebar">
                        <div class="alive-sidebar__widget">
                            <h3>Other Programs</h3>
                            <ul class="alive-sidebar__programs">
                                @foreach ($otherPrograms as $rs)
                                    <li>
                                        <a href="{{ route('singleProgram', $rs->slug) }}">
                                            <span class="alive-sidebar__icon"><i class="{{ $rs->iconClass() }}"></i></span>
                                            <span>{{ $rs->title }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="alive-sidebar__donate">
                            <h3>Walk with them until they rise</h3>
                            <p>Your gift fuels shelter, skills, discipleship, and care for children and families in Bugesera.</p>
                            <a class="tp-btn theme-2-bg w-100" href="{{ $setting->getDonateUrl() }}" target="_blank" rel="noopener noreferrer">Donate Now</a>
                        </div>

                        @if($news->count())
                            <div class="alive-sidebar__widget">
                                <h3>Latest Updates</h3>
                                @foreach ($news as $rs)
                                    <a class="alive-sidebar__post" href="{{ route('postSingle', $rs->slug) }}">
                                        <img src="{{ asset('storage/images/news/' . $rs->image) }}" alt="{{ $rs->title }}">
                                        <span>{{ $rs->title }}</span>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @include('frontend.includes.backImage')
    @include('frontend.includes.partners')
@endsection
