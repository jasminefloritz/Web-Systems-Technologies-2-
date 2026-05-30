@extends('layouts.app')

@section('content')
    @php $title = 'Create Account'; @endphp

    <div class="relative min-h-[85vh] flex items-center justify-center overflow-hidden">
        
        <!-- Soft Coquette Background Orbs -->
        <div class="absolute w-[30rem] h-[30rem] bg-pink-200/40 rounded-full blur-[120px] -top-24 -right-20"></div>
        <div class="absolute w-[30rem] h-[30rem] bg-rose-100/50 rounded-full blur-[120px] -bottom-24 -left-20"></div>

        <!-- Registration Card -->
        <div class="relative w-full max-w-lg">
            
            <!-- Floating Ornament -->
            <div class="text-center text-pink-300 text-2xl mb-2 opacity-80">
                <span>୨୧</span>
            </div>

            <div class="bg-white/70 backdrop-blur-2xl p-10 rounded-[2.5rem] shadow-[0_20px_60px_rgba(255,182,193,0.15)] border border-white/50">
                
                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-light tracking-tight text-gray-800 italic">
                        Join the <span class="text-pink-500 font-semibold not-italic">Community</span>
                    </h2>
                    <p class="text-gray-400 text-xs uppercase tracking-widest mt-2">
                        Start your journey with us today
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4" autocomplete="off">
                    @csrf

                    <!-- Name -->
                    <div class="group">
                        <label for="name" class="block text-xs font-medium text-gray-500 ml-1 mb-1 uppercase tracking-tighter">Full Name</label>
                        <input
                            id="name"
                            class="block w-full px-4 py-2.5 rounded-xl border-pink-100 bg-white/80 text-gray-800 focus:bg-white focus:border-pink-300 focus:ring focus:ring-pink-100 transition-all duration-300 outline-none"
                            type="text"
                            name="name"
                            required
                            autofocus
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 ml-1" />
                    </div>

                    <!-- Email Address -->
                    <div class="group">
                        <label for="email" class="block text-xs font-medium text-gray-500 ml-1 mb-1 uppercase tracking-tighter">Email Address</label>
                        <input
                            id="email"
                            class="block w-full px-4 py-2.5 rounded-xl border-pink-100 bg-white/80 text-gray-800 focus:bg-white focus:border-pink-300 focus:ring focus:ring-pink-100 transition-all duration-300 outline-none"
                            type="email"
                            name="email"
                            required
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 ml-1" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="group">
                            <label for="password" class="block text-xs font-medium text-gray-500 ml-1 mb-1 uppercase tracking-tighter">Password</label>
                            <input
                                id="password"
                                class="block w-full px-4 py-2.5 rounded-xl border-pink-100 bg-white/80 text-gray-800 focus:bg-white focus:border-pink-300 focus:ring focus:ring-pink-100 transition-all duration-300 outline-none"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-1 ml-1" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="group">
                            <label for="password_confirmation" class="block text-xs font-medium text-gray-500 ml-1 mb-1 uppercase tracking-tighter">Confirm</label>
                            <input
                                id="password_confirmation"
                                class="block w-full px-4 py-2.5 rounded-xl border-pink-100 bg-white/80 text-gray-800 focus:bg-white focus:border-pink-300 focus:ring focus:ring-pink-100 transition-all duration-300 outline-none"
                                type="password"
                                name="password_confirmation"
                                required
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 ml-1" />
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-medium py-3 rounded-xl shadow-lg shadow-pink-200 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95">
                            Create Account
                        </button>
                    </div>
                </form>

                <!-- Footer / Login Link -->
                <div class="mt-8 pt-6 border-t border-pink-50 text-center">
                    <p class="text-sm text-gray-500">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-pink-500 font-semibold hover:text-pink-700 transition-colors duration-300 underline-offset-4 hover:underline">
                            Log in here ୨୧
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection