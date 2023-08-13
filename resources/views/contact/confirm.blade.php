@extends('layouts.multi_form_base')

@section('title')
お問い合わせ内容確認
@endsection

@section('form')
<form method="post" action="./complete">
  @csrf

  @section('msg1')
  下記の項目をご確認の上送信ボタンを押してください<br>
  内容を訂正する場合は、戻るボタンを押してください
  @endsection

  @section('content')
  <div class="Form-Item">
    <p class="Form-Item-Label">氏名</p>
    <input type="text" name="名前" id="name" class="Form-Item-Input confirm-style" value="{{$request['名前'] }}" readonly tabindex="-1">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">フリガナ</p>
    <input type="text" name="フリガナ" id="kana" class="Form-Item-Input confirm-style" value="{{$request['フリガナ'] }}" readonly tabindex="-1">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">電話番号</p>
    <input type="text" name="電話番号" id="tel" class="Form-Item-Input confirm-style" value="{{$request['電話番号'] }}" readonly tabindex="-1">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">メールアドレス</p>
    <input type="email" name="メール" id="email" class="Form-Item-Input confirm-style" value="{{$request['メール'] }}" readonly tabindex="-1">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label isMsg">お問い合わせ内容</p>
    <textarea name="本文" id="textarea_box" class="Form-Item-Textarea confirm-style"
    readonly tabindex="-1"> {{ $request['本文'] }}</textarea>
  </div>

  <div class="center">
    <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
    <button type="submit" class="Form-Btn">送 信</button>
  </div>

  @endsection

  @endsection
