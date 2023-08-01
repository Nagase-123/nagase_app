@extends('layouts.form_base')

@section('title','新規会員登録')

@section('msg1')
下記の項目をご入力の上送信ボタンを押してください
@endsection

@section('form')
<form method="POST" action="/top/stylist_signup_confirm" id="form" autocomplete="off">
  @csrf
  @php
  if(isset($errors)){
    foreach($errors->all() as $error){
      @endphp
      <p class="error_msg"><span class="asterisk">*</span>{{$error}}</p>
      @php
    }
  }
  @endphp
  @endsection

  @section('postnumber')
  <div class="Form-Item">
    <p class="Form-Item-Label">郵便番号</p>
    <input type="text" id="zip_code" value="" maxlength="7" class="Form-Item-Input" placeholder="例）8100012">
    <button type="button" id="search_button" class="search_btn">検索</button>
    <div id ="search_result"></div>
  </div>
  @endsection

  @section('address')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>住所</p>
    <input type="text" name="住所" id="address" value="{{ old('住所') }}" required class="Form-Item-Input" placeholder="例）福岡市●●区●●">
  </div>
  @endsection

  @section('password')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>パスワード</p>
    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="※１０文字以上 半角英数字で入力" class="Form-Item-Input" required>
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>パスワード確認用</p>
    <input type="password" name="password_confirmation" id="pass_check" class="Form-Item-Input" value="{{ old('password_confirmation') }}" placeholder="※１０文字以上 半角英数字で入力" required>
  </div>
  @endsection

  @section('advantage')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>得意スタイル</p>
    <input type="text" name="得意スタイル" id="advantage" class="Form-Item-Input" value="{{ old('得意スタイル') }}" placeholder="例）ショートカットが得意です" required>
  </div>
  @endsection

  @section('textarea')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>自己紹介</p>
    <textarea class="Form-Item-Textarea" name="自己紹介" id="profile" wrap="hard" placeholder="例) 美容師歴●●年です。" required>{{ old('自己紹介') }}</textarea>
  </div>
  @endsection
