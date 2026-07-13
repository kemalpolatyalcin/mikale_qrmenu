<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Mikale | Ayarlar ve Masalar</title>
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

    <aside class="w-64 bg-white shadow-xl flex flex-col justify-between hidden md:flex z-20 relative shrink-0">
        <div>
            <div class="h-24 flex items-center justify-center border-b border-gray-100 mb-6">
                <span class="font-allison text-6xl text-[#1C1C1C] mt-4">M</span>
                <span class="text-xl font-bold ml-2 tracking-widest text-[#1C1C1C]">MIKALE</span>
            </div>
            <nav class="px-4 space-y-2">
                <a href="{{ url('/') }}" target="_blank"
                    class="flex items-center gap-3 px-4 py-3 text-[#8C6C47] bg-amber-50 hover:bg-amber-100 rounded-xl transition-all mb-4 border border-amber-100 shadow-sm"><i
                        class="fa-solid fa-arrow-up-right-from-square w-5 text-center"></i><span
                        class="font-medium text-sm">Menüyü Görüntüle</span></a>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
                        class="fa-solid fa-chart-pie w-5"></i><span class="font-medium text-sm">Gösterge
                        Paneli</span></a>
                <a href="{{ route('admin.categories') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
                        class="fa-solid fa-layer-group w-5"></i><span class="font-medium text-sm">Kategoriler</span></a>
                <a href="{{ route('admin.products') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
                        class="fa-solid fa-utensils w-5"></i><span class="font-medium text-sm">Ürünler</span></a>
                <a href="{{ route('admin.orders') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
                        class="fa-solid fa-bell-concierge w-5"></i><span class="font-medium text-sm">Aktif
                        Siparişler</span></a>
                <a href="{{ route('admin.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-[#8C6C47] text-white rounded-xl shadow-md transition-all"><i
                        class="fa-solid fa-gear w-5"></i><span class="font-medium text-sm">Ayarlar</span></a>
            </nav>
        </div>
        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-medium text-sm"><i
                        class="fa-solid fa-arrow-right-from-bracket w-5"></i> Çıkış Yap</button></form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <header
            class="h-20 bg-white/80 backdrop-blur-md flex items-center justify-between px-8 shadow-sm z-10 shrink-0">
            <h2 class="text-xl font-semibold text-gray-800">Sistem ve Masa Ayarları</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8 no-scrollbar space-y-8">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 max-w-3xl">
                <h3 class="text-base font-semibold text-gray-800 mb-4">Restoran Yapılandırması</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div><label class="block text-xs font-medium text-gray-500 mb-1">Restoran Adı</label><input
                            type="text" value="Mikale Restaurant" readonly
                            class="w-full bg-gray-50 px-4 py-2 rounded-xl text-sm border font-medium text-gray-700">
                    </div>
                    <div><label class="block text-xs font-medium text-gray-500 mb-1">Para Birimi</label><input
                            type="text" value="TRY (₺)" readonly
                            class="w-full bg-gray-50 px-4 py-2 rounded-xl text-sm border font-medium text-gray-700">
                    </div>
                    <div><label class="block text-xs font-medium text-gray-500 mb-1">Toplam Tanımlı Masa</label><input
                            type="text" value="12" readonly
                            class="w-full bg-gray-50 px-4 py-2 rounded-xl text-sm border font-medium text-gray-700">
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 max-w-3xl">
                <h3 class="text-base font-semibold text-gray-800 mb-1">Masa QR Kod Bağlantıları</h3>
                <p class="text-xs text-gray-400 mb-6">Aşağıdaki bağlantıları kullanarak masalara özel QR kodlarınızı
                    üretebilirsiniz.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @for ($i = 1; $i <= 12; $i++)
                        @php $tableUrl = url('/?masa=' . sprintf("%02d", $i)); @endphp
                        <div class="p-3 border border-gray-100 rounded-xl bg-gray-50/50 flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-gray-800">Masa {{ sprintf("%02d", $i) }} URL</p>
                                <p class="text-[10px] text-gray-400 font-mono truncate w-52 mt-0.5">{{ $tableUrl }}</p>
                            </div>
                            <a href="{{ $tableUrl }}" target="_blank"
                                class="w-8 h-8 rounded-lg bg-amber-50 text-[#8C6C47] hover:bg-[#8C6C47] hover:text-white flex items-center justify-center transition-all shadow-sm">
                                <i class="fa-solid fa-external-link text-xs"></i>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </main>
</body>

</html>