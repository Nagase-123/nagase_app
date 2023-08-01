<style>
th{
  font-size: 12px;
}
@media screen and (min-width:0px) and (max-width:767px){
  .list_bt{
    font-size: 10px;
  }
}
</style>

@extends('layouts.list_base')

@section('th')
<h3 class="uhome_h3">予約履歴</h3>
<th class="s_th">予約<br>番号</th>
<th class="s_th">日時</th>
<th class="s_th">料金</th>
<th class="s_th">美容師id</th>
<th class="s_th">【過ごし方】<br>静か</th>
<th class="s_th">【過ごし方】<br>話す</th>
<th class="s_th">セット</th>
<th class="s_th">シャンプー</th>
<th class="s_th">お子様カット</th>
<th class="s_th">コメント</th>
<th class="s_th"></th>
@endsection

@section('main')

@foreach($results as $result)
<td class="s_td">{{$result->reservation_id}}</td>
<td class="s_td">{{date('m/d', strtotime($result->reservation_date))}}<br>
  {{date('H:i', strtotime($result->reservation_time))}}</td>
  <td class="s_td">{{$result->reservation_fee}}</td>
  <td class="s_td">{{$result->hairstylist_id}}</td>

  @if($result->reservation_request1 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  @if($result->reservation_request2 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  @if($result->reservation_request3 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif


  @if($result->reservation_request4 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  @if($result->reservation_request5 =='なし')
  <td class="s_td">×</td>
  @else
  <td class="s_td">〇</td>
  @endif

  <td class="s_td res_list_design">{{$result->reservation_comment}}</td>

  <td class="s_td">
    <form action ="/admin/reservation_cancel_comp_admin" method="post">
      @csrf
      @php
      $date = strtotime($result->reservation_date);
      $now = strtotime(date('Y-m-d'));
      if($now < $date){
        @endphp

        @php
        if($result->reservation_flg == 1){
          @endphp
          <p>キャンセル済み</p>
          @php
        }else{
          @endphp
          <p class="msg_left">キャンセルの場合は入力して下さい<br>
            <span class="msg_sml">※入力した内容でお客様に連絡が届きます。</span>
          </p>
          <textarea name="cancel_msg" wrap="hard"
          value="" type="text" class="res_textarea_box" required></textarea>

          <input type="hidden" name="res_id" value="{{$result->reservation_id}}">
          <button type="submit" class="list_bt" name="user_sb" onclick="return alert_js()">キャンセル</button>
          @php
        }
        @endphp

        @php
      }else{
        echo 'キャンセル不可';
      }
      @endphp
    </td>
  </form>
</tr>
@endforeach
</table>
<h6 class="link">{{ $results->links() }}</h6>


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

@endsection
