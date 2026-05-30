@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[60vh]">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="inline-flex bg-white p-4 rounded-3xl shadow-xl shadow-blue-100 mb-4 border border-slate-50 transform -rotate-6">
                <span class="text-4xl">🔑</span>
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tighter">Student Portal</h2>
            <p class="text-slate-500 font-medium">Authentication required to access records.</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
            <div class="p-8 md:p-12">
                
                @if($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl">
                        <p class="text-xs font-bold text-red-700 uppercase tracking-widest mb-1">Access Denied</p>
                        <p class="text-sm font-medium text-red-600">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">University Email</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-[#0d47a1] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </span>
                            <input type="email" name="email" 
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] focus:bg-white outline-none transition-all font-semibold text-slate-700"
                                placeholder="name@university.edu" required autofocus>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-center px-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Security Key</label>
                        </div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-[#0d47a1] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            <input type="password" name="password" 
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] focus:bg-white outline-none transition-all font-semibold text-slate-700"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full bg-[#0d47a1] hover:bg-blue-800 text-white font-black py-4 rounded-2xl shadow-xl shadow-blue-900/20 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center space-x-2">
                            <span>Enter Portal</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </button>
                    </div>
                </form>

                <div class="mt-10 text-center">
                    <p class="text-slate-400 text-sm font-medium">New to the university?</p>
                    <a href="{{ route('register') }}" class="text-[#0d47a1] font-bold hover:underline decoration-2 underline-offset-4">
                        Initialize Student Enrollment
                    </a>
                </div>
            </div>
        </div>

        <p class="text-center mt-8 text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em]">
            Secure Academic Gateway v1.0
        </p>
    </div>
</div>
@endsection