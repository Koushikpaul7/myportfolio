<!-- =====================================
==== Start Services -->

<section class="services section-padding bg-dark" data-scroll-index="2">
    <div class="container">
        <div class="row">

            <div class="section-head text-center col-md-12">
                <h4>Services</h4>
            </div>
            @foreach($services as $service)
            <div class="col-lg-6 col-md-6">
                <div class="item mb-md50">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; margin-bottom: 10px;">
                    <h6>{{$service->title}}</h6>
                    <p>{{$service->description}}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- End Services ====
======================================= -->
