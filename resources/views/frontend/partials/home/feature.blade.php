<section id="features" class="features">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{ $setting['feature_title'] ?? 'Features'}}</h2>
            <p>{{ $setting['feature_body'] ?? 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.'}}</p>
        </div>

        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">

                @foreach($features as $feature)
                <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <i class="bx bx-{{ $feature->icon }}"></i>
                    <h4>{{ $feature->title }}</h4>
                    <p>{{ $feature->summary }}</p>
                </div>

                @endforeach
            </div>
            <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('assets/img/features.svg') }}" alt="" class="img-fluid">
            </div>
        </div>



    </div>
</section>
