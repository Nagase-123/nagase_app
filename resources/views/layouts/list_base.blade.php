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
  <link href="{{ secure_asset('css/form_styles.css') }}" rel="stylesheet" />
  <link href="{{ secure_asset('css/styles.css') }}" rel="stylesheet" />
  @else
  <link href="{{ asset('css/form_styles.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
  @endif
  <!-- jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{ asset('/scripts.js') }}"></script>

  <style>
  .td-btn{
    width: 100%;
    padding: 0;
    margin: 0;
  }
  .td-btn:hover,
  .td-btn:focus,{
    background-color:#ff9467;
    border: 1px solid #ff9467;
    color:#fff;
  }
  .tb01 th,
  .tb01 td{
    color: #705339;
    border: solid 1px #705339;
  }
  .return_top{
    text-align: right;
    margin: auto;
    width: 100%;
    color: rgba(117, 79, 68, 0.8);
    margin-top: 2%;
  }
  .return_top a:hover,
  .return_top a:focus{
    color: #ff9467;
  }
  .heading-msg{
    font-family: 'Kaisei Decol', serif;
    color: #705339;
  }
  .detail{
    margin-top: 3rem;
  }
  @media screen and (max-width:480px) {
    /*　画面サイズが480px以下はここを読み込む　*/
    .td-btn:active{
      background-color:#ff9467;
      border: 1px solid #ff9467;
      color:#fff;
    }
  }
  </style>
</head>

<body>

  <!-- Navigation-->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container btn-right">
      @yield('link')
      <p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>
    </div>
  </nav>

  <!-- Masthead-->
  <div class="container position-relative">
    @yield('contents')
  </div>

  <script>
  function alert_js(){
    var result=false;
    result = window.confirm('本当にキャンセルしますか？');
    if(result){
      return true;
    }else{
      return false;
    }
  }
</script>

</body>
</html>
