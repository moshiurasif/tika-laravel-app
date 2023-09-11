<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Category Edit') }}
            </h2>
            <div class="min-w-max">
                <a href="{{route('categories.index')}}" class="p-2 bg-gray-800 text-white">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form action="{{route('categories.update', $category->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <p class="mb-6">
                        <label for="name" class="w-full text-gray-600 text-sm uppercase">Name</label>
                        <input type="text" name="name" id="name" class="w-full border p-3" value="{{$category->name}}">

                        @error('name')
                            <span class="block text-red-600">{{$message}}</span>
                        @enderror
                    </p>
                    <p class="mb-6">
                        <label for="min_age" class="w-full text-gray-600 text-sm uppercase">Minimum Age</label>
                        <input type="number" name="min_age" id="min_age" class="w-full border p-3" value="{{$category->min_age}}">
                        @error('min_age')
                            <span class="block text-red-600">{{$message}}</span>
                        @enderror
                    </p>
                    <button type="submit" class="py-3 px-6 bg-gray-800 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
