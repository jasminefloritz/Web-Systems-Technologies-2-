@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tighter">Account Settings</h2>
        <p class="text-slate-500 font-medium">Manage your personal information and contact preferences.</p>
    </div>

    <form action="{{ route('user.settings.update') }}" method="POST" class="space-y-8">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 text-center">
                    <div class="w-24 h-24 bg-[#0d47a1] text-white rounded-3xl flex items-center justify-center text-4xl font-black mx-auto mb-4 shadow-lg">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-tight">{{ $user->name }}</h3>
                    <p class="text-[10px] font-black text-[#0d47a1] uppercase tracking-widest mt-1">Official Student Record</p>
                    
                    <div class="mt-8 pt-6 border-t border-slate-50 space-y-4 text-left">
                        <div>
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Student ID</p>
                            <p class="text-sm font-bold text-slate-700">{{ $user->student_id }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Current Program</p>
                            <p class="text-sm font-bold text-slate-700">{{ $user->course }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Year Level</p>
                            <p class="text-sm font-bold text-slate-700">{{ $user->year_level }}</p>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-slate-50 rounded-2xl">
                        <p class="text-[10px] font-bold text-slate-500 leading-relaxed italic">
                            Academic details are locked. Contact the Registrar to request changes.
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-10">
                    <h4 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-8 flex items-center">
                        <span class="w-8 h-8 bg-blue-50 text-[#0d47a1] rounded-lg flex items-center justify-center mr-3">✏️</span>
                        Personal Information
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Full Name</label>
                            <input type="text" name="name" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700"
                                value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Email Address</label>
                            <input type="email" name="email" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700"
                                value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Contact Number</label>
                            <input type="text" name="contact_no" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700"
                                value="{{ old('contact_no', $user->contact_no) }}" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Gender</label>
                            <select name="gender" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700">
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Birthdate</label>
                            <input type="date" name="birthdate" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700"
                                value="{{ old('birthdate', $user->birthdate) }}" required>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Home Address</label>
                            <textarea name="address" rows="3" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700 resize-none"
                                required>{{ old('address', $user->address) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center gap-4">
                        <button type="submit" 
                            class="w-full sm:w-auto px-10 py-4 bg-[#0d47a1] hover:bg-blue-800 text-white font-black rounded-2xl shadow-xl shadow-blue-900/20 transition-all transform hover:-translate-y-1 active:scale-95">
                            Update Profile
                        </button>
                        <a href="{{ route('dashboard') }}" 
                            class="w-full sm:w-auto px-10 py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-2xl transition-all text-center">
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="mt-8 p-6 bg-blue-50 rounded-[2rem] border border-blue-100 flex items-start space-x-4">
        <span class="text-2xl">🛡️</span>
        <div>
            <p class="text-sm font-bold text-blue-900 uppercase tracking-tight">Data Privacy Information</p>
            <p class="text-xs text-blue-700 font-medium leading-relaxed mt-1">
                Your information is protected under the University Data Privacy Policy. Some fields are locked to maintain the integrity of academic records. If your <strong>Student ID</strong> or <strong>Course</strong> is incorrect, please visit the Registrar's Office with a valid ID.
            </p>
        </div>
    </div>
</div>
@endsection