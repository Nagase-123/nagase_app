@extends('layouts.multi_form_base')

@section('title')
予約確認
@endsection

@section('form')

<form action="/user/user_comp" method="post">
  @csrf
  <input type="hidden" name="comp_kinds" value="reservation_comp">

  <!-- ユーザーID送信用 -->
  <input type="hidden" name="user_id" value="{{ $inputs['user_id'] }}">

  @section('msg1')
  ご予約内容をご確認の上、お間違いなければ送信ボタンを押してください
  @endsection

  @section('content')

  <div class="Form-Item">
    <p class="Form-Item-Label">予約日時</p>
    @if($anser == 'true')
    <span class="weight">{{ date('Y年m月d日', strtotime($inputs['予約日'])); }}
      {{ $inputs['予約時間']; }}</span>
      <input type="hidden" name="予約日" id="date" value="{{ $inputs['予約日'] }}">
      <input type="hidden" name="予約時間" id="res_time" value="{{ $inputs['予約時間'] }}">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">美容師</p>
      @php
      foreach($stylists as $stylist){
        if($stylist->hairstylist_id == $inputs['stylist']){
          echo $stylist->hairstylist_name;
        }
      }
      @endphp
      <input type="hidden" name="stylist" id="stylist" value="{{ $inputs['stylist'] }}" placeholder="なし">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">要望</p>
      @php
      if(isset($inputs['request1'])){
        echo $inputs['request1'].'<br>' ;
        @endphp
        <input type="hidden" name="request1" value="{{ $inputs['request1'] }}">
        @php
      }
      if(isset($inputs['request2'])){
        echo $inputs['request2'].'<br>' ;
        @endphp
        <input type="hidden" name="request2" value="{{ $inputs['request2'] }}">
        @php
      }
      if(isset($inputs['request3'])){
        echo $inputs['request3'].'<br>' ;
        @endphp
        <input type="hidden" name="request3" value="{{ $inputs['request3'] }}">
        @php
      }
      if(isset($inputs['request4'])){
        echo $inputs['request4'].'<br>' ;
        @endphp
        <input type="hidden" name="request4" value="{{ $inputs['request4'] }}">
        @php
      }
      if(isset($inputs['request5'])){
        echo $inputs['request5'].'<br>' ;
        @endphp
        <input type="hidden" name="request5" value="{{ $inputs['request5'] }}">
        @php
      }
      @endphp
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">コメント</p>
      <textarea class="Form-Item-Textarea confirm-style transparent" name="msg" readonly>{{ $inputs['メッセージ'] }}</textarea>
    </div>

    @else
    <span class ="error_msg"><br>※選択された日時が不正です。<br>
      再度日時をご確認の上ご予約ください。</span>
    </div>
    <div class="center"><button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      @endif



      @php
      if($anser == 'true'){
        echo '<div class="center"><button type ="button" class="Form-Btn" id="return" onclick=history.back()>'.'戻 る'.'</button>';
          echo '<button type="submit" class="Form-Btn">'.'送 信'.'</button>';
        }
        @endphp
      </div>

      @endsection
