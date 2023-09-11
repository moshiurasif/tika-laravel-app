<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Vaccine Edit') }}
            </h2>
            <div class="min-w-max">
                <a href="{{route('vaccines.index')}}" class="p-2 bg-gray-800 text-white">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form action="{{route('vaccines.update', $vaccine->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <p class="mb-6">
                        <label for="name" class="w-full text-gray-600 text-sm uppercase">Name</label>
                        <input type="text" name="name" id="name" class="w-full border p-3" value="{{$vaccine->name}}">

                        @error('name')
                            <span class="block text-red-600">{{$message}}</span>
                        @enderror
                    </p>
                    
                    <button type="submit" class="py-3 px-6 bg-gray-800 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
