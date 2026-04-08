@extends('layouts.app')

@section('content')
<div class="mb-10 pb-6 border-b border-slate-200">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-widest">Student Portal</p>
            <h1 class="text-4xl font-black text-[#0d47a1] tracking-tighter">
                Welcome, {{ explode(' ', $user->name)[0] }}!
            </h1>
        </div>
        <div class="flex items-center space-x-3">
            <div class="text-right hidden sm:block">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Academic Year</p>
                <p class="text-sm font-bold text-slate-700">2026-2027</p>
            </div>
            <span class="inline-flex items-center rounded-xl bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700 ring-1 ring-inset ring-emerald-200">
                <span class="h-2 w-2 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>
                Enrollment Active
            </span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-5 gap-8">
    
    <div class="xl:col-span-2 space-y-6">
        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
            <div class="p-8 text-center bg-slate-50 border-b border-slate-100 relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#0d47a1]/5 rounded-full"></div>
                
                <div class="relative inline-block">
                    <div class="w-24 h-24 bg-[#0d47a1] text-white rounded-3xl flex items-center justify-center text-4xl font-black mx-auto mb-4 shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-300">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <span class="absolute -bottom-1 -right-1 flex h-6 w-6">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-6 w-6 bg-emerald-500 border-4 border-white"></span>
                    </span>
                </div>
                
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">{{ $user->name }}</h2>
                <p class="text-xs font-bold text-[#0d47a1] bg-blue-50 px-4 py-1.5 rounded-full inline-block mt-2 border border-blue-100 uppercase tracking-wider">
                    ID: {{ $user->student_id }}
                </p>
            </div>
            
            <div class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-4 text-sm font-bold rounded-2xl bg-[#0d47a1] text-white shadow-lg shadow-blue-900/20 transition group">
                    <svg class="w-5 h-5 mr-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard Home
                </a>
                <a href="{{ route('user.settings') }}" class="flex items-center px-6 py-4 text-sm font-bold text-slate-600 rounded-2xl hover:bg-slate-50 hover:text-[#0d47a1] transition group">
                    <svg class="w-5 h-5 mr-4 text-slate-400 group-hover:text-[#0d47a1] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Account Settings
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-6 py-4 text-sm font-bold text-red-500 rounded-2xl hover:bg-red-50 transition group">
                        <svg class="w-5 h-5 mr-4 text-red-300 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout Session
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="xl:col-span-3 space-y-6">
        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between bg-white">
                <h3 class="text-xl font-black text-slate-900 tracking-tight flex items-center">
                    <span class="p-2 bg-blue-50 rounded-lg mr-3 text-lg">📄</span>
                    Student Records
                </h3>
                <span class="text-[10px] font-black bg-slate-100 text-slate-500 px-3 py-1 rounded-md uppercase tracking-widest">Verified Profile</span>
            </div>
            
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="group">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Primary Course</p>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-transparent group-hover:border-blue-100 group-hover:bg-blue-50/30 transition">
                            <p class="text-lg font-black text-slate-900 leading-none mb-1">{{ $user->course }}</p>
                            <p class="text-xs font-bold text-[#0d47a1]">{{ $user->year_level }}</p>
                        </div>
                    </div>
                    
                    <div class="group">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Email Address</p>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-transparent group-hover:border-blue-100 group-hover:bg-blue-50/30 transition">
                            <p class="text-sm font-bold text-slate-900 truncate">{{ $user->email }}</p>
                            <p class="text-[10px] font-bold text-slate-400 mt-1">Institutional Mail</p>
                        </div>
                    </div>

                    <div class="group">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Mobile Number</p>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-transparent group-hover:border-blue-100 group-hover:bg-blue-50/30 transition text-slate-900 font-bold">
                            {{ $user->contact_no }}
                        </div>
                    </div>

                    <div class="group">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Birth Date</p>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-transparent group-hover:border-blue-100 group-hover:bg-blue-50/30 transition text-slate-900 font-bold">
                            {{ \Carbon\Carbon::parse($user->birthdate)->format('M d, Y') }}
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Home Address</p>
                    <div class="p-5 bg-slate-50 rounded-2xl text-slate-700 font-medium text-sm leading-relaxed border border-slate-100">
                        {{ $user->address }}
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[#0d47a1] rounded-[2rem] p-8 text-white shadow-2xl shadow-blue-900/20 relative overflow-hidden group">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full group-hover:scale-110 transition duration-700"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
                <div class="bg-amber-400 text-[#0d47a1] p-4 rounded-2xl text-3xl shadow-xl">
                    📜
                </div>
                <div>
                    <h4 class="text-xl font-black mb-1 tracking-tight">Status: Registrar Review</h4>
                    <p class="text-blue-100 text-sm font-medium leading-relaxed opacity-90">
                        Your enrollment application for the current academic session is currently being validated. 
                        Please ensure your documents are ready.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection