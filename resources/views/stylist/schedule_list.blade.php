@extends('layouts.list_base')
@section('contents')
<h1 class="mb-5 heading-msg">スケジュール一覧</h1>

<!--バリデーション-->
@php
if(isset($errors)){
  foreach($errors->all() as $error){
    @endphp
    <p class="error_msg">※{{$error}}</p>
    @php
  }
}
@endphp

<p class="msg_p1">スケジュールの削除をご希望の場合は日時を選択の上削除ボタンを押してください</p>
<p class="msg_sml">〇…スケジュール登録中</p>
<p class="msg_sml">△…予約あり<br>
  <span class="error_msg">※スケジュールの削除をご希望の場合は、該当の予約をキャンセル後に
    スケジュールの削除をお願いいたします。</span></p>
    <p class="msg_sml">×…スケジュール登録無</p>

    <table class="tb01">
      <tr class="head">

        <th>date</th>
        @php
        for($i = 6; $i<=21; $i++){
          @endphp
          <th>{{$i}}:00</th>
          @php
        }
        @endphp
      </tr>

      <form method="post" action="/stylist/stylist_comp">
        @csrf
        <input type="hidden" name="stylist" value="{{$stylist_id}}">
        <input type="hidden" name="comp_kinds" value="schedule_delete_comp">

        @foreach($results as $result)

        <tr class="">
          <td data-label="日付">{{ date('m/d', strtotime($result->schedule_date)) }}<br>
            <input type="radio" name="予約日" value="{{ $result->schedule_date }}"></td>

            @php
            for($i = 6; $i <= 21; $i++){
              $schedule = 'schedule_'.$i;
              $value_time = $i.':00';
              if($result->$schedule == 1){
                @endphp
                <td data-label="{{$value_time}}"><input type="radio" name="予約時間" value="{{$value_time}}"></td>
                @php
              }else if($result->$schedule == 2){
                @endphp
                <td data-label="{{$value_time}}">△</td>
                @php
              }else{
                @endphp
                <td data-label="{{$value_time}}">×</td>
                @php
              }
            }
            @endphp
          </tr>
          @endforeach

        </table>

        <div class="text-center text-white">

          <button type="submit" id="submit" class="btn btn-primary" onclick="return alert_js()">削除</button>
        </div>
      </form>

      <h6 class="link">{{ $results->links() }}</h6>

      @endsection
