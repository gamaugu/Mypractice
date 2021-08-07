@extends('components.layout')
@section('title', '会員登情報確認フォーム')
@section('content')
<form method="post" action="" class="block-b">
	@csrf
  <h1>会員登情報確認フォーム</h1>


  <div class="element_wrap_str">
    <label>氏名</label>
    <p>{{ Session::get('name_sei') }}{{ Session::get('name_mei') }}</p>
  </div>
  <div class="element_wrap_str">
    <label>ニックネーム</label>
    <p>{{ Session::get('nickname') }}</p>
  </div>
  <div class="element_wrap_str">
    <label>性別</label>
    <p>@if(Session::get('nickname') == "1")男性 @else 女性@endif</p>
  </div>
  <div class="element_wrap_str">
    <label>パスワード</label>
    <p>セキュリティのため非表示</p>
  </div>  <div class="element_wrap_str">
    <label>メールアドレス</label>
    <p>{{ Session::get('email') }}</p>
  </div>
  <div class="btn-wrap">
		<input type="submit" class="btn" value="登録完了" />
	<a class="btn btn-back" href="{{ route('register.form') }}" >前に戻る</a>
  </div>
</form>
@endsection
