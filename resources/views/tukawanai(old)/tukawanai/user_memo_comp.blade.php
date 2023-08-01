  @extends('layouts.comp_base')
  @section('title','更新完了')
  @section('heading','更新完了')

  @section('msg')
  顧客メモの更新が完了しました</p>
  @endsection

  @section('link')
  <a href="{{ url('/stylist/stylist_home')}}" class="comp_a">ホームへ戻る</a>
  @endsection
