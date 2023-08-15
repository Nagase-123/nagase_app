@extends('layouts.profile_edit_base')

@section('title')
ID：{{$u_id}}　会員情報修正
@endsection

@section('msg1')
編集内容を入力後、送信ボタンを押してください
@endsection

@section('error')
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

@section('form')

@foreach($results as $result)
<form method="POST" action="/user/user_comp" id="form">
  @csrf
  <input type="hidden" name="user_id" value="{{$u_id}}">
  <input type="hidden" name="comp_kinds" value="user_profile_edit_comp">

  @section('name')
  <input type="text" name="名前" id="name" class="Form-Item-Input" value="{{$result->user_name}}" required placeholder="例）山田太郎">
  @endsection

  @section('kana')
  <input type="text" name="フリガナ" id="kana" class="Form-Item-Input" value="{{$result->user_kana}}" required placeholder="ヤマダタロウ">
  @endsection

  @section('tel')
  <input type="text" name="電話番号" id="tel" class="Form-Item-Input" value="{{$result->user_tel}}" required placeholder="例）09012345678">
  @endsection

  @section('mail')
  <input type="email" name="メール" id="email" class="Form-Item-Input" value="{{$result->user_mail}}" required placeholder="例）example@gmail.com">
  @endsection

  @section('address')
  <input type="text" name="住所" id="address" value="{{$result->user_address}}" required class="Form-Item-Input" placeholder="例）福岡市●●区●●">
  @endsection

  @endforeach
  @endsection
