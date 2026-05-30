@extends('layouts.app')

@section('content')
    <div class="text-center mb-12">
        <h1 class="font-serif-vintage text-5xl text-[#8b5e5e] italic mb-2">Memory Gallery</h1>
        <div class="h-[1px] w-24 bg-[#bc8f8f] mx-auto mb-4"></div>
        <p class="text-[#bc8f8f] font-cursive text-3xl">Capture the moments</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mb-16">
        <div class="bg-white/50 p-6 rounded-sm border border-dashed border-[#e8d5d5]">
            <h2 class="font-serif-vintage text-xl text-[#8b5e5e] mb-4">Single Portrait</h2>
            <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="file" name="image" required 
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 transition-all">
                <button type="submit" class="w-full border border-[#bc8f8f] text-[#bc8f8f] py-2 text-xs uppercase tracking-widest hover:bg-[#bc8f8f] hover:text-white transition-all">
                    Upload Photo
                </button>
            </form>
        </div>

        <div class="bg-white/50 p-6 rounded-sm border border-dashed border-[#e8d5d5]">
            <h2 class="font-serif-vintage text-xl text-[#8b5e5e] mb-4">Photo Series</h2>
            <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="file" name="images[]" multiple required 
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 transition-all">
                <button type="submit" class="w-full border border-[#bc8f8f] text-[#bc8f8f] py-2 text-xs uppercase tracking-widest hover:bg-[#bc8f8f] hover:text-white transition-all">
                    Upload Collection
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-100 text-green-600 text-sm p-3 rounded-lg text-center mb-8 italic">
            {{ session('success') }} ✨
        </div>
    @endif
    @if(session('error'))
    <div class="bg-red-50 border border-red-100 text-red-400 text-sm p-3 rounded-lg text-center mb-8 italic">
        {{ session('error') }} 🥀
    </div>
@endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
        @foreach ($photos as $photo)
            <div class="bg-white p-4 shadow-lg rotate-[-2deg] hover:rotate-0 transition-transform duration-500 border border-gray-100">
                <div class="overflow-hidden aspect-square mb-4 bg-gray-50">
                    <img src="{{ asset('images/' . $photo->image) }}" alt="Uploaded Image" class="w-full h-full object-cover">
                </div>
                
                <div class="text-center space-y-3">
                    <p class="font-cursive text-2xl text-[#8b5e5e] truncate px-2">{{ $photo->title }}</p>
                    
                    <div class="flex justify-center gap-4 text-[10px] uppercase tracking-widest text-[#bc8f8f] border-t pt-3 border-pink-50">
                        
                        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:text-red-400">Discard</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection