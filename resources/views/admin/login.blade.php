<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikale | Yönetici Girişi</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-[#F9F8F3] h-screen flex items-center justify-center font-poppins">

    <div class="bg-white p-10 rounded-3xl shadow-xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <div class="font-allison text-[6rem] text-[#1C1C1C] leading-none mb-2">M</div>
            <h1 class="text-xl font-semibold text-gray-800 tracking-wide uppercase">Yönetim Paneli</h1>
            <div class="mt-4 bg-red-50 border border-red-100 p-3 rounded-xl">
                <p class="text-xs text-red-600 font-semibold flex items-center justify-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Bu sayfa sadece adminler içindir!
                </p>
                <p class="text-[10px] text-red-500 mt-1">Yetkisiz kişilerin bu panele girişi yasaktır.</p>
            </div>
        </div>
        <p class="text-sm text-gray-500 mt-1">Lütfen yönetici bilgilerinizi girin</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-600 p-3 rounded-xl text-sm mb-6 text-center border border-red-100">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">E-posta Adresi</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8C6C47] focus:border-[#8C6C47] outline-none transition-all text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Şifre</label>
            <input type="password" name="password" required
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8C6C47] focus:border-[#8C6C47] outline-none transition-all text-sm">
        </div>

        <button type="submit"
            class="w-full bg-[#1C1C1C] text-white font-medium py-3.5 rounded-xl hover:bg-[#8C6C47] transition-colors mt-4 shadow-md">
            Giriş Yap
        </button>
    </form>
    </div>

</body>
<header
    class="md:hidden sticky top-0 bg-white/90 backdrop-blur-md shadow-sm z-30 px-6 py-4 flex justify-between items-center border-b border-gray-100">
    <div class="font-allison text-3xl text-black leading-none">M</div>
    <button onclick="document.getElementById('mobile-admin-menu').classList.remove('translate-x-full')"
        class="text-gray-800 text-2xl focus:outline-none">
        <i class="fa-solid fa-bars"></i>
    </button>
</header>
<div id="mobile-admin-menu"
    class="fixed inset-0 z-50 transform translate-x-full transition-transform duration-300 md:hidden">
    <div class="absolute inset-0 bg-black/50"
        onclick="document.getElementById('mobile-admin-menu').classList.add('translate-x-full')"></div>
    <div class="absolute top-0 right-0 w-64 h-full bg-white shadow-xl flex flex-col justify-between py-6 px-4">
        <div>
            <div class="flex justify-between items-center mb-8 px-2 border-b border-gray-100 pb-4">
                <span class="font-serif text-xl font-bold tracking-widest text-[#1C1C1C]">MIKALE</span>
                <button onclick="document.getElementById('mobile-admin-menu').classList.add('translate-x-full')"
                    class="text-gray-500 text-xl focus:outline-none"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <nav class="space-y-3">
                <a href="{{ url('/') }}" target="_blank"
                    class="flex items-center gap-3 px-4 py-3 text-[#8C6C47] bg-amber-50 rounded-xl font-medium text-sm">
                    <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center"></i> Menüyü Görüntüle
                </a>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl font-medium text-sm transition-all">
                    <i class="fa-solid fa-chart-pie w-5 text-center"></i> Gösterge Paneli
                </a>
                <a href="{{ route('admin.categories') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl font-medium text-sm transition-all">
                    <i class="fa-solid fa-layer-group w-5 text-center"></i> Kategoriler
                </a>
                <a href="{{ route('admin.products') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl font-medium text-sm transition-all">
                    <i class="fa-solid fa-utensils w-5 text-center"></i> Ürünler
                </a>
                <a href="{{ route('admin.orders') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl font-medium text-sm transition-all">
                    <i class="fa-solid fa-bell-concierge w-5 text-center"></i> Aktif Siparişler
                </a>
                <a href="{{ route('admin.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 text-white bg-[#8C6C47] rounded-xl shadow-md font-medium text-sm mt-4">
                    <i class="fa-solid fa-gear w-5 text-center"></i> Ayarlar
                </a>
            </nav>
        </div>

        <div class="mt-4 border-t border-gray-100 pt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl font-medium text-sm transition-all">
                    <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center"></i> Çıkış Yap
                </button>
            </form>
        </div>
    </div>
</div>

</html>