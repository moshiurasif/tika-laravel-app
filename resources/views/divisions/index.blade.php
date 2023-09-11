<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Division') }}
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
                       
                        <th class="border-l border-t px-2 py-1 text-center">Actions</th>
                    </tr>
                   @foreach ($divisions as $division)
                   <tr>
                    <td class="border-l border-t px-2 py-1 text-left px-4">
                        @if ($division->enabled == 0) <del>@endif
                            {{$division->name}}
                        
                        @if ($division->enabled == 0) </del>@endif
                        
                        </td>
                   
                    <td class="border-l border-t px-2 py-1 text-center">
                        
                            <a href="{{route('divisions.edit', $division->id)}}">Edit</a>
                            {{-- <a href="{{ route('divisions.edit', $division->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Edit
                            </a> --}}
                            
                        
                        
                        <form action="{{route('divisions-enable-disable', $division->id)}}" method="POST"> @csrf
                            <input type="submit" value="{{$division->enabled == 0 ? 'Restore': 'Archive'}}">
                        </form>
                    </td>
                </tr>    
                   @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
