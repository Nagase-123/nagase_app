<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>chouette</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
  <!-- Core theme CSS (includes Bootstrap)-->
  @if(app('env') == 'production')
  <link href="{{ secure_asset('css/styles.css') }}" rel="stylesheet" />
  @else
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
  @endif
  <style>
  a{
    color: #fff;
  }
  .center{
    display: flex;
  }
  .a-link-style{
    margin-bottom: 3%;
  }

</style>
</head>

<body>

  <section class="call-to-action text-white text-center">
    <div class="container position-relative">
      <div class="row justify-content-center">
        <div class="col-xl-6">
          <h2 class="mb-4 nav-signup">
            <i class="bi bi-brightness-high"></i>
            @yield('title')
            <i class="bi bi-brightness-high"></i>
          </h2>

          <div class="col-auto">
            @yield('msg1')
            <br>
            @yield('msg2')
          </div>

          @yield('link1')
          @yield('link2')
        </div>

      </div>
    </div>
  </div>
</div>
</section>

</div>
</body>
</html>
