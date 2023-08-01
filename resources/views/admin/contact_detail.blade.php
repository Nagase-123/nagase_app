@extends('layouts.multi_form_base')

@section('title')
お問合せ返信
@endsection

@section('msg1')
返信内容をご入力の上、送信ボタンを押してください
@endsection

@section('msg2')
@endsection

@section('content')

@foreach($results as $result)

<div class="Form-Item">
  <p class="Form-Item-Label">氏名</p>
  <p class="Form-Item-Label">{{$result->user_name}} 様</p>
</div>

<div class="Form-Item">
  <p class="Form-Item-Label">メールアドレス</p>
  <p class="Form-Item-Label">{{$result->user_mail}}</p>
</div>

<div class="Form-Item">
  <p class="Form-Item-Label">お問合せ内容</p>
  <p class="Form-Item-Label">{{$result->contact_text}}</p>
</div>

@endforeach

  <form method="post" action="/admin/reply_confirm">
    @csrf
    <input type="hidden" name="name" id="name" value="{{$result->user_name}}">
    <input type="hidden" name="mail" id="mail" value="{{$result->user_mail}}">
    <input type="hidden" name="contact_id" id="contact_id" value="{{$result->contact_id}}">
    <input type="hidden" name="contact_text" id="contact_text" value="{{$result->contact_text}}">

    <div class="Form-Item">
      <p class="Form-Item-Label isMsg">返信内容</p>
      <textarea name="textarea_box" id="textarea_box" class="Form-Item-Textarea" wrap="hard" required>{{ old('本文') }}</textarea>
    </div>

    @endsection

    @section('button')
    <div class="center">
    <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
    <button type="submit" class="Form-Btn">送 信</button>
    </div>
    @endsection
