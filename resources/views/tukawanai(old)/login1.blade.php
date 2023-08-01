@extends('layouts/login_base')
@section('form')
<form method="POST" action="/login_logout/login" autocomplete="off">
  @csrf

  @if(isset($msg))
  <p class="error_msg">※{{$msg}}</p>
  @endif
  @endsection

  @section('input1')
  <input type="text" name="mail" id="mail" value="{{old('mail')}}" required placeholder="メールアドレス">
  @endsection

  @section('input2')
  <input type="password" name="pass" id="pass" value="{{old('pass')}}" required placeholder="パスワード">
  @endsection

  @section('btn1')
  <button class="btn btn-info btn-block login" type="submit">ログイン</button>
  @endsection

  @section('pass_reset')
  <p><a href="{{url('/login_logout/reset_request')}}">
    パスワードを忘れた場合はこちら</a></p>

    <p><a href="{{url('/login_logout/stylist_login')}}">
    美容師の方はこちら</a></p>
  @endsection
