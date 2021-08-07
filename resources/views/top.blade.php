@extends('components.layout')
@section('title', 'トップページ（ログアウト状態時）')
@section('content')
<div class="blue-board ">
    <div class="header">
      <div class="simple-wrap">
        <a href="{{route('register.form')}}" class="btn-simple">新規会員登録</a>
        <a href="{{url('/login')}}" class="btn-simple">ログイン</a>
      </div>
    </div>
    <div class="man-body">

    </div>
</div>
@endsection
