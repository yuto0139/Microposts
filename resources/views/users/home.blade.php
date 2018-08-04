@extends('layouts.app')

@section('content')

<div class="text-center">

@include('picture_update.picture')

<p>ユーザー名</p>

<div class="">{{ $user->name }}</div>

<p>メールアドレス</p>

{{ $user->email }}

</div>

@endsection