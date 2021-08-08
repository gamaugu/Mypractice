@extends('components.layout')
@section('title', 'ログイン')
@section('content')

<form method="post" action="{{route('login.auth')}}" class="block-b">
	@csrf
<h1>ログイン</h1>
<div class="element_wrap">
    <label for="email">メールアドレス(ID)</label>
    <div class="content-wrap">
        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="element_wrap">
    <label for="password">パスワード</label>
    <div class="content-wrap">
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

@if(count($errors) >0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach

</div>
@endif
<p class="forget"><a href="">パスワードを忘れた方はこちら</a></p>

<div class="btn-wrap">
    <input type="submit" class="btn" value="ログイン" />
    <a href="/" class="btn btn-back" >トップに戻る</a>
</div>
</form>

@endsection
