@extends('layouts.app')

@section('content')
    <div class="text-center space-y-2 mb-8">
        <div class="inline-block bg-pink-50 text-pink-400 text-xs px-3 py-1 rounded-full uppercase tracking-widest mb-2">
            Editing Entry #{{ $book->id }}
        </div>
        <h1 class="font-serif-coquette text-4xl text-[#d88a8a] font-bold">Edit Book</h1>
        <p class="text-pink-300 italic text-sm">Refining the details of your story... ✒️</p>
    </div>

    <form action="{{ route('books.update', $book->id) }}" method="POST" class="max-w-md mx-auto space-y-6">
        @csrf
        @method('PUT')

        <div class="flex flex-col gap-2">
            <label for="title" class="text-[#d88a8a] font-semibold ml-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $book->title }}" required 
                class="w-full px-5 py-3 rounded-2xl border border-pink-100 focus:border-[#ffc0cb] focus:ring-4 focus:ring-pink-100 outline-none transition-all text-gray-600 bg-white/50">
        </div>

        <div class="flex flex-col gap-2">
            <label for="author" class="text-[#d88a8a] font-semibold ml-2">Author</label>
            <input type="text" id="author" name="author" value="{{ $book->author }}" required 
                class="w-full px-5 py-3 rounded-2xl border border-pink-100 focus:border-[#ffc0cb] focus:ring-4 focus:ring-pink-100 outline-none transition-all text-gray-600 bg-white/50">
        </div>

        <div class="flex flex-col gap-2">
            <label for="published_date" class="text-[#d88a8a] font-semibold ml-2">Published Date</label>
            <input type="date" id="published_date" name="published_date" value="{{ $book->published_date }}" required 
                class="w-full px-5 py-3 rounded-2xl border border-pink-100 focus:border-[#ffc0cb] focus:ring-4 focus:ring-pink-100 outline-none transition-all text-gray-600 bg-white/50">
        </div>

        <div class="flex flex-col gap-3 pt-4">
            <button type="submit" 
                class="w-full bg-[#ffc0cb] hover:bg-[#ffb3bf] text-white py-3 rounded-full font-bold shadow-md shadow-pink-200/50 transition-all hover:scale-[1.02] active:scale-95">
                Save Changes 🎀
            </button>
            
            <a href="{{ route('books.index') }}" class="text-center text-pink-300 text-sm hover:text-[#d88a8a] transition-colors">
                Changed my mind, go back
            </a>
        </div>
    </form>
@endsection