@extends('layouts.list_base')

@section('link')
<p>
  <a class="btn-primary" href="{{ url('../stylist/schedule_list')}}">
    ※現在登録中のスケジュール一覧はこちら
  </a>
</p>
@endsection

@section('contents')
<div class="row justify-content-center">

  <div class="text-center text-white">

    <h1 class="mb-5 heading-msg">スケジュール登録</h1>

    @php
    if(isset($errors)){
      foreach($errors->all() as $error){

        //指定した文字列が一致したら置き換える
        $replace = str_replace('date add は今日より後の日付を選択して下さい', '日付は今日より後の日付を選択して下さい', $error);

        @endphp
        <p class="error_msg">*{{$replace}}</p>
        @php
      }
    }
    @endphp

    <p>
      出勤希望日と時間を選択してください<br>
      <i class="bi bi-exclamation-triangle"> </i>6：00を選択した場合、6：00開始の予約が入ります<br>
      選択した時間に訪問できるようスケジュールを登録してください
    </p>


    <form class="schedule_form" action="/stylist/stylist_comp" method="post">
      @csrf
      <!-- 　美容師ID送信用 -->
      <input type="hidden" name="stylist_id" value="{{$stylist_id}}">
      <input type="hidden" name="comp_kinds" value="schedule_comp">


      <label>日付</label>
      <input type="date" class="inp" name="date_add" required="required">

      <br>
      @php
      for($i = 6; $i <= 21; $i++){
        $schedule = 'schedule_'.$i;
        $value_time = $i.':00';
        $name = 'time'.$i;
        $label = $i.'am';
        if($i == 12 || $i == 17){
          @endphp
          <br>
          @php
        }
        @endphp
        <input type="checkbox" name="{{$name}}" class="check">
        <label for="{{$label}}" class="">{{$i}}:00</label>
        @php
      }
      @endphp
      <br>
      <button type="submit" class="" onclick="return isCheck()">登録</button>
    </div>
  </div>
  @endsection
