<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikale Food Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Allison&family=Playfair+Display:ital,wght@1,600&family=Inter:wght@400;500;600&family=Poppins:wght@300;400&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            bg: '#F9F8F3',
                            gold: '#8C6C47',
                            text: '#1C1C1C'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .font-allison {
            font-family: 'Allison', cursive;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-sans {
            font-family: 'Inter', sans-serif;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes scaleFadeIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideRight {
            0% {
                transform: translateX(-100%) translateY(-20px);
                opacity: 0;
            }

            100% {
                transform: translateX(0) translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideLeft {
            0% {
                transform: translateX(100%) translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateX(0) translateY(0);
                opacity: 1;
            }
        }

        .anim-stripe-top {
            animation: slideRight 1.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        .anim-stripe-bottom {
            animation: slideLeft 1.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        .anim-logo {
            animation: scaleFadeIn 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
            opacity: 0;
        }

        .page-view {
            display: none;
            animation: scaleFadeIn 0.3s ease-out forwards;
        }

        .page-view.active {
            display: block;
        }

        .bottom-sheet {
            position: absolute;
            bottom: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: #F9F8F3;
            transition: bottom 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            z-index: 60;
            display: flex;
            flex-direction: column;
        }

        .bottom-sheet.open {
            bottom: 0;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
            z-index: 55;
        }

        .overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        input[type="radio"],
        input[type="checkbox"] {
            accent-color: #8C6C47;
        }
    </style>
</head>

<body class="bg-gray-200 flex justify-center h-screen items-center font-sans">

    <div
        class="w-full max-w-md h-full sm:h-[850px] bg-brand-bg relative overflow-hidden flex flex-col shadow-2xl sm:rounded-3xl">

        <div id="splash-screen"
            class="absolute inset-0 z-[100] bg-brand-bg flex justify-center items-center transition-opacity duration-700 ease-in-out">
            <svg class="absolute top-[30%] left-0 w-full h-16 anim-stripe-top text-brand-gold" viewBox="0 0 1440 150"
                preserveAspectRatio="none" fill="currentColor">
                <path d="M0,60 C400,160 1000,-40 1440,60 L1440,85 C1000,-15 400,185 0,85 Z"></path>
            </svg>
            <div class="font-allison text-[8rem] text-black relative z-10 anim-logo pr-4 pt-4">M</div>
            <svg class="absolute bottom-[30%] left-0 w-full h-16 anim-stripe-bottom text-brand-gold"
                viewBox="0 0 1440 150" preserveAspectRatio="none" fill="currentColor">
                <path d="M0,60 C400,160 1000,-40 1440,60 L1440,85 C1000,-15 400,185 0,85 Z"></path>
            </svg>
        </div>

        <header id="main-header" class="hidden justify-between items-center px-6 pt-12 pb-4">
            <div class="font-allison text-5xl text-black leading-none pt-2">M</div>
            <div class="flex items-center gap-4 text-sm font-semibold">
                <div class="bg-gray-200 text-gray-700 px-2 py-1 rounded text-xs font-bold shadow-sm">Masa: <span
                        class="current-table-display">-</span></div>
                <div class="text-gray-600">TR <span class="font-normal text-gray-400">|</span> EN</div>
                <button class="text-xl"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto pb-24 no-scrollbar">

            <div id="view-home" class="page-view active w-full">
                <div class="relative w-full h-[420px]">
                    <img src="images/background.jpg" class="w-full h-full object-cover" alt="">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#F9F8F3] from-10% via-[#F9F8F3]/80 via-45% to-black/20 to-90%">
                    </div>

                    <div class="absolute top-12 right-6 flex items-center gap-3 z-20">
                        <div
                            class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm border border-white/20">
                            Masa: <span class="current-table-display">-</span>
                        </div>
                        <div class="bg-white text-black px-2 py-1 rounded text-xs font-bold shadow-sm">TR <span
                                class="font-normal text-gray-400">|</span> EN</div>
                        <button class="text-white text-xl drop-shadow-md"><i
                                class="fa-solid fa-cart-shopping"></i></button>
                    </div>

                    <div class="absolute bottom-4 left-0 w-full text-center z-10 px-4">
                        <h1 class="text-[31px] font-poppins font-light text-[#1C1C1C] leading-tight">Harika
                            Tatlar,<br>Güzel Anılar...</h1>
                    </div>
                </div>

                <svg class="w-full h-12 text-brand-gold -mt-6 relative z-10 drop-shadow-sm" viewBox="0 0 1440 150"
                    preserveAspectRatio="none" fill="currentColor">
                    <path d="M0,60 C400,160 1000,-40 1440,60 L1440,85 C1000,-15 400,185 0,85 Z"></path>
                </svg>

                <div class="flex flex-col items-center px-8 pt-6 pb-8 text-center bg-brand-bg">
                    <div class="font-allison text-[7rem] leading-none text-black mb-6">M</div>
                    <p class="text-[21px] font-poppins font-normal text-brand-text mb-10 leading-snug">
                        Gelenekten ilham alan lezzetleri modern bir dokunuşla sunuyor, her ziyareti özel bir anıya
                        dönüştürüyoruz
                    </p>
                    <div class="relative w-full max-w-sm cursor-pointer" onclick="switchView('search')">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 transform -translate-y-1/2 text-black text-lg"></i>
                        <input type="text" placeholder="Arama...."
                            class="w-full bg-white border border-gray-400 rounded-full py-4 pl-14 pr-4 focus:outline-none text-sm pointer-events-none text-black shadow-sm font-poppins font-normal">
                    </div>
                </div>
            </div>

            <div id="view-search" class="page-view px-6">
                <div class="relative mb-6 mt-2">
                    <i
                        class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 transform -translate-y-1/2 text-black text-lg"></i>
                    <input type="text" placeholder="Arama...."
                        class="w-full bg-white border border-gray-300 rounded-full py-3.5 pl-14 pr-4 focus:outline-none text-sm text-black shadow-sm font-poppins font-normal">
                </div>

                <div id="category-list" class="flex flex-col gap-4 pb-4">
                    <p class="text-center text-gray-500 py-4">Kategoriler yükleniyor...</p>
                </div>

                <div id="dynamic-product-list" class="hidden flex-col gap-4 mt-6 border-t border-gray-200 pt-6"></div>
            </div>

            <div id="view-history" class="page-view px-6">
                <div class="flex items-center gap-4 mb-6 mt-4">
                    <h2 class="font-serif text-2xl mx-auto font-semibold">Sipariş Geçmişi</h2>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-100 pb-4">
                        <div class="flex items-center gap-2">
                            <div
                                class="w-10 h-10 bg-brand-bg rounded-full flex items-center justify-center text-brand-gold">
                                <i class="fa-solid fa-utensils"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-text">Masa <span class="current-table-display">-</span>
                                </h3>
                                <p class="text-[10px] text-gray-500">Güncel Oturum</p>
                            </div>
                        </div>
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded font-semibold">Aktif</span>
                    </div>

                    <div id="history-items" class="flex flex-col gap-3">
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-700">2x</span>
                                <span>Cheddar Burger</span>
                            </div>
                            <span class="font-semibold">₺450</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-700">1x</span>
                                <span>Kutu Kola</span>
                            </div>
                            <span class="font-semibold">₺60</span>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="font-medium text-gray-500 text-sm">Toplam Tutar</span>
                        <span class="font-bold text-lg">₺510</span>
                    </div>
                </div>
            </div>

            <div id="view-profile" class="page-view px-6">
                <div class="flex flex-col items-center mt-4">
                    <div class="relative">
                        <div class="w-36 h-36 rounded-full bg-gray-200 overflow-hidden border-4 border-white shadow-md">
                            <img src="images/profil.jpg" alt="Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-4">
                        <h2 id="profile-name" class="text-2xl font-medium text-brand-text">Yükleniyor...</h2>
                        <i class="fa-regular fa-pen-to-square text-gray-400 text-sm cursor-pointer"></i>
                    </div>
                    <p class="text-gray-500 mt-1">Hesabım</p>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div
                        class="bg-white rounded-2xl p-4 flex flex-col items-center justify-center shadow-sm cursor-pointer">
                        <i class="fa-regular fa-file-lines text-3xl mb-2 text-brand-text"></i>
                        <span class="text-xs font-medium">Siparişlerim</span>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-4 flex flex-col items-center justify-center shadow-sm cursor-pointer">
                        <i class="fa-regular fa-heart text-3xl mb-2 text-brand-text"></i>
                        <span class="text-xs font-medium">Favoriler</span>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-4 flex flex-col items-center justify-center shadow-sm cursor-pointer">
                        <i class="fa-solid fa-location-dot text-3xl mb-2 text-brand-text"></i>
                        <span class="text-xs font-medium">Adreslerim</span>
                    </div>
                </div>

                <h3 class="font-bold text-sm mt-8 mb-4">Daha Fazla</h3>
                <div class="flex flex-col">
                    <div class="flex justify-between items-center py-4 border-b border-gray-200 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <i class="fa-regular fa-circle-question text-xl"></i>
                            <span class="font-medium">Yardım Merkezi</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-400"></i>
                    </div>
                    <div class="flex justify-between items-center py-4 border-b border-gray-200 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-gear text-xl"></i>
                            <span class="font-medium">Ayarlar</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-400"></i>
                    </div>
                </div>

                <button
                    class="w-full mt-8 border-2 border-black rounded-xl py-3 font-semibold hover:bg-black hover:text-white transition-colors">Çıkış
                    Yap</button>
            </div>

        </main>

        <nav
            class="absolute bottom-0 w-full bg-white rounded-t-3xl shadow-[0_-5px_15px_rgba(0,0,0,0.05)] px-8 py-4 pb-6 flex justify-between items-center text-xs font-medium text-gray-500 z-50">
            <button onclick="switchView('home')"
                class="nav-btn active flex flex-col items-center gap-1 hover:text-brand-gold transition-colors text-brand-gold"
                data-target="home">
                <i class="fa-solid fa-house text-lg mb-0.5"></i><span>Home</span>
            </button>
            <button onclick="switchView('search')"
                class="nav-btn flex flex-col items-center gap-1 hover:text-brand-gold transition-colors"
                data-target="search">
                <i class="fa-solid fa-magnifying-glass text-lg mb-0.5"></i><span>Search</span>
            </button>
            <button onclick="switchView('history')"
                class="nav-btn flex flex-col items-center gap-1 hover:text-brand-gold transition-colors"
                data-target="history">
                <i class="fa-regular fa-clock text-lg mb-0.5"></i><span>History</span>
            </button>
            <button onclick="switchView('profile')"
                class="nav-btn flex flex-col items-center gap-1 hover:text-brand-gold transition-colors"
                data-target="profile">
                <i class="fa-regular fa-user text-lg mb-0.5"></i><span>Profile</span>
            </button>
        </nav>

        <div id="overlay" class="overlay" onclick="closeProductModal()"></div>
        <div id="product-modal" class="bottom-sheet overflow-hidden flex flex-col">
            <div class="relative h-48 shrink-0 rounded-b-[2rem] shadow-sm z-10">
                <img id="modal-image" src="" class="w-full h-full object-cover rounded-b-[2rem]" alt="">
                <button type="button" onclick="closeProductModal()"
                    class="absolute top-6 left-6 w-10 h-10 bg-white/90 backdrop-blur hover:bg-white rounded-full flex justify-center items-center text-black text-xl shadow-md cursor-pointer transition-colors">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>
            </div>
            <div class="p-6 flex-1 overflow-y-auto no-scrollbar pb-6 bg-brand-bg -mt-4 pt-10">
                <div class="flex justify-between items-start mb-2">
                    <h2 id="modal-title" class="text-3xl font-serif font-semibold text-gray-900 leading-tight">
                        Yükleniyor...</h2>
                    <span id="modal-price" class="text-brand-gold font-bold text-xl mt-1">₺0</span>
                </div>

                <div class="flex items-center gap-4 text-xs text-gray-500 mb-5">
                    <div
                        class="flex items-center gap-1 bg-white border border-gray-200 px-2.5 py-1.5 rounded-lg shadow-sm">
                        <i class="fa-solid fa-star text-yellow-500 text-[10px]"></i>
                        <span class="font-semibold text-gray-800">4.8</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <i class="fa-regular fa-clock text-gray-400"></i>
                        <span class="font-medium">15-20 dk</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <i class="fa-solid fa-fire text-gray-400"></i>
                        <span class="font-medium">450 kcal</span>
                    </div>
                </div>

                <p id="modal-desc" class="text-sm text-gray-600 mb-6 leading-relaxed">Detaylar yükleniyor...</p>

                <div class="w-full h-px bg-gray-200 mb-6"></div>

                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-bold text-gray-800 text-lg">Sos Seçimi</h3>
                    <span
                        class="bg-gray-200 text-gray-600 text-[10px] uppercase font-bold tracking-wider px-2 py-1 rounded-md">Zorunlu</span>
                </div>
                <div class="flex flex-col gap-3 mb-8">
                    <label
                        class="flex justify-between items-center cursor-pointer bg-white border border-gray-100 p-3.5 rounded-xl shadow-sm hover:border-brand-gold transition-colors">
                        <span class="font-medium text-sm text-gray-800">Mayonez</span>
                        <input type="radio" name="sos" value="mayonez" class="w-4 h-4">
                    </label>
                    <label
                        class="flex justify-between items-center cursor-pointer bg-white border border-gray-100 p-3.5 rounded-xl shadow-sm hover:border-brand-gold transition-colors">
                        <span class="font-medium text-sm text-gray-800">Barbekü</span>
                        <input type="radio" name="sos" value="barbeku" checked class="w-4 h-4">
                    </label>
                </div>

                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-bold text-gray-800 text-lg">Ekstra Malzeme</h3>
                    <span
                        class="bg-gray-200 text-gray-600 text-[10px] uppercase font-bold tracking-wider px-2 py-1 rounded-md">Opsiyonel</span>
                </div>
                <div class="flex flex-col gap-3 mb-6">
                    <label
                        class="flex justify-between items-center cursor-pointer bg-white border border-gray-100 p-3.5 rounded-xl shadow-sm hover:border-brand-gold transition-colors">
                        <span class="font-medium text-sm text-gray-800">Turşu</span>
                        <input type="checkbox" name="ekstra" value="tursu" class="w-4 h-4 rounded">
                    </label>
                </div>
            </div>
        </div>

    </div>

    <script>
        let allProducts = [];
        let currentTable = 'Bilinmiyor';

        document.addEventListener("DOMContentLoaded", () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('masa')) {
                currentTable = urlParams.get('masa');
            } else if (urlParams.has('table')) {
                currentTable = urlParams.get('table');
            }

            document.querySelectorAll('.current-table-display').forEach(el => {
                el.innerText = currentTable;
            });

            const minSplashTime = new Promise(resolve => setTimeout(resolve, 1500));

            const fetchCat = fetch('/api/categories')
                .then(res => res.json())
                .catch(err => {
                    return { status: 'error', data: [] };
                });

            fetchUser();
            fetchProducts();

            Promise.all([fetchCat, minSplashTime])
                .then(([result]) => {
                    hideSplashScreen();
                    if (result && result.status === 'success') {
                        renderCategories(result.data);
                    } else {
                        renderCategories([]);
                    }
                })
                .catch(() => {
                    hideSplashScreen();
                    renderCategories([]);
                });
        });

        function renderCategories(categories) {
            const container = document.getElementById('category-list');
            container.innerHTML = '';

            const fallbackCategories = [
                { name: 'BAŞLANGIÇ', image_url: 'images/baslangic.jpg' },
                { name: 'PİZZA', image_url: 'images/pizza.jpg' },
                { name: 'KEBAP', image_url: 'images/kebap.webp' },
                { name: 'DÖNER', image_url: 'images/doner.jpg' },
                { name: 'MAKARNA', image_url: 'images/makarna.jpg' },
                { name: 'İÇECEKLER', image_url: 'images/kahve.png' }
            ];

            const dataToRender = (categories && categories.length > 0) ? categories : fallbackCategories;

            dataToRender.forEach(cat => {
                const imgUrl = cat.image_url || '';
                const catName = cat.name.toUpperCase();

                container.innerHTML += `
                    <div class="w-full h-[110px] rounded-[18px] relative overflow-hidden shadow-sm cursor-pointer hover:opacity-95 transition-opacity" onclick="showProducts('${catName}')">
                        <img src="${imgUrl}" class="absolute inset-0 w-full h-full object-cover" alt="${catName}">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/95 via-black/50 to-transparent"></div>
                        <div class="absolute inset-y-0 left-6 flex items-center z-10">
                            <h3 class="text-white font-serif text-[1.1rem] tracking-wide uppercase">${catName}</h3>
                        </div>
                    </div>
                `;
            });
        }

        function showProducts(categoryName) {
            document.getElementById('category-list').classList.add('hidden');
            document.getElementById('dynamic-product-list').classList.remove('hidden');
            document.getElementById('dynamic-product-list').classList.add('flex');
            renderProducts(allProducts);
        }

        function fetchProducts() {
            fetch('/api/products')
                .then(res => res.json())
                .then(result => {
                    if (result.status === 'success') {
                        allProducts = result.data;
                    }
                })
                .catch(err => console.error(err));
        }

        function renderProducts(products) {
            const container = document.getElementById('dynamic-product-list');
            container.innerHTML = `
                <div class="flex items-center gap-4 mb-2">
                    <button onclick="backToCategories()" class="text-xl"><i class="fa-solid fa-chevron-left"></i></button>
                    <h3 class="font-serif text-2xl font-semibold">Ürünler</h3>
                </div>
            `;

            products.forEach(product => {
                const glutenFreeTag = product.is_gluten_free ? '<span class="text-[10px] bg-[#8C6C47] text-white px-2 py-0.5 rounded ml-2">Glutensiz</span>' : '';
                const imgUrl = product.image_url || '';

                container.innerHTML += `
                    <div onclick="openProductModal(${product.id})" class="bg-white rounded-2xl flex p-2 shadow-sm cursor-pointer hover:shadow-md transition-shadow animate-fade-in-up">
                        <img src="${imgUrl}" class="w-32 h-24 object-cover rounded-xl shrink-0" alt="">
                        <div class="ml-4 flex flex-col justify-center flex-1">
                            <h4 class="font-semibold text-brand-text text-sm flex items-center">${product.name} ${glutenFreeTag}</h4>
                            <p class="text-xs text-gray-500 line-clamp-2 mt-1">${product.description}</p>
                            <div class="flex justify-between items-end mt-2">
                                <span class="font-semibold">₺${product.price}</span>
                                <div class="text-[10px] text-gray-500 flex gap-2">
                                    <span><i class="fa-solid fa-fire text-gray-400"></i> ${product.calories} kcal</span>
                                    <span><i class="fa-regular fa-clock text-gray-400"></i> ${product.prep_time} dk</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function backToCategories() {
            document.getElementById('category-list').classList.remove('hidden');
            document.getElementById('dynamic-product-list').classList.add('hidden');
            document.getElementById('dynamic-product-list').classList.remove('flex');
        }

        function fetchUser() {
            fetch('/api/user')
                .then(res => res.json())
                .then(result => {
                    if (result.status === 'success') {
                        document.getElementById('profile-name').innerText = result.data.name || result.data.full_name || 'Kullanıcı';
                    }
                })
                .catch(err => console.error(err));
        }

        function hideSplashScreen() {
            const splash = document.getElementById('splash-screen');
            splash.classList.add('opacity-0');
            setTimeout(() => splash.remove(), 700);
        }

        function switchView(viewName) {
            document.querySelectorAll('.page-view').forEach(view => {
                view.classList.remove('active');
            });
            const targetView = document.getElementById(`view-${viewName}`);
            if (targetView) targetView.classList.add('active');

            const header = document.getElementById('main-header');
            if (header) {
                if (viewName === 'home') {
                    header.classList.add('hidden');
                    header.classList.remove('flex');
                } else {
                    header.classList.remove('hidden');
                    header.classList.add('flex');
                }
            }

            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('text-brand-gold');
                if (btn.dataset.target === viewName) {
                    btn.classList.add('text-brand-gold');
                }
            });
        }

        function openProductModal(productId) {
            const product = allProducts.find(p => p.id == productId);
            if (!product) return;

            document.getElementById('modal-image').src = product.image_url || '';
            document.getElementById('modal-title').innerText = product.name;
            document.getElementById('modal-price').innerText = `₺${product.price}`;
            document.getElementById('modal-desc').innerText = product.description;

            document.getElementById('overlay').classList.add('open');
            document.getElementById('product-modal').classList.add('open');
        }

        function closeProductModal() {
            document.getElementById('overlay').classList.remove('open');
            document.getElementById('product-modal').classList.remove('open');
        }
    </script>
</body>

</html>