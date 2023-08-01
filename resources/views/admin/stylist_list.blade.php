@extends('layouts.list_base')

@section('contents')
<h1 class="mb-5 heading-msg">美容師一覧</h1>
<table class="tb01">
  <tr class="head">
    <th>美容師<br>id</th>
    <th>美容師名</th>
    <th>スケジュール一覧</th>
    <th>予約履歴</th>
    <th>プロフィール修正</th>
    <th>アカウント削除</th>
  </tr>

  @php
  foreach($stylists as $stylist){
    @endphp
    <tr>
      <td data-label="美容師ID">{{$stylist->hairstylist_id}}</td>
      <td data-label="美容師名">{{$stylist->hairstylist_name}}</td>
      <form action="/stylist/schedule_list" method="get">
        @csrf
        <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
        <td class="td_bt"><button type="submit" class="td-btn">スケジュール</button></td>
      </form>

      <form action="/stylist/reservation_history" method="get">
        @csrf
        <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
        <td class="td_bt"><button type="submit" class="td-btn">予約履歴</button></td>
      </form>

      <form action="/stylist/profile_edit" method="get">
        @csrf
        <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
        <td class="td_bt"><button type="submit" class="td-btn">プロフィール修正</button></td>
      </form>

      <form action="/admin/admin_comp" method="post">
        @csrf
        <input type="hidden" name="stylist_id" value="{{$stylist->hairstylist_id}}">
        <input type="hidden" name="comp_kinds" value="stylist_delete_comp">
        <td class="td_bt"><button type="submit" class="td-btn" onclick="return alert_js()">会員削除</button></td>
      </form>
    </tr>
    @php
  }
  @endphp
</table>
<h6 class="link">{{ $stylists->links() }}</h6>

@endsection
