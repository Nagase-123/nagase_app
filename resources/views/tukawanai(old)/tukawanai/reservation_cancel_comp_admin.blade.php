  @extends('layouts.comp_base')
  @section('title','キャンセル完了')
  @section('heading','キャンセル完了')

  @section('msg')
  キャンセルが完了しました</p>
  @endsection

  @section('link')
  <a href="{{ url('/admin/admin_home')}}" class="comp_a">ホームへ戻る</a>
  @endsection
