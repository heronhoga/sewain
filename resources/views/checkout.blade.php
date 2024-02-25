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

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

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
              <a class="nav-link"> Hi, {{$users->name}} </a>
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
                    Confirmations
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      
      <div class="card w-50  mx-auto" >
        <img class="card-img-top" src="{{asset($itemBuy->image)}}" style="max-width: 100%;" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Konfirmasi pesanan</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama barang: {{$itemBuy->productname}}</li>
            <li class="list-group-item">Jumlah harga: Rp {{ number_format($order->totalprice,2,',','.') }}</li>
            <li class="list-group-item">Nama pembeli: {{session('user_data.name')}}</li>
          </ul>
        </div>
        <div class="card-footer">
          <button class="btn btn-success text-white  mt-1" id="pay-button">Bayar</button>
        </div>
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

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            window.location.href = "/dashboard";
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>

  </body>
</html>
