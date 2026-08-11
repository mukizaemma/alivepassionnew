<section id="alive-impact" class="alive-impact" @if(!empty(optional($about)->image1)) style="--alive-impact-image: url('{{ asset('storage/images/' . ltrim($about->image1, '/')) }}');" @endif>
    <div class="alive-impact__overlay"></div>
    <div class="container">
        <div class="text-center alive-impact__intro">
            <p class="alive-eyebrow alive-eyebrow--gold">Our Impact</p>
            <h2 class="alive-heading alive-heading--light">Love that leaves a lasting mark</h2>
        </div>
        <div class="row">
            @foreach(config('alive.impact') as $stat)
                <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="alive-impact__stat wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">
                        <div class="alive-impact__icon">
                            <i class="{{ $stat['icon'] }}"></i>
                        </div>
                        <strong>{{ $stat['value'] }}</strong>
                        <span>{{ $stat['label'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
