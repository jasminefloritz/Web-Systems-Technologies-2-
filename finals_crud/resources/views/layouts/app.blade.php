<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books - Coquette Edition</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,700&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Quicksand', sans-serif; }
        .font-serif-coquette { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#fdf0f0] min-h-screen p-10 flex flex-col">
    <div class="fixed inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(#ffc0cb 1px, transparent 0.5px); background-size: 24px 24px;"></div>

    <div class="relative max-w-3xl w-full mx-auto bg-[#fffaff] p-10 rounded-[30px] border-2 border-[#ffc0cb] shadow-xl shadow-pink-200/50 flex-grow">
        <div class="absolute -top-7 left-1/2 -translate-x-1/2 bg-[#fdf0f0] px-4 text-4xl">
            🎀
        </div>

        <main>
            @yield('content')
        </main>

        <footer class="mt-12 pt-6 border-t border-pink-100 text-center">
            <p class="font-serif-coquette text-[#d88a8a] italic text-lg">
                Floritz Jasmine S. Dumpit
            </p>
            <p class="text-pink-300 text-xs uppercase tracking-[0.2em] mt-1">
                &copy; Activity-Finals : Using ORM
            </p>
        </footer>
    </div>
</body>
</html>