<div id="mobile-admin-menu"
    class="fixed inset-0 z-50 transform translate-x-full transition-transform duration-300 md:hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"
        onclick="document.getElementById('mobile-admin-menu').classList.add('translate-x-full')"></div>
    <div class="absolute top-0 right-0 w-64 h-full bg-white shadow-2xl p-6">
        <button onclick="document.getElementById('mobile-admin-menu').classList.add('translate-x-full')"
            class="absolute top-4 right-4 text-2xl"><i class="fa-solid fa-xmark"></i></button>
        <nav class="mt-12 space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="block p-3 border-b">Gösterge Paneli</a>
            <a href="{{ route('admin.categories') }}" class="block p-3 border-b">Kategoriler</a>
            <a href="{{ route('admin.products') }}" class="block p-3 border-b">Ürünler</a>
        </nav>
    </div>
</div>