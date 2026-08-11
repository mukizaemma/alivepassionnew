<section id="alive-about" class="alive-initiative">
    <div class="container">
        <div class="alive-equal">
            <div class="alive-equal__card wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".2s">
                <p class="alive-eyebrow">{{ config('alive.initiative.eyebrow') }}</p>
                <h2 class="alive-heading">{{ config('alive.initiative.title') }}</h2>
                <p class="alive-lead">{{ config('alive.initiative.body') }}</p>
                @if(!empty(optional($about)->description))
                    <p class="alive-body-text">{{ \Illuminate\Support\Str::limit(strip_tags($about->description), 280) }}</p>
                @endif
                <div class="alive-initiative__actions">
                    <a class="tp-btn" href="{{ route('backgroundDetails') }}">Learn More</a>
                    <a class="alive-btn-outline alive-btn-outline--navy" href="{{ $setting->getDonateUrl() }}" target="_blank" rel="noopener noreferrer">Donate</a>
                </div>
            </div>
            <div class="alive-equal__media wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".35s">
                <img src="{{ asset('storage/images/' . ltrim(optional($about)->image ?? '', '/')) }}" alt="Alive Passion Ministries in Bugesera, Rwanda">
            </div>
        </div>
    </div>
</section>
