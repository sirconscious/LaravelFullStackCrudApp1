@props(['profile'])
<div  class="border border-1 border-black overflow-hidden rounded-lg p-2">
    <img src="{{$profile->image}}" alt="im">
    <h1>Name : {{$profile->name}}</h1>
    <p>Email : {{$profile->email}}</p>
    <p>Bio :  {{Str::limit($profile->bio,10)}}</p>
    <a href="{{route("profile.index",$profile->id)}}" class=" text-blue-500">See more....</a>
    <form action="{{route("profile.delete",$profile)}}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit">Delete</button>
    </form>
    <form action="{{route("profile.edit" , $profile->id)}}" method="GET">
        @csrf
        <button type="submit">Modifier</button>
    </form>
</div>