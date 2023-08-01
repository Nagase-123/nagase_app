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

  <form method="POST" action="/admin/admin_comp" id="form">
    @csrf
    <input type="hidden" name ="comp_kinds" value="stylist_signup_comp">

    <div class="Form-Item">
      <p class="Form-Item-Label">氏名</p>
      <input type="text" name="名前" id="name" class="Form-Item-Input confirm-style" value="{{ $inputs['名前'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">フリガナ</p>
      <input type="text" name="フリガナ" id="kana" class="Form-Item-Input confirm-style" value="{{ $inputs['フリガナ'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">電話番号</p>
      <input type="text" name="電話番号" id="tel" class="Form-Item-Input confirm-style" value="{{ $inputs['電話番号'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">メールアドレス</p>
      <input type="email" name="メール" id="email" class="Form-Item-Input confirm-style" value="{{ $inputs['メール'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">住所</p>
      <input type="text" name="住所" id="address" value="{{ $inputs['住所'] }}" class="Form-Item-Input confirm-style" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">パスワード</p>
      <input type="text" name="password" id="password" value="{{ $inputs['password'] }}" class="Form-Item-Input confirm-style" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">得意スタイル</p>
      <input type="text" name="得意スタイル" id="advantage" class="Form-Item-Input confirm-style" value="{{ $inputs['得意スタイル'] }}" readonly tabindex="-1">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">自己紹介</p>
      <textarea class="Form-Item-Textarea confirm-style" name="自己紹介" id="profile" wrap="hard" readonly tabindex="-1">{{ $inputs['自己紹介'] }}</textarea>
    </div>

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="submit" class="Form-Btn">送 信</button>
    </div>
    @endsection
    @php
  }else if($anser == false){
    @endphp
    <h2>新規会員登録はできません</h2>

    <p class="error_msg">※メールアドレスは既に登録済みです</p>
    <p>会員ページにログインの上ご利用ください</p>

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="button" class="Form-Btn"><a href="{{ url('/login_logout/login')}}">ログインページ</a></button>
    </div>
    @php
  }
  @endphp
  @endsection
