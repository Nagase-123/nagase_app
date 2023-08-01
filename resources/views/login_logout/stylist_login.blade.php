@extends('layouts/multi_form_base')

@section('content')
<form method="POST" action="/login_logout/stylist_login" autocomplete="off">
  @csrf
  <p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>

  <div class="text-center text-white">
    <h1 class="mb-5 heading-msg">美容師専用ログイン</h1>
  </div>

  @if(isset($msg))
  <p class="error_msg text-center">※{{$msg}}</p>
  @endif

  <div class="Form-Item">
    <input type="text" name="mail" id="mail" class="Form-Item-Input Form-Item-Login" value="{{old('mail')}}" required placeholder="メールアドレス">
  </div>

  <div class="Form-Item">
    <input type="password" name="pass" id="pass" class="Form-Item-Input Form-Item-Login" value="{{old('pass')}}" required placeholder="パスワード">
  </div>

  <div class="center">
    <button type="submit" class="Form-Btn">ログイン</button>
  </div>

  <div class="text-center">
    <p><a class="navbar-brand" href="{{url('/login_logout/reset_request')}}">
      パスワードを忘れた場合はこちら</a></p>
    </div>
