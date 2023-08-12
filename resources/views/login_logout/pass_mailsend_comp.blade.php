@extends('layouts.comp_base')
@section('title','メール送信完了')

@section('msg1')
パスワード再発行メールを送信いたしました。<br>
メールが届かない場合は、メールアドレスかお名前が間違っているか、
<br>会員登録がありません。<br>
お困りの場合は問い合わせフォームよりお問い合わせください。</p>
@endsection

@section('link1')
<p class="a-link-style">
<a href="{{url('/contact/contact')}}">お問い合わせ</a><br>
</p>
<p class="a-link-style">
<a href="{{url('/login_logout/login')}}">ログイン画面へ戻る</a><br>
</p>
<p class="a-link-style">
<a href="{{url('/login_logout/stylist_login')}}">美容師ログイン画面へ戻る</a>
</p>
@endsection
