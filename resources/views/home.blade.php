@extends('layouts.app')
@section('title', 'トップページ（ログイン状態時）')
@section('content')
{{-- 元のテンプレにはあったので一応入れておく --}}
<div class="blue-board ">
    {{-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif --}}

    <div class="header">
    <div class="simple-wrap_sb">
        <p class="man-name">{{ Auth::user()->name_sei }}{{ Auth::user()->name_mei }}様</p>
        <a class="btn-simple" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    </div>
    <div class="man-body">

    </div>
</div>
@endsection

