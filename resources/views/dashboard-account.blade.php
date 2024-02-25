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
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Dashboard - Sewa.In</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="../style/main.css" rel="stylesheet" />
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
            <a
              href="/dashboard-account"
              class="list-group-item list-group-item-action active"
              >My Account</a
            >
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
              <ul class="navbar-nav ml-auto mr-5 d-none d-lg-flex">
                <li class="nav-item">
                  <a
                    class="btn btn-success nav-link px-4 mt-2 text-white"
                    href="/home"
                    >Back to home</a
                  >
                </li>
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
                    Hi, {{ $data['name'] }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if ($data['is_store_open'] == "true")
                    <a class="dropdown-item" href="/dashboard-seller"
                      >Back to Store</a
                    >
                    @endif
                    
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
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Hi, {{ $data['name'] }} </a>
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
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{ url('dashboard-account-update/'. $data['id'] )}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              
                              <div class="form-group">
                                <label for="name">Your Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="{{ $data['name'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Your Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="{{ $data['email'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address1">Address 1</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="address1e"
                                  aria-describedby="emailHelp"
                                  name="address1"
                                  value="{{ $data['address1'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address2">Address 2</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="address2"
                                  aria-describedby="emailHelp"
                                  name="address2"
                                  value="{{ $data['address2'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="city">City</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="city"
                                    name="city"
                                    value="{{ $data['city'] }}"
                                  />
                                </div>
                              </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="province">Province</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="province"
                                    name="province"
                                    value="{{ $data['province'] }}"
                                  />
                                </div>
                              </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="postalcode">Postal Code</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="postalcode"
                                  name="postalcode"
                                  value="{{ $data['postalcode'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="country">Country</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="country"
                                  name="country"
                                  value="{{ $data['country'] }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="mobile"
                                  name="mobile"
                                  value="{{ $data['mobile'] }}"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Save Now
                              </button>
                            </div>
                          </div>
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
