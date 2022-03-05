<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link  {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('admin.home') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted" >
            <span>Essentials</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column">

            @if (auth()->user()->isAdmin())
                <li class="nav-item mb-2" >
                    <a class="nav-link  {{ request()->is('category*') ? 'active' : '' }}"
                       href="{{ route('category.index') }}">
                        <span data-feather="align-justify"></span>
                        Category
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <span data-feather="users"></span>
                        User
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('tags*') ? 'active' : '' }}" href="{{ route('tag.index') }}">
                        <span data-feather="tag"></span>
                        Tag
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('portfolio*') ? 'active' : '' }}"
                       href="{{ route('portfolio.index') }}">
                        <span data-feather="activity"></span>
                        Portfolio
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('faq*') ? 'active' : '' }}"
                       href="{{ route('faq.index') }}">
                        <span data-feather="info"></span>
                        FAQ
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('testimonial*') ? 'active' : '' }}"
                       href="{{ route('testimonial.index') }}">
                        <span data-feather="award"></span>
                        Testimonial
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('service*') ? 'active' : '' }}"
                       href="{{ route('service.index') }}">
                        <span data-feather="award"></span>
                        Service
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('feature*') ? 'active' : '' }}"
                       href="{{ route('feature.index') }}">
                        <span data-feather="award"></span>
                        Feature
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('setting*') ? 'active' : '' }}"
                       href="{{ route('setting.edit') }}">
                        <span data-feather="settings"></span>
                        Setting
                    </a>
                </li>
            @endif

            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('articles*') ? 'active' : '' }}"
                   href="{{ route('article.index') }}">
                    <span data-feather="book-open"></span>
                    Article
                </a>
            </li>

        </ul>
    </div>
</nav>
