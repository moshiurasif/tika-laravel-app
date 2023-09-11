<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (Session::get("message"))
                <p class="px-4 py-4 bg-green-600 mb-4 font-medium text-white">
                    {{Session::get("message")}}
                </p>  
                @endif
                <table class="w-full border-r border-b">
                    <tr>
                        <th class="border-l border-t px-2 py-1 text-left px-4">Name</th>
                        <th class="border-l border-t px-2 py-1 text-center">Minimum Age</th>
                        <th class="border-l border-t px-2 py-1 text-center">Actions</th>
                    </tr>
                   @foreach ($categories as $category)
                   <tr>
                    <td class="border-l border-t px-2 py-1 text-left px-4">{{$category->name}}</td>
                    <td class="border-l border-t px-2 py-1 text-center">{{$category->min_age}}</td>
                    <td class="border-l border-t px-2 py-1 text-center">
                        <a href="{{route('categories.edit', $category->id)}}">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>    
                   @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
