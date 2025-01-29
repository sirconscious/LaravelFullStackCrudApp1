@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <img src="{{asset("storage/".$prof->image)}}" width="300" class="mx-auto rounded-full" alt="im">
        <p class="text-2xl font-bold text-center">{{$prof->name}}</p>
        <p class="text-gray-600 text-center">{{$prof->email}}</p>
        <p class="text-gray-600 text-center">{{$prof->created_at->format("d-m-Y")}}</p>
        <p class="text-gray-600 text-center">{{$prof->bio}}</p>    
    </div>
    {{-- {{dd($prof->publications)}} --}}
    @foreach ($prof->publications as $publication )
        <x-publication-card :publication="$publication" class="flex-none" />
    @endforeach
    
@endsection