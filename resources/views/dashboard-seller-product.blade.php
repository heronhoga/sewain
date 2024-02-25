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
    <link href="style/main.css" rel="stylesheet" />

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var alertElement = document.querySelector(".alert");
    
        // Show the alert
        alertElement.style.display = "block";
    
        // Set a timeout to hide the alert after 5 seconds
        setTimeout(function() {
          alertElement.style.display = "none";
        }, 2000); // 5000 milliseconds = 5 seconds
      });
    </script>

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
              class="list-group-item list-group-item-action"
              >Dashboard</a
            >
            <a
              href="/dashboard-seller-product"
              class="list-group-item list-group-item-action active"
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
                    Hi, {{ $data['name'] }}
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
                <h2 class="dashboard-title">My Products</h2>
                <p class="dashboard-subtitle">
                  {{ $data['name'] }}'s items
                </p>
              </div>

              @if(Session::has('update'))
                  <div class="alert alert-success" role="alert">
                  {{ Session::get('update') }}
                  </div>
              @endif

              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a
                      href="/dashboard-seller-product-create"
                      class="btn btn-success"
                      >Add New Product</a
                    >
                  </div>
                </div>
                <div class="row mt-4">
                <!--TEMPLATE-->
                @if ($items != null)
                    @foreach ($items as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" >
                      <div
                        class="card card-dashboard-product d-block"
                        href="/dashboard-products-details.html"
                      >
                        <div class="card-body" style="height: 250px; display: flex; flex-direction: column; justify-content: space-between;">
                          <div class="image-container" style="flex-grow: 1; overflow: hidden;">
                            <img
                            src="{{asset($item->image)}}"
                            class="w-100 mb-2"
                            style="object-fit: cover; object-position: center center; height: 100%;" 
                          />
                          </div>
                      
                          <div class="product-title">{{$item->productname}}</div>
                          <div class="product-category">{{$item->category}}</div>
                          <div class="product-category">{{$item->price}}</div>
                          <div class="text-center" id="button-wrapper">
                            <div class="d-flex justify-content-center" >
                              <a href="/dashboard-seller-product-edit/{{$item->itemid}}" class="btn btn-primary ml-auto">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7,17.013l4.413-0.015l9.632-9.54c0.378-0.378,0.586-0.88,0.586-1.414s-0.208-1.036-0.586-1.414l-1.586-1.586	c-0.756-0.756-2.075-0.752-2.825-0.003L7,12.583V17.013z M18.045,4.458l1.589,1.583l-1.597,1.582l-1.586-1.585L18.045,4.458z M9,13.417l6.03-5.973l1.586,1.586l-6.029,5.971L9,15.006V13.417z">
                                    </path><path d="M5,21h14c1.103,0,2-0.897,2-2v-8.668l-2,2V19H8.158c-0.026,0-0.053,0.01-0.079,0.01c-0.033,0-0.066-0.009-0.1-0.01H5V5	h6.847l2-2H5C3.897,3,3,3.897,3,5v14C3,20.103,3.897,21,5,21z">
                                    </path>
                                </svg>
                              </a>

                              

                              <form action="/dashboard-seller-product-delete/{{$item->itemid}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger mr-auto ml-1">
                                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z">
                                    </path>
                                  </svg>
                                </button>
                              </form>
                            
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                @endif
                
                  
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
