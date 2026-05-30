<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Finals Activity</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="flex flex-col min-h-screen antialiased text-slate-900">

    <nav class="bg-[#0d47a1] border-b-4 border-[#ffc107] shadow-xl sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <div class="flex items-center space-x-3">
                    <div class="bg-white p-2 rounded-xl shadow-inner">
                        <span class="text-2xl">🎓</span>
                    </div>
                    <a href="{{ route('dashboard') }}" class="flex flex-col">
                        <span class="text-white font-black tracking-tighter text-xl leading-none">UNIVERSITY</span>
                        <span class="text-[#ffc107] text-[10px] font-bold tracking-[0.2em] uppercase">Student Portal</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    @if(Session::has('user_id'))
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-xl text-sm font-bold {{ Request::is('dashboard') ? 'bg-white/10 text-white' : 'text-blue-100 hover:bg-white/5 hover:text-white' }} transition">
                            Dashboard
                        </a>
                        <a href="{{ route('user.settings') }}" class="px-4 py-2 rounded-xl text-sm font-bold {{ Request::is('settings*') ? 'bg-white/10 text-white' : 'text-blue-100 hover:bg-white/5 hover:text-white' }} transition">
                            Account Settings
                        </a>
                    @endif
                </div>

                <div class="flex items-center space-x-4">
                    @if(Session::has('user_id'))
                        <div class="h-8 w-[1px] bg-blue-800 hidden md:block"></div>
                        
                        <div class="flex items-center">
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="flex items-center bg-red-500/10 hover:bg-red-500 text-red-400 hover:text-white px-4 py-2 rounded-xl text-xs font-black uppercase tracking-widest transition-all border border-red-500/20">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-[#ffc107] text-sm font-bold transition px-4">Login</a>
                        <a href="{{ route('register') }}" class="bg-[#ffc107] hover:bg-yellow-500 text-[#0d47a1] px-6 py-2.5 rounded-xl text-sm font-black shadow-lg shadow-blue-900/40 transition transform hover:-translate-y-0.5">
                            Enroll Now
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-10">
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-8 bg-emerald-50 border border-emerald-200 p-4 rounded-2xl flex items-center shadow-sm">
                <span class="bg-emerald-500 p-1.5 rounded-full mr-3">
                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </span>
                <p class="text-sm font-bold text-emerald-800">{{ session('success') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-slate-900 border-t-8 border-[#0d47a1] py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-center md:text-left">
                    <p class="text-white font-black text-sm tracking-tight">STUDENT ENROLLMENT MANAGEMENT SYSTEM</p>
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.3em] mt-1">Web Systems & Technologies | Finals 2026</p>
                </div>
                <div class="flex flex-col items-center md:items-end">
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-widest">System Online</span>
                    </div>
                    <p class="text-slate-600 text-[9px] font-medium">&copy; 2026 University Registrar Office. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>