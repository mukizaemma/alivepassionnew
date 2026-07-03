@extends('layouts.frontbase')

@section('content')



        <div class="tp-event-details__area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="tp-event-details__left-box">
                            <div class="tp-event-details__thumb p-relative pb-35">
                                <img src="{{ asset('storage/images/testimonies/' . $testimony->image) }}" alt="{{ $testimony->title }}">
                            </div>
                            <h4 class="tp-event-details__title">{{ $testimony->title }}</h4>

                            <div class="tp-event-details__text pb-20">
                                <p>{!! $testimony->description !!}</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-4">
                        <div class="tp-event-details__right-box"> 

                            <div class="sidebar__widget mb-30">
                                <h3 class="sidebar__widget-title">Other Testimonials</h3>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__post">

                                        @foreach ($testimonials as $rs)
                                        <div class="rc__post mb-10 d-flex align-items-center">
                                        <div class="rc__post-thumb mr-20">
                                            <a href="{{ route('testimony',['id'=>$rs->id]) }}"><img src="{{ asset('storage/images/testimonies/' . $rs->image) }}" alt="" width="100px"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            {{-- <div class="rc__meta">
                                                <span><i class="flaticon-comment"></i>
                                                02 Comments</span>
                                            </div> --}}
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('testimony',['id'=>$rs->id]) }}">{{ $rs->title }}</a>
                                            </h3>
                                        </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @include('frontend.includes.backImage')
      @include('frontend.includes.partners')
@endsection
