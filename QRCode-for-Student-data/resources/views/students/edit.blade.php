@extends('layouts.master')

@section('content')
<div class="max-w-6xl mx-auto px-4 pb-20 relative">
    
    <div class="absolute top-0 right-0 serif text-[120px] text-[#F2E8E8] opacity-40 pointer-events-none select-none -z-10 mt-20">
        Revision
    </div>

    <div class="mb-12 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div class="relative">
            <span class="fancy text-[#D4AF37] text-3xl">Amending the Archive</span>
            <h2 class="serif text-5xl text-[#8B5E5E] tracking-tighter">Scholastic Profile</h2>
            <p class="text-[#C2A3A3] text-xs uppercase tracking-[0.4em] mt-2 italic">Dossier: {{ $student->student_id }}</p>
        </div>
        
        <div class="hidden md:block">
            <span class="text-4xl">🕊️</span>
        </div>
    </div>

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-12 gap-0 lg:gap-10 items-start">
            
            <div class="col-span-12 lg:col-span-4 mb-10 lg:mb-0">
                <div class="relative pt-10">
                    <div class="bg-white p-4 shadow-2xl border border-[#F2E8E8] transform -rotate-3 hover:rotate-0 transition-all duration-700">
                        <div id="image-preview-container" class="aspect-square w-full bg-[#FCF9F7] overflow-hidden relative border border-[#F2E8E8]">
                            @if($student->picture)
                                <img id="image-preview" src="{{ asset('storage/' . $student->picture) }}" class="w-full h-full object-cover grayscale-[10%] hover:grayscale-0 transition duration-500" />
                            @else
                                <img id="image-preview" src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=FDF2F4&color=8B5E5E" class="w-full h-full object-cover" />
                            @endif
                        </div>
                        
                        <div class="mt-4 py-2 border-t border-[#FDF2F4] text-center">
                            <p class="fancy text-xl text-[#D4AF37]">{{ $student->name }}</p>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-center">
                        <input type="file" name="picture" id="picture-input" accept="image/*" class="hidden">
                        <label for="picture-input" class="cursor-pointer group flex items-center gap-3">
                            <span class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-[#D4AF37] group-hover:bg-[#FDF2F4] transition">
                                <span class="text-[#D4AF37]">✨</span>
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#8B5E5E]">Replace Portrait</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-8">
                <div class="bg-white/80 backdrop-blur-sm p-8 md:p-12 rounded-[50px] border border-white shadow-xl">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                        
                        <div class="group">
                            <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1 ml-1 group-focus-within:text-[#8B5E5E] transition">Identity Code</label>
                            <input type="text" name="student_id" value="{{ $student->student_id }}" required
                                   class="w-full px-1 py-3 border-b-2 border-[#FDF2F4] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition font-medium">
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1 ml-1 group-focus-within:text-[#8B5E5E] transition">Full Nomenclature</label>
                            <input type="text" name="name" value="{{ $student->name }}" required
                                   class="w-full px-1 py-3 border-b-2 border-[#FDF2F4] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition font-medium">
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1 ml-1 group-focus-within:text-[#8B5E5E] transition">Digital Correspondence</label>
                            <input type="email" name="email" value="{{ $student->email }}" required
                                   class="w-full px-1 py-3 border-b-2 border-[#FDF2F4] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition font-medium">
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1 ml-1 group-focus-within:text-[#8B5E5E] transition">Telephonic Link</label>
                            <input type="text" name="phone" value="{{ $student->phone }}" required
                                   class="w-full px-1 py-3 border-b-2 border-[#FDF2F4] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition font-medium">
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1 ml-1 group-focus-within:text-[#8B5E5E] transition">Academic Path</label>
                            <select name="course" required
                                    class="w-full px-1 py-3 border-b-2 border-[#FDF2F4] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition font-medium cursor-pointer appearance-none">
                                <option value="BSIT" {{ $student->course == 'BSIT' ? 'selected' : '' }}>BS Information Technology</option>
                                <option value="BSCS" {{ $student->course == 'BSCS' ? 'selected' : '' }}>BS Computer Science</option>
                                <option value="BSCrim" {{ $student->course == 'BSCrim' ? 'selected' : '' }}>BS Criminology</option>
                                <option value="BSEntrep" {{ $student->course == 'BSEntrep' ? 'selected' : '' }}>BS Entrepreneurship</option>
                            </select>
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-1 ml-1 group-focus-within:text-[#8B5E5E] transition">Date of Arrival</label>
                            <input type="date" name="dob" value="{{ $student->dob }}" required
                                   class="w-full px-1 py-3 border-b-2 border-[#FDF2F4] focus:border-[#D4AF37] outline-none text-[#8B5E5E] bg-transparent transition font-medium">
                        </div>

                        <div class="md:col-span-2 py-4">
                            <label class="block text-[10px] font-bold text-[#D4AF37] uppercase tracking-widest mb-6 text-center">Identity Signature</label>
                            <div class="flex justify-center gap-12">
                                @foreach(['Male', 'Female'] as $g)
                                <label class="relative flex items-center cursor-pointer group">
                                    <input type="radio" name="gender" value="{{ $g }}" class="peer hidden" {{ $student->gender == $g ? 'checked' : '' }}>
                                    <div class="flex flex-col items-center gap-2">
                                        <div class="w-4 h-4 rounded-full border border-[#D4AF37] peer-checked:bg-[#8B5E5E] transition-all outline outline-offset-4 outline-transparent peer-checked:outline-[#FDF2F4]"></div>
                                        <span class="text-[10px] uppercase tracking-widest text-[#C2A3A3] peer-checked:text-[#8B5E5E]">{{ $g }}</span>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mt-16 flex flex-col md:flex-row items-center justify-between gap-6 border-t border-[#FDF2F4] pt-10">
                        <a href="{{ route('students.index') }}" class="text-[10px] uppercase tracking-[0.3em] font-bold text-[#C2A3A3] hover:text-[#8B5E5E] transition">
                            Cancel Changes
                        </a>
                        
                        <button type="submit" 
                                class="w-full md:w-auto bg-gradient-to-r from-[#8B5E5E] to-[#A67C7C] text-white px-16 py-4 rounded-full font-bold shadow-[0_10px_20px_rgba(139,94,94,0.3)] hover:shadow-none hover:translate-y-1 transition-all duration-300">
                            Commit Revisions 🎀
                        </button>
                    </div>
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
        }
    }
</script>
@endsection