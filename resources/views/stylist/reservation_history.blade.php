@extends('layouts.list_base')

@section('contents')
<h1 class="mb-5 heading-msg">予約履歴</h1>
<table class="tb01">
  <tr class="head">
    <th>ID</th>
    <th>日時</th>
    <th>料金</th>
    <th>静か</th>
    <th>話す</th>
    <th>ヘアセット</th>
    <th>シャンプー</th>
    <th>お子様カット</th>
    <th>コメント</th>
    <th></th>
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

    <td data-label="コメント">
    <textarea class="list-text" readonly rows="3">{{ $reservation->reservation_comment }}</textarea>
    </td>
    <form method="post" action="/stylist/user_memo">
      @csrf
      <input type="hidden" name="user" value="{{$reservation->user_id}}">
      <td data-label="顧客情報"><button type="submit" name="user_sb" class="td-btn">顧客情報</td>
      </form>

    </tr>
    @endforeach

  </table>

  <h6 class="link">{{ $reservations->links() }}</h6>
  @endsection
