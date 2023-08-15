@extends('layouts.multi_form_base')
@section('title')
キャンセル確認画面
@endsection

@section('msg1')
キャンセル理由をご入力の上、送信ボタンを押してください
@endsection

@section('content')

<form method="post" action="/stylist/stylist_comp" autocomplete="off">
  @csrf
  <input type="hidden" name="comp_kinds" value="reservation_cancel_comp">
  <input type="hidden" name="stylist_id" value="{{$reservation->hairstylist_id}}">


  <div class="Form-Item">

    @foreach($reservations as $reservation)
    <p class="Form-Item-Label">キャンセルするユーザーID</p>
    <p class="Form-Item-Label">{{$reservation->user_id}}</p>
  </div>
  <div class="Form-Item">
    <p class="Form-Item-Label">キャンセルする予約ID</p>
    <p class="Form-Item-Label">{{$reservation->reservation_id}}</p>
  </div>

  <div class="Form-Item">
    <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
    <p class="Form-Item-Label">キャンセルする予約日時</p>
    <p class="Form-Item-Label">{{date('m/d', strtotime($reservation->reservation_date))}} {{date('H:i', strtotime($reservation->reservation_time))}}</p>
  </div>

  @endforeach
  <div class="Form-Item">
    <p class="Form-Item-Label">キャンセル理由<br>
      <span class="error_msg">※入力した内容でお客様に連絡が届きます。</span>
    </p>
    @if ($errors->has('textarea_box'))
    <span class = "error_msg">{{$errors->first('textarea_box')}}</span>
    @endif
    <textarea name="cancel_msg" class="Form-Item-Textarea" required row="3" maxlength="500"></textarea>
  </div>

  <br>

  <div class="center">
    <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
    <button type="submit" class="Form-Btn">送 信</button>
  </div>
  @endsection
