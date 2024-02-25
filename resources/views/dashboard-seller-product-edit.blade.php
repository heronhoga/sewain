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

    <title>Dashboard - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{asset('style/main.css')}}" rel="stylesheet" />
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/logo-dashboard.svg" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <div class="list-group list-group-flush">
                <a
                  href="/dashboard-seller-store"
                  class="list-group-item list-group-item-action active"
                  >Add item</a
                >
              </div>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
          >
            <button
              class="btn btn-secondary d-md-none mr-auto mr-2"
              id="menu-toggle"
            >
              &laquo; Menu
            </button>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mr-5 d-lg-flex">
                <li class="nav-item">
                  <a
                    class="btn btn-success nav-link px-4 mt-2 text-white"
                    href="/dashboard-seller-product"
                    >My items</a
                  >
                <li class="nav-item dropdown mt-2">
                  <a
                    class="nav-link"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    Hi, {{ $data['sellername'] }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/index.html"
                      >Back to Store</a
                    >
                    <a class="dropdown-item" href="/dashboard-account.html"
                      >Settings</a
                    >
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/">Logout</a>
                  </div>
                </li>
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    Hi, Angga
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-inline-block" href="#">
                    Cart
                  </a>
                </li>
              </ul>
            </div>
          </nav>

          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit your Product</h2>
                <p class="dashboard-subtitle">
                  Modify item's information
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">

                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                    {{ Session::get('error') }}
                    </div>
                    @endif
                    
                    <form action="{{ url('dashboard-seller-product-update/'.$data['id'] )}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Product Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="productname"
                                  aria-describedby="name"
                                  name="productname"
                                  value="{{ $data['name'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="price">Price</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="price"
                                  aria-describedby="price"
                                  name="price"
                                  value="{{ $data['price'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea
                                  name="description"
                                  id="description"
                                  cols="30"
                                  rows="4"
                                  class="form-control"
                                  
                                >{{$data['description']}}</textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="image">Image</label>
                                <input
                                  type="file"
                                  class="form-control pt-1"
                                  id="image"
                                  aria-describedby="image"
                                  name="image"

                                />
                                <small class="text-muted">
                                  Pilih foto yang merepresentasikan barangmu!
                                </small>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="category">Category</label>
                                  <select
                                    name="category"
                                    id="category"
                                    class="form-control"
                                  >
                                  <option value="alat" {{ $data['category'] === 'alat' ? 'selected' : '' }}>Alat</option>
                                  <option value="praktikum" {{ $data['category'] === 'praktikum' ? 'selected' : '' }}>Praktikum</option>
                                  <option value="kostum" {{ $data['category'] === 'kostum' ? 'selected' : '' }}>Kostum</option>
                                  <option value="elektronik" {{ $data['category'] === 'elektronik' ? 'selected' : '' }}>Elektronik</option>
                                  <option value="olahraga" {{ $data['category'] === 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                                  <option value="outdoor" {{ $data['category'] === 'outdoor' ? 'selected' : '' }}>Outdoor</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="stock">Stock</label>
                                  <input
                                    type="number"
                                    class="form-control"
                                    id="stock"
                                    aria-describedby="stock"
                                    name="stock"
                                    value="{{ $data['stock'] }}"
                                  />
                                </div>
                              </div>

                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                          <button
                            type="submit"
                            class="btn btn-success btn-block px-5"
                          >
                            Save Now
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
  </body>
</html>
