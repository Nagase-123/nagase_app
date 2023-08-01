<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/form_style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
  p{
    font-size: 16px;
  }
  .contact-box{
    height: 110vh;
  }
  </style>

</head>

@yield('body')

<div class="contact-box">
  <h2 class="form">@yield('title')</h2>
  <hr class="border">
  <h3>@yield('explanation')</h3>

  <div>
    @yield('form')
  </div>

  @yield('name')
  @yield('kana')
  @yield('tel')
  @yield('email')

  @yield('message1')

  <h3>@yield('text_heading')</h3>
  @yield('textarea')
  <br>
  @yield('button')

  <div class="empty"></div>
</div>
@yield('formend')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
//送信ボタンを押した際に送信ボタンを無効化する（連打による多数送信回避）
/*  $(function(){
$('.bt1').click(function(){
$(this).prop('disabled',true);//ボタンを無効化する
$(this).closest('form').submit();//フォームを送信する
});
});*/
</script>

</body>
</html>
