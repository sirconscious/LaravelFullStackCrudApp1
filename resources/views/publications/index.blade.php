@vite('resources/css/app.css')
<x-nav-bar />

<div class="flex flex-row gap-4 bg-red-300 w-full justify-center items-center">

    @if($publications->isEmpty())
        <p>No publications available.</p>
    @else
        @foreach ($publications as $publication)
            <x-publication-card :publication="$publication" class="flex-none" />
        @endforeach
    @endif

</div>

