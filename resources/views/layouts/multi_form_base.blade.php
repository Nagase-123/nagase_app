<!--
このテンプレートを使用しているファイル
<user>
reservation
reservation_confirm
comment_change
<top>
stylist_signup_confirm
signup_confirm
<stylist>
user_memo
reservation_cancel
<login_logout>
reset_request
pass_reset_confirm
login
stylist_login
<contact>
confirm
<admin>
reply_confirm
contact_detail
-->
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
  <!-- jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Core theme CSS (includes Bootstrap)-->
  @if(app('env') == 'production')
  <link href="{{ secure_asset('css/form_styles.css') }}" rel="stylesheet" />
  @else
  <link href="{{ asset('css/form_styles.css') }}" rel="stylesheet" />
  @endif
  <style>
  .tb01 th{
    padding: 2px;
    color: #705339;
  }
  .tb01 td{
    padding: 2px;
    color: #705339;
  }
  .td-color{
    color: #705339;
  }
  .Form-Item-Textarea{
    margin-left: 0;
    padding-left: 0;
    padding-right: 0;
    max-width: 100%;
  }
  .Form-Item-Input{
    margin-left: 0;
  }
  .link{
    height: 100%;
  }
  .Form-Item-Login{
    width: 100%;
    margin-left: auto;
    margin-right: auto;
  }
  .text-center {
    text-align: center !important;
  }
</style>
</head>

<body>
  <div class="Form">
    @yield('main')

    <h1 class="">@yield('title')</h1>

    @yield('form')

    <h4>@yield('msg1')</h4>
    <p>@yield('msg2')</p>

    @yield('content')

    @yield('table')
    @yield('request')
    @yield('textarea')
    @yield('button')

  </div>

</form>
</body>
</html>
