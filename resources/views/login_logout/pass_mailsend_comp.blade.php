@extends('layouts.comp_base')
@section('title','メール送信完了')

@section('msg1')
パスワード再発行メールを送信いたしました。<br>
メールが届かない場合は、メールアドレスかお名前が間違っているか、
<br>会員登録がありません。<br>
お困りの場合は問い合わせフォームよりお問い合わせください。</p>
@endsection

@section('link1')
<a href="{{url('/contact')}}">お問い合わせ</a><br>
<a href="{{url('/login_logout/login')}}">ログイン画面へ戻る</a>
@endsection
