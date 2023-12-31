@extends('layouts/multi_form_base')
@section('main')
<form method="POST" action="/login_logout/pass_mailsend_comp" autocomplete="off">
  @csrf
  @section('title')
  パスワードリセット
  @endsection

  @section('msg1')
  会員登録時に登録されたメールアドレス<br>
  お名前をご入力の上送信ボタンをクリックしてください。
  @endsection

  @section('msg2')
  ※苗字と名前の間にスペースは不要です
  @endsection

  @section('content')

  @php
  if(isset($errors)){
    foreach($errors->all() as $error){
      @endphp
      <p class="error_msg"><span class="asterisk">*</span>{{$error}}</p>
      @php
    }
  }
  @endphp

  <div class="Form-Item">
    <p class="Form-Item-Label">メールアドレス</p>
    <input type="text" name="メール" id="mail" class="Form-Item-Input" value="{{old('メール')}}" required placeholder="例）example@gmail.com">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">お名前</p>
    <input type="text" name="名前" id="name" class="Form-Item-Input" value="{{old('名前')}}" required placeholder="例）山田太郎">
  </div>

  <div class="center">
    <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
    <button type="submit" class="Form-Btn" id="double">送信</button>
    <div>
    </form>

    <script type="text/javascript">
    //送信ボタンを押した際に送信ボタンを無効化する（連打による多数送信回避）
    $(function(){
      $('[type="submit"]').click(function(){
        $(this).prop('disabled',true);//ボタンを無効化する
        $(this).closest('form').submit();//フォームを送信する
      });
    });
    </script>
    @endsection
