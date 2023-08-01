@extends('layouts.list_base')

@section('contents')
<h1 class="mb-5 heading-msg">お問合せ一覧</h1>
<table class="tb01">
  <tr class="head">
    <th>id</th>
    <th>問い合わせ日時</th>
    <th>名前</th>
    <th>フリガナ</th>
    <th class="contact_w_style">メール</th>
    <th>電話番号</th>
    <th class="contact_msg_style">問い合わせ内容</th>
    <th>返信状況</th>
    <th></th>

    @foreach($contacts as $contact)
    <form method="post" action="/admin/contact_detail">
      @csrf

      <tr>
        <td data-label="問合せID">{{$contact->contact_id}}</td>
        <td data-label="問い合わせ日時">{{date('Y-m-d H:i', strtotime($contact->created_at))}}</td>
        <td data-label="名前">{{$contact->user_name}}様</td>
        <td data-label="フリガナ">{{$contact->user_kana}}サマ</td>
        <td data-label="メールアドレス">{{$contact->user_mail}}</td>
        <td data-label="電話番号">{{$contact->user_tel}}</td>
        <td data-label="問い合わせ内容">{{$contact->contact_text}}</td>
        @if($contact->contact_flg == '1')
        <td data-label="返信状況">返信完了</span></td>
        @else
        <td data-label="返信状況"><span class="error_msg">※未返信※</td>
          @endif
          <td data-label=""><button type="submit" name="user_sb" class="list_bt">返信</td>
            <input type="hidden" name="contact_id" value="{{$contact->contact_id}}">
          </tr>
        </form>

        @endforeach
      </table>
      <h6 class="link">{{ $contacts->links() }}</h6>
      @endsection
