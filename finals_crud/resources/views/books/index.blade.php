@extends('layouts.app')

@section('content')
    <div class="text-center space-y-2 mb-8">
        <h1 class="font-serif-coquette text-4xl text-[#d88a8a] font-bold">All Books</h1>
        <h3 class="text-[#d88a8a] italic font-light">Floritz Jasmine S. Dumpit</h3>
        <h2 class="text-sm uppercase tracking-widest text-pink-400 font-semibold">Activity-Finals: Using ORM</h2>
    </div>

    <div class="flex justify-center mb-8">
        <a href="{{ route('books.create') }}" 
           class="bg-[#ffc0cb] hover:bg-[#ffb3bf] text-white px-8 py-2 rounded-full font-bold shadow-md transition-all hover:scale-105 active:scale-95">
           ✨ Add New Book
        </a>
    </div>

    <ul class="space-y-4">
        @foreach ($books as $book)
            <li class="bg-white p-5 rounded-2xl border-l-8 border-[#ffc0cb] flex items-center justify-between shadow-sm hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="font-serif-coquette text-xl text-gray-700 leading-tight">{{ $book->title }}</p>
                    <p class="text-sm text-gray-400 italic">by {{ $book->author }} ({{ $book->published_date }})</p>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('books.edit', $book->id) }}" 
                       class="text-[#d88a8a] hover:text-[#d4af37] text-sm font-medium transition-colors">
                       Edit
                    </a>

                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="border border-pink-100 px-4 py-1 rounded-full text-pink-300 text-xs hover:bg-pink-50 transition-colors">
                            Delete
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection