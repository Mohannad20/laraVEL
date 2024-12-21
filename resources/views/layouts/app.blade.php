<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Produits')</title>
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Inclure CSS --> --}}
</head>
<body class="bg-gray-100">
    <nav class="bg-red-400 shadow-md h-auto py-4">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-white">Gestion des Produits</a>
            <div class="flex space-x-4">
                {{-- <a href="{{ url('/') }}" class="text-white hover:text-gray-300 font-bold">Home</a> --}}
                <a href="{{ url('/habitants') }}" class="text-white hover:text-gray-300 font-bold">Habitant</a>
                <a href="{{ url('/villes') }}" class="text-white hover:text-gray-300 font-bold">Villes</a>
                {{-- @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard</a>
                    <form action="{{ url('/logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-gray-900">Logout</button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="text-gray-700 hover:text-gray-900">Login</a>
                    <a href="{{ url('/register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                @endauth --}}
            </div>
        </div>
    </nav>
    <div class="flex items-center justify-center min-h-screen">
        <div class="container mt-4 bg-white p-6 rounded shadow-md">
            <!-- Messages de succès et d'erreur -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>