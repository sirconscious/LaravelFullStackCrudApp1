@props(['profile'])
<div  class="border border-1 border-black overflow-hidden rounded-lg p-2">
    <h1>Name : {{$profile->name}}</h1>
    <p>Email : {{$profile->email}}</p>
    <p>Bio :  {{Str::limit($profile->bio,10)}}</p>
</div>