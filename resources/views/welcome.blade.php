<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    @include('components.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    @include('components.loading')
    @include('components.header')



    <!-- =====================================
        ==== Start About -->

    <section class="about" data-scroll-index="1">
        <div class="container">
            @if ($about)

            <div class="row">

                <div class="col-lg-4 valign">

                    <div class="skills">

                        <div class="section-head">
                            <h4>About Me</h4>
                        </div>

                        <div class="skill-item mb-30">
                            <h6>Web Design</h6>
                            <div class="skill-progress">
                                <div class="progres" data-value="{{ $about->web_design_percent}}%"></div>
                            </div>
                        </div>
                        <div class="skill-item mb-30">
                            <h6>Branding</h6>
                            <div class="skill-progress">
                                <div class="progres" data-value="{{ $about->branding_percent}}%"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <h6>Development</h6>
                            <div class="skill-progress">
                                <div class="progres" data-value="{{ $about->development_percent}}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 hero-img bg-img" data-background="{{ asset('storage/' . $about->image)}}"></div>

                <div class="col-lg-4">
                    <div class="content">
                        <h6>Who am i</h6>
                        <h4>{{ $about->name}}.</h4>
                        <h5>{{ $about->designation}}</h5>
                        <p class="mb-10">{{ $about->brief}}</p>

                        <div class="social mt-40">
                            <span>Follow Me :</span>
                            <a href="{{ $about->facebook}}"><i class="icofont icofont-social-facebook"></i></a>
                            {{-- <a href="#0"><i class="icofont icofont-social-twitter"></i></a> --}}
                            <a href="{{ $about->github}}"><i class="fa fa-github"></i></a>
                            <a href="{{ $about->linkedin}}"><i class="icofont icofont-brand-linkedin"></i></a>
                            {{-- <a href="#0"><i class="icofont icofont-social-behance"></i></a> --}}
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </section>

    <!-- End About ====
        ======================================= -->



    @include('components.services')



    <!-- =====================================
        ==== Start Portfolio -->

    <section class="portfolio section-padding" data-scroll-index="3">
        <div class="container">
            <div class="row">

                <div class="section-head text-center col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <h4>Portfolio</h4>
                </div>

                <!-- filter links -->
                <div class="filtering text-center col-sm-12">
                    <span data-filter='*' class="active">All</span>
                    <span data-filter='.brand'>Web design</span>
                    <span data-filter='.web'>Web developement</span>
                </div>

                <div class="clearfix"></div>

                <!-- gallery -->
                <div class="gallery text-center full-width">

                    @foreach($webDesigns as $portfolio)
                    <div class="items brand">
                        <a href="{{$portfolio->url}}">
                            <div class="item-img">
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="image">
                                <div class="item-img-overlay valign">
                                    <div class="overlay-info full-width vertical-center">
                                        <h6>{{ $portfolio->title }}</h6>
                                        <p>{{ $portfolio->description }}</p>
                                    </div>
                                    <a href="{{ asset('storage/' . $portfolio->image) }}" class="popimg">
                                        <i class="icofont icofont-image"></i>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                    @foreach($webDevelopments as $portfolio)
                    <div class="items web">
                        <a href="{{$portfolio->url}}">
                            <div class="item-img">
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="image">
                                <div class="item-img-overlay valign">
                                    <div class="overlay-info full-width vertical-center">
                                        <h6>{{ $portfolio->title }}</h6>
                                        <p>{{ $portfolio->description }}</p>
                                    </div>
                                    <a href="{{ asset('storage/' . $portfolio->image) }}" class="popimg">
                                        <i class="icofont icofont-image"></i>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach


                </div>

            </div>
        </div>
    </section>

    <!-- End Portfolio ====
        ======================================= -->



    <!-- =====================================
        ==== Start Blog -->

    <section class="blog section-padding bg-dark" data-scroll-index="4">
        <div class="container">
            <div class="row">

                <div class="section-head text-center col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <h4>Our Blog</h4>
                </div>
                <div class="clearfix full-width"></div>

                {{-- <div class="col-lg-4">
                    <div class="item mb-md50">
                        <div class="post-img position-re o-hidden">
                            <img src="img/blog/01.jpg" alt="">
                        </div>
                        <div class="content">
                            <span class="data">
                                <a href="#0" class="undecro">WordPress</a>
                                <a href="#0" class="undecro">March 21 - 2018</a>
                            </span>
                            <h5><a href="#0" class="undecro">Your ideal WordPress theme is here.</a></h5>

                            <a href="#0" class="more mt-30">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="item mb-md50">
                        <div class="post-img position-re o-hidden">
                            <img src="img/blog/03.jpg" alt="">
                        </div>
                        <div class="content">
                            <span class="data">
                                <a href="#0" class="undecro">ThemeForest</a>
                                <a href="#0" class="undecro">March 21 - 2018</a>
                            </span>
                            <h5><a href="#0" class="undecro">How to improve your business ?</a></h5>

                            <a href="#0" class="more mt-30">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="item">
                        <div class="post-img position-re o-hidden">
                            <img src="img/blog/02.jpg" alt="">
                        </div>
                        <div class="content">
                            <span class="data">
                                <a href="#0" class="undecro">Lifestyle</a>
                                <a href="#0" class="undecro">March 21 - 2018</a>
                            </span>
                            <h5><a href="#0" class="undecro">Style workspaces for your inspiration.</a></h5>

                            <a href="#0" class="more mt-30">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                </div> --}}

                    <h1 class="text-center col-lg-8 offset-lg-2 col-md-10 offset-md-1 mt-50">Coming soon</h1>

            </div>
        </div>
    </section>

    <!-- End Blog ====
        ======================================= -->



    @include('components.contact')


    @include('components.footer')





    @include('components.scripts')


</body>

</html>
