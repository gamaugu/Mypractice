@extends('components.layout')
@section('title', 'トップページ（ログイン状態時）')
@section('content')
@if( Auth::check() )
<div class="blue-board ">
    <div class="header">
      <div class="simple-wrap">
        <div class="user_id">
            </div>

            @auth
            <p>ログインユーザーに表示する。</p>
            <p>様</p>
            @endauth

            @guest
            <p>ログインしていないユーザーに表示する。</p>
            @endguest
        <a href="#" class="btn-simple"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </div>
    <div class="man-body">
    </div>
</div>
        @endif
@endsection
