@include('admin.dashboard')
<script>
    document.querySelector('main').innerHTML = `
        <header class="h-20 bg-white/80 backdrop-blur-md flex items-center px-8 shadow-sm z-10"><h2 class="text-xl font-semibold text-gray-800">Sistem Ayarları</h2></header>
        <div class="flex-1 flex flex-col items-center justify-center text-gray-400">
            <i class="fa-solid fa-gears text-6xl mb-4"></i>
            <h3 class="text-xl font-medium text-gray-600">Ayarlar Modülü Yapım Aşamasında</h3>
            <p class="text-sm mt-2">Masa sayıları, dil seçenekleri ve QR kod üretimi burada olacak.</p>
        </div>
    `;
</script>