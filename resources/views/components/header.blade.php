<!-- =====================================
==== Start Navbar -->

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <!-- Logo -->
        <a class="logo" href="#">
            <img src="{{ asset('storage/logo/1.png') }}" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-scroll-nav="0">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-scroll-nav="1">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-scroll-nav="2">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-scroll-nav="3">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-scroll-nav="4">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-scroll-nav="5">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- End Navbar ====
======================================= -->


<!-- =====================================
==== Start Header -->

                @foreach($banners as $banner)
<header class="header valign bg-img" data-scroll-index="0" data-overlay-dark="4" data-background="{{ asset('storage/' . $banner->image) }}" data-stellar-background-ratio="0.5" style="background-attachment: fixed; background-position: top; background-repeat: no-repeat; background-size: cover;">

    <div class="container">
        <div class="row">
            <div class="full-width text-center caption mt-50">
                  <h2>{{ $banner->title }}</h2>
                <h1 class="cd-headline push">
                    <span class="blc">{{ $banner->subtitle }}</span>
                    <span class="cd-words-wrapper">
                        <b class="is-visible">{{ $banner->desgOne }}</b>
                        <b>{{ $banner->desgTwo }}</b>
                        <b>{{ $banner->desgThree }}</b>
                    </span>
                </h1>
                @endforeach
                <a href="#0" class="butn butn-bord mt-30" data-scroll-nav="3">
                    <span>View Work</span>
                </a>
                <a href="#0" class="butn butn-light mt-30" data-scroll-nav="5">
                    <span>Hire Me!</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- End Header ====
======================================= -->
