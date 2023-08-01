@extends('layouts.comp_base')
@section('title','会員登録完了')
@section('heading','会員登録完了')

@section('msg')
美容師の会員登録が完了しました<br>
パスワードはリセットして
ログインいただくようご連絡ください</p>
@endsection

@section('link')
<a href="{{url('/admin/admin_home')}}">ホーム画面に戻る</a>
@endsection
