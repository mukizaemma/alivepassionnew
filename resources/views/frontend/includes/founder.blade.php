<section class="alive-split">
    <div class="container">
        <div class="alive-equal">
            <div class="alive-equal__media">
                <img src="{{ asset('storage/images/' . ltrim(optional($about)->image ?? '', '/')) }}" alt="The Founder of Alive Passion Ministries">
            </div>
            <div class="alive-equal__card alive-founder-panel">
                <p class="alive-eyebrow">Our Story</p>
                <h2 class="alive-heading">The Founder</h2>
                <div class="alive-equal__text">
                    <p>{{ optional($about)->donations }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
