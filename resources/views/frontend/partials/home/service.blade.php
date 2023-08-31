<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{ $setting['service_title'] ?? 'Services' }}</h2>
            <p>{{ $setting['service_body'] ?? 'Armed with an army of supportive, analytical, and creative writers, freelance-writers leaves no
                stone unturned when it comes to a quality output. No matter the requirement, and no matter the
                time of day, we are always ready to go above and beyond!' }}</p>
        </div>

        <div class="row gy-4">

            @foreach($services as $service)

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-blue">
                    <div class="icon">
                        {!! $service->icon !!}
                        <i class="bx bxl-dribbble"></i>
                    </div>
                    <h4>{{ $service->title }}</h4>
                    <p>{{ $service->summary }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
