<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Store - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="/images/logosewa.svg" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="page-content page-auth mt-5" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <h2>
                Mulai sewa menyewa <br />
                dengan cara terbaru!
              </h2>

              @if(Session::has('error'))
              <div class="alert alert-danger">
                {{ Session::get('error') }}
              </div>
              @endif

              <form class="mt-3" action="{{route('registerPost')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="fullname" class="form-control" aria-describedby="nameHelp" v-model="name" autofocus required/>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" aria-describedby="emailHelp" v-model="email" required/>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label>Address 1</label>
                  <input type="text" name="address1" class="form-control" aria-describedby="nameHelp" v-model="address1" autofocus required/>
                </div>
                <div class="form-group">
                  <label>Address 2</label>
                  <input type="text" name="address2" class="form-control" aria-describedby="nameHelp" v-model="address2" autofocus required/>
                </div>
                <div class="form-group">
                  <label>Province</label>
                  <input type="text" name="province" class="form-control" aria-describedby="nameHelp" v-model="province" autofocus required/>
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" name="city" class="form-control" aria-describedby="nameHelp" v-model="city" autofocus required/>
                </div>
                <div class="form-group">
                  <label>Postal Code</label>
                  <input type="number" name="postalcode" class="form-control" aria-describedby="nameHelp" v-model="postalcode" autofocus required/>
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" name="country" class="form-control" aria-describedby="nameHelp" v-model="country" autofocus required/>
                </div>
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="number" name="mobile" class="form-control" aria-describedby="nameHelp" v-model="mobile" autofocus required/>
                </div>
                
                
                <div class="form-group">
                  <label>Store</label>
                  <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="is_store_open" id="openStoreTrue"  v-model="is_store_open" :value="true" />
                    <label class="custom-control-label" for="openStoreTrue">Iya, boleh</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="is_store_open" id="openStoreFalse"  v-model="is_store_open" :value="false" />
                    <label makasih class="custom-control-label" for="openStoreFalse">Enggak, makasih</label>
                  </div>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Nama Toko</label>
                  <input type="text" name="namatoko" class="form-control" aria-describedby="storeHelp" required />
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Kategori</label>
                  <select name="category" class="form-control" required>
                    <option value="alat">Alat</option>
                    <option value="praktikum">Praktikum</option>
                    <option value="kostum">Kostum</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="outdoor">Outdoor</option>
                  </select>
                </div>
                <button id="submitBtn" type="submit" class="btn btn-success btn-block mt-4">Sign Up Now</button>
                <div id="validationError" class="alert alert-danger mt-2" style="display: none">Please fill in all the required fields.</div>
              </form>
              <a type="submit" class="btn btn-signup btn-block mt-2" href="/login">Back to Sign In</a>
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

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        methods: {
          validateForm() {
            if (!this.name || !this.email || !this.password || !this.address1 || !this.address2 || !this.province || !this.city
            || !this.postalcode || !this.country || !this.mobile) {
              this.$toasted.error("Please fill in all the required fields.", {
                position: "top-center",
                className: "rounded",
                duration: 2000,
              });
              return false;
            }

            if (this.is_store_open && (!this.store_name || !this.selected_category)) {
              this.$toasted.error("Please fill in all the required store fields.", {
                position: "top-center",
                className: "rounded",
                duration: 2000,
              });
              return false;
            }

            return true;
          },
        },
        mounted() {
          AOS.init();
          // this.$toasted.error(
          //   "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
          //   {
          //     position: "top-center",
          //     className: "rounded",
          //     duration: 1000,
          //   }
          // );
        },
        data: {
          name: "",
          email: "",
          password: "",
          is_store_open: true,
          store_name: "",
        },
      });
    </script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
