@extends('layouts.list_base')

@section('contents')
<h1 class="mb-5 heading-msg">会員一覧</h1>
<table class="tb01">
  <tr class="head">
    <th>会員ID</th>
    <th>名前</th>
    <th>メール</th>
    <th>電話番号</th>
    <th>住所</th>
    <th>顧客メモ</th>
    <th>予約履歴</th>
    <th>会員情報修正</th>
    <th>会員削除</th>
  </tr>
  @foreach($users as $user)
  <tr>
    <td data-label="会員ID">{{$user->user_id}}</td>
    <td data-label="名前">{{$user->user_name}}</td>
    <td data-label="メール">{{$user->user_mail}}</td>
    <td data-label="電話">{{$user->user_tel}}</td>
    <td data-label="住所">{{$user->user_address}}</td>
    <td data-label="顧客メモ">
      <form method="post" action="/stylist/user_memo">
        @csrf
        <input type="hidden" name="user" value="{{$user->user_id}}">
        <button type="submit" name="user_sb" class="td-btn">顧客メモ</button>
        </form>
    </td>

    <td data-label="予約履歴">
      <form action ="/user/reservation_history" method="get">
        @csrf
        <input type="hidden" name="u_id" value="{{$user->user_id}}">
        <button type="submit" class="td-btn" name="history_bt" value="">履歴</button>
      </form>
    </td>

    <td data-label="会員情報修正">
      <form action ="/user/user_profile_edit" method="get">
        @csrf
        <input type="hidden" name="u_id" value="{{$user->user_id}}">
        <button type="submit" class="td-btn" name="del_bt" value="">修正</button>
      </form>
    </td>

    <td data-label="会員削除">
      <form action ="/admin/admin_comp" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <input type="hidden" name="comp_kinds" value="member_delete_comp">
        <button type="submit" class="td-btn" name="del_bt" onclick="return alert_js()" value="">削除</button>
      </form>
    </td>

  </tr>
  @endforeach
</table>
<h6 class="link">{{ $users->links() }}</h6>
@endsection
