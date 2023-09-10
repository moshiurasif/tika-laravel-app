<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('District') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full border-r border-b">
                    <tr>
                        <th class="border-l border-t px-2 py-1 text-left px-4">Name</th>
                       
                        <th class="border-l border-t px-2 py-1 text-center">Actions</th>
                    </tr>
                   @foreach ($districts as $district)
                   <tr>
                    <td class="border-l border-t px-2 py-1 text-left px-4">{{$district->name}}</td>
                   
                    <td class="border-l border-t px-2 py-1 text-center">
                        <a href="{{route('divisions.edit', $district->id)}}">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>    
                   @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
