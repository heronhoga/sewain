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

    <title>Sewa.in - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="../style/main.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navigation -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
      aria-label="Navbar"
    >
      <div class="container">
        <a class="navbar-brand" href="/">
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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/home">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/categories/alat">Categories</a>
            </li>
            @if(session('user_data.is_store_open') == 'true')
            <li class="nav-item">
                <a
                  class="btn btn-success nav-link px-4 text-white"
                  href="/dashboard-seller"
                  >Switch to Seller</a>
              </li>
              @endif
          </ul>

          <!-- Desktop Menu -->
          <ul class="navbar-nav d-none d-lg-flex">
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
                Hi, {{$users->name}}
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
            <li class="nav-item">
            </li>
          </ul>

          <!-- Mobile Menu -->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a class="nav-link" href="#"> Hi, {{$users->name}} </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="page-content page-details">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Product Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-10" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img
                  src="{{asset($items->image)}}"
                  class="w-100 main-image"
                  alt=""
                  style="max-width: 100%; height: auto; object-fit: cover; object-position: center center"
                />
              </transition>
            </div>
          </div>
        </div>
      </section>
      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{$items->productname}}</h1>
                <div class="owner">By: {{$seller->name}}</div>
                <div class="price">Rp {{ number_format($items->price,2,',','.') }}</div>
              </div>
              
              <div class="col-lg-2 d-flex flex-column align-items-start" data-aos="zoom-in">
                <form class="form-inline" action="/checkout/{{$items->itemid}}" method="POST">
                  @csrf
                  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Durasi Sewa</label>
                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="dayrent">
                    <option value="1" selected>1 hari</option>
                    <option value="2">2 hari</option>
                    <option value="3">3 hari</option>
                    <option value="4">4 hari</option>
                    <option value="5">5 hari</option>
                    <option value="6">6 hari</option>
                    <option value="7">7 hari</option>
                  </select>
                  <button type="submit" class="btn btn-success text-white btn-block" id="pay-button">Sewa</button>
                </form>
              </div>

            </div>
          </div>
        </section>
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <p>
                  {{$items->description}}
                </p>
              </div>
            </div>
          </div>
        </section>
        <section class="store-review">
          <div class="container">
          </div>
        </section>
      </div>
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
    <script src="/vendor/vue/vue.js"></script>
    <script>
    </script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
