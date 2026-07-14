@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto pb-10">
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Restoran Profili</h1>
            <p class="text-sm text-gray-500">Logonuzu, fotoğraflarınızı ve müşterilerinize görünen diğer işletme
                bilgilerinizi buradan güncelleyebilirsiniz.</p>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-700 p-4 rounded-xl mb-6 border border-green-100 flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 mb-6 border-b pb-2"><i
                        class="fa-solid fa-image text-[#8C6C47] mr-2"></i>Görsel Ayarları</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Restoran Logosu</label>
                        @if(isset($settings['logo']) && $settings['logo'] != '')
                            <div class="mb-3 bg-gray-50 p-2 rounded-xl inline-block border border-gray-200">
                                <img src="{{ asset($settings['logo']) }}" alt="Logo" class="h-16 object-contain">
                            </div>
                        @endif
                        <input type="file" name="logo" accept="image/*"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-[#8C6C47] hover:file:bg-amber-100 transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Menü Karşılama Fotoğrafı (Arka
                            Plan)</label>
                        @if(isset($settings['cover_image']) && $settings['cover_image'] != '')
                            <div class="mb-3 bg-gray-50 rounded-xl overflow-hidden border border-gray-200 h-24 relative">
                                <img src="{{ asset($settings['cover_image']) }}" alt="Cover" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <input type="file" name="cover_image" accept="image/*"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-[#8C6C47] hover:file:bg-amber-100 transition-all">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 mb-6 border-b pb-2"><i
                        class="fa-solid fa-store text-[#8C6C47] mr-2"></i>Temel Bilgiler</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Restoran Adı</label>
                        <input type="text" name="restaurant_name" value="{{ $settings['restaurant_name'] ?? 'Mikale' }}"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#8C6C47] transition-all">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Slogan (Karşılama Metni)</label>
                        <input type="text" name="slogan"
                            value="{{ $settings['slogan'] ?? 'Harika Tatlar, Güzel Anılar...' }}"
                            placeholder="Örn: En taze kahveler, en güzel tatlılar..."
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#8C6C47] transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Para Birimi Sembolü</label>
                        <select name="currency"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#8C6C47] transition-all">
                            <option value="₺" {{ ($settings['currency'] ?? '') == '₺' ? 'selected' : '' }}>₺ (TL)</option>
                            <option value="$" {{ ($settings['currency'] ?? '') == '$' ? 'selected' : '' }}>$ (USD)</option>
                            <option value="€" {{ ($settings['currency'] ?? '') == '€' ? 'selected' : '' }}>€ (EUR)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Müşteri Wi-Fi Şifresi</label>
                        <input type="text" name="wifi_password" value="{{ $settings['wifi_password'] ?? '' }}"
                            placeholder="Menüde gösterilecek..."
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#8C6C47] transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Telefon Numarası</label>
                        <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#8C6C47] transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Çalışma Saatleri</label>
                        <input type="text" name="working_hours" value="{{ $settings['working_hours'] ?? '' }}"
                            placeholder="Örn: 09:00 - 23:00"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#8C6C47] transition-all">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Açık Adres</label>
                        <textarea name="address" rows="2"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#8C6C47] transition-all">{{ $settings['address'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="mt-8 pt-4 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-[#1C1C1C] hover:bg-[#8C6C47] text-white font-medium py-3 px-8 rounded-xl transition-colors shadow-md flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Değişiklikleri Kaydet
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection