@extends('layouts.master')

@section('content')
<div class="max-w-5xl mx-auto px-4 pb-20">
    <div class="text-center mb-16">
        <span class="fancy text-[#D4AF37] text-4xl block mb-2">Formal Enrollment</span>
        <h2 class="serif text-4xl text-[#8B5E5E] tracking-tight uppercase">New Scholar Application</h2>
        <div class="flex justify-center items-center gap-4 mt-4">
            <div class="h-[1px] w-12 bg-[#DDEBCC]"></div>
            <p class="text-[#C2A3A3] text-xs italic tracking-widest uppercase">Fill the archives with care</p>
            <div class="h-[1px] w-12 bg-[#DDEBCC]"></div>
        </div>
    </div>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col lg:flex-row gap-12 items-start">
            
            <div class="w-full lg:w-1/3 sticky top-10">
                <div class="bg-white p-4 shadow-xl border border-[#F2E8E8] transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                    <label class="block text-[10px] uppercase tracking-[0.3em] font-bold text-[#D4AF37] mb-4 text-center">Identity Portrait</label>
                    
                    <div id="image-preview-container" class="aspect-[3/4] w-full bg-[#FCF9F7] border border-dashed border-[#DDEBCC] flex items-center justify-center overflow-hidden relative group">
                        <div class="absolute inset-0 border-[10px] border-white/20 pointer-events-none z-10"></div>
                        
                        <svg id="placeholder-icon" xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#F2E8E8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <img id="image-preview" class="hidden w-full h-full object-cover grayscale-[20%]" />
                    </div>

                    <div class="mt-6">
                        <input type="file" name="picture" id="picture-input" accept="image/*" required class="hidden">
                        <label for="picture-input" class="block w-full py-3 text-center text-[10px] font-bold uppercase tracking-widest text-[#8B5E5E] border border-[#FDF2F4] hover:bg-[#FDF2F4] cursor-pointer transition">
                            Choose Portrait ✿
                        </label>
                    </div>
                </div>
                <p class="text-center mt-6 text-[#C2A3A3] text-[10px] italic">Supported: JPG, PNG • Max 2MB</p>
            </div>

            <div class="flex-1 bg-white p-10 lg:p-16 shadow-2xl rounded-[40px] border border-[#F2E8E8] relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 opacity-5 pointer-events-none">🎀</div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-2">Scholar ID</label>
                        <input type="text" name="student_id" placeholder="2024-XXXX" required
                               class="w-full pb-2 border-b border-[#F2E8E8] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-2">Full Legal Name</label>
                        <input type="text" name="name" placeholder="First M. Last" required
                               class="w-full pb-2 border-b border-[#F2E8E8] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-2">Electronic Mail</label>
                        <input type="email" name="email" placeholder="scholar@academy.edu" required
                               class="w-full pb-2 border-b border-[#F2E8E8] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-2">Mobile Registry</label>
                        <input type="text" name="phone" placeholder="+63 900 000 0000" required
                               class="w-full pb-2 border-b border-[#F2E8E8] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-2">Field of Study</label>
                        <select name="course" required
                                class="w-full pb-2 border-b border-[#F2E8E8] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition cursor-pointer appearance-none">
                            <option value="">Select a Discipline</option>
                            <option value="BSIT">Information Technology</option>
                            <option value="BSCS">Computer Science</option>
                            <option value="BSCrim">Criminology</option>
                            <option value="BSEntrep">Entrepreneurship</option>
                        </select>
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-2">Day of Advent</label>
                        <input type="date" name="dob" required
                               class="w-full pb-2 border-b border-[#F2E8E8] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition">
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-4">Gender Identity</label>
                        <div class="flex flex-wrap gap-4">
                            @foreach(['Male', 'Female', 'Other'] as $gender)
                            <label class="relative flex items-center cursor-pointer group">
                                <input type="radio" name="gender" value="{{ $gender }}" class="peer hidden" {{ $loop->first ? 'checked' : '' }}>
                                <span class="px-6 py-2 rounded-full border border-[#F2E8E8] text-xs text-[#C2A3A3] peer-checked:bg-[#FDF2F4] peer-checked:text-[#8B5E5E] peer-checked:border-[#FFB7C5] transition">
                                    {{ $gender }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-16 flex items-center justify-between">
                    <a href="{{ route('students.index') }}" class="text-[10px] uppercase tracking-widest font-bold text-[#C2A3A3] hover:text-[#8B5E5E] transition">Return to Records</a>
                    
                    <button type="submit" 
                            class="bg-[#8B5E5E] text-white px-12 py-4 rounded-full font-bold shadow-lg hover:bg-[#724B4B] transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                        <span>Seal Application</span>
                        <span class="text-xs">🎀</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('picture-input').onchange = evt => {
        const [file] = evt.target.files
        if (file) {
            document.getElementById('image-preview').src = URL.createObjectURL(file)
            document.getElementById('image-preview').classList.remove('hidden')
            document.getElementById('placeholder-icon').classList.add('hidden')
        }
    }
</script>
@endsection