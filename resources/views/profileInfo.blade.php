@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('content')
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-left table-auto">
                <thead class="bg-slate-400 text-white">
                    <tr>
                        <th class="py-2 px-4 border-b">Id</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Bio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{$prof->id}}</td>
                        <td class="py-2 px-4 border-b">{{$prof->name}}</td>
                        <td class="py-2 px-4 border-b">{{$prof->email}}</td>
                        <td class="py-2 px-4 border-b text-wrap max-w-[500px]">{{$prof->bio}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
