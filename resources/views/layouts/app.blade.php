<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Spatifomo - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('include.style')

</head>

<body>

    {{-- @include('sweetalert::alert') --}}

    @include('include.navbar')

    @include('include.sidebar')

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('include.footer')

  @include('include.script')

</body>

</html>