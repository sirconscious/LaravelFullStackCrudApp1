@extends('layouts.master')
@section('title')
profiles page
@endsection 
@section('content')
<div class="">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 gap-2">
        @foreach ($profiles as $profile)
            <x-profile-card :profile="$profile" />
        @endforeach
    </div>
    <div class="pagination">
        {{$profiles->links()}}
    </div>
    
</div>
    

@endsection 