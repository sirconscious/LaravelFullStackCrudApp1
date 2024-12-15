@extends('layouts.master')
@section('title')
    Edit
@endsection
@section('content')
<div class="max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
    <form class="space-y-4" method="POST" enctype="multipart/form-data"  action="{{route("profile.update",$profile->id)}}">
        @method('PUT')
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input type="text" value="{{ old("name",$profile->name)}}" name="name" id="name" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        @error('name')
        <span class="text-sm text-red-600">
            {{$message}}       
     </span>
     @enderror
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" value="{{ old("email",$profile->email)}}" name="email" id="email" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        @error('email')
        <span class="text-sm text-red-600">
            {{$message}}       
     </span>
     @enderror
        <div>
            <label for="bio" class="block text-sm font-medium text-gray-700">Bio:</label>
            <input type="text" name="bio" value="{{ old("bio",$profile->bio)}}">
        </div>
        @error('bio')
        <span class="text-sm text-red-600">
            {{$message}}       
     </span>
     @enderror
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
            <input type="password"  name="password" id="password" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        @error('password')
        <span class="text-sm text-red-600">
            {{$message}}       
     </span>
     @enderror
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password:</label>
            <input type="password" name="password_confirmation" id="password" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
            <input type="file" name="image" id="image" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Submit
            </button>
        </div>
    </form>
</div>

@endsection