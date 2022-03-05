<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{ $setting['faq_title'] ?? 'Frequently Asked Questions'}}</h2>
            <p>{{ $setting['faq_body'] ?? 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.'}}</p>

        </div>

        <div class="faq-list">
            <ul>
                @foreach($faqs as $faq)

                    <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="{{ $loop->iteration }}00">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{ $loop->iteration }}">
                            {{ $faq->title }}
                            <i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-{{ $loop->iteration }}" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                {{ $faq->description }}
                            </p>
                        </div>
                    </li>

                @endforeach

            </ul>
        </div>

    </div>
</section>
