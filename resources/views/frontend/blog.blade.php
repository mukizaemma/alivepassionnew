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
                    <div class="postbox__thumb-text d-none d-md-block">
                        <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M,Y') }}</span>
                    </div>
                    <img src="{{ asset('storage/images/news/' . $blog->image) }}" alt="">
                </div>
                <div class="postbox__content">
                    <div class="postbox__meta">
                        <span><i class="flaticon-user"></i>By Alive Passion</span>
                        {{-- <span><a href="#"><i class="flaticon-comment"></i>02 Comments</a></span> --}}
                    </div>
                    <h3 class="postbox__title">{{ $blog->title }}</h3>
                    <div class="postbox__text">
                        <p>
                            {!! $blog->body !!}
                        </p>
                    </div>
                </div>
            </article>
            <div class="postbox__comment mb-50">
                <h3 class="postbox__comment-title">03 Comments</h3>
                <ul>
                    <li>
                        <div class="postbox__comment-box p-relative">
                        <div class="postbox__comment-info d-flex align-items-center">
                                <div class="postbox__comment-avater mr-40">
                                    <img src="assets/img/blog/author-1-1.png" alt="">
                                </div>
                                <div class="postbox__comment-name p-relative">
                                    <h5>Mithcel Adnan</h5>
                                    <div class="postbox__comment-text">
                                    <p>Curabitur luctus nisl in justo maximus egestas. Curabitur sit amet sapien <br> vel nunc molestie pulvinar at vitae quam. Aliquam lobortis nisi vitae <br> congue consectetur. Aliquam et quam non metus </p>
                                    <div class="postbox__comment-reply">
                                        <a href="#"><i class="flaticon-right-arrow-1"></i>Reply</a>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                    </li>
                    <li class="children">
                    <div class="postbox__comment-box p-relative">
                        <div class="postbox__comment-info d-flex align-items-center">
                                <div class="postbox__comment-avater mr-40">
                                    <img src="assets/img/blog/author-1-2.png" alt="">
                                </div>
                                <div class="postbox__comment-name p-relative">
                                    <h5>Liza Olivarez</h5>
                                    <div class="postbox__comment-text">
                                    <p>Curabitur luctus nisl in justo maximus egestas. Curabitur sit <br>
                                        amet sapien vel nunc molestie pulvinar at vitae quam.
                                        Aliquam <br> lobortis nisi vitae congue consectetur. Aliquam
                                        et quam non metus </p>
                                    <div class="postbox__comment-reply">
                                        <a href="#"><i class="flaticon-right-arrow-1"></i>Reply</a>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                    </li>
                    <li>
                    <div class="postbox__comment-box p-relative">
                        <div class="postbox__comment-info d-flex align-items-center">
                                <div class="postbox__comment-avater mr-40">
                                    <img src="assets/img/blog/author-1-3.png" alt="">
                                </div>
                                <div class="postbox__comment-name p-relative">
                                    <h5>Robert Pitterson</h5>
                                    <div class="postbox__comment-text">
                                    <p>Curabitur luctus nisl in justo maximus egestas. Curabitur sit amet sapien <br> vel nunc molestie pulvinar at vitae quam. Aliquam lobortis nisi vitae <br> congue consectetur. Aliquam et quam non metus </p>
                                    <div class="postbox__comment-reply">
                                        <a href="#"><i class="flaticon-right-arrow-1"></i>Reply</a>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="postbox__comment-form-box">
                <h3 class="postbox__comment-form-title">Write a comment</h3>
                <div class="postbox__comment-form">
                    <form id="contact-form" action="#">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                            <div class="postbox__comment-input">
                                <input name="name" type="text" placeholder="your name">
                            </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                            <div class="postbox__comment-input">
                                <input name="email" type="email" placeholder="your mail">
                            </div>
                            </div>
                            <div class="col-xxl-12">
                            <div class="postbox__comment-input">
                                <textarea name="message" placeholder="Write Your Comment"></textarea>
                            </div>
                            </div>
                            <div class="col-xxl-12">
                            <div class="postbox__comment-btn">
                                <button type="submit" class="tp-btn">Submit Your Comment</button>
                            </div>
                            </div>
                        </div>
                    </form>
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

                        @foreach ($relatedBlogs as $rs)
                        <div class="rc__post mb-10 d-flex align-items-center">
                        <div class="rc__post-thumb mr-20">
                            <a href="{{route('postSingle',$rs->slug)}}"><img src="{{ asset('storage/images/news/' . $rs->image) }}" alt=""></a>
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
