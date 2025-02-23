<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hospital Management System API</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
            <body class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="bg-white shadow-lg rounded-xl p-8 max-w-lg text-center">
                <h1 class="text-3xl font-bold text-gray-800">🚑 Hospital Management API</h1>
                <p class="text-gray-600 mt-3">This is the API for the Hospital Management System.</p>
                <p class="text-gray-500 mt-2">Use the endpoints to interact with the system.</p>

                <div class="mt-5 bg-gray-100 p-4 rounded-lg text-left">
                    <p class="text-gray-700 font-semibold">API Endpoints:</p>
                    @foreach ($routes as $route)
                        <code class="block text-gray-600 font-mono mt-2">
                            <span class="text-blue-500">{{ implode('|', $route->methods) }}</span> {{ $route->uri }}
                        </code>  @endforeach
                </div>

                <p class="mt-5 text-sm text-gray-500">For documentation, visit:
                    <a href="#" class="text-blue-500 underline">docs</a>
                </p>
            </div>
            </body>
            </html>
