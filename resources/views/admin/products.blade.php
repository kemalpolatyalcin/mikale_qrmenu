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
                <a href="{{ url('/') }}" target="_blank"
                    class="flex items-center gap-3 px-4 py-3 text-[#8C6C47] bg-amber-50 hover:bg-amber-100 rounded-xl transition-all mb-4 border border-amber-100 shadow-sm">
                    <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center"></i>
                    <span class="font-medium text-sm">Menüyü Görüntüle</span>
                </a>
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

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
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
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm">
                                    <option value="" disabled selected>Kategori Seçin...</option>
                                    @foreach($categories as $cat) <option value="{{ $cat->id }}">{{ $cat->name }}
                                    </option> @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Ürün Adı</label>
                                <input type="text" name="name" required placeholder="Örn: Cheddar Burger"
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm">
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
                                <label class="block text-xs font-medium text-gray-700 mb-1">Açıklama</label>
                                <textarea name="description" rows="2"
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm"
                                    placeholder="İçindekiler..."></textarea>
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
                        <table class="min-w-full">
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
                                            <img src="{{ asset($product->image_url ?: 'images/none.png') }}"
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
                                        <td class="p-4 text-right space-x-1">
                                            <button onclick="openEditProductModal({{ json_encode($product) }})"
                                                class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white inline-flex items-center justify-center transition-colors">
                                                <i class="fa-solid fa-pen text-xs"></i>
                                            </button>
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

        <div id="edit-product-modal"
            class="absolute inset-0 bg-black/60 hidden items-center justify-center z-50 backdrop-blur-sm">
            <div
                class="bg-white rounded-3xl p-8 w-full max-w-md mx-4 shadow-2xl relative max-h-[90vh] overflow-y-auto no-scrollbar">
                <button onclick="closeEditProductModal()"
                    class="absolute top-6 right-6 w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-red-50 transition-colors"><i
                        class="fa-solid fa-xmark"></i></button>
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Ürünü Düzenle</h3>
                <form id="edit-product-form" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Kategori</label>
                        <select id="edit-category-id" name="category_id" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm">
                            @foreach($categories as $cat) <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Ürün Adı</label>
                        <input type="text" id="edit-product-name" name="name" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="block text-xs font-medium text-gray-700 mb-1">Fiyat (₺)</label><input
                                type="number" id="edit-product-price" name="price" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm"></div>
                        <div><label class="block text-xs font-medium text-gray-700 mb-1">Kalori (kcal)</label><input
                                type="number" id="edit-product-calories" name="calories"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm"></div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Açıklama</label>
                        <textarea id="edit-product-desc" name="description" rows="2"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Yeni Görsel</label>
                        <input type="file" name="image" accept="image/*"
                            class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-amber-50 file:text-[#8C6C47]">
                    </div>
                    <label class="flex items-center gap-2 cursor-pointer mt-2">
                        <input type="checkbox" id="edit-product-gf" name="is_gluten_free" value="1"
                            class="w-4 h-4 accent-[#8C6C47]">
                        <span class="text-sm font-medium text-gray-700">Bu ürün Glutensiz (GF)</span>
                    </label>
                    <button type="submit"
                        class="w-full bg-[#8C6C47] text-white font-medium py-3.5 rounded-xl transition-colors mt-2">Değişiklikleri
                        Kaydet</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        function openEditProductModal(product) {
            const form = document.getElementById('edit-product-form');
            form.action = `/admin/products/update/${product.id}`;
            document.getElementById('edit-category-id').value = product.category_id;
            document.getElementById('edit-product-name').value = product.name;
            document.getElementById('edit-product-price').value = product.price;
            document.getElementById('edit-product-calories').value = product.calories;
            document.getElementById('edit-product-desc').value = product.description;
            document.getElementById('edit-product-gf').checked = product.is_gluten_free == 1;

            const modal = document.getElementById('edit-product-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeEditProductModal() {
            const modal = document.getElementById('edit-product-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>

</html>