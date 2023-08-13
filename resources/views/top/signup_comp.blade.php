@extends('layouts.comp_base')

@section('title','会員登録完了')
@php
if($anser == '既に会員登録があります'){
  @endphp
  @section('heading','会員登録失敗')
  @php
}else{
  @endphp
  @section('heading','会員登録完了')
  @php
}
@endphp

@section('msg1')
{{$anser}}<br>
会員ページにログインの上ご利用ください</p>
@endsection

@section('link1')
<a href="{{ url('/login_logout/login')}}">ログインページ</a>
@endsection
