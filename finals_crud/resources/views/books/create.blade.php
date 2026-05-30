@extends('layouts.app')

@section('content')
    <div class="text-center space-y-2 mb-8">
        <h1 class="font-serif-coquette text-4xl text-[#d88a8a] font-bold">Add New Book</h1>
        <p class="text-pink-300 italic text-sm">Fill your library with wonderful stories ✨</p>
    </div>

    <form action="{{ route('books.store') }}" method="POST" class="max-w-md mx-auto space-y-6">
        @csrf

        <div class="flex flex-col gap-2">
            <label for="title" class="text-[#d88a8a] font-semibold ml-2">Title</label>
            <input type="text" id="title" name="title" required 
                placeholder="The Secret Garden..."
                class="w-full px-5 py-3 rounded-2xl border border-pink-100 focus:border-[#ffc0cb] focus:ring-4 focus:ring-pink-100 outline-none transition-all placeholder:text-pink-200 text-gray-600">
        </div>

        <div class="flex flex-col gap-2">
            <label for="author" class="text-[#d88a8a] font-semibold ml-2">Author</label>
            <input type="text" id="author" name="author" required 
                placeholder="Jane Doe"
                class="w-full px-5 py-3 rounded-2xl border border-pink-100 focus:border-[#ffc0cb] focus:ring-4 focus:ring-pink-100 outline-none transition-all placeholder:text-pink-200 text-gray-600">
        </div>

        <div class="flex flex-col gap-2">
            <label for="published_date" class="text-[#d88a8a] font-semibold ml-2">Published Date</label>
            <input type="date" id="published_date" name="published_date" required 
                class="w-full px-5 py-3 rounded-2xl border border-pink-100 focus:border-[#ffc0cb] focus:ring-4 focus:ring-pink-100 outline-none transition-all text-gray-600">
        </div>

        <div class="flex flex-col gap-3 pt-4">
            <button type="submit" 
                class="w-full bg-[#ffc0cb] hover:bg-[#ffb3bf] text-white py-3 rounded-full font-bold shadow-md shadow-pink-200/50 transition-all hover:scale-[1.02] active:scale-95">
                Save Book 🌷
            </button>
            
            <a href="{{ route('books.index') }}" class="text-center text-pink-300 text-sm hover:text-[#d88a8a] transition-colors">
                Cancel and go back
            </a>
        </div>
    </form>
@endsection