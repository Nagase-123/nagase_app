
@extends('layouts.comp_base')
@section('title','会員削除')
@section('heading','会員削除')
@section('msg')

{{$anser}}</p>
@endsection
@section('link')
<a href="{{ url('/admin/admin_home')}}" class="comp_a">ホームへ戻る</a>
<a href="{{ url('/admin/member_list')}}" class="comp_a">会員一覧へ</a>
@endsection
