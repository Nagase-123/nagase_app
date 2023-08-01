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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <body>
    <div class="box_all">

      <p class="return_top1"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>
      <h3 class="uhome_h3">スケジュール　一覧</h3>

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

      <p class="msg_p1">スケジュールの削除をご希望の場合は日時を選択の上削除ボタンを押してください</p>
      <p class="msg_sml">〇…スケジュール登録中</p>
      <p class="msg_sml">×…スケジュール登録無</p>

      <table class="schedule_table_list">
        <tr>
          <th class="schedul_th"></th>
          <th class="schedul_th">6:00</th>
          <th class="schedul_th">7:00</th>
          <th class="schedul_th">8:00</th>
          <th class="schedul_th">9:00</th>
          <th class="schedul_th">10:00</th>
          <th class="schedul_th">11:00</th>
          <th class="schedul_th">12:00</th>
          <th class="schedul_th">13:00</th>
          <th class="schedul_th">14:00</th>
          <th class="schedul_th">15:00</th>
          <th class="schedul_th">16:00</th>
          <th class="schedul_th">17:00</th>
          <th class="schedul_th">18:00</th>
          <th class="schedul_th">19:00</th>
          <th class="schedul_th">20:00</th>
          <th class="schedul_th">21:00</th>
        </tr>

        <form method="post" action="/admin/schedule_delete_comp_admin">
          @csrf
          <input type="hidden" name="stylist" value="{{$stylist_id}}">

          @foreach($results as $result)
          <tr>
            <td class="schedul_td">{{ date('m/d', strtotime($result->schedule_date)) }}
              <input type="radio" name="予約日" id="date" value="{{ $result->schedule_date }}" required>
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_6 == 1 || $result->schedule_6 == 2){
                @endphp
                <input type="radio" name="予約時間" value="6:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_7 == 1 ||$result->schedule_7 == 2){
                @endphp
                <input type="radio" name="予約時間" value="7:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_8 == 1 ||$result->schedule_8 == 2){
                @endphp
                <input type="radio" name="予約時間" value="8:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_9 == 1 ||$result->schedule_9 == 2){
                @endphp
                <input type="radio" name="予約時間" value="9:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_10 == 1 ||$result->schedule_10 == 2){
                @endphp
                <input type="radio" name="予約時間" value="10:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_11 == 1 ||$result->schedule_11 == 2){
                @endphp
                <input type="radio" name="予約時間" value="11:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_12 == 1 ||$result->schedule_12 == 2){
                @endphp
                <input type="radio" name="予約時間" value="12:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_13 == 1 ||$result->schedule_13 == 2){
                @endphp
                <input type="radio" name="予約時間" value="13:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_14 == 1 ||$result->schedule_14 == 2){
                @endphp
                <input type="radio" name="予約時間" value="14:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_15 == 1 ||$result->schedule_15 == 2){
                @endphp
                <input type="radio" name="予約時間" value="15:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_16 == 1 ||$result->schedule_16 == 2){
                @endphp
                <input type="radio" name="予約時間" value="16:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_17 == 1 ||$result->schedule_17 == 2){
                @endphp
                <input type="radio" name="予約時間" value="17:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_18 == 1 ||$result->schedule_18 == 2){
                @endphp
                <input type="radio" name="予約時間" value="18:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_19 == 1 ||$result->schedule_19 == 2){
                @endphp
                <input type="radio" name="予約時間" value="19:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_20 == 1 ||$result->schedule_20 == 2){
                @endphp
                <input type="radio" name="予約時間" value="20:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>

            <td class="schedul_td">
              @php
              if($result->schedule_21 == 1 ||$result->schedule_21 == 2){
                @endphp
                <input type="radio" name="予約時間" value="21:00" required>
                @php
              }else{
                echo '×';
              }
              @endphp
            </td>
            </tr>
            @endforeach
          </table>

            <div class="bt">
              <button type="submit" required id="submit" onclick="return alert_js()">削除</button>
            </div>

          </form>

        <h6 class="link">{{ $results->links() }}</h6>

        <div></div>

      </div>

<script>
function alert_js(){
  var result=false;
  result = window.confirm('本当に削除しますか？');
  if(result){
    return true;
  }else{
    return false;
  }
}
</script>

</body>
</html>
