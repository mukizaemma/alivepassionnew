<div class="alive-program-card">
    <a href="{{ route('singleProgram', ['slug' => $program->slug]) }}" class="alive-program-card__media">
        <img src="{{ $program->imageUrl() }}" alt="{{ $program->title }}">
    </a>
    <div class="alive-program-card__icon" aria-hidden="true">
        <i class="{{ $program->iconClass() }}"></i>
    </div>
    <div class="alive-program-card__body">
        <h3>
            <a href="{{ route('singleProgram', ['slug' => $program->slug]) }}">{{ $program->title }}</a>
        </h3>
        <p>{{ $program->summary(130) }}</p>
        <a class="alive-learn-more" href="{{ route('singleProgram', ['slug' => $program->slug]) }}">
            Learn More <i class="flaticon-arrow-right"></i>
        </a>
    </div>
</div>
