@extends('layouts.form_base')

@section('title','お問い合わせ')

@section('msg1')
下記の項目をご入力の上送信ボタンを押してください
@endsection

@section('form')
<form method="post" action="/contact/confirm" autocomplete="off">
  @csrf

  @php
  if(isset($errors)){
    foreach($errors->all() as $error){
      @endphp
      <p class="error_msg">*{{$error}}</p>
      @php
    }
  }
  @endphp

  @section('textarea')
  <div class="Form-Item">
    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
    <textarea name="本文" id="textarea_box" class="Form-Item-Textarea" wrap="hard" required>{{ old('本文') }}</textarea>
  </div>
  @endsection

  <!--form-->
  @endsection
