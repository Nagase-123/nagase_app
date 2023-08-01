@extends('layouts.home_base')

@section('link')
<a class="btn btn-primary text" href="{{ url('/admin/member_list')}}">会員一覧
  <span class="fukidashi les_fukidashi_s">会員ごとの予約履歴確認、個人情報の
    修正・削除ができます</span></a>
    <a class="btn btn-primary text" href="{{ url('/admin/stylist_list')}}">美容師一覧
      <span class="fukidashi">美容師の予約履歴確認、スケジュール削除、個人情報の
        修正・削除ができます</span></a>
      </a>
      <a class="btn btn-primary text" href="{{ url('/top/stylist_signup')}}">美容師登録
        <span class="fukidashi les_fukidashi_u">美容師の新規会員登録ができます</span></a>
        <a class="btn btn-primary text" href="{{ url('/admin/contact_list')}}">問い合わせ
          <span class="fukidashi les_fukidashi_s">お問合せの確認・返信ができます</span></a>
          <a class="btn btn-primary" href="{{ url('/login_logout/logout_comp')}}">ログアウト</a>

          @endsection

          @section('contents')
          <div class="container position-relative">

            <h1 class="mb-5 heading-msg">予約状況一覧</h1>
            <table class="tb01">
              <tr class="head">
                <th>予約<br>番号</th>
                <th>日付</th>
                <th>時間</th>
                <th>料金</th>
                <th>会員<br>ID</th>
                <th>美容師<br>ID</th>
                <th></th>
              </tr>

              <tr>
                <?php
                $time = new DateTime();
                $today = $time->format('Y-m-d');
                ?>
                @foreach($reservations as $reservation)
                @if($reservation->reservation_date >= $today && $reservation->reservation_flg == 0)
                <td data-label="予約番号">{{$reservation->reservation_id}}</td>
                <td data-label="予約日">{{date('m/d', strtotime($reservation->reservation_date))}}</td>
                <td data-label="予約時間">{{date('H:i', strtotime($reservation->reservation_time))}}</td>
                <td data-label="料金">{{$reservation->reservation_fee}}</td>
                <td data-label="会員ID">{{$reservation->user_id}}</td>
                <td data-label="美容師ID">{{$reservation->hairstylist_id}}</td>

                <form method="post" action="/admin/reservation_detail">
                  @csrf
                  <input type="hidden" name="res_id" value="{{$reservation->reservation_id}}">
                  <td data-label=""><button type="submit" name="user_sb" class="td-btn">詳細へ</button></td>
                </form>

              </tr>
              @endif
              @endforeach
            </table>
            @endsection
