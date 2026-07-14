<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Mikale Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Allison&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        .font-allison {
            font-family: 'Allison', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F9F8F3] font-poppins flex h-screen overflow-hidden">

    @include('admin.partials.sidebar')

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <header
            class="md:hidden sticky top-0 bg-white z-30 px-6 py-4 flex justify-between items-center border-b border-gray-100">
            <div class="flex items-center gap-2">
                <span class="font-allison text-3xl text-[#8C6C47]">M</span>
                <span class="font-serif text-xs font-bold tracking-widest">MIKALE</span>
            </div>
            <button onclick="document.getElementById('mobile-admin-menu').classList.remove('translate-x-full')"
                class="text-xl">
                <i class="fa-solid fa-bars"></i>
            </button>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-8">
            @yield('content')
        </div>
    </main>

    @include('admin.partials.mobile-menu')
</body>

</html>