@extends('layouts.comp_base')
@section('title','お問い合わせ完了')

@section('msg1')
お問い合わせ頂きありがとうございます。<br>
送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br>
@endsection

@section('link1')
<a class="" href="{{ url('/') }}">トップへ戻る</a>
@endsection

@section('link2')
@endsection
