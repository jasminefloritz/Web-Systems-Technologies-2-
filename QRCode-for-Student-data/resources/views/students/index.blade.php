@extends('layouts.master')

@section('content')
<div class="relative mb-20">
    <div class="flex flex-col items-start">
        <span class="fancy text-[#D4AF37] text-4xl mb-2">The Registry</span>
        <h1 class="serif text-4xl text-[#8B5E5E] tracking-tighter">Students</h1>
        <div class="w-24 h-[1px] bg-[#D4AF37] mt-4 ml-1"></div>
    </div>
    
    <div class="absolute -top-4 right-0 hidden lg:block">
        <form action="{{ route('students.index') }}" method="GET">
            <input type="text" name="search" 
                   class="bg-transparent border-b border-[#DDEBCC] py-2 px-4 focus:border-[#D4AF37] outline-none text-sm italic placeholder:text-[#C2A3A3]" 
                   placeholder="Seek a name..." value="{{ request('search') }}">
        </form>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
    @forelse($students as $student)
    <div class="relative group">
        <div class="bg-white p-6 shadow-[20px_20px_60px_#bebebe,-20px_-20px_60px_#ffffff] rounded-sm transform group-hover:rotate-1 transition-transform duration-500">
            
            <div class="flex gap-8">
                <div class="flex flex-col gap-4">
                    <div class="w-32 h-40 overflow-hidden rounded-full border-[6px] border-[#FDF2F4] outline outline-1 outline-[#D4AF37]">
                         <img src="{{ $student->picture ? asset('storage/' . $student->picture) : 'https://ui-avatars.com/api/?name='.urlencode($student->name).'&background=FDF2F4&color=8B5E5E' }}" 
                              class="w-full h-full object-cover grayscale-[30%] hover:grayscale-0 transition duration-700">
                    </div>
                    
                    <div class="bg-white p-2 border border-[#F2E8E8] shadow-sm transform -rotate-12 hover:rotate-0 transition">
                        <div class="w-12 h-12 opacity-80">
                            {!! $student->qr !!}
                        </div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-[#D4AF37] mb-1">{{ $student->student_id }}</p>
                            <h2 class="serif text-2xl text-[#8B5E5E]">{{ $student->name }}</h2>
                        </div>
                        <span class="text-xs italic text-[#C2A3A3]">✿ {{ $student->status ?? 'Active' }}</span>
                    </div>

                    <div class="space-y-2 text-sm text-[#8B5E5E] mb-6">
                        <p class="flex justify-between border-b border-[#FDF2F4] pb-1">
                            <span class="font-light italic">Department</span>
                            <span class="font-semibold">{{ $student->course }}</span>
                        </p>
                        <p class="flex justify-between border-b border-[#FDF2F4] pb-1">
                            <span class="font-light italic">Birth-date</span>
                            <span>{{ $student->dob }}</span>
                        </p>
                    </div>

                    <div class="flex gap-4 items-center mt-6">
                        <a href="{{ route('students.show', $student->id) }}" 
                           class="text-[10px] uppercase tracking-[0.3em] font-bold text-[#D4AF37] hover:text-[#8B5E5E] transition">
                           Open Dossier
                        </a>
                        <div class="h-4 w-[1px] bg-[#F2E8E8]"></div>
                        <a href="{{ route('students.edit', $student->id) }}" class="text-xs text-[#C2A3A3] hover:text-[#8B5E5E]">Edit</a>
                        
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="ml-auto">
                            @csrf @method('DELETE')
                            <button class="text-xs text-red-200 hover:text-red-400 transition">✕</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="absolute -z-10 -bottom-4 -right-4 w-24 h-24 text-[#FDF2F4] opacity-50 group-hover:opacity-100 transition duration-500">
            🎀
        </div>
    </div>
    @empty
        <div class="col-span-full text-center py-20">
            <p class="fancy text-3xl text-[#C2A3A3]">The archives are currently empty...</p>
        </div>
    @endforelse
</div>
@endsection