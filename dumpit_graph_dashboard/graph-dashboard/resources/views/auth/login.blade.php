@extends('layouts.app')

@section('content')
    @php $title = 'Sign In'; @endphp

    <div class="relative min-h-[80vh] flex items-center justify-center overflow-hidden">
        
        <!-- Subtle Coquette Background Elements -->
        <div class="absolute w-96 h-96 bg-pink-200/40 rounded-full blur-[100px] -top-20 -left-20"></div>
        <div class="absolute w-96 h-96 bg-rose-100/50 rounded-full blur-[100px] -bottom-20 -right-20"></div>

        <!-- Login Card -->
        <div class="relative w-full max-w-md">
            
            <div class="text-center text-pink-300 text-2xl mb-2 opacity-80">
                <span>୨୧</span>
            </div>

            <div class="bg-white/70 backdrop-blur-2xl p-10 rounded-[2rem] shadow-[0_20px_50px_rgba(255,182,193,0.2)] border border-white/50">
                
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-light tracking-tight text-gray-800 italic">
                        Welcome <span class="text-pink-500 font-semibold not-italic">Back</span>
                    </h2>
                    <p class="text-gray-400 text-xs uppercase tracking-widest mt-2">
                        Enter your credentials to continue
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-5" autocomplete="off">
                    @csrf

                    <!-- Email -->
                    <div class="group">
                        <label for="email" class="block text-xs font-medium text-gray-500 ml-1 mb-1 uppercase tracking-tighter">Email Address</label>
                        <input
                            id="email"
                            class="block w-full px-4 py-3 rounded-xl border-pink-100 bg-white/80 text-gray-800 focus:bg-white focus:border-pink-300 focus:ring focus:ring-pink-100 transition-all duration-300 outline-none"
                            type="email"
                            name="email"
                            {{-- Removed :value="old('email')" to prevent pre-filling --}}
                            required
                            autofocus
                            autocomplete="off"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 ml-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex justify-between items-center ml-1 mb-1">
                            <label for="password" class="block text-xs font-medium text-gray-500 uppercase tracking-tighter">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-[10px] text-pink-400 hover:text-pink-600 uppercase tracking-widest transition-colors"
                                   href="{{ route('password.request') }}">
                                    Forgot?
                                </a>
                            @endif
                        </div>
                        <input
                            id="password"
                            class="block w-full px-4 py-3 rounded-xl border-pink-100 bg-white/80 text-gray-800 focus:bg-white focus:border-pink-300 focus:ring focus:ring-pink-100 transition-all duration-300 outline-none"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 ml-1" />
                    </div>

                    <!-- Actions -->
                    <div class="pt-2">
                        <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-medium py-3 rounded-xl shadow-lg shadow-pink-200 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95">
                            Log In
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-pink-50 text-center">
                    <p class="text-sm text-gray-500">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-pink-500 font-semibold hover:text-pink-700 transition-colors duration-300 underline-offset-4 hover:underline">
                            Create one ୨୧
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection