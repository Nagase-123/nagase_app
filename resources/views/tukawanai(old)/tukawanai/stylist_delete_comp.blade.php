  @extends('layouts.comp_base')
  @section('title','会員削除完了')
  @section('heading','会員削除完了')

  @section('msg')
  美容師会員削除が完了しました</p>
  @endsection

  @section('link')
  <a href="{{ url('/admin/admin_home')}}" class="comp_a">ホームへ戻る</a>
  <a href="{{ url('/admin/stylist_list')}}" class="comp_a">美容師一覧へ</a>
  @endsection
