@extends('layouts.frontbase')

@section('content')



<!-- postbox area start -->
<section class="postbox__area pt-120 pb-80">
<div class="container">
    <div class="row">
        <div class="col-xxl-8 col-xl-8 col-lg-8">
            <div class="postbox__wrapper">
            <article class="postbox__item format-image mb-50 transition-3">
                <div class="postbox__thumb p-relative m-img">
                    <img src="{{ asset('storage/images/programs/' . $program->image) }}" alt="">
                </div>
                <div class="postbox__content">
                    <h3 class="postbox__title">{{ $program->title }}</h3>
                    <div class="postbox__text">
                        <p>
                            {!! $program->description !!}
                        </p>
                    </div>
                </div>
            </article>

                    <div class="tp-gallery-3__area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    @foreach ($gallery as $image)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                    data-wow-delay=".3s">
                        <div class="tp-gallery-3__item p-relative">
                            <img src="{{asset('storage/images/gallery').$image->image}}" alt="">
                            <div class="tp-gallery-3__icon">
                                <a class="popup-image" href="{{asset('storage/images/gallery').$image->image}}">
                                    <svg id="body" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="49" height="51" viewBox="0 0 49 51">
                                        <g id="gallery">
                                          <g id="_02_hover" data-name="02 + hover">
                                            <g id="go_icon" data-name="go icon">
                                              <image id="right-arrow" width="49" height="51" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAzCAYAAAA+VOAXAAAD3klEQVRogdWa24tWZRTGf/PNOH5MY2VREXagojOohNpEh8nEylDRP6XoRugiIagbb7LTRaRmmUVpSVSEFRFFanlAAqOLqCghFZrRrxlnHB9Z9Wx4+XJqZtqnb8EHL/ju7frxrPWuZ+/ZXZKoMLqALIEmMOpUZgHjSVq9wBj/3PdX9FRJANwGXAFcBXzv5G4FhoGfgeuAi4DvnGvs/wX4HbgZeKdqiEhoK3A9cMKJxXrCic4BrgSOAUPAjYb7AbgGuASYC7xcZTmtBXZ4LZdWFuMuKdrWaWTXzK9Sid3AdqAF/ArcBPQB37rErgV+An4EbnBfRKnd5esz6DVVQpwEHgOOApcBlwJH/G+3AMf9i7LqNuBbbfcINXoaFSSfxlGvjyUAeH3c6ziVbgfeBO4GfgMOJHvHq4aYSgwAG4B7fHq9DbwE/OFrR+sMEfPgYeApYJHLL3poE7Ar2ddVZ4hlwDNW4AzwIfACcNA9dLH3NasedpPFoJt+AXDKR/HzwCHvvzy9rm4QFwDLgfVx/vv4fRd4DtiX7Evzrl1P3AE8boBo4vcMcLhtX+qdVBcl+oGlwBNu4rAXO4EXgT3n2T+WrHvqAhHH6JNWIhL8yE38zST707wbdYAIBdYBC32M7rACYT/OTnJNX7IerxIivNAKKxAAI8D7wEYD/Ftk5dRVtRJLgEcTgFDgWT87/Fdk5k9V9cSFLqH1ngNRQjs9B/ZO8R6txKK3iOeJkn9LJe3R33Fa0nZJd0qaNY08mpJ2SXpa0tVlAvRKekjS55LOSDopaZOkgRneb162LgugIWmVpINWYNQKLMrj/mVBDEr61ACnJL0qabGk2Z0A0S9pbaJAlNCWvBQoCyIU+DIpodfdxLkoUDREn6SVkr6SNCFpSNIrBsj9/ysKYoWk/W3H6OKiFC/ipg8kTZwdo6FATydAxABakzRxS9JreTdx0RD3epBF/ClpqxVodgLEHCuQ9cCQS2hJ0cnnCbFc0r6kid8wQHcnQESSD0r6LPFChR2jRUB02wsdsgIjkraV0cR5QkQTf5J4oS15eqGiIbImPmCAYUmbixxkRUCkXuh04oV6OwGiaSvxhZt4OJnElSU/XYhHyvRCRUDcL2l3WxNP95m4Moi+SbxQbRSYCkTqhUbcxANleKE8IPo9yOK1ytnEC830rUQlEOGF9lqBseS9UGle6P9AxB/ml3kST7iJN1uBRl0BUogYVquTSTxiN1qJF5opxH3JI2WrzAeavCAGz+OFajGJp/pr+LuJhX7b/IH/wLG/wLfiuUc0c78/M4jPdj4Gvu4kgIjsU6F5/tKl8wI4B64Oiv+C2BAeAAAAAElFTkSuQmCC"/>
                                            </g>
                                          </g>
                                        </g>
                                      </svg>
                                </a>                        
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4">
            <div class="sidebar__wrapper">

            <div class="sidebar__widget mb-30">
                <h3 class="sidebar__widget-title">Our Latest Updates</h3>
                <div class="sidebar__widget-content">
                    <div class="sidebar__post">

                        @foreach ($news as $rs)
                        <div class="rc__post mb-10 d-flex align-items-center">
                        <div class="rc__post-thumb mr-20">
                            <a href="{{route('postSingle',$rs->slug)}}"><img src="{{ asset('storage/images/news/' . $rs->image) }}" alt="" width="90px"></a>
                        </div>
                        <div class="rc__post-content">
                            {{-- <div class="rc__meta">
                                <span><i class="flaticon-comment"></i>
                                02 Comments</span>
                            </div> --}}
                            <h3 class="rc__post-title">
                                <a href="{{route('postSingle',$rs->slug)}}">{{ $rs->title }}</a>
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
</section>
<!-- postbox area end -->


  @include('frontend.includes.partners')
@endsection
