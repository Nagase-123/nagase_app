  @extends('layouts.comp_base')
  @section('title','コメント変更完了')
  @section('heading','コメント変更完了')

  @section('msg')
  コメント変更が完了しました<br>
  予約詳細は予約履歴からご確認ください</p>
  @endsection

  @section('link')
  <a href="{{url('/user_function/user_home')}}" class="comp_a">ホームへ戻る</a>
  <a href="{{url('/user_function/reservation_history')}}" class="comp_a">予約履歴一覧</a>
  @endsection
