  @extends('layouts.comp_base')
  @section('title','キャンセル完了')
  @section('heading','キャンセル完了')

  @section('msg')
  キャンセルが完了しました</p>
  @endsection

  @section('link')
  <a href="{{ url('/stylist/stylist_home')}}" class="comp_a">ホームへ戻る</a>
  <a href="{{ url('/stylist/reservation_history')}}" class="comp_a">予約履歴一覧</a>
  @endsection
