@extends('layouts.home_base')

@section('link')
<a class="btn btn-primary" href="{{url('/top/faq')}}">よくある質問</a>
<a class="btn btn-primary text" href="{{ url('/user/reservation_history')}}">予約履歴
  <span class="fukidashi les_fukidashi_u">予約履歴確認、キャンセル、コメント内容の変更ができます</span></a>
  <a class="btn btn-primary text" href="{{ url('/user/user_profile_edit')}}">会員情報
    <span class="fukidashi les_fukidashi_u">会員情報の修正ができます</span></a>
    <a class="btn btn-primary" href="{{ url('/login_logout/logout_comp')}}">ログアウト</a>
    @endsection

    @section('contents')
    <div class="container position-relative">
      <div class="row justify-content-center">


        <div class="col-xl-6">
          <div class="text-center text-white">

            <form action="/user/reservation" method="post">
              @csrf
              <input type="hidden" name="user_id" value="{{ $u_id }}">

              <h1 class="mb-5 heading-msg text">美容師を指名する</h1>
              <table class="tb01">
                <tr class="head">
                  <th></th>
                  <th>美容師名</th>
                  <th>得意スタイル</th>
                  <th>プロフィール</th>
                </tr>

                <tr>
                  @php
                  foreach($stylists as $stylist){
                    if($stylist -> hairstylist_flg == 1){
                      @endphp
                      <td>
                        <input type="radio" name="stylist" class="stylist_radio" value="{{ $stylist->hairstylist_id }}" required>
                      </td>
                      <td data-label="美容師名">{{$stylist->hairstylist_name}}</td>
                      <td data-label="得意スタイル">{{$stylist->hairstylist_advantage}}</td>
                      <td data-label="プロフィール">{{$stylist->hairstylist_profile}}</td>
                    </tr>
                    @php
                  }
                }
                @endphp
              </table>

              <button type="submit" class="btn btn-primary" href="{{ url('/user/reservation') }}">予約画面へ</button>

            </form>

          </div>
        </div>
      </div>
    </div>

    @endsection
