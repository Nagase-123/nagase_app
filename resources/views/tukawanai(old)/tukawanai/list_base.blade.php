<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <style>
  .uhome_h3 {
    margin-bottom: 30px;
  }
  .sb_bt{
    width: 70%;
    padding: 5px 15px;
  }
  </style>

<body>
  <div class="box_all">
    <p class="return_top1"><a class="return_a" onclick="history.back(-1);return false;">戻る</a></p>

    <table class="table_list">
      <tr>
        @yield('th')
      </tr>

      @yield('main')
