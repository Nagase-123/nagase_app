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
<div class="col-auto comp-box">
  <br><a href="{{url('/user/user_home')}}">ホームへ戻る</a>
  @endsection


  @section('link2')
  <a href="{{url($url)}}">{{$link_name}}</a>
  @endsection
