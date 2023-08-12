@extends('layouts.multi_form_base')

@section('main')
@php
if($anser == true){
  @endphp

  @section('title')
  登録内容確認
  @endsection

  @section('msg1')
  下記の項目をご確認の上送信ボタンを押してください<br>
  内容を訂正する場合は、戻るボタンを押してください
  @endsection

  @section('content')
  <form method="POST" action="/top/signup_comp" id="form">
    @csrf

    <div class="Form-Item">
      <p class="Form-Item-Label">氏名</p>
      <input type="text" name="name" id="name" class="Form-Item-Input confirm-style" value="{{ $inputs['名前'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">フリガナ</p>
      <input type="text" name="kana" id="kana" class="Form-Item-Input confirm-style" value="{{ $inputs['フリガナ'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">電話番号</p>
      <input type="text" name="tel" id="tel" class="Form-Item-Input confirm-style" value="{{ $inputs['電話番号'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">メールアドレス</p>
      <input type="email" name="mail" id="email" class="Form-Item-Input confirm-style" value="{{ $inputs['メール'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">住所</p>
      <input type="text" name="address" id="address" value="{{ $inputs['住所'] }}" class="Form-Item-Input confirm-style" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">パスワード</p>
      <input type="text" name="password" id="password" value="{{ $inputs['password'] }}" class="Form-Item-Input confirm-style" readonly tabindex="-1">
    </div>

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="submit" class="Form-Btn">送 信</button>
    </div>
    @endsection

    @php
  }else if($anser == false){
    if($stylist->isEmpty()){
    @endphp
    <h2>新規会員登録はできません</h2>

    <p class="error_msg">※メールアドレスは既に登録済みです。</p>
    <p>会員ページにログインの上ご利用ください。</p>

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="button" class="Form-Btn"><a href="{{ url('/login_logout/login')}}">ログインページ</a></button>
    </div>
    @php
  }else{
    @endphp
    <h2>新規会員登録はできません</h2>
    <p class="error_msg">※メールアドレスは美容師会員に登録済みです。</p>
    <p>ユーザー会員として登録をされる場合は、別のメールアドレスにてご登録をお願いいたします。</p>

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="button" class="Form-Btn"><a href="{{ url('/login_logout/stylist_login')}}">ログインページ</a></button>
    </div>

  @php
  }

  }
  @endphp
  @endsection
