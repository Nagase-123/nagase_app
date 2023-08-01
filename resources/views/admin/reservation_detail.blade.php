@extends('layouts.list_base')

@section('contents')
<h1 class="mb-5 heading-msg">予約詳細</h1>
<table class="tb01">
  <tr class="head">
    <th>予約番号</th>
    <th>予約日時</th>
    <th>料金</th>
    <th>静か</th>
    <th>話す</th>
    <th>ヘアセット</th>
    <th>シャンプー</th>
    <th>お子様カット</th>
    <th>コメント</th>
  </tr>

  <tr>
    @foreach($reservations as $reservation)
    <td data-label="予約番号">{{$reservation->reservation_id}}</td>
    <td data-label="日時">{{date('m/d', strtotime($reservation->reservation_date))}} {{date('H:i', strtotime($reservation->reservation_time))}}</td>
    <td data-label="料金">{{$reservation->reservation_fee}}</td>

    @if($reservation->reservation_request1 =='なし')
    <td data-label="静か">×</td>
    @else
    <td data-label="静か">〇</td>
    @endif

    @if($reservation->reservation_request2 =='なし')
    <td data-label="話す">×</td>
    @else
    <td data-label="話す">〇</td>
    @endif

    @if($reservation->reservation_request3 =='なし')
    <td data-label="ヘアセット">×</td>
    @else
    <td data-label="ヘアセット">〇</td>
    @endif

    @if($reservation->reservation_request4 =='なし')
    <td data-label="シャンプー">×</td>
    @else
    <td data-label="シャンプー">〇</td>
    @endif

    @if($reservation->reservation_request5 =='なし')
    <td data-label="お子様カット">×</td>
    @else
    <td data-label="お子様カット">〇</td>
    @endif

    <td data-label="コメント">{{$reservation->reservation_comment}}</td>
  </tr>
</table>

<h1 class="mb-5 heading-msg detail">会員情報</h1>

<table class="tb01">
  <tr class="head">
    <th>会員id</th>
    <th>名前</th>
    <th>フリガナ</th>
    <th>電話番号</th>
    <th>住所</th>
    <th>会員メモ</th>
  </tr>

  <tr>
    @foreach($users as $user)
    <td data-label="ユーザーID">{{$user->user_id}}</td>
    <td data-label="ユーザー名">{{$user->user_name}}</td>
    <td data-label="ユーザーフリガナ">{{$user->user_kana}}</td>
    <td data-label="ユーザー電話番号">{{$user->user_tel}}</td>
    <td data-label="ユーザー住所">{{$user->user_address}}</td>
    <td data-label="顧客メモ">{{$user->user_memo}}</td>
  </tr>
  @endforeach
</table>

<h1 class="mb-5 heading-msg detail">美容師情報</h1>

<table class="tb01">
  <tr class="head">
    <th>美容師id</th>
    <th>美容師名</th>
    <th>フリガナ</th>
    <th>電話番号</th>
    <th>得意スタイル</th>
  </tr>

  <tr>
    @foreach($stylists as $stylist)
    <td data-label="美容師ID">{{$stylist->hairstylist_id}}</td>
    <td data-label="美容師名">{{$stylist->hairstylist_name}}</td>
    <td data-label="美容師フリガナ">{{$stylist->hairstylist_kana}}</td>
    <td data-label="美容師電話番号">{{$stylist->hairstylist_tel}}</td>
    <td data-label="美容師得意スタイル">{{$stylist->hairstylist_advantage}}</td>
  </tr>
  @endforeach
</table>


<h5 class="mb-5 heading-msg detail">キャンセルの場合は、下記にキャンセル理由を入力して下さい。
  <span class="error_msg"><br>※入力した内容でお客様に連絡が届きます。</span></h5>
  <form method="post" action="/admin/admin_comp" autocomplete="off">
    @csrf
    <input type="hidden" name="comp_kinds" value="reservation_cancel_comp_admin">

    <input name="cancel_msg" wrap="hard"
    value="" type="text" class="inp-width" required>

    <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
    <button type="submit" name="user_sb" id="del_bt" class ="Form-Btn" onclick="return alert_js()">キャンセル</button>
  </form>
  @endforeach
  @endsection
