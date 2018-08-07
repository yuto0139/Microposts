@extends('layouts.app')

@section('content')

<div class="text-center">

@include('picture_update.picture') <br>


<h5>ユーザー名</h5>

<div class="">{{ $user->name }}</div><br>


<h5>メールアドレス</h5>

{{ $user->email }}

</div>

@endsection