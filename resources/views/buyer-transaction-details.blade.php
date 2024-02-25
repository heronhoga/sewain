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
    <link href="../style/main.css" rel="stylesheet" />
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/logosewa.svg" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="/dashboard-transactions.html"
              class="list-group-item list-group-item-action active"
              >Transaction details</a
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
              <ul class="navbar-nav ml-auto mr-5 d-lg-flex">
                <li class="nav-item">
                  <a
                    class="btn btn-success nav-link px-4 mt-2 text-white"
                    href="/dashboard"
                    >Back to dashboard</a
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
                    Hi, {{session('user_data.name')}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/dashboard-seller"
                      >Back to Store</a
                    >
                    <a class="dropdown-item" href="/dashboard-account"
                      >Settings</a
                    >
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Logout</a>
                  </div>
                </li>
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    Hi, {{session('user_data.name')}}
                  </a>
                </li>
                <li class="nav-item">
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
                <h2 class="dashboard-title">SEWA.in</h2>
                <p class="dashboard-subtitle">
                  Transaction Details
                </p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <img
                              src="{{asset($transactionsData->image)}}"
                              alt=""
                              class="w-100 mb-3"
                            />
                          </div>
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Seller Name</div>
                                <div class="product-subtitle">{{$transactionsData->name}}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Product Name</div>
                                <div class="product-subtitle">
                                    {{$transactionsData->productname}}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Date of Transaction
                                </div>
                                <div class="product-subtitle">
                                    <?php
                                    $dateString = $transactionsData->added;
    
                                    $dateTime = new DateTime($dateString);
                                    $formattedDate = $dateTime->format('d F, Y');
                                    echo $formattedDate;
                                    ?>
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Status barang</div>
                                <div class="product-subtitle">
                                  <?php

                                  if ($transactionsData->itemstatus == 'pendingitem') {
                                    echo 'Barang belum diambil';
                                  } else {
                                    echo $transactionsData->itemstatus;
                                  }
                                  ?>
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Total Amount</div>
                                <div class="product-subtitle">Rp {{ number_format($transactionsData->totalprice,2,',','.') }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Mobile</div>
                                <div class="product-subtitle">
                                  {{$transactionsData->mobile}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-4">
                            <h5>
                              Informasi persewaan
                            </h5>
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Address</div>
                                <div class="product-subtitle">
                                    {{$transactionsData->address1}}
                                </div>
                              </div>

                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Province
                                </div>
                                <div class="product-subtitle">
                                    {{$transactionsData->province}}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">City</div>
                                <div class="product-subtitle">
                                    {{$transactionsData->city}}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Postal Code</div>
                                <div class="product-subtitle">{{$transactionsData->postalcode}}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Country</div>
                                <div class="product-subtitle">
                                    {{$transactionsData->country}}
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="row">

                                    <div class="col-md-2">
                                    @if ($transactionsData->itemstatus == 'pendingitem')
                                    <form action="/transaction-details/update/{{$transactionsData->transactionid}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                      <button
                                        type="submit"
                                        class="btn btn-success btn-block mt-4"
                                      >
                                        Saya sedang menyewa barang
                                      </button>
                                    </form>
                                    @endif

                                    @if ($transactionsData->itemstatus == 'Sedang disewa')
                                    <form action="/transaction-details/update/{{$transactionsData->transactionid}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                      <button
                                        type="submit"
                                        class="btn btn-success btn-block mt-4"
                                      >
                                        Saya selesai menyewa barang
                                      </button>
                                    </form>
                                    @endif

                                    </div>
                                  </template>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "SHIPPING",
          resi: "BDO12308012132",
        },
      });
    </script>
  </body>
</html>
