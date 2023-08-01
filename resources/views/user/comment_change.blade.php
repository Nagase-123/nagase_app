
@extends('layouts.multi_form_base')

@section('title')
コメント変更
@endsection

@section('msg1')
変更内容をご入力の上、送信ボタンを押してください
@endsection

@section('content')
<form method="post" action="/user/user_comp">
  <input type="hidden" name="comp_kinds" value="comment_change_comp">
  <input type="hidden" name="u_id" value="{{$u_id}}">

  @csrf
  @foreach($results as $result)

  @if ($errors->has('textarea_box'))
  <span class = "error_msg">{{$errors->first('textarea_box')}}</span>
  @endif

  <div class="Form-Item">
    <p class="Form-Item-Label">予約番号：{{$result->reservation_id}}</p>
  </div>
  <div class="Form-Item">
    <p class="Form-Item-Label">予約日時：{{date('m/d', strtotime($result->reservation_date))}}
      {{date('H:i', strtotime($result->reservation_time))}}</p>
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">コメント</p>
      <input name="comment" id="textarea_box" wrap="hard"
      value="{{$result->reservation_comment}}" type="text" class="Form-Item-Input">
      <input name="res_id" type="hidden" value="{{$result->reservation_id}}">
    </div>

    <br>
    @endforeach

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="submit" class="Form-Btn">送 信</button>
    </div>

    @endsection
