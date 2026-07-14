<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikale | Yönetim Paneli</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Allison&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        .font-allison {
            font-family: 'Allison', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#F9F9F9] font-poppins flex h-screen w-full overflow-hidden">

    @include('admin.partials.sidebar')

    <div class="flex-1 flex flex-col h-screen min-w-0 bg-[#F9F9F9]">

        <header
            class="md:hidden h-16 w-full bg-white border-b border-gray-100 px-6 flex items-center justify-between shrink-0 z-20">
            <div class="font-allison text-4xl text-black pt-1">M</div>
            <button id="mobileMenuBtn" class="text-gray-800 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </header>

        <header
            class="hidden md:flex h-20 w-full bg-white border-b border-gray-100 px-8 items-center justify-between shrink-0 z-10">
            <div class="flex items-center gap-4">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Yönetim Paneli</span>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" target="_blank"
                    class="bg-amber-50 hover:bg-amber-100 text-[#8C6C47] font-semibold text-xs px-4 py-2.5 rounded-xl border border-amber-100 transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-eye text-xs"></i>
                    <span>Menüyü Görüntüle</span>
                </a>
                <a href="{{ route('admin.orders') }}"
                    class="bg-gray-50 hover:bg-gray-100 text-gray-700 font-semibold text-xs px-4 py-2.5 rounded-xl border border-gray-200 transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-bell text-xs text-amber-500"></i>
                    <span>Aktif Siparişler</span>
                </a>
                <a href="{{ route('admin.settings') }}"
                    class="bg-gray-50 hover:bg-gray-100 text-gray-700 font-semibold text-xs px-4 py-2.5 rounded-xl border border-gray-200 transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-gear text-xs text-gray-500"></i>
                    <span>Ayarlar</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="w-10 h-10 bg-red-50 hover:bg-red-100 text-red-500 rounded-xl border border-red-100 transition-colors flex items-center justify-center"
                        title="Çıkış Yap">
                        <i class="fa-solid fa-right-from-bracket text-sm"></i>
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 w-full overflow-y-auto p-4 md:p-8 no-scrollbar relative">
            @yield('content')
        </main>
    </div>

</body>

</html>