<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Landing Page - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
                <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/form_styles.css') }}" rel="stylesheet" />
    </head>

<body>
<div class="Form">
  <h2 class="">お問合せ</h2>
  <p>下記の項目をご記入の上送信ボタンを押してください</p>


  <div class="Form-Item">
    <p class="Form-Item-Label"><br><span class="Form-Item-Label-Required">必須</span>氏名</p>
    <input type="text" class="Form-Item-Input" placeholder="例）山田太郎">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>フリガナ</p>
    <input type="text" name="フリガナ"  id="kana" value="{{ old('フリガナ') }}" required class="Form-Item-Input" placeholder="例）ヤマダタロウ">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">　　電話番号</p>
    <input type="text" class="Form-Item-Input" placeholder="例）000-0000-0000">
  </div>
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>メールアドレス</p>
    <input type="email" class="Form-Item-Input" placeholder="例）example@gmail.com">
  </div>
  <div class="Form-Item">
    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
    <textarea class="Form-Item-Textarea"></textarea>
  </div>
  <div class="center">
  <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
  <button type="submit" class="Form-Btn">送 信</button>

</div>
</div>

</body>
</html>
