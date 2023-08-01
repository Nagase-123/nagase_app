@extends('layouts.comp_base')

@section('title')
{{$comp_title}}
@endsection

@section('msg1')
{{$comp_msg1}}
@endsection

@section('msg2')
{{$comp_msg2}}
@endsection

@section('link1')
<div class="col-auto">
  <form action ="/admin/admin_home" method="get">
    @csrf
    <button type="submit" class="a-btn" value="">ホームへ戻る</button>
  </form>
  @endsection

  @section('link2')
  @php
  switch($comp_title){
    case "会員情報変更完了":
    case "会員情報 変更失敗":
    @endphp
    <form action ="/user/user_profile_edit" method="get">
      @csrf
      <input type="hidden" name="u_id" value="{{$u_id}}">
      <button type="submit" class="a-btn" value="">{{$link_name}}</button>
    </form>
    @php
    break;

    case "プロフィール編集完了":
    case "プロフィール 編集失敗":
    @endphp
    <form action ="/stylist/profile_edit" method="get">
      @csrf
      <input type="hidden" name="stylist_id" value="{{$stylist_id}}">
      <button type="submit" class="a-btn" value="">{{$link_name}}</button>
    </form>
    @php
    break;

    case "スケジュール削除完了":
    case "スケジュール削除失敗":
    @endphp
    <form action ="/stylist/schedule_list" method="get">
      @csrf
      <input type="hidden" name="stylist_id" value="{{$stylist_id}}">
      <button type="submit" class="a-btn" value="">{{$link_name}}</button>
    </form>
    @php
    break;

    case "キャンセル完了":
    @endphp
    <form action ="/user/reservation_history" method="get">
      @csrf
      <input type="hidden" name="u_id" value="{{$u_id}}">
      <button type="submit" class="a-btn" value="">{{$link_name}}</button>
    </form>
    @php
    break;

    default:
    @endphp
    <form>
      @csrf
      <button type="submit" class="a-btn" value=""><a href="{{url($url)}}">{{$link_name}}</a></button>
    </form>

    @php
    break;
  }
  @endphp
  @endsection
