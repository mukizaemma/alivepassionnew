@php
    $pageKey = $page ?? \App\Models\PageHero::keyFromRoute(optional(request()->route())->getName());
    $fallback = $image ?? (isset($about) ? ($about->image2 ?? $about->image ?? null) : null);
    $heroImage = ($pageKey && isset($pageHeroes) && !empty($pageHeroes[$pageKey]))
        ? $pageHeroes[$pageKey]
        : $fallback;
    $heroUrl = $heroImage ? asset('storage/images/' . ltrim($heroImage, '/')) : null;
@endphp
<section class="alive-page-hero" @if($heroUrl) style="background-image: url('{{ $heroUrl }}');" @endif>
    <div class="alive-page-hero__overlay"></div>
    <div class="container">
        <div class="alive-page-hero__content">
            <h1>{{ $title }}</h1>
            @if(!empty($subtitle))
                <p class="alive-page-hero__subtitle">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
    <a href="#page-content" class="alive-hero-scroll" aria-label="Scroll to page content">
        <span>Scroll</span>
        <i class="far fa-chevron-down"></i>
    </a>
</section>
<div id="page-content"></div>
