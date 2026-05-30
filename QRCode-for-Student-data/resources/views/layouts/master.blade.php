<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academy Registry — Coquette Edition</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Pinyon+Script&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --soft-pink: #FDF2F4;
            --coquette-gold: #D4AF37;
            --ribbon-pink: #FFB7C5;
        }
        body { font-family: 'Montserrat', sans-serif; background-color: #FCF9F7; }
        .serif { font-family: 'Playfair Display', serif; }
        .fancy { font-family: 'Pinyon Script', cursive; }
        
        /* Ribbon Border Effect */
        .ribbon-border {
            border-style: solid;
            border-width: 8px;
            border-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 20 L40 20 M20 0 L20 40' stroke='%23FFB7C5' stroke-width='1' fill='none'/%3E%3C/svg%3E") 30 repeat;
        }
    </style>
</head>
<body class="flex min-h-screen">

    <aside class="w-64 bg-white border-r border-[#F2E8E8] flex flex-col items-center py-10 px-4 fixed h-full">
        <div class="mb-10 text-center">
            <span class="text-4xl">🎀</span>
            <h1 class="serif text-2xl italic text-[#8B5E5E] mt-2">Pangasinan State University</h1>
            <p class="fancy text-3xl text-[#D4AF37] -mt-2"></p>
        </div>

        <nav class="flex flex-col space-y-4 w-full">
            <a href="{{ route('students.index') }}" class="group flex items-center justify-between px-4 py-2 rounded-full hover:bg-[#FDF2F4] transition">
                <span class="text-[#8B5E5E] font-medium tracking-wide">Registry</span>
                <span class="opacity-0 group-hover:opacity-100 transition text-[#FFB7C5]">✿</span>
            </a>
            <a href="{{ route('students.create') }}" class="group flex items-center justify-between px-4 py-2 rounded-full hover:bg-[#FDF2F4] transition">
                <span class="text-[#8B5E5E] font-medium tracking-wide">New Student</span>
                <span class="opacity-0 group-hover:opacity-100 transition text-[#FFB7C5]">✿</span>
            </a>
        </nav>

        <div class="mt-auto">
            <div class="w-12 h-[1px] bg-[#D4AF37] mx-auto mb-4"></div>
            <p class="text-[10px] uppercase tracking-[0.2em] text-[#C2A3A3]">Est. 2026</p>
        </div>
    </aside>

    <main class="ml-64 flex-grow p-12">
        @if(session('success'))
            <div class="max-w-4xl mx-auto bg-[#FDF2F4] border border-[#FFB7C5] text-[#8B5E5E] px-6 py-3 rounded-full text-center text-sm italic mb-8">
                {{ session('success') }} 🎀
            </div>
        @endif

        <div class="max-w-6xl mx-auto">
            @yield('content')
        </div>
    </main>

</body>
</html>