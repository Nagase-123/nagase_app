@extends('layouts.signup_base')

@section('title','美容師新規会員登録')

@section('form')
<form method="POST" action="/top/stylist_signup_confirm" id="form" autocomplete="off">
  @csrf
  @endsection

  @section('advantage')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Required">＊</span>得意スタイル</p>
    <input type="text" name="得意スタイル" id="advantage" class="Form-Item-Input" value="{{ old('得意スタイル') }}" placeholder="例）ショートカットが得意です" required>
  </div>
  @endsection

  @section('textarea')
  <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Required">＊</span>自己紹介</p>
    <textarea class="Form-Item-Textarea" name="自己紹介" id="profile" wrap="hard" placeholder="例) 美容師歴●●年です。" required>{{ old('自己紹介') }}</textarea>
  </div>
  @endsection
