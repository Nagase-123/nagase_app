  @extends('layouts.comp_base')
  @section('title','返信完了')
  @section('heading','返信完了')

  @section('msg')
  返信が完了しました
  @endsection

  @section('link')
  <a href="{{ url('/admin/admin_home')}}" class="comp_a">ホームへ戻る</a>
  @endsection
