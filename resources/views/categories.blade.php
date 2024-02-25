<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Store - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="../style/main.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navigation -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand">
          <img src="/images/logosewa.svg" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item mt-2">
              <a class="nav-link" href="/home">Home </a>
            </li>
            <li class="nav-item active mt-2">
              <a class="nav-link" href="/categories">Categories</a>
            </li>

            @if(session('user_data.is_store_open') == 'true')
            <li class="nav-item">
                <a
                  class="btn btn-success nav-link px-4 text-white"
                  href="/dashboard"
                  >Switch to Seller</a>
              </li>
              @endif
            </li>
          <!-- Desktop Menu -->
          <ul class="navbar-nav d-none d-lg-flex mt-2">
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Hi, {{ $data['name'] }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                <a class="dropdown-item" href="/dashboard-account"
                  >Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Logout</a>
              </div>
            </li>
          </ul>

          <!-- Mobile Menu -->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a class="nav-link" href="#"> Hi, {{ $data['name'] }} </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Page Content -->
    <div class="page-content page-categories">
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All categories</h5>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a class="component-categories d-block" href="/categories/alat">
                <div class="categories-image">
                  <img
                    src="/images/alat.svg"
                    alt="Gadgets Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Alat</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a class="component-categories d-block" href="/categories/praktikum">
                <div class="categories-image">
                  <img
                    src="/images/praktikum.svg"
                    alt="Furniture Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Praktikum</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a class="component-categories d-block" href="/categories/kostum">
                <div class="categories-image">
                  <img
                    src="/images/kostum.svg"
                    alt="Makeup Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Kostum</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a class="component-categories d-block" href="/categories/elektronik">
                <div class="categories-image">
                  <img
                    src="/images/elektronik.svg"
                    alt="Sneaker Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Elektronik</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a class="component-categories d-block" href="/categories/olahraga">
                <div class="categories-image">
                  <img
                    src="/images/olahraga.svg"
                    alt="Tools Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Olahraga</p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a class="component-categories d-block" href="/categories/outdoor">
                <div class="categories-image">
                  <img
                    src="/images/outdoor.svg"
                    alt="Baby Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">Outdoor</p>
              </a>
            </div>
          </div>
        </div>
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>{{ strtoupper($data['itemcategory']) }}</h5>
            </div>
          </div>
          <div class="row">
            
            @if (count($items)>0)
              @foreach ($items as $item)
              <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a class="component-products d-block" href="/product/{{$item->itemid}}">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('{{asset($item->image)}}');
                    "
                  ></div>
                </div>
                <div class="products-text">{{$item->productname}}</div>
                <div class="products-price">Rp {{ number_format($item->price,2,',','.') }}</div>
              </a>
            </div>
              @endforeach
            @endif
            
             
          </div>
        </div>
      </section>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="pt-4 pb-2">2023 Copyright Store. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
