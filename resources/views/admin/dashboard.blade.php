<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikale | Yönetim Paneli</title>
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

    <aside class="w-64 bg-white shadow-xl flex flex-col justify-between hidden md:flex z-20 relative">
        <div>
            <div class="h-24 flex items-center justify-center border-b border-gray-100 mb-6">
                <span class="font-allison text-6xl text-[#1C1C1C] mt-4">M</span>
                <span class="text-xl font-bold ml-2 tracking-widest text-[#1C1C1C]">MIKALE</span>
            </div>

            <nav class="px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-[#8C6C47] text-white rounded-xl shadow-md transition-all">
                    <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                    <span class="font-medium text-sm">Gösterge Paneli</span>
                </a>
                <a href="{{ route('admin.categories') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all">
                    <i class="fa-solid fa-layer-group w-5 text-center"></i>
                    <span class="font-medium text-sm">Kategoriler</span>
                </a>
                <a href="{{ route('admin.products') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all">
                    <i class="fa-solid fa-utensils w-5 text-center"></i>
                    <span class="font-medium text-sm">Ürünler</span>
                </a>
                <a href="{{ route('admin.orders') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all">
                    <i class="fa-solid fa-bell-concierge w-5 text-center"></i>
                    <span class="font-medium text-sm">Aktif Siparişler</span>
                </a>
                <a href="{{ route('admin.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all">
                    <i class="fa-solid fa-gear w-5 text-center"></i>
                    <span class="font-medium text-sm">Ayarlar</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-medium text-sm">
                    <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center"></i>
                    Çıkış Yap
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-y-auto">
        <header
            class="h-20 bg-white/80 backdrop-blur-md flex items-center justify-between px-8 shadow-sm z-10 sticky top-0">
            <h2 class="text-xl font-semibold text-gray-800">Gösterge Paneli</h2>
            <div class="flex items-center gap-4">
                <div
                    class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 font-bold border-2 border-[#8C6C47]">
                    {{ substr(Auth::user()->full_name ?? Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="hidden sm:block text-sm">
                    <p class="font-bold text-gray-800">{{ Auth::user()->full_name ?? Auth::user()->name ?? 'Yönetici' }}
                    </p>
                    <p class="text-xs text-gray-500">Admin</p>
                </div>
            </div>
        </header>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-14 h-14 bg-amber-50 text-[#8C6C47] rounded-xl flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Toplam Kategori</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $categoryCount ?? 0 }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Toplam Ürün</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $productCount ?? 0 }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-14 h-14 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-qrcode"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Aktif Masalar</p>
                        <p class="text-2xl font-bold text-gray-800">12</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-14 h-14 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Bugünkü Ziyaretçi</p>
                        <p class="text-2xl font-bold text-gray-800">340</p>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
                <i class="fa-solid fa-wand-magic-sparkles text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Sistem Başarıyla Kuruldu</h3>
                <p class="text-gray-500 text-sm max-w-md mx-auto">Sol taraftaki menüyü kullanarak restoranınızın
                    kategorilerini, ürünlerini ve ayarlarını yönetmeye başlayabilirsiniz.</p>
            </div>
        </div>
    </main>

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