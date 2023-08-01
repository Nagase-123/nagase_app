
  @extends('layouts.comp_base')
  @section('title','会員情報変更完了')
  @section('heading','会員情報変更完了')

  @section('msg')
  会員情報の変更が完了しました
  @endsection

  @section('link')
  <a href="{{url('/admin/admin_home')}}" class="comp_a">ホームへ戻る</a>
  @endsection
