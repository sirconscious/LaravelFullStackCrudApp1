@extends('layouts.master')
@section('title')
    Home Page
@endsection
@section('content')
<div class="">
    Welecom to my first laravel crud app 
    @auth
        {{auth()->user()->name}}
    @endauth
</div>
@endsection