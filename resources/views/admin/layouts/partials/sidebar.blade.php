<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link  {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('admin.home') }}">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Essentials</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link  {{ request()->is('category*') ? 'active' : '' }}" href="{{ route('category.index') }}">
                  <span data-feather="align-justify"></span>
                  Category
                </a>
              </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <span data-feather="users"></span>
                        Customers
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tags*') ? 'active' : '' }}" href="{{ route('tag.index') }}">
                        <span data-feather="tag"></span>
                        Tag
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link {{ request()->is('articles*') ? 'active' : '' }}" href="{{ route('article.index') }}">
                        <span data-feather="book-open"></span>
                        Article
                    </a>
                </li>
            </ul>
          </div>
        </nav>
