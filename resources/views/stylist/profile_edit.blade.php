@extends('layouts.profile_edit_base')

@section('title')
ID:{{$stylist_id}} プロフィール編集
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
<form method="POST" action="/stylist/stylist_comp" id="form">
  @csrf
  <input type="hidden" name="stylist_id" value="{{$stylist_id}}">
  <input type="hidden" name="comp_kinds" value="profile_edit_comp">
  @endsection

  @foreach($stylists as $stylist)

  @section('name')
  <input type="text" name="名前" id="name" class="Form-Item-Input" value="{{$stylist->hairstylist_name }}" required placeholder="例）山田太郎">
  @endsection

  @section('kana')
  <input type="text" name="フリガナ" id="kana" class="Form-Item-Input" value="{{$stylist->hairstylist_kana }}" required placeholder="ヤマダタロウ">
  @endsection

  @section('tel')
  <input type="text" name="電話番号" id="tel" class="Form-Item-Input" value="{{$stylist->hairstylist_tel }}" placeholder="例）09012345678">
  @endsection

  @section('mail')
  <input type="email" name="メール" id="email" class="Form-Item-Input" value="{{$stylist->hairstylist_mail }}" required placeholder="例）example@gmail.com">
  @endsection

  @section('address')
  <input type="text" name="住所" id="address" value="{{$stylist->hairstylist_address }}" required class="Form-Item-Input" placeholder="例）福岡市●●区●●">
  @endsection

  @section('advantage')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>得意スタイル</p>
    <input type="text" name="得意スタイル" id="advantage" class="Form-Item-Input"
    value="{{$stylist->hairstylist_advantage }}" placeholder="例）ショートカットが得意です" required>
  </div>
  @endsection

  @section('textarea')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>自己紹介</p>
    <textarea name="自己紹介" id="profile" class="Form-Item-Textarea" required>{{$stylist->hairstylist_profile}}</textarea>
  </div>
  @endsection

  @endforeach
