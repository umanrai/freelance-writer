<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{ $setting['portfolio_title'] ?? 'Portfolio'}}</h2>
            <p>{{ $setting['portfolio_body'] ?? 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.'}}</p>

        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">

                    @foreach(\App\Misc\PortfolioType::types() as $type)

                        <li data-filter=".filter-{{ $type }}" @if ($loop->first) class="filter-active" @endif>{{ $type }}</li>

                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">

            @php
                $portfoliosType = \App\Misc\PortfolioType::types();
            @endphp

            @foreach($portfolios as $portfolio)

            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $portfoliosType[$portfolio->type] }}">
                <div class="portfolio-wrap">
                    <img src="{{ $portfolio->getImage() }}" class="img-fluid" alt="" />
                    <div class="portfolio-info">
                        <h4>{{ $portfolio->title }}</h4>
                        <p>{{ $portfoliosType[$portfolio->type] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Portfolio Section -->
