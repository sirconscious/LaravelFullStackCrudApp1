@props(['publication'])

<div>
    <div class="bg-white rounded-lg shadow-md p-6">
       
        <img src="{{asset("storage/".$publication->profile?->image)}}" 
        class="mx-auto rounded-full w-12 h-12"
        alt=""> 
        <p>Name : {{$publication->profile?->name}}</p>
        <p>{{$publication->created_at->format("d-m-Y")}}</p>
        <h2 class="text-2xl font-bold">{{$publication->title}}</h2>
        <p class="text-gray-600">{{$publication->body}}</p>
        <img src="{{asset("storage/".$publication->image)}}" height=300 width=400 alt="" class="">
        {{-- @auth
        @if (Auth::id() == $publication->profiles_id)
        <a href="{{route("publications.edit",$publication->id)}}">Edit Publication</a>
        <form action="{{route("publications.destroy",$publication->id)}}" method="POST"> @csrf @method("DELETE")
            <button type="submit" onclick="return confirm('Are you sure you want to delete this publication?')">Delete</button}}"></form>
                @endif

        @endauth  --}}
        @can('update', $publication)
        <a href="{{route("publications.edit",$publication->id)}}">Edit Publication</a>
        @endcan
        @can('delete', $publication)
        <form action="{{route("publications.destroy",$publication->id)}}" method="POST"> @csrf @method("DELETE")
            <button type="submit" onclick="return confirm('Are you sure you want to delete this publication?')">Delete</button}}"></form>

        @endcan
</div> 

