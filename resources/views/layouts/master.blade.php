<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class=" bg-gray-200 ">
    <x-nav-bar />
    {{-- Title goes here --}}
  <h1 class="flex justify-center  text-2xl text-bold text-pretty">
      {{-- @yield('title')       --}}
</h1>   
    {{-- Content goes here --}}
    <div class="flex justify-center items-center text-3xl w-full  ">
        @yield('content')
    </div>
</body>
</html>