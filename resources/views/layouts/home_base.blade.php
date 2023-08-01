<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>home</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
  <!-- jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
  .heading-msg{
    font-family: 'Kaisei Decol', serif;
  }
  header.masthead{
    background: url("../assets/img/3938663_s.jpg") no-repeat center center;
    position: relative;
    background-color: #343a40;
    background-size: cover;
    padding-top: 8rem;
    padding-bottom: 8rem;
    margin-top: 2%;
  }
  .td-btn{
    width: 100%;
    padding: 0;
    margin: 0;
  }
  .td-btn:hover,
  .td-btn:focus{
    background-color:#ff9467;
    border: 1px solid #ff9467;
    color:#fff;
  }
  .container a{
    margin-top: 1.5%;
  }
  @media screen and (max-width:480px) {
    /*　画面サイズが480px以下はここを読み込む　*/
    .tb01 td{
      color:#705339;
    }
    .heading-msg{
      color:#705339;
    }
    header.masthead{
      background: none;
      padding-top: 5%;
    }
    header.masthead::before{
      background-color: #fff;
    }
    /*吹き出しが左側にでる*/
    .les_fukidashi_u{
      left : -30%;
    }
    /*吹き出しが右側にでる*/
    .les_fukidashi_s{
      left : 20%;
    }

  }
  </style>
</head>

<body>

  <!-- Navigation-->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><i class="bi bi-scissors m-auto text-primary"></i>Chouette
        <i class="bi bi-scissors m-auto text-primary"></i></a>
        @yield('link')
      </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
      @yield('contents')
    </header>
  </body>
  </html>
