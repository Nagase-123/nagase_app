@extends('layouts.multi_form_base')

@section('title')
顧客情報・メモ編集
@endsection

@section('msg1')
顧客メモの更新をご希望の場合は、
ご入力の上送信ボタンを押してください
@endsection


@section('form')
<form method="post" action="/stylist/stylist_comp">
  @csrf
  <input type="hidden" name="comp_kinds" value="user_memo_comp">

  @foreach($users as $user)

  @section('content')
  <div class="Form-Item">
    <p class="Form-Item-Label">会員ID<p>
      <p class="Form-Item-Label"> {{$user->user_id}}</p>
      <input type="hidden" name="user_id" value="{{$user->user_id}}">
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">氏名</p>
      <p class="Form-Item-Label">{{$user->user_name}} 様</p>
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">フリガナ</p>
      <p class="Form-Item-Label">{{$user->user_kana}} サマ</p>
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">電話番号</p>
      <p class="Form-Item-Label">{{$user->user_tel}}</p>
    </div>

    <div class="Form-Item">
      <p class="Form-Item-Label">住所</p>
      <p class="Form-Item-Label" id="address" value="{{$user->user_address}}">{{$user->user_address}}</p>
    </div>

    <div class="Form-Item">
      @if ($errors->has('textarea_box'))
      <span class = "error_msg">{{$errors->first('textarea_box')}}</span>
      @endif
      <p class="Form-Item-Label">顧客メモ</p>
      <textarea name="memo" class="Form-Item-Textarea" id="textarea_box" row="3" maxlength="300">{{$user->user_memo}}</textarea>
    </div>

    <div class="center">
      <button type ="button" class="Form-Btn" id="return" onclick=history.back()>戻 る</button>
      <button type="submit" class="Form-Btn">送 信</button>
    </div>

    @endsection

    @endforeach
    <br>

    <!--もともとのコード　herokuでエラーなるので一旦httpを省略

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAiSLC1zxJfZHwn4IcqqOvzOpas1YFET_0" type="text/javascript" charset="UTF-8"></script>
    API側の設定でこのローカル環境を設定していたので、このアドレスに変更した
    https://chouette-3d078bccac7a.herokuapp.com/stylist/user_memo-->

    <script src="//maps.google.com/maps/api/js?key=AIzaSyAiSLC1zxJfZHwn4IcqqOvzOpas1YFET_0" type="text/javascript" charset="UTF-8"></script>
    <script type="text/javascript">
    //<![CDATA[
    var map;
    var geo;

    // 初期化。bodyのonloadでinit()を指定することで呼び出し
    window.onload = function init() {
      var user = document.getElementById('address'); //住所を指定
      var useraddress = user.textContent;
      console.log(useraddress);
      // Google Mapで利用する初期設定用の変数
      var latlng = new google.maps.LatLng(39, 138);
      var opts = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latlng
      };

      // getElementById("map")の"map"は、body内の<div id="map">より
      map = new google.maps.Map(document.getElementById("map"), opts);

      // ジオコードリクエストを送信するGeocoderの作成
      geo = new google.maps.Geocoder();

      // GeocoderRequest
      var req = {
        address: useraddress,
      };
      geo.geocode(req, geoResultCallback);
    }

    function geoResultCallback(result, status) {
      if (status != google.maps.GeocoderStatus.OK) {
        alert('住所が存在しません');
        return;
      }

      var latlng = result[0].geometry.location;

      map.setCenter(latlng);

      new google.maps.Marker({position:latlng, map:map});
    }

    //]]>
    </script>

    @endsection
