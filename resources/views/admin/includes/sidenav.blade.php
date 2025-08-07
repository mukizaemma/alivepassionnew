<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
            <a class="nav-link" href="{{url('/redirects')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-money"></i></div>
                Messages from Visitors
            </a>
            <a class="nav-link" href="{{route('settings')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-user-cog"></i></div>
                Contacts Settings
            </a>
            <a class="nav-link" href="{{route('background')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                About
            </a>
            <a class="nav-link" href="{{route('about')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-bullseye"></i></div>
                Mission & Vision
            </a>

            <a class="nav-link" href="{{route('programs')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-project-diagram"></i></div>
                Programs
            </a>
            <a class="nav-link" href="{{route('campainCrud')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-hand-holding-heart"></i></div>
                Campaigns
            </a>
            <a class="nav-link" href="{{route('getTestimonials')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-comment-dots"></i></div>
                Testimonies
            </a>
            {{-- <a class="nav-link" href="{{route('impact')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-pen"></i></div>
                Our Impacts
            </a> --}}
            <a class="nav-link" href="{{route('partner')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                Partners
            </a>
            <a class="nav-link" href="{{route('staff')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                Staff Members
            </a>
            {{-- <a class="nav-link" href="{{route('students')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                Students
            </a> --}}

            <hr>

            <a class="nav-link" href="{{route('events')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-calendar-alt"></i></div>
                Events
            </a>
            <a class="nav-link" href="{{route('blog.index')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-blog"></i></div>
                Updates
            </a>
            <a class="nav-link" href="{{route('images')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-image"></i></div>
                Gallery
            </a>
            <a class="nav-link" href="{{route('slides')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-gallery"></i></div>
                Home Slide Images
            </a>




        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Susper Admin
    </div>
</nav>
