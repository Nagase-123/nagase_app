@extends('layouts.list_base')

@section('contents')
<h1 class="mb-5 heading-msg">予約履歴</h1>
<p>コメント内容を変更する場合は変更ボタンを押してください</p>
<p>予約をキャンセルする場合はキャンセルボタンを押してください</p>
<table class="tb01">
  <tr class="head">
    <th>ID</th>
    <th>日時</th>
    <th>料金</th>
    <th>美容師名</th>
    <th>静か</th>
    <th>話す</th>
    <th>ヘアセット</th>
    <th>シャンプー</th>
    <th>お子様カット</th>
    <th>コメント</th>
    <th>ステータス</th>
  </tr>

  <tr>
    @foreach($results as $result)
    <td data-label="予約番号">{{$result->reservation_id}}</td>
    <td data-label="日時">{{date('m/d', strtotime($result->reservation_date))}}<br>
      {{date('H:i', strtotime($result->reservation_time))}}</td>
      <td data-label="料金">{{$result->reservation_fee}}</td>

      @php
      foreach($stylists as $stylist){
        if($stylist->hairstylist_id == $result->hairstylist_id){
          @endphp
          <td data-label="美容師名">{{$stylist->hairstylist_name}}</td>
          @php
        }
      }
      @endphp

      @if($result->reservation_request1 =='なし')
      <td data-label="静か">×</td>
      @else
      <td data-label="静か">〇</td>
      @endif

      @if($result->reservation_request2 =='なし')
      <td data-label="話す">×</td>
      @else
      <td data-label="話す">〇</td>
      @endif

      @if($result->reservation_request3 =='なし')
      <td data-label="ヘアセット">×</td>
      @else
      <td data-label="ヘアセット">〇</td>
      @endif


      @if($result->reservation_request4 =='なし')
      <td data-label="シャンプー">×</td>
      @else
      <td data-label="シャンプー">〇</td>
      @endif

      @if($result->reservation_request5 =='なし')
      <td data-label="お子様カット">×</td>
      @else
      <td data-label="お子様カット">〇</td>
      @endif

      <td data-label="コメント">
      <textarea class="list-text" readonly rows="2">{{ $result->reservation_comment }}</textarea>
{{--      </td>
      <td data-label="コメント変更">
        <form action ="/user/comment_change" method="post">
          @csrf
--}}
          @php
          $date = strtotime($result->reservation_date);
          $now = strtotime(date('Y-m-d'));
          if($now < $date){
            if($result->reservation_flg =='0'){
              @endphp

              <!--                  <input type="submit" class="list_bt" value="コメント" id="edit_bt"> -->
              <form action ="/user/comment_change" method="post">
                @csrf
              <input type="hidden" name="res_id" value="{{$result->reservation_id}}">
              <input type="hidden" name="u_id" value="{{$u_id}}">
              <button type="submit" class="td-btn">変更</button>
              @php
            }else{
              echo '編集不可';
            }
          }else{
            echo '編集不可';
          }
          @endphp
        </td>
      </form>

      <td data-label="ステータス">
        <form action ="./user_comp" method="post">
          @csrf
          <input type="hidden" name="comp_kinds" value="reservation_cancel_user_comp">
          <input type="hidden" name="u_id" value="{{$u_id}}">

          @php
          $date = strtotime($result->reservation_date);
          $now = strtotime(date('Y-m-d'));
          if($now < $date){
            if($result->reservation_flg =='0'){
              @endphp

              <input type="hidden" name="res_id" value="{{$result->reservation_id}}">
              <h6>予約中</h6>
              <button type="submit" class="td-btn" name="delete_id" onclick="return alert_js()" value="">キャンセル</button>
              @php
            }else{
              @endphp

              <p class="msg_cxl">キャンセル済み</p>
              @php
            }
          }else{
            echo '施術済み';
          }
          @endphp
        </td>
      </form>
    </tr>
    @endforeach

  </table>

  <h6 class="link">{{ $results->links() }}</h6>
  @endsection
