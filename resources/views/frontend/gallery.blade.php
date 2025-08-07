@extends('layouts.frontbase')

@section('content')


 
        <!-- gallery-area-start -->
<div class="tp-gallery-3__area pt-120 pb-120">
    <div class="container">
        <!-- Tabs Navigation -->

        <!-- Tabs Content -->
        <div class="tab-content" id="galleryTabContent">
            <!-- All Images Tab -->
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                <div class="row">
                    @foreach($gallery as $image)
                        <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                            <div class="tp-gallery-3__item p-relative">
                                <img src="{{ asset('storage/images/gallery/' . $image->image) }}" alt="">
                                <div class="tp-gallery-3__icon">
                                    <a class="popup-image" href="{{ asset('storage/images/gallery/' . $image->image) }}">
                                        <!-- Your icon SVG -->
                                        <!-- (same SVG as your original code) -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Pagination (Optional) -->
        {{-- You can implement pagination per tab if needed --}}
    </div>
</div>

        <!-- gallery-area-end -->


  @include('frontend.includes.partners')
@endsection
