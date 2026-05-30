<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-pink-50">

{{-- 
    1. Define a boolean to check if we are in an AUTH context.
    This checks if the URL starts with /login, /register, /password, etc.
--}}
@php
    // We check for the path, the route name, and the "auth" prefix just to be safe
    $isAuthPage = request()->is('login', 'register', 'password*', 'reset-password*', 'verify-email*', 'confirm-password*') 
                  || request()->routeIs('login', 'register', 'password.*', 'verification.*')
                  || request()->is('auth/*'); 
@endphp

<div class="flex min-h-screen">

    {{-- SIDEBAR: Strictly hidden if $isAuthPage is true --}}
    @if (auth()->check() && !$isAuthPage)
<!-- Sidebar -->
<aside class="w-64 bg-white shadow-lg p-6 border-r border-pink-100 flex flex-col h-screen sticky top-0">
    
    <!-- Logo/Brand -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-pink-500">
            ✧ Dashboard
        </h1>
    </div>

    <!-- Navigation Links -->
    <nav class="space-y-4 text-gray-600 flex-1">
        <a href="/dashboard" class="flex items-center gap-2 hover:text-pink-500 transition-colors py-2">
            <span>🏠</span> <span>Home</span>
        </a>
        {{-- Add other links here --}}
    </nav>

    <!-- Sidebar Logout Section - Forced to Bottom -->
    <div class="pt-6 border-t border-pink-50">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                class="group flex items-center w-full text-left py-2 text-gray-500 hover:text-pink-500 transition-all duration-300">
                <span class="mr-2 group-hover:scale-110 transition-transform">🚪</span>
                <span class="text-sm font-medium uppercase tracking-widest">Logout</span>
            </button>
        </form>
    </div>
    
</aside>
    @endif

    <!-- Main Content Area -->
    <main class="flex-1 {{ $isAuthPage ? 'flex items-center justify-center' : 'p-8' }}">

        {{-- TOP BAR: Strictly hidden if $isAuthPage is true --}}
        @if (!$isAuthPage)
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-700">
                    {{ $title ?? 'Dashboard' }}
                </h2>

                <div class="text-sm text-gray-500">
                    <p class="text-gray-400 text-sm tracking-widest uppercase mt-1">
            Welcome, {{ auth()->user()->name ?? 'Guest' }}
        </p>
                </div>
            </div>
        @endif

        <!-- Content Container -->
        <div class="{{ $isAuthPage ? 'w-full' : 'bg-white p-6 rounded-2xl shadow-md border border-pink-100' }}">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>