<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body class="bg-gray-100">

    @if(session('success'))
    <x-sweetalert type="success" :message="session('success')"/>
    @endif

    @if (session('info'))
    <x-sweetalert type="info" :message="session('info')"/>
    @endif

    @if(session('error'))
    <x-sweetalert type="error" :message="session('error')"/>
    @endif

    <div class="container mx-auto mt-10">
        @if(Auth::user()->hasRole('admin'))
            <h1 class="text-center text-2xl font-bold text-gray-800 mb-5">
                Welcome Admin, {{ Auth::user()->name }}
            </h1>

            <div class="text-center">
                <div x-data="{ open: false }" class="inline-block">
                    <!-- Add Event Button -->
                    <button @click="open = true"
                        class="bg-blue-500 text-white py-2 px-4 rounded shadow hover:bg-blue-600">
                        Add Event
                    </button>

                    <!-- Add Event Modal -->
                    <div x-show="open" x-cloak
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-xl font-bold text-gray-800">Add Event</p>
                                <button @click="open = false"
                                    class="text-gray-800 hover:text-red-500">
                                    &#10005;
                                </button>
                            </div>
                            <form action="{{ route('admin.add_event') }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="event_name" class="block text-left font-medium text-gray-700">
                                        Event Name
                                    </label>
                                    <input type="text" name="event_name" id="event_name"
                                        value="{{ old('event_name') }}"
                                        class="block w-full shadow-sm rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('event_name') is-invalid @enderror"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="event_description" class="block text-left font-medium text-gray-700">
                                        Event Description
                                    </label>
                                    <input type="text" name="event_description" id="event_description"
                                        value="{{ old('event_description') }}"
                                        class="block w-full shadow-sm rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('event_description') is-invalid @enderror"
                                        required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-blue-500 text-white py-2 px-4 rounded shadow hover:bg-blue-600">
                                    Add Event
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @elseif(Auth::user()->hasRole('registrar'))
            <h1 class="text-center text-2xl font-bold text-gray-800">
                Welcome Registrar, {{ Auth::user()->name }}
            </h1>
        @elseif(Auth::user()->hasRole('faculty'))
            <h1 class="text-center text-2xl font-bold text-gray-800">
                Welcome Faculty, {{ Auth::user()->name }}
            </h1>
        @else
            <h1 class="text-center text-2xl font-bold text-gray-800">
                Welcome Staff, {{ Auth::user()->name }}
            </h1>
        @endif

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="text-center mt-10">
            @csrf
            <button type="submit"
                class="bg-red-500 text-white py-2 px-4 rounded shadow hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
