<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Book Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Playfair+Display:ital,wght@0,400;1,700&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background-color: #fcf8f2; }
        .font-cursive { font-family: 'Italianno', cursive; }
        .font-serif-vintage { font-family: 'Playfair Display', serif; }
        
        /* Victorian Lace Border Effect */
        .lace-border {
            border: 15px solid transparent;
            border-image: radial-gradient(#e8d5d5 2px, transparent 2px) 100% 100%;
            border-image-repeat: round;
        }
    </style>
</head>
<body class="min-h-screen py-12 px-6 flex flex-col items-center">
    <div class="fixed inset-0 pointer-events-none opacity-30 z-0" style="background-image: url('https://www.transparenttextures.com/patterns/paper.png');"></div>

    <div class="relative max-w-2xl w-full bg-[#fffcf9] p-8 md:p-12 shadow-[0_0_50px_rgba(216,138,138,0.15)] rounded-sm lace-border z-10">
        
        <div class="absolute -top-10 -right-5 text-6xl select-none rotate-12 opacity-80">🌸</div>
        <div class="absolute -bottom-10 -left-5 text-6xl select-none -rotate-12 opacity-80">🌿</div>

        <main>
            @yield('content')
        </main>

        <footer class="mt-16 text-center border-t border-[#e8d5d5] pt-8">
            <p class="font-cursive text-4xl text-[#bc8f8f]">With much affection,</p>
            <p class="text-[10px] tracking-[0.3em] uppercase text-[#d2b48c] mt-2 font-bold">
                Floritz Jasmine • Activity-Finals ORM
            </p>
        </footer>
    </div>
</body>
</html>