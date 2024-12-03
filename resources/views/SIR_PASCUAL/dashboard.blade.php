<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/regular.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/solid.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body class="bg-gray-50 font-sans">

    <div class="container mx-auto py-10 px-4">
        @if(session('success'))
        <x-sweetalert type="success" :message="session('success')"/>
        @endif

        @if(session('info'))
        <x-sweetalert type="info" :message="session('info')"/>
        @endif

        @if(session('error'))
        <x-sweetalert type="error" :message="session('error')"/>
        @endif

        <!-- Greeting Section -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">
                Welcome {{ Auth::user()->name }},
                @if(Auth::user()->hasRole('admin')) Admin @elseif(Auth::user()->hasRole('registrar')) Registrar
                @elseif(Auth::user()->hasRole('faculty')) Faculty @else Staff @endif
            </h1>
        </div>

        <!-- Admin Only Section -->
        @if(Auth::user()->hasRole('admin'))
        <div class="flex justify-center mb-8">
            <div x-data="{ open: false }">
                <!-- Add Event Button -->
                <button @click="open = true"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    ADD EVENT
                </button>

                <!-- Add Event Modal -->
                <div x-show="open" x-cloak
                    class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-bold text-gray-800">Add Event</h2>
                            <button @click="open = false" class="text-gray-600 hover:text-red-600">
                                &times;
                            </button>
                        </div>
                        <form action="{{ route('admin.add_event') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="event_name" class="block text-sm font-medium text-gray-700">Event Name</label>
                                <input type="text" id="event_name" name="event_name"
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="event_description"
                                    class="block text-sm font-medium text-gray-700">Event Description</label>
                                <input type="text" id="event_description" name="event_description"

                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">ID</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Event Name</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Description</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Action</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">



                    @forelse($events as $event)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $event->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $event->event_name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $event->event_description }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            <div x-data="{ open: false }">
                                <!-- Add Event Button -->
                                <button @click="open = true"
                                    class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Add Event Modal -->
                                <div x-show="open" x-cloak
                                    class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
                                    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
                                        <div class="flex justify-between items-center mb-4">
                                            <h2 class="text-lg font-bold text-gray-800">EDIT EVENT</i></h2>
                                            <button @click="open = false" class="text-gray-600 hover:text-red-600">
                                                &times;
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.update_event',$event->id) }}" method="POST">
                                            @csrf
                                            
                                            <div class="mb-4">
                                                <label for="event_name" class="block text-sm font-medium text-gray-700">Event Name</label>
                                                <input type="text" id="event_name" name="event_name" value="{{$event->event_name}}"
                                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                    required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="event_description"
                                                    class="block text-sm font-medium text-gray-700">Event Description</label>
                                                <input type="text" id="event_description" name="event_description"
                                                    value="{{$event->event_description}}"
                                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                    required>
                                            </div>
                                            <button type="submit"
                                                class="w-full bg-blue-600 text-white py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                                                EDIT EVENT
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <i class="fa-solid fa-pen-to-square"></i> --}}
                            {{-- <i class="fa-solid fa-trash"></i> --}}
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center text-gray-600">No events available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif

        <!-- Logout Button -->
        <div class="text-center mt-10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg shadow hover:bg-red-600 transition duration-200">
                    LOGOUT
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3" defer></script>
</body>
</html>
