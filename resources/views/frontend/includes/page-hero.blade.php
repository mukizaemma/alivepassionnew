@php
    $heroImage = $image ?? (isset($about) ? ($about->image2 ?? $about->image ?? null) : null);
    $heroUrl = $heroImage ? asset('storage/images/' . ltrim($heroImage, '/')) : null;
@endphp
<section class="alive-page-hero" @if($heroUrl) style="background-image: url('{{ $heroUrl }}');" @endif>
    <div class="alive-page-hero__overlay"></div>
    <div class="container">
        <div class="alive-page-hero__content">
            <p class="alive-eyebrow alive-eyebrow--light">Alive Passion Ministries</p>
            <h1>{{ $title }}</h1>
            @if(!empty($subtitle))
                <p class="alive-page-hero__subtitle">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
</section>
