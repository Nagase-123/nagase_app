  @extends('layouts.comp_base')
  @section('title','')


  @section('msg')
  @php
  if($msg == '日時をご確認の上、再度ご予約下さい。'){
  @endphp
  <h4 class="comp_h4">ご予約ができません</h4>
  @php
}else{
  @endphp
  <h4 class="comp_h4">予約完了</h4>
@php
}
@endphp

  {{ $anser }}
  <br>
  {{ $msg }}
  @endsection

  @section('link')
  <a href="{{url('/user_function/user_home')}}" class="comp_a">ホームへ戻る</a>
  <a href="{{url('/user_function/reservation_history')}}" class="comp_a">予約履歴一覧</a>
  @endsection
