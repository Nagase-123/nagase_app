@extends('layouts.comp_base')
@section('title','パスワード再設定完了')

@section('msg1')
パスワードの再設定が完了いたしました。
@endsection

@section('link1')
<p class="a-link-style">
<a href="{{url('/login_logout/login')}}">ログイン画面へ戻る</a>
</p>
<p class="a-link-style">
<a href="{{url('/login_logout/stylist_login')}}">美容師ログイン画面へ戻る</a>
</p>
@endsection
