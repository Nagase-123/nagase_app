@extends('layouts.multi_form_base')

@section('title','返信内容確認')

@section('msg1')
下記の項目をご確認の上送信ボタンを押してください<br>
内容を訂正する場合は、戻るボタンを押してください
@endsection

@section('content')
<form method="post" action="/admin/admin_comp">
  @csrf

  <div class="Form-Item">
    <p class="Form-Item-Label">名前</p>
    <input type="text" name="name" id="name" class="Form-Item-Input confirm-style" value="{{$results['name']}}" readonly tabindex="-1">
    様
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">メールアドレス</p>
    <input type="text" name="mail" id="mail" class="Form-Item-Input confirm-style" value="{{$results['mail']}}" readonly tabindex="-1">
  </div>

  <div class="Form-Item">
    <p class="Form-Item-Label">本文</p>
    <textarea name="返信内容" class="Form-Item-Textarea reply-text" readonly tabindex="-1">{{$results['返信内容']}}</textarea>
  </div>

  <input type="hidden" name="contact_id" id="contact_id" value="{{$results['contact_id']}}">
  <input type="hidden" name="comp_kinds" value="reply_comp">
  @endsection

  @section('button')
  <div class="center">
    <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
    <button type="submit" class="Form-Btn">送 信</button>
  </div>
  @endsection
