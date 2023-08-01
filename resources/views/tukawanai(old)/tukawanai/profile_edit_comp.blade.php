  @extends('layouts.comp_base')
  @section('title','プロフィール編集完了')
  @section('heading','プロフィール編集完了')

  @section('msg')
  プロフィール編集が完了しました</p>
  @endsection

  @section('link')
  <a href="{{ url('/stylist/stylist_home')}}" class="comp_a">ホームへ戻る</a>
  @endsection
