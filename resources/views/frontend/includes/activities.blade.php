@if(isset($news) && $news->count())
<section id="alive-activities" class="alive-activities">
    <div class="container">
        <div class="text-center pb-40">
            <p class="alive-eyebrow">Recent Activities</p>
            <h2 class="alive-heading">Stories of hope from Bugesera</h2>
        </div>
        <div class="row">
            @foreach($news as $blog)
                <div class="col-xl-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">
                    <article class="alive-activity-card">
                        <a href="{{ route('postSingle', $blog->slug) }}" class="alive-activity-card__media">
                            <img src="{{ asset('storage/images/news/' . $blog->image) }}" alt="{{ $blog->title }}">
                        </a>
                        <div class="alive-activity-card__body">
                            @if(!empty($blog->created_at))
                                <span class="alive-activity-card__date">{{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d M, Y') }}</span>
                            @endif
                            <h3>
                                <a href="{{ route('postSingle', $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>
                            <a class="alive-learn-more" href="{{ route('postSingle', $blog->slug) }}">
                                Read More <i class="flaticon-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a class="alive-btn-outline alive-btn-outline--navy" href="{{ route('posts') }}">View All Updates</a>
        </div>
    </div>
</section>
@endif
