@extends('layouts/multi_form_base')
@section('main')

<form method="POST" action="/login_logout/pass_reset_comp" autocomplete="off">
  @csrf
@endsection

  @section('title')
  パスワード再設定
  @endsection

  @section('content')

  @if($result == true)

  @php
  if(isset($user_id)){
    @endphp

    <p>ID:{{$user_id}} ユーザー会員
    <input type="hidden" name="user_id" id="user_id" class="input1" value="{{$user_id}}"></p>
    @php
  }else if(isset($stylist_id)){
    @endphp
    </p>ID:{{$stylist_id}} 美容師会員
    <input type="hidden" name="stylist_id" id="stylist_id" class="input1" value="{{$stylist_id}}"></p>
    @php
  }
  @endphp

  <p>{{$anser}}</p>
  @if(isset($msg))
  <p class="error_msg">※{{$msg}}</p>
  @endif

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
    <p class="Form-Item-Label">パスワード</p>
    <input type="password" name="password" id="pass" class="Form-Item-Input" value="{{old('password')}}" required placeholder="※１０文字以上 半角英数字で入力">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">パスワード確認</p>
    <input type="password" name="password_confirmation" class="Form-Item-Input" value="{{old('password_confirmation')}}" required placeholder="※１０文字以上 半角英数字で入力">
  </div>

  <button type="submit" class="Form-Btn" onclick="return alert_js()">送信</button>
  @else
  <p>{{$anser}}</p>

  <p>もう一度やり直してください</p>
  <a href="{{url('/login_logout/login')}}">ログイン画面へ戻る</a>

  @endif

  @endsection
