@extends('layouts/multi_form_base')
@section('title','予約登録')

@section('form')
<form action="/user/reservation_confirm" method="post">
  @csrf
  <!-- ユーザーID送信用 -->
  <input type="hidden" name="user_id" value="{{ $user_id }}">

  <!-- 美容師ID送信用 -->
  <input type="hidden" name="stylist" value="{{ $stylist_id }}">
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

  @endsection

  @section('msg1')
  希望日時を選ぶ
  @endsection

  @section('msg2')
  ※日時が表示されない場合は予約可能な日時がございません<br>
  誠に恐れ入りますが、再度別の美容師にてご予約ください
  @endsection

  @section('table')
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
    @php
    foreach($inputs as $input){
      @endphp
      <tr class="">


        <td class="td-color">{{ date('m/d', strtotime($input->schedule_date)) }}<br>
          <input type="radio" name="予約日" value="{{ $input->schedule_date }}"></td>

          @php
          for($i = 6; $i <= 21; $i++){
            $schedule = 'schedule_'.$i;
            $value_time = $i.':00';
            if($input->$schedule == 1){
              @endphp
              <td data-label="{{$value_time}}"><input type="radio" name="予約時間" value="{{$value_time}}"></td>
              @php
            }else{
              @endphp
              <td data-label="{{$value_time}}">×</td>
              @php
            }
          }

        }

        @endphp
      </tr>
    </table>
    <h4 class="link">{{ $inputs->links() }}</h4>
    @endsection

    @section('request')
    <h4><i class="bi bi-scissors">要望・追加メニューがある場合は選択してください</i></h4>

    <fieldset>
      <div>
        <input type="checkbox" id="quiet" name="request1" value="静かに過ごしたい">
        <label for="">静かに過ごしたい</label>
      </div>

      <div>
        <input type="checkbox" id="talk" name="request2" value="話しながら過ごしたい">
        <label for="">話しながら過ごしたい</label>
      </div>

      <div>
        <input type="checkbox" id="hairset" name="request3" value="ヘアセット追加">
        <label for="">ヘアセット追加　(+3,000円)</label>
      </div>

      <div>
        <input type="checkbox" id="shampoo" name="request4" value="シャンプー追加">
        <label for="">シャンプー追加　(+1,000円)</label>
      </div>

      <div>
        <input type="checkbox" id="child" name="request5" value="お子様カット追加">
        <label for="">お子様カット追加　(+1,000円)</label>
      </div>

    </fieldset>
    @endsection

    @section('textarea')
    <h4><i class="bi bi-scissors">メッセージがあればご記入ください</i></h4>

    <textarea class="Form-Item-Textarea" name="メッセージ" value="">{{old('メッセージ')}}</textarea>
    <span class = "error_msg"></span>

    @endsection

    @section('button')
    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="submit" class="Form-Btn">送 信</button>
    </div>
    @endsection
