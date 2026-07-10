<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Mikale | Ürünler</title>
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
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
                        class="fa-solid fa-chart-pie w-5"></i><span class="font-medium text-sm">Gösterge
                        Paneli</span></a>
                <a href="{{ route('admin.categories') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
                        class="fa-solid fa-layer-group w-5"></i><span class="font-medium text-sm">Kategoriler</span></a>
                <a href="{{ route('admin.products') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-[#8C6C47] text-white rounded-xl shadow-md transition-all"><i
                        class="fa-solid fa-utensils w-5"></i><span class="font-medium text-sm">Ürünler</span></a>
                <a href="{{ route('admin.orders') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
                        class="fa-solid fa-bell-concierge w-5"></i><span class="font-medium text-sm">Aktif
                        Siparişler</span></a>
                <a href="{{ route('admin.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-[#8C6C47] rounded-xl transition-all"><i
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
            <h2 class="text-xl font-semibold text-gray-800">Ürün Yönetimi</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8 no-scrollbar">
            @if(session('success'))
                <div class="bg-green-50 text-green-700 p-4 rounded-xl mb-6 border border-green-200"><i
            class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}</div> @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-0">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-4">Yeni Ürün Ekle</h3>
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Kategori</label>
                                <select name="category_id" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8C6C47] text-sm">
                                    <option value="" disabled selected>Kategori Seçin...</option>
                                    @foreach($categories as $cat) <option value="{{ $cat->id }}">{{ $cat->name }}
                                    </option> @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Ürün Adı</label>
                                <input type="text" name="name" required placeholder="Örn: Cheddar Burger"
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm focus:ring-[#8C6C47]">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div><label class="block text-xs font-medium text-gray-700 mb-1">Fiyat (₺)</label><input
                                        type="number" name="price" required placeholder="150"
                                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm"></div>
                                <div><label class="block text-xs font-medium text-gray-700 mb-1">Kalori
                                        (kcal)</label><input type="number" name="calories" placeholder="450"
                                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm"></div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Açıklama
                                    (İçindekiler)</label>
                                <textarea name="description" rows="2"
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm focus:ring-[#8C6C47]"
                                    placeholder="150gr dana eti, cheddar, karamelize soğan..."></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Görsel</label>
                                <input type="file" name="image" accept="image/*"
                                    class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-amber-50 file:text-[#8C6C47]">
                            </div>
                            <label class="flex items-center gap-2 cursor-pointer mt-2">
                                <input type="checkbox" name="is_gluten_free" value="1" class="w-4 h-4 accent-[#8C6C47]">
                                <span class="text-sm font-medium text-gray-700">Bu ürün Glutensiz (GF)</span>
                            </label>
                            <button type="submit"
                                class="w-full bg-[#1C1C1C] text-white font-medium py-3 rounded-xl hover:bg-[#8C6C47] transition-colors mt-4">Kaydet</button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-50 border-b border-gray-100">
                                <tr>
                                    <th class="p-4 text-xs font-semibold text-gray-600">Ürün</th>
                                    <th class="p-4 text-xs font-semibold text-gray-600">Fiyat</th>
                                    <th class="p-4 text-xs font-semibold text-gray-600 text-right">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($products as $product)
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-4 flex items-center gap-4">
                                            <img src="{{ asset($product->image_url ?? 'images/placeholder.jpg') }}"
                                                class="w-12 h-12 rounded-lg object-cover bg-gray-200">
                                            <div>
                                                <p class="font-medium text-gray-800 text-sm">{{ $product->name }}
                                                    @if($product->is_gluten_free) <span
                                                        class="text-[9px] bg-amber-100 text-[#8C6C47] px-2 py-0.5 rounded">GF</span>
                                                    @endif</p>
                                                <p class="text-xs text-gray-500 line-clamp-1 w-48">
                                                    {{ $product->description }}</p>
                                            </div>
                                        </td>
                                        <td class="p-4 font-semibold text-[#8C6C47] text-sm">₺{{ $product->price }}</td>
                                        <td class="p-4 text-right">
                                            <a href="{{ route('admin.products.delete', $product->id) }}"
                                                onclick="return confirm('Emin misiniz?')"
                                                class="inline-flex w-8 h-8 items-center justify-center rounded-full bg-red-50 text-red-600 hover:bg-red-600 hover:text-white"><i
                                                    class="fa-solid fa-trash text-xs"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-8 text-center text-gray-500">Hiç ürün eklenmemiş.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>