@extends('layouts.home_base')

@section('link')
<a class="btn btn-primary text" href="{{ url('/stylist/schedule_add')}}">スケジュール
  <span class="fukidashi les_fukidashi_s">スケジュールの登録・確認・削除ができます</span></a>
  <a class="btn btn-primary text" href="{{ url('/stylist/reservation_history')}}">予約履歴
    <span class="fukidashi">予約履歴確認・顧客情報の確認ができます</span></a>
    <a class="btn btn-primary text" href="{{ url('/stylist/profile_edit')}}">プロフィール
      <span class="fukidashi">会員情報の修正ができます</span></a>
      <a class="btn btn-primary" href="{{ url('/login_logout/logout_comp')}}">ログアウト</a>
      @endsection

      @section('contents')
      <div class="container position-relative">
        <div class="row justify-content-center">

          <form method="post" action="/stylist/user_memo">
            @csrf

            <h1 class="mb-5 heading-msg">本日の予約一覧</h1>
            @if($reservations->isEmpty())
            <p class="heading-msg">本日の予約はありません</p>
            @else

            <table class="tb01">
              <tr class="head">
                <th>ID</th>
                <th>予約日</th>
                <th>時間</th>
                <th>料金</th>
                <th>静か</th>
                <th>話す</th>
                <th>ヘアセット</th>
                <th>シャンプー</th>
                <th>お子様カット</th>
                <th>コメント</th>
                <th></th>
                <th></th>
              </tr>

              <tr>
                @foreach($reservations as $reservation)

                @php
                $dateTime = date('H:i', strtotime($reservation->reservation_time));
                $nowTime = date('H:i');
                @endphp

                <td data-label="予約番号">{{$reservation->reservation_id}}</td>
                <td data-label="予約日">{{date('m/d', strtotime($reservation->reservation_date))}}</td>
                <td data-label="予約時間">{{date('H:i', strtotime($reservation->reservation_time))}}</td>
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
                <textarea class="list-text-home" readonly rows="3">{{ $reservation->reservation_comment }}</textarea>
                </td>
                <form method="post" action="/stylist/user_memo">
                  @csrf
                  <input type="hidden" name="user" value="{{$reservation->user_id}}">
                  <td class=""><button type="submit" class="td-btn" name="user_sb">顧客情報</td>
                  </form>

                  @if($nowTime < $dateTime)
                  <form method="post" action="/stylist/reservation_cancel">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$reservation->user_id}}">
                    <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
                    <input type="hidden" name="stylist_id" value="{{$reservation->hairstylist_id}}">
                    <td data-label="ステータス"><h6>予約中</h6><button type="submit" class="td-btn" name="user_sb">キャンセル</td>
                    </form>
                  @else
                  <td data-label="ステータス">キャンセル不可</td>
                  @endif
                  </tr>
                  @endforeach
                </table>
                @endif
              </div>
            </div>

            @endsection
