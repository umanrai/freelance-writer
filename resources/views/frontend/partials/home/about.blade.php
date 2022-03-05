<section id="about" class="about">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="" />
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                <h3>{{ $setting['about_us_title'] ?? 'About Us' }}</h3><br/>
                <p class="fst-italic">

                    {{ $setting['about_us_body'] ?? ' Take a look at what we can do for you here at Freelance-writer. So that you may come to a
                    first-hand conclusion about our services.' }}

                </p>
            </div>
        </div>

    </div>
</section>
