<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @if (Session::get("message"))
                
                <p id="message-container" class="px-4 py-4 bg-green-600 mb-4 font-medium text-white">
                    {{Session::get("message")}}
                </p>  
                @endif
                <table class="w-full border-r border-b">
                    <tr>
                        <th class="border-l border-t px-2 py-1 text-left px-4">Name</th>
                        <th class="border-l border-t px-2 py-1 text-center">Phone No.</th>
                        <th class="border-l border-t px-2 py-1 text-center">National Id</th>
                        <th class="border-l border-t px-2 py-1 text-center">Center Id</th>
                        <th class="border-l border-t px-2 py-1 text-center">Date of birth</th>
                        <th class="border-l border-t px-2 py-1 text-center">Actions</th>
                    </tr>
                   @foreach ($registeredUser as $user)
                   <tr>
                    <td class="border-l border-t px-2 py-1 text-left px-4">{{$user->name}}</td>
                    <td class="border-l border-t px-2 py-1 text-center">{{$user->phone_no}}</td>
                    <td class="border-l border-t px-2 py-1 text-center">{{$user->id_no}}</td>
                    <td class="border-l border-t px-2 py-1 text-center">{{$user->center_id}}</td>
                    <td class="border-l border-t px-2 py-1 text-center">{{$user->dob}}</td>
                    <td class="border-l border-t px-2 py-1 text-center">
                        <a href="{{route('registration.edit', $user->id)}}">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>    
                   @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Check if the message container exists
    var messageContainer = document.getElementById('message-container');
    
    if (messageContainer) {
        // Hide the message after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            messageContainer.style.display = 'none';
        }, 3000);
    }
</script>
