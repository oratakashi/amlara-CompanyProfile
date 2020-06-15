<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>{{ $title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('backend') }}/images/favicon.ico">

  <!-- App css -->
  <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend') }}/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend') }}/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

  <div class="account-pages my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="card">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-md-6 p-5">
                  <div class="mx-auto mb-5">
                    <a href="{{ url('/admin/login') }}">
                      <h3 class="d-inline align-middle ml-1 text-logo">Amanah Kitchen</h3>
                    </a>
                  </div>

                  <h6 class="h5 mb-0 mt-4">Selamat Datang Kembali!</h6>
                  <p class="text-muted mt-1 mb-4">Masukan username dan password untuk masuk ke admin panel.</p>
                  @if(\Session::has('alert'))
                  <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                  </div>
                  @endif
                  <form action="{{ url('/admin/login') }}" class="authentication-form" method="POST">
                    @csrf
                    <div class="form-group">
                      <label class="form-control-label">Username</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-user" data-feather="mail"></i>
                          </span>
                        </div>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                      </div>
                    </div>

                    <div class="form-group mt-4">
                      <label class="form-control-label">Password</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-key" data-feather="lock"></i>
                          </span>
                        </div>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group mb-0 mt-5 text-center">
                      <button class="btn btn-primary btn-block" type="submit"> Log In
                      </button>
                    </div>
                  </form>
                </div>
                <div class="col-lg-6 d-none d-md-inline-block">
                  <div class="auth-page-sidebar">
                    <div class="overlay"></div>
                    <div class="auth-user-testimonial">
                      <p class="font-size-24 font-weight-bold text-white mb-1">Hello World!</p>
                      <p class="lead">"Semua yang mahir berawal dari pemula!, Jangan malas belajar dengan alasan Saya belum bisa"</p>
                      <p>- Oratakashi</p>
                    </div>
                  </div>
                </div>
              </div>

            </div> <!-- end card-body -->
          </div>
          <!-- end card -->

        </div> <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end page -->

  <!-- Vendor js -->
  <script href="{{ asset('backend') }}/js/vendor.min.js"></script>

  <!-- App js -->
  <script href="{{ asset('backend') }}/js/app.min.js"></script>

</body>

</html>