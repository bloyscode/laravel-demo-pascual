<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Create an Account</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <section class="flex items-center justify-center min-h-screen px-6 py-8">
        <div
            class="w-full max-w-md bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
            <div class="px-8 py-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create an Account</h1>
                <form class="mt-6 space-y-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Juan Dela Cruz" required
                            class="block w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" placeholder="name@company.com" required
                            class="block w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Role Selection -->
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium">Select Role</label>
                        <select name="role" id="role" required
                            class="block w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                            <option value="admin">Admin</option>
                            <option value="registrar">Registrar</option>
                            <option value="faculty">Faculty</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required
                            class="block w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="••••••••" required
                            class="block w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Sign Up
                    </button>

                    <!-- Login Redirect -->
                    <p class="text-sm text-center text-gray-500 dark:text-gray-400">
                        Already have an account?
                        <a href="{{ route('login-form') }}"
                            class="text-blue-600 hover:underline dark:text-blue-400">Log in here</a>.
                    </p>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
