<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('storage/img-web/ts.png') }}" type="image/x-icon">

    {{-- Bootstrap 5 --}}
    {{-- <link href="{{ asset('assets/bootstrap5/css/bootstrap.css') }}" rel="stylesheet" /> --}}
    {{-- Desain Template --}}
    <link href="{{ asset('assets/template-css/styles.css') }}" rel="stylesheet" />
    {{-- Font Awesome --}}
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet" />
    {{-- Alert animasi --}}
    <link href="{{ asset('assets/costum-style/css-costum.css') }}" rel="stylesheet" />
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('assets/sweetalert/sweetalert2.min.css') }}">

</head>

<body class="bg-danger">
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex flex-column align-items-center ">
                <img src="{{ asset('storage/img-web/rewako.png') }}" alt="" width="150px" class="">
                <h1 class="mb-3 text-white">REWAKO CUP I</h1>
              </div><!-- End Logo -->

              <div class="card pt-3">

                <div class="card-body">
                  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                  <form class="row g-3 needs-validation" novalidate method="POST">
                    @csrf
                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <input type="test" name="username" class="form-control" id="username" value="{{ old('username') }}" autocomplete="off">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" >
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    {{-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> --}}
                    <div class="col-12">
                      <button class="btn btn-warning w-100" type="submit">Login</buttonhref=>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

    {{-- Jquery --}}
    <script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>

    {{-- JS Costum --}}
    <script src="{{ asset('assets/template-js/scripts.js') }}"></script>

    {{-- Bootstrap 5 --}}
    {{-- <script src="{{ asset('assets/bootstrap5/js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap5/js/popper.min.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>

    {{-- Script Costum --}}
    <script src="{{ asset('assets/template-js/script-costum.js') }}"></script>

</body>

</html>
