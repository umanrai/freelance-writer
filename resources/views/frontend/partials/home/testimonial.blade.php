<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{ $setting['testimonial_title'] ?? 'Testimonials'}}</h2>
            <p>{{ $setting['testimonial_body'] ?? 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.'}}</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                @foreach($testimonials as $testimonial)

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{ $testimonial->statement }}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="{{ $testimonial->getImage() }}"
                             class="testimonial-img" alt="">
                        <h3>{{ $testimonial->name }}</h3>
                        <h4>{{ $testimonial->shortDesignation() }}</h4>
                    </div>
                </div>

                @endforeach


            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
