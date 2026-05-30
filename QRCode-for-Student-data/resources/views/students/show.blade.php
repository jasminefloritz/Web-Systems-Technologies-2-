@extends('layouts.master')

@section('content')
<div class="max-w-4xl mx-auto py-20 px-4">
    
    <div class="relative bg-[#FFFDFB] rounded-sm shadow-[30px_30px_60px_#d9d9d9,-30px_-30px_60px_#ffffff] border border-[#F2E8E8] flex flex-col md:flex-row min-h-[400px]">
        
        <div class="w-full md:w-2/5 bg-[#FDF2F4] relative flex items-center justify-center p-8 overflow-hidden">
            <div class="absolute top-0 left-0 w-16 h-16 bg-[#8B5E5E] text-white flex items-center justify-center transform -rotate-45 -translate-x-8 -translate-y-8 shadow-md z-20">
                <span class="rotate-45 translate-x-3 translate-y-3 text-[10px] tracking-widest font-bold uppercase">Valid</span>
            </div>

            <div class="relative z-10">
                <div class="w-48 h-64 border-[12px] border-white shadow-xl overflow-hidden rounded-t-full">
                    <img src="{{ $student->picture ? asset('storage/' . $student->picture) : 'https://ui-avatars.com/api/?name='.urlencode($student->name).'&background=FCF9F7&color=8B5E5E' }}" 
                         class="w-full h-full object-cover grayscale-[20%]">
                </div>
                <div class="mt-4 text-center">
                    <p class="fancy text-3xl text-[#D4AF37]">{{ $student->name }}</p>
                </div>
            </div>

            <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#8B5E5E 0.5px, transparent 0.5px); background-size: 10px 10px;"></div>
        </div>

        <div class="flex-1 p-10 flex flex-col justify-between bg-white relative">
            
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h2 class="serif text-3xl text-[#8B5E5E] leading-none mb-1">Official Credentials</h2>
                    <p class="text-[10px] uppercase tracking-[0.4em] text-[#C2A3A3]">Academy Archive No. {{ $student->student_id }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-y-6 text-sm mb-10 border-l-2 border-[#FDF2F4] pl-6">
                <div class="col-span-2 md:col-span-1">
                    <p class="text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1">Department</p>
                    <p class="serif text-lg text-[#8B5E5E] italic">{{ $student->course }}</p>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <p class="text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1">Status</p>
                    <p class="serif text-lg text-[#8B5E5E] italic">Enrolled</p>
                </div>
            </div>

            <div class="flex items-end justify-between mt-auto">
                <div class="space-y-4">
                    <button onclick="window.print()" class="group flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-[#C2A3A3] hover:text-[#8B5E5E] transition">
                        <span class="w-8 h-8 flex items-center justify-center border border-[#F2E8E8] rounded-full group-hover:bg-[#FDF2F4]">⎙</span>
                        Export Record
                    </button>
                    <a href="{{ route('students.index') }}" class="block text-[10px] font-bold uppercase tracking-widest text-[#C2A3A3] hover:text-[#D4AF37] transition">
                        ← Return to Hall
                    </a>
                </div>

                <div class="absolute bottom-10 right-10 z-50 transform -translate-x-4 -translate-y-4">
                    <div class="relative group flex flex-col items-center">
                        <p class="text-[8px] italic text-[#D4AF37] tracking-[0.2em] uppercase mb-2 bg-white px-2 shadow-sm border border-[#FDF2F4]">Digital Signature</p>
                        
                        <div class="p-3 bg-white border-2 border-[#FDF2F4] rounded-xl shadow-2xl outline outline-1 outline-[#D4AF37] transform transition duration-500 group-hover:rotate-0 rotate-3">
                            <div class="w-20 h-20 bg-white flex items-center justify-center">
                                {{-- Ensure the QR is rendered at a scale that fits the padding --}}
                                <div class="w-full h-full p-1">
                                    {!! $qr !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            body * { visibility: hidden; }
            .relative.bg-\[\#FFFDFB\], .relative.bg-\[\#FFFDFB\] * { visibility: visible; }
            button, a, p.mb-2 { display: none !important; }
        }
    </style>
</div>
@endsection