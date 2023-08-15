@extends('layouts.signup_base')

@section('title','新規会員登録')

@section('form')
<form method="POST" action="/top/signup_confirm" id="form" autocomplete="off">
  @csrf
  @endsection
