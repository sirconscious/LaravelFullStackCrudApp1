@props(['profile'])
<div  class="border border-1 border-black overflow-hidden rounded-lg p-2">
    <h1>Name : {{$profile->name}}</h1>
    <p>Email : {{$profile->email}}</p>
    <p>Bio :  {{Str::limit($profile->bio,10)}}</p>
    <a href="{{route("profile.index",$profile->id)}}" class=" text-blue-500">See more....</a>
    <form action="{{route("profile.delete",$profile)}}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit">Delete</button>
    </form>
</div>