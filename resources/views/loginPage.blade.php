@extends('layouts.master')
@section('title')
    Login Page
@endsection
@section('content')
<div class="">
    <form action="{{route('login.login')}}" method="POST">
        @csrf
        <label for="email">Email: </label>
        <input type="email" name="email" id=""> <br>
        <label for="password">Password: </label>
        <input type="password" name="password"><br>
        <button type="submit">Login</button>
    </form>
</div>
@endsection