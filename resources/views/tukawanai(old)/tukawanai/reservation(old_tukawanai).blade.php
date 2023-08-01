<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <style>
  input{
    border: 1px solid #705339;
    margin: 1% 5%;
  }
  label{
    color:#705339;
  }
  .box3, .text{
    border: solid 1px rgba(112, 83, 57, 0.2);
  }
  .box_all{
    height: 100vh;
  }
  .bt_box{
    margin-bottom: 10%;
  }
@media screen and (min-width:0px) and (max-width:767px){
    .s_th{
    width: 22px;
  }
  .date_style{
    width: 10%;
  }

}
  </style>
</head>

<body>
<div class="box_all">

<h3 class="uhome_h3">予約登録</h3>
  <form action="/user_function/reservation_confirm" method="post">
    @csrf
    <!-- ユーザーID送信用 -->
    <input type="hidden" name="user_id" value="{{ $user_id }}">

    <!-- 美容師ID送信用 -->
    <input type="hidden" name="stylist" value="{{ $stylist_id }}">

    <p>
      @php
        foreach($stylists as $stylist){
          @endphp
          <p class="msg_p1">選択中の美容師：{{$stylist->hairstylist_name}}</p>
          @php
        }
      @endphp
    </p>
<!--バリデーション-->
    @php
    if(isset($errors)){
      foreach($errors->all() as $error){
      @endphp
  <p class="msg_p3">※{{$error}}</p>
    @php
       }
    }
    @endphp

    <h4 class="uhome_h4"><a>希望日時を選ぶ</a>
    </h4>
    <p class="msg_p2">※日時が表示されない場合は予約可能な日時がございません<br>
    誠に恐れ入りますが、再度別の美容師にてご予約ください</p>
    <table class="table_list">
    <tr>
    <th class="s_th date_style">date</th>
    <th class="s_th">6:00</th>
    <th class="s_th">7:00</th>
    <th class="s_th">8:00</th>
    <th class="s_th">9:00</th>
    <th class="s_th">10:00</th>
    <th class="s_th">11:00</th>
    <th class="s_th">12:00</th>
    <th class="s_th">13:00</th>
    <th class="s_th">14:00</th>
    <th class="s_th">15:00</th>
    <th class="s_th">16:00</th>
    <th class="s_th">17:00</th>
    <th class="s_th">18:00</th>
    <th class="s_th">19:00</th>
    <th class="s_th">20:00</th>
    <th class="s_th">21:00</th>

    @foreach($inputs as $input)

    <tr>
      <td class="s_td">{{ date('m/d', strtotime($input->schedule_date)) }}
      <input type="radio" name="予約日" value="{{ $input->schedule_date }}"></td>
      <td class="s_td">
      @php
      if($input->schedule_6 == 1){
      @endphp
      <input type="radio" name="予約時間" value="6:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_7 == 1){
      @endphp
      <input type="radio" name="予約時間" value="7:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_8 == 1){
      @endphp
      <input type="radio" name="予約時間" value="8:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_9 == 1){
      @endphp
      <input type="radio" name="予約時間" value="9:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_10 == 1){
      @endphp
      <input type="radio" name="予約時間" value="10:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_11 == 1){
      @endphp
      <input type="radio" name="予約時間" value="11:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_12 == 1){
      @endphp
      <input type="radio" name="予約時間" value="12:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_13 == 1){
      @endphp
      <input type="radio" name="予約時間" value="13:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_14 == 1){
      @endphp
      <input type="radio" name="予約時間" value="14:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_15 == 1){
      @endphp
      <input type="radio" name="予約時間" value="15:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_16 == 1){
      @endphp
      <input type="radio" name="予約時間" value="16:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_17 == 1){
      @endphp
      <input type="radio" name="予約時間" value="17:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_18 == 1){
      @endphp
      <input type="radio" name="予約時間" value="18:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_19 == 1){
      @endphp
      <input type="radio" name="予約時間" value="19:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_20 == 1){
      @endphp
      <input type="radio" name="予約時間" value="20:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>

      <td class="s_td">
      @php
      if($input->schedule_21 == 1){
      @endphp
      <input type="radio" name="予約時間" value="21:00">
      @php
      }
      else{
        echo "×";
      }
      @endphp
      </td>
    </tr>
    @endforeach
    </table>
    <h6 class="link">{{ $inputs->links() }}</h6>


      <h4 class="uhome_h4">要望・追加メニューがある場合は選択してください</h4>
      <div class="box3">

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
        </div> <!-- box3 -->

        <h4 class="uhome_h4">メッセージがあればご記入ください</h4>
        <br>
        <textarea class="text" name="メッセージ" value="">{{old('メッセージ')}}</textarea>
        <span class = "error_msg"></span>

        <div class="bt_box">
          <button type ="button" id="return" class="sb_bt" onclick=history.back()>戻る</button>
          <button type="submit" id="reservation" class="sb_bt">予約確認画面へ</button>

        <br>
        </div>
      </form>

      <div class="empty"></div>

    </div><!-- box_all -->

  </body>
  </html>
