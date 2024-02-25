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
    <link href="style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

    <!-- custom class css for sweetalert -->
    <style>
      .custom-swal-button {
        background-color: #28a745;
        color: #fff;
      }
    </style>

  </head>

  <body>
    <!-- Navigation -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
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
            <li class="nav-item active">
              <a class="nav-link" href="/">Home </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="page-content page-auth" id="login">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img
                src="/images/login-placeholder.png"
                alt=""
                class="w-50 mb-4 mb-lg-none"
              />
            </div>
            <div class="col-lg-5">
              <h2>
                Sewa kebutuhan mahasiswa, <br />
                menjadi lebih mudah
              </h2>

              @if(Session::has('error'))
              <div class="alert alert-danger">
                {{ Session::get('error') }}
              </div>
              @endif
              
              <form class="mt-3" @submit.prevent="showAlert" action="{{route('loginPost')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Email address</label>
                  <input
                    type="email"
                    name="email"
                    class="form-control w-75"
                    aria-describedby="emailHelp"
                  />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input name="password" type="password" class="form-control w-75" />
                </div>
                <button id="signInBtn"
                  type="submit"
                  class="btn btn-success btn-block w-75 mt-4">
                  Sign In to My Account
              </button>
              </form>

              <a class="btn btn-signup w-75 mt-2" href="/register">
                Sign Up
              </a>
            </div>
          </div>
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

    <!-- form validation -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-toasted"></script>
    <script>
  //     Vue.use(Toasted);
      
  //   var login = new Vue({
  //   el: "#login",
  //   mounted() {
  //     var self = this; // Simpan instance Vue dalam variabel self

  //     var signInBtn = document.getElementById('signInBtn');
  //     signInBtn.addEventListener('click', function(event) {
  //       var emailInput = document.querySelector('input[type="email"]');
  //       var passwordInput = document.querySelector('input[type="password"]');
        
  //       if (!emailInput.value || !passwordInput.value) {
  //         event.preventDefault();

  //         self.$toasted.error("Please fill in all the required fields.", {
  //           position: "top-center",
  //           className: "rounded",
  //           duration: 2000,
  //         });
  //       }
  //     });

  //     AOS.init();
  //   },
  //   data: {
  //     email: "",
  //     password: "",
  //   },
  // });
    </script>

    
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
