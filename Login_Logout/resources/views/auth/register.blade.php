@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Student Enrollment</h2>
        <p class="text-slate-500 font-medium mt-2">Initialize your official academic record for Academic Year 2026-2027.</p>
    </div>

    <div class="bg-white rounded-[3rem] shadow-2xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
        <div class="p-8 md:p-12">
            <form action="{{ route('register.post') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                    
                    <div class="space-y-6">
                        <h4 class="text-[#0d47a1] font-black text-xs uppercase tracking-[0.3em] border-b border-blue-50 pb-2">Academic Information</h4>
                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Student ID Number</label>
                            <input type="text" name="student_id" placeholder="2026-0001" value="{{ old('student_id') }}" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700">
                            @error('student_id') <p class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Full Legal Name</label>
                            <input type="text" name="name" placeholder="Juan Dela Cruz" value="{{ old('name') }}" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Academic Program</label>
                            <select name="course" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700 appearance-none">
                                <option value="">Select Course</option>
                                <option value="BSIT">BS Information Technology</option>
                                <option value="BSCS">BS Computer Science</option>
                                <option value="BSCpE">BS Computer Engineering</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Year Classification</label>
                            <select name="year_level" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700">
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Account Password</label>
                            <input type="password" name="password" placeholder="••••••••" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700">
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h4 class="text-[#0d47a1] font-black text-xs uppercase tracking-[0.3em] border-b border-blue-50 pb-2">Personal Details</h4>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Institutional Email</label>
                            <input type="email" name="email" placeholder="student@university.edu" value="{{ old('email') }}" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700">
                            @error('email') <p class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Birthdate</label>
                                <input type="date" name="birthdate" value="{{ old('birthdate') }}" 
                                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700 text-sm">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Gender</label>
                                <select name="gender" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700 text-sm">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Mobile Number</label>
                            <input type="text" name="contact_no" placeholder="09123456789" value="{{ old('contact_no') }}" 
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Permanent Address</label>
                            <textarea name="address" rows="3" placeholder="Street, City, Province" 
                                class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#0d47a1] outline-none transition-all font-semibold text-slate-700 text-sm resize-none">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-50 flex flex-col items-center">
                    <button type="submit" 
                        class="w-full md:w-2/3 bg-[#0d47a1] hover:bg-blue-800 text-white font-black py-5 rounded-[2rem] shadow-2xl shadow-blue-900/30 transition-all transform hover:-translate-y-1 active:scale-95 text-lg">
                        Complete Student Registration
                    </button>
                    <a href="{{ route('login') }}" class="mt-6 text-slate-400 font-bold text-sm hover:text-[#0d47a1] transition-colors">
                        Already have an account? <span class="underline underline-offset-4 decoration-2">Login here</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection