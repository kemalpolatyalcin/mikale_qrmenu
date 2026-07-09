<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikale Yönetim Paneli</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-sans {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans flex text-gray-800">

    <aside class="w-64 bg-gray-900 text-white h-screen flex flex-col fixed shadow-2xl z-20">
        <div class="p-6 text-center border-b border-gray-800 mt-2">
            <h1 class="text-3xl font-serif tracking-widest text-[#8C6C47]">MİKALE</h1>
            <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-widest">Yönetim Paneli</p>
        </div>
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="/admin"
                class="flex items-center gap-3 bg-gray-800 text-white px-4 py-3.5 rounded-xl transition-colors font-medium text-sm border border-gray-700">
                <i class="fa-solid fa-chart-pie w-5"></i> Özet Tablo
            </a>
            <a href="#"
                class="flex items-center gap-3 text-gray-400 hover:bg-gray-800 hover:text-white px-4 py-3.5 rounded-xl transition-colors font-medium text-sm">
                <i class="fa-solid fa-utensils w-5"></i> Ürün Yönetimi
            </a>
            <a href="#"
                class="flex items-center gap-3 text-gray-400 hover:bg-gray-800 hover:text-white px-4 py-3.5 rounded-xl transition-colors font-medium text-sm">
                <i class="fa-solid fa-list w-5"></i> Kategoriler
            </a>
            <a href="#"
                class="flex items-center gap-3 text-gray-400 hover:bg-gray-800 hover:text-white px-4 py-3.5 rounded-xl transition-colors font-medium text-sm">
                <i class="fa-solid fa-bell w-5"></i> Canlı Siparişler
            </a>
        </nav>
        <div class="p-4 border-t border-gray-800 mb-4">
            <a href="/" target="_blank"
                class="flex items-center justify-center gap-2 bg-[#8C6C47] hover:bg-[#7a5e3d] text-white px-4 py-3 rounded-xl transition-colors text-sm font-semibold">
                Menüyü Görüntüle <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-xs"></i>
            </a>
        </div>
    </aside>

    <main class="ml-64 flex-1 p-8 min-h-screen">
        <header
            class="flex justify-between items-center mb-10 bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Hoş Geldiniz, Yönetici</h2>
                <p class="text-sm text-gray-500 mt-1">Sistemin genel durumunu buradan takip edebilirsiniz.</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-100 rounded-full flex justify-center items-center border border-gray-200">
                    <i class="fa-solid fa-user-shield text-gray-600 text-lg"></i>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">Toplam Ürün</p>
                    <h3 class="text-4xl font-bold text-gray-900">{{ $totalProducts }}</h3>
                </div>
                <div
                    class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex justify-center items-center text-2xl shadow-inner">
                    <i class="fa-solid fa-box-open"></i>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">Kategori Sayısı</p>
                    <h3 class="text-4xl font-bold text-gray-900">{{ $totalCategories }}</h3>
                </div>
                <div
                    class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex justify-center items-center text-2xl shadow-inner">
                    <i class="fa-solid fa-tags"></i>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="absolute top-0 right-0 w-2 h-full bg-orange-400"></div>
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">Bekleyen Sipariş</p>
                    <h3 class="text-4xl font-bold text-gray-900">0</h3>
                </div>
                <div
                    class="w-14 h-14 bg-orange-50 text-orange-500 rounded-2xl flex justify-center items-center text-2xl shadow-inner">
                    <i class="fa-solid fa-bell"></i>
                </div>
            </div>

        </div>

        <div
            class="bg-gray-900 text-white p-8 rounded-2xl shadow-lg border-l-8 border-[#8C6C47] relative overflow-hidden">
            <i class="fa-brands fa-laravel absolute -right-4 -bottom-8 text-[120px] text-gray-800 opacity-50"></i>
            <div class="relative z-10">
                <h3 class="text-xl font-bold mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-green-400"></i> Admin paneli aktif!
                </h3>
                <p class="text-gray-300 text-sm max-w-2xl leading-relaxed">
                    Yukarıdaki veriler ({{ $totalProducts }} ürün ve {{ $totalCategories }} kategori) veritabanınızdan
                    anlık olarak çekilmektedir. Sol menüdeki modüller bağlandıkça tüm işlemlerinizi bu güvenli panel
                    üzerinden yapabileceksiniz.
                </p>
            </div>
        </div>

    </main>

</body>

</html>