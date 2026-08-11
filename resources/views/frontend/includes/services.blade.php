<section id="alive-programs" class="alive-programs">
    <div class="container">
        <div class="text-center pb-45">
            <p class="alive-eyebrow">What We Do</p>
            <h2 class="alive-heading">Our Programs</h2>
            <p class="alive-lead alive-lead--narrow">Gospel-centered care that restores dignity — from shelter and skills to discipleship, children, and nutrition.</p>
        </div>
        <div class="row">
            @foreach ($programs as $program)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">
                    @include('frontend.includes.program-card', ['program' => $program])
                </div>
            @endforeach
        </div>
    </div>
</section>
