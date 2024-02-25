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

    <title>Dashboard - Your Store</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
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
              href="/dashboard-seller"
              class="list-group-item list-group-item-action active"
              >Dashboard</a
            >
            <a
              href="/dashboard-seller-product"
              class="list-group-item list-group-item-action"
              >My Products</a
            >
            <a
              href="/dashboard-seller-transactions"
              class="list-group-item list-group-item-action"
              >Transactions</a
            >
            <a
              href="/dashboard-seller-store"
              class="list-group-item list-group-item-action"
              >Store Settings</a
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
                    href="/home"
                    >Back to home</a
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
                    Hi, {{ $data['name'] }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                    Hi, Angga
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
                <h2 class="dashboard-title">Dashboard - {{ $data['storename'] }}</h2>
                <p class="dashboard-subtitle">Recent {{ $data['name'] }}'s store transactions</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Customer</div>
                        <div class="dashboard-card-subtitle">
                          <?php 
                          $totalCus = 0;
                            foreach($totalCustomers as $customers) {
                              $totalCus++;
                            }
                            echo $totalCus;
                            ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Revenue</div>
                        <div class="dashboard-card-subtitle">
                          <?php
                          $totalEarn = 0;
                            foreach($totalEarnings as $total_earn) {
                              $totalEarn += (int)$total_earn->totalprice;
                            }

                            echo 'Rp '.number_format($totalEarn,2,',','.');
                          ?>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaction</div>
                        <div class="dashboard-card-subtitle">
                          <?php 
                            $totalTrans = 0;
                            foreach($totalEarnings as $totalTransactions) {
                              $totalTrans++;
                            }

                            echo $totalTrans;
                            ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Selling Transactions</h5>

                    @foreach ($transactionsData as $transactions)
                    <a
                      class="card card-list d-block"
                      href="/seller-transaction-detail/{{$transactions->transactionid}}"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-4">
                            {{$transactions->productname}}
                          </div>
                          <div class="col-md-3">
                            {{$transactions->name}}
                          </div>
                          <div class="col-md-3">
                            <?php
                            $dateString = $transactions->added;

                            $dateTime = new DateTime($dateString);
                            $formattedDate = $dateTime->format('d F, Y');
                            echo $formattedDate;
                            ?>
                            {{-- {{$transactions->added->format("d F, Y")}} --}}
                          </div>
                          <div class="col-md-1 d-none d-md-block">
                            <img
                              src="/images/dashboard-arrow-right.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                    </a>
                    @endforeach


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
