@props(['highlit'])

<nav class="flex justify-center align-center gap-11 text-lg text-slate-800 text-bold 
   p-6
">
    <a href="{{route("home.index")}}" class=" hover:text-blue-700">Home</a>
    <a href="{{route("profiles.index")}}" class=" hover:text-blue-700">Profiles</a>
    <a href="" class=" hover:text-blue-700">Add Profile</a>
</nav>