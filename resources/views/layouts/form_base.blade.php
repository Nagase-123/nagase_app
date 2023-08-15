<!--
このテンプレートの利用ファイル
contact　
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
  <!-- Core theme CSS (includes Bootstrap)-->
  @if(app('env') == 'production')
  <link href="{{ secure_asset('css/form_styles.css') }}" rel="stylesheet" />
  @else
  <link href="{{ asset('css/form_styles.css') }}" rel="stylesheet" />
  @endif
  <!-- js-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{ asset('/scripts.js') }}"></script>
  <style>
  </style>
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
      <input type="text" name="名前" id="name" class="Form-Item-Input" value="{{ old('名前') }}" required placeholder="例）山田太郎">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>フリガナ</p>
      <input type="text" name="フリガナ" id="kana" class="Form-Item-Input" value="{{ old('フリガナ') }}" required placeholder="例）ヤマダタロウ">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">電話番号</p>
      <input type="text" name="電話番号" id="tel" class="Form-Item-Input" value="{{ old('電話番号') }}" placeholder="例）09012345678">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>メールアドレス</p>
      <input type="email" name="メール" id="email" class="Form-Item-Input" value="{{ old('メール') }}" required placeholder="例）example@gmail.com">
    </div>

    @yield('postnumber')
    @yield('address')
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
