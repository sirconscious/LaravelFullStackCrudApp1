@props(['highlit'])

<nav class="flex justify-center align-center gap-11 text-lg text-slate-800 text-bold 
   p-6
">
    <a href="{{route("home.index")}}" class=" hover:text-blue-700">Home</a>
    <a href="{{route("profiles.index")}}" class=" hover:text-blue-700">Profiles</a>
    <a href="{{route('create.index')}}" class=" hover:text-blue-700">Add Profile</a>
    <a href="{{route("publications.index")}}" class=" hover:text-blue-700">Publications</a>
    @auth
    <a href="{{route('login.logout')}}">Logout</a>
    <a href="{{route("publications.create")}}" class=" hover:text-blue-700">Ajouter une publication</a>

    @endauth
    @guest
    <a href="{{route('login')}}">Login</a>

    @endguest
</nav>