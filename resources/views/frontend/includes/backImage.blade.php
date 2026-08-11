<section class="alive-cta-band">
    <div class="alive-cta-band__bg p-relative fix" @if(!empty(optional($about)->image1)) style="background-image: url('{{ asset('storage/images/' . ltrim($about->image1, '/')) }}');" @endif>
        <div class="alive-cta-band__overlay"></div>
        <div class="container">
            <div class="alive-cta-band__content text-center">
                <h2 class="wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">{{ config('alive.cta.title') }}</h2>
                <p class="wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".35s">{{ config('alive.cta.subtitle') }}</p>
                <div class="alive-cta-band__actions wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                    <a href="{{ $setting->getDonateUrl() }}" target="_blank" rel="noopener noreferrer" class="tp-btn theme-2-bg alive-cta-btn">Donate Now</a>
                    <a href="{{ route('contacts') }}" class="alive-btn-outline">Partner With Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
