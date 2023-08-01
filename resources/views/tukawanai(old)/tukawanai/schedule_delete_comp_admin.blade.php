
@extends('layouts.comp_base')
@section('title','スケジュール削除')

@section('heading')
@if($anser =='true')
削除が完了しました
@else
※削除できません
@section('msg')
予約が入っている場合はキャンセル後にスケジュール削除して下さい。
@endsection
@endif
@endsection

@section('link')
<a href="{{ url('/admin/admin_home')}}" class="comp_a">ホームへ戻る</a>
@endsection
