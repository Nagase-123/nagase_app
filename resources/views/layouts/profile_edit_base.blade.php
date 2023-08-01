<!--
このテンプレートを使用するファイル
profile_edit
user_profile_edit
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>profile</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{ asset('css/form_styles.css') }}" rel="stylesheet" />
  <!-- js-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{ asset('/scripts.js') }}"></script>
</head>

<body>

  <div class="Form">

    @yield('content')

    <h2 class="">@yield('title')</h2>

    <p>@yield('msg1')</p>

    @yield('error')

    @yield('form')

    @yield('id')

    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>氏名</p>
      @yield('name')
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>フリガナ</p>
      @yield('kana')
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">電話番号</p>
      @yield('tel')
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>メールアドレス</p>
      @yield('mail')
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">郵便番号</p>
      <input type="text" id="zip_code" value="" maxlength="7" class="Form-Item-Input" placeholder="例）8100012">
      <button type="button" id="search_button" class="search_btn">検索</button>
    </div>
    <div class="">
      <br><p class="error_msg" id="search_result"></p>
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>住所</p>
      @yield('address')
    </div>

    @yield('advantage')
    @yield('comment')
    @yield('password')
    @yield('textarea')

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="submit" class="Form-Btn">送 信</button>
    </div>

  </div>

</form>
</body>
</html>
