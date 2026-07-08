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

        .category-card {
            background-size: cover;
            background-position: center;
            position: relative;
            cursor: pointer;
        }

        .category-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.1) 100%);
            border-radius: 0.75rem;
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
            height: 90%;
            background: #F9F8F3;
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            transition: bottom 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            z-index: 60;
            box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.2);
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

        input[type="radio"] {
            accent-color: #1C1C1C;
            width: 1.25rem;
            height: 1.25rem;
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
                <div class="text-gray-600">TR <span class="font-normal text-gray-400">|</span> EN</div>
                <button class="text-xl"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto pb-24 no-scrollbar">

            <div id="view-home" class="page-view active w-full">

                <div class="relative w-full h-[420px]">
                    <img src="images/background.jpg" class="w-full h-full object-cover" alt="Background">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#F9F8F3] from-10% via-[#F9F8F3]/80 via-45% to-black/20 to-90%">
                    </div>

                    <div class="absolute top-12 right-6 flex items-center gap-3 z-20">
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

                <div id="category-list" class="hidden"></div>
            </div>

            <div id="view-search" class="page-view px-6">
                <div class="flex items-center gap-4 mb-6">
                    <button onclick="switchView('home')" class="text-xl"><i
                            class="fa-solid fa-chevron-left"></i></button>
                    <h2 class="font-serif text-2xl mx-auto font-semibold">Arama</h2>
                    <div class="w-5"></div>
                </div>

                <div class="relative mb-6">
                    <i
                        class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <input type="text" placeholder="Yemek veya kategori ara..."
                        class="w-full bg-white border border-gray-300 rounded-full py-3 pl-12 pr-12 focus:outline-none focus:border-brand-gold text-sm shadow-sm">
                    <i
                        class="fa-solid fa-sliders absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>

                <div class="flex gap-2 overflow-x-auto no-scrollbar pb-2 mb-6">
                    <button
                        class="bg-[#8C6C47] text-white px-4 py-2 rounded-lg text-sm whitespace-nowrap shadow-md">Glutensiz</button>
                    <button
                        class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm whitespace-nowrap">Fıstıksız</button>
                    <button
                        class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm whitespace-nowrap">Kahvaltılık</button>
                </div>

                <div id="dynamic-product-list" class="flex flex-col gap-4">
                    <p class="text-center text-gray-500 py-4">Ürünler yükleniyor...</p>
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
            class="absolute bottom-0 w-full bg-white rounded-t-3xl shadow-[0_-5px_15px_rgba(0,0,0,0.05)] px-6 py-3 pb-6 flex justify-between items-center text-xs font-medium text-gray-500 z-50">
            <button onclick="switchView('home')"
                class="nav-btn active flex flex-col items-center gap-1 hover:text-brand-gold transition-colors text-brand-gold"
                data-target="home">
                <i class="fa-solid fa-house text-lg"></i><span>Home</span>
            </button>
            <button onclick="switchView('search')"
                class="nav-btn flex flex-col items-center gap-1 hover:text-brand-gold transition-colors"
                data-target="search">
                <i class="fa-solid fa-magnifying-glass text-lg"></i><span>Search</span>
            </button>
            <div class="relative -top-6">
                <button
                    class="bg-brand-gold text-white w-14 h-14 rounded-full flex justify-center items-center shadow-lg border-4 border-brand-bg hover:scale-105 transition-transform">
                    <i class="fa-solid fa-expand text-xl"></i>
                </button>
            </div>
            <button onclick="switchView('history')"
                class="nav-btn flex flex-col items-center gap-1 hover:text-brand-gold transition-colors"
                data-target="history">
                <i class="fa-regular fa-clock text-lg"></i><span>History</span>
            </button>
            <button onclick="switchView('profile')"
                class="nav-btn flex flex-col items-center gap-1 hover:text-brand-gold transition-colors"
                data-target="profile">
                <i class="fa-regular fa-user text-lg"></i><span>Profile</span>
            </button>
        </nav>

        <div id="overlay" class="overlay" onclick="closeProductModal()"></div>

        <div id="product-modal" class="bottom-sheet overflow-hidden flex flex-col">
            <div class="relative h-64 shrink-0">
                <img id="modal-image" src="" class="w-full h-full object-cover" alt="Ürün Görseli">
                <button type="button" onclick="closeProductModal()"
                    class="absolute top-4 left-4 w-10 h-10 bg-white hover:bg-gray-100 rounded-full flex justify-center items-center text-black text-xl shadow-lg z-[100] cursor-pointer transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-6 flex-1 overflow-y-auto no-scrollbar">
                <h2 id="modal-title" class="text-2xl font-semibold">Yükleniyor...</h2>
                <div class="flex items-center gap-3 mt-1 mb-3">
                    <span id="modal-price" class="text-green-600 font-semibold">₺0</span>
                    <div class="flex items-center text-sm text-gray-600">
                        <span class="font-medium mr-1">(4.06)</span>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                    </div>
                </div>

                <p id="modal-desc" class="font-medium text-brand-text mb-6">Detaylar yükleniyor...</p>

                <svg class="w-full h-8 mb-6 text-brand-gold drop-shadow-sm" viewBox="0 0 1440 150"
                    preserveAspectRatio="none" fill="currentColor">
                    <path d="M0,60 C400,160 1000,-40 1440,60 L1440,85 C1000,-15 400,185 0,85 Z"></path>
                </svg>

                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-lg">Sos Seçimi</h3>
                    <span class="bg-black text-white text-xs px-2 py-1 rounded">Zorunlu</span>
                </div>

                <div class="flex flex-col gap-4 mb-8">
                    <label class="flex justify-between items-center cursor-pointer">
                        <span class="font-medium">Mayonez</span>
                        <input type="radio" name="sos" value="mayonez">
                    </label>
                    <label class="flex justify-between items-center cursor-pointer">
                        <span class="font-medium">Barbekü</span>
                        <input type="radio" name="sos" value="barbeku" checked>
                    </label>
                </div>

                <h3 class="font-bold text-lg mb-4">Ekstra Malzeme</h3>
                <div class="flex flex-col gap-4 mb-24">
                    <label class="flex justify-between items-center cursor-pointer">
                        <span class="font-medium">Turşu</span>
                        <input type="radio" name="ekstra" value="tursu">
                    </label>
                </div>
            </div>

            <div
                class="absolute bottom-0 w-full bg-white p-4 shadow-[0_-5px_15px_rgba(0,0,0,0.05)] border-t border-gray-100 z-50">
                <button
                    class="w-full bg-black text-white rounded-xl py-3 font-semibold text-lg flex justify-between px-6">
                    <span>Sepete Ekle</span>
                    <span id="modal-btn-price">₺0</span>
                </button>
            </div>
        </div>

    </div>

    <script>
        let allProducts = [];

        document.addEventListener("DOMContentLoaded", () => {
            const minSplashTime = new Promise(resolve => setTimeout(resolve, 2000));
            const fetchData = fetch('/api/categories').then(res => res.json());

            fetchUser();
            fetchProducts();

            Promise.all([fetchData, minSplashTime])
                .then(([result]) => {
                    hideSplashScreen();
                })
                .catch(() => hideSplashScreen());
        });

        function fetchProducts() {
            fetch('/api/products')
                .then(res => res.json())
                .then(result => {
                    if (result.status === 'success') {
                        allProducts = result.data;
                        renderProducts(allProducts);
                    }
                })
                .catch(err => console.error('API Hatası:', err));
        }

        function renderProducts(products) {
            const container = document.getElementById('dynamic-product-list');
            container.innerHTML = '<h3 class="font-serif text-2xl mb-2">Tüm Ürünler</h3>';

            products.forEach(product => {
                const glutenFreeTag = product.is_gluten_free ? '<span class="text-[10px] bg-[#8C6C47] text-white px-2 py-0.5 rounded ml-2">Glutensiz</span>' : '';

                container.innerHTML += `
                    <div onclick="openProductModal(${product.id})" class="bg-white rounded-2xl flex p-2 shadow-sm cursor-pointer hover:shadow-md transition-shadow mb-2 animate-fade-in-up">
                        <img src="${product.image_url}" class="w-32 h-24 object-cover rounded-xl shrink-0" alt="${product.name}">
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

        function fetchUser() {
            fetch('/api/user')
                .then(res => res.json())
                .then(result => {
                    if (result.status === 'success') {
                        document.getElementById('profile-name').innerText = result.data.full_name;
                    }
                })
                .catch(err => console.error('API Hatası:', err));
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

            document.getElementById('modal-image').src = product.image_url;
            document.getElementById('modal-title').innerText = product.name;
            document.getElementById('modal-price').innerText = `₺${product.price}`;
            document.getElementById('modal-desc').innerText = product.description;
            document.getElementById('modal-btn-price').innerText = `₺${product.price}`;

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