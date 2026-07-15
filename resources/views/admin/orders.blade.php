<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Mikale | Canlı Siparişler</title>
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

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <header
            class="md:hidden bg-white/90 shadow-sm z-30 px-6 py-4 flex justify-between items-center border-b border-gray-100 shrink-0">
            <div class="font-allison text-3xl text-black leading-none">M</div>
            <button onclick="document.getElementById('mobile-admin-menu').classList.remove('translate-x-full')"
                class="text-gray-800 text-2xl focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </header>

        <header
            class="hidden md:flex h-20 bg-white/80 backdrop-blur-md items-center justify-between px-8 shadow-sm z-10 shrink-0">
            <h2 class="text-xl font-semibold text-gray-800">Canlı Sipariş Paneli</h2>
            <span
                class="bg-green-500/10 text-green-600 px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-2 animate-pulse"><span
                    class="w-2 h-2 rounded-full bg-green-500"></span> Otomatik Güncelleniyor</span>
        </header>

        <div class="flex-1 overflow-y-auto p-8 no-scrollbar">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between">
                    <div class="p-5 border-b border-gray-50 bg-amber-50/50 flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-gray-800">Masa 04</h4>
                            <p class="text-[11px] text-gray-400 mt-0.5">Sipariş: #2319</p>
                        </div>
                        <span
                            class="text-[11px] font-bold bg-amber-100 text-[#8C6C47] px-2.5 py-1 rounded-lg">Mutfakta</span>
                    </div>
                    <div class="p-5 flex-1 space-y-3">
                        <div class="flex justify-between text-sm">
                            <p class="text-gray-700 font-medium">2x <span class="text-gray-900 ml-1">Cheddar
                                    Burger</span></p><span class="text-gray-500 font-medium">₺450</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <p class="text-gray-700 font-medium">1x <span class="text-gray-900 ml-1">Kutu Kola</span>
                            </p><span class="text-gray-500 font-medium">₺60</span>
                        </div>
                        <p class="text-xs text-amber-600 bg-amber-50 p-2 rounded-lg font-medium"><i
                                class="fa-solid fa-comment-dots mr-1"></i>Sos Barbekü olsun, turşu bol.</p>
                    </div>
                    <div class="p-5 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-[10px] text-gray-400 font-medium">Toplam Tutar</p>
                            <p class="text-lg font-bold text-gray-800">₺510</p>
                        </div>
                        <button onclick="this.closest('.bg-white').remove()"
                            class="bg-[#1C1C1C] hover:bg-[#8C6C47] text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition-all">Tamamla</button>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between">
                    <div class="p-5 border-b border-gray-50 bg-green-50/50 flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-gray-800">Masa 12</h4>
                            <p class="text-[11px] text-gray-400 mt-0.5">Sipariş: #2318</p>
                        </div>
                        <span
                            class="text-[11px] font-bold bg-green-100 text-green-700 px-2.5 py-1 rounded-lg">Hazır</span>
                    </div>
                    <div class="p-5 flex-1 space-y-3">
                        <div class="flex justify-between text-sm">
                            <p class="text-gray-700 font-medium">1x <span class="text-gray-900 ml-1">Pizza
                                    Margherita</span></p><span class="text-gray-500 font-medium">₺280</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <p class="text-gray-700 font-medium">1x <span class="text-gray-900 ml-1">Ayran</span></p>
                            <span class="text-gray-500 font-medium">₺35</span>
                        </div>
                    </div>
                    <div class="p-5 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-[10px] text-gray-400 font-medium">Toplam Tutar</p>
                            <p class="text-lg font-bold text-gray-800">₺315</p>
                        </div>
                        <button onclick="this.closest('.bg-white').remove()"
                            class="bg-[#1C1C1C] hover:bg-[#8C6C47] text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition-all">Tamamla</button>
                    </div>
                </div>

            </div>
        </div>
    </main>
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
</body>
</html>