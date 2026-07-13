<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Mikale | Dijital Menü</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Allison&family=Playfair+Display:ital,wght@1,600&family=Inter:wght@400;500;600&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { brand: { bg: '#FDFCF8', gold: '#A88753', dark: '#1A1A1A', gray: '#8E8E8E' } },
                    fontFamily: { sans: ['Poppins', 'sans-serif'], serif: ['Playfair Display', 'serif'], script: ['Allison', 'cursive'] },
                    boxShadow: { 'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)' }
                }
            }
        }
    </script>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .page-view {
            display: none;
            opacity: 0;
        }

        .page-view.active {
            display: block;
            animation: simpleFade 0.3s ease-out forwards;
        }

        @keyframes simpleFade {
            to {
                opacity: 1;
            }
        }

        .modal-container {
            position: fixed;
            z-index: 70;
            background: #FFF;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            will-change: transform;
        }

        @media (max-width: 767px) {
            .modal-container {
                bottom: 0;
                left: 0;
                width: 100%;
                height: 85vh;
                border-radius: 1.5rem 1.5rem 0 0;
                transform: translateY(100%);
                transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1);
            }

            .modal-container.open {
                transform: translateY(0);
            }
        }

        @media (min-width: 768px) {
            .modal-container {
                top: 50%;
                left: 50%;
                width: 100%;
                max-width: 800px;
                height: auto;
                max-height: 90vh;
                border-radius: 1.5rem;
                opacity: 0;
                pointer-events: none;
                transform: translate(-50%, -45%);
                transition: transform 0.3s ease, opacity 0.3s ease;
            }

            .modal-container.open {
                transform: translate(-50%, -50%);
                opacity: 1;
                pointer-events: auto;
            }
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 60;
        }

        .overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        input[type="radio"],
        input[type="checkbox"] {
            accent-color: #A88753;
        }
    </style>
</head>

<body class="bg-brand-bg text-brand-dark font-sans antialiased pb-20 md:pb-0">

    <div id="splash-screen"
        class="fixed inset-0 z-[100] bg-brand-bg flex justify-center items-center transition-opacity duration-300">
        <div class="font-script text-[12rem] text-brand-gold animate-pulse">M</div>
    </div>

    <header class="fixed top-0 w-full z-50 bg-white/95 shadow-sm border-b border-gray-100 transition-all">
        <div class="max-w-6xl mx-auto px-5 lg:px-8 h-16 md:h-20 flex justify-between items-center">

            <div class="flex items-center gap-2 cursor-pointer" onclick="switchView('home')">
                <span class="font-script text-4xl md:text-5xl text-brand-gold leading-none mt-2">M</span>
                <span class="font-serif text-lg md:text-xl font-bold tracking-widest hidden sm:block">MIKALE</span>
            </div>

            <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-brand-gray">
                <button onclick="switchView('home')" class="nav-btn-desktop hover:text-brand-gold transition-colors"
                    data-target="home" data-i18n="navHome">Ana Sayfa</button>
                <button onclick="switchView('search')" class="nav-btn-desktop hover:text-brand-gold transition-colors"
                    data-target="search" data-i18n="navSearch">Menü</button>
                <button onclick="switchView('history')" class="nav-btn-desktop hover:text-brand-gold transition-colors"
                    data-target="history" data-i18n="navHistory">Geçmiş</button>
            </nav>

            <div class="flex items-center gap-3 md:gap-5">
                <div class="flex flex-col items-end mr-1 md:mr-2">
                    <span class="text-[10px] text-brand-gray uppercase tracking-wider font-semibold"
                        data-i18n="tableLabel">Masa</span>
                    <span class="current-table-display text-sm font-bold text-brand-gold leading-none">-</span>
                </div>

                <div class="flex items-center bg-gray-50 rounded-lg p-1 border border-gray-100">
                    <button
                        class="btn-lang-tr px-2.5 py-1 rounded text-brand-dark font-semibold bg-white shadow-sm text-xs transition-all"
                        onclick="changeLanguage('tr')">TR</button>
                    <button
                        class="btn-lang-en px-2.5 py-1 rounded text-brand-gray font-medium text-xs transition-all hover:text-brand-dark"
                        onclick="changeLanguage('en')">EN</button>
                </div>
            </div>
        </div>
    </header>

    <main class="w-full min-h-screen">


        <div id="view-home" class="page-view active w-full pt-16 md:pt-20">
            <div
                class="relative w-full h-[55vh] md:h-[65vh] rounded-b-[2.5rem] md:rounded-b-[4rem] overflow-hidden shadow-soft">
                <img src="images/background.jpg" class="w-full h-full object-cover" alt="Mikale">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                <div
                    class="absolute bottom-0 left-0 w-full px-6 md:px-12 pb-20 md:pb-28 flex flex-col items-center text-center">
                    <span
                        class="text-brand-gold tracking-[0.2em] text-xs font-bold uppercase mb-3 drop-shadow-md">Mikale
                        Restaurant</span>
                    <h1 data-i18n="heroTitle"
                        class="text-4xl md:text-6xl font-serif font-semibold text-white leading-tight mb-4 drop-shadow-lg">
                        Harika Tatlar,<br>Güzel Anılar...</h1>
                    <p data-i18n="heroDesc"
                        class="text-sm md:text-base text-gray-200 font-light leading-relaxed max-w-xl mx-auto drop-shadow-md">
                        Gelenekten ilham alan lezzetleri modern bir dokunuşla sunuyor, her ziyareti özel bir anıya
                        dönüştürüyoruz.</p>
                </div>
            </div>

            <div class="max-w-2xl mx-auto px-5 -mt-8 relative z-20">
                <div class="bg-white p-2 rounded-full shadow-lg border border-gray-100 flex items-center cursor-pointer"
                    onclick="switchView('search')">
                    <div class="w-12 h-12 flex items-center justify-center text-brand-gold"><i
                            class="fa-solid fa-magnifying-glass"></i></div>
                    <input type="text" data-i18n-placeholder="search" placeholder="Lezzet arayın..."
                        class="flex-1 bg-transparent border-none outline-none text-sm font-medium text-brand-dark pointer-events-none">
                    <button
                        class="bg-brand-dark text-white px-6 py-3 rounded-full text-sm font-medium hover:bg-brand-gold transition-colors hidden sm:block">
                        <span data-i18n="navSearch">Menüye Git</span>
                    </button>
                </div>
            </div>

            <div class="mt-12 text-center text-gray-400 text-xs flex flex-col items-center gap-2 pb-8">
                <i class="fa-solid fa-chevron-down animate-bounce"></i>
                <span data-i18n="navSearch">Menüyü Keşfedin</span>
            </div>
        </div>

        <div id="view-search" class="page-view w-full max-w-6xl mx-auto px-5 lg:px-8 pt-24 md:pt-28 py-4 md:py-8">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
                <h2 data-i18n="navSearch" class="font-serif text-3xl md:text-4xl font-semibold text-brand-dark">Menü
                </h2>
                <div class="relative w-full sm:w-72">
                    <i
                        class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" data-i18n-placeholder="search" placeholder="Lezzet arayın..."
                        class="w-full bg-white border border-gray-200 rounded-full py-2.5 pl-11 pr-4 text-sm outline-none focus:border-brand-gold transition-colors shadow-sm">
                </div>
            </div>

            <div id="category-list" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-5 pb-8">
                <div class="col-span-full text-center py-10 text-brand-gray text-sm"><i
                        class="fa-solid fa-spinner fa-spin mr-2"></i> <span data-i18n="loadingCats">Yükleniyor...</span>
                </div>
            </div>

            <div id="dynamic-product-list" class="hidden flex-col pb-8"></div>
        </div>


        <div id="view-history" class="page-view w-full max-w-4xl mx-auto px-5 lg:px-8 pt-24 md:pt-28 py-8">
            <h2 data-i18n="orderHistory" class="font-serif text-3xl md:text-4xl font-semibold mb-8 text-brand-dark">
                Sipariş Geçmişi</h2>

            <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-soft border border-gray-100">
                <div class="flex justify-between items-center mb-8 pb-6 border-b border-gray-50">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-brand-gold border border-gray-100">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                        <div>
                            <p class="text-xs text-brand-gray uppercase tracking-wider font-semibold"
                                data-i18n="tableLabel">Masa</p>
                            <p class="current-table-display font-bold text-lg text-brand-dark leading-none">-</p>
                        </div>
                    </div>
                    <span data-i18n="activeLabel"
                        class="bg-green-50 border border-green-100 text-green-600 text-[10px] md:text-xs px-3 py-1.5 rounded-full font-semibold">Aktif
                        Sipariş</span>
                </div>

                <div id="history-items" class="flex flex-col gap-3">
                    <div class="flex justify-between items-center bg-gray-50 p-4 rounded-2xl border border-gray-100">
                        <div class="flex items-center gap-4">
                            <span
                                class="w-8 h-8 rounded-full bg-white shadow-sm flex items-center justify-center font-bold text-brand-dark text-xs">2x</span>
                            <div>
                                <p class="font-medium text-brand-dark text-sm md:text-base">Cheddar Burger</p>
                                <p class="text-[10px] text-brand-gray">Kola, Turşu</p>
                            </div>
                        </div>
                        <span class="font-bold text-brand-dark">₺450</span>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-50 flex justify-between items-center">
                    <span data-i18n="totalAmount" class="font-medium text-brand-gray">Toplam Tutar</span>
                    <span class="font-bold text-2xl text-brand-gold">₺450</span>
                </div>
            </div>
        </div>

    </main>
    <nav
        class="md:hidden fixed bottom-0 w-full bg-white border-t border-gray-100 px-6 py-2 pb-6 flex justify-between items-center z-40 shadow-[0_-5px_20px_rgba(0,0,0,0.03)]">
        <button onclick="switchView('home')"
            class="nav-btn-mobile flex flex-col items-center gap-1.5 w-16 transition-colors text-brand-gold"
            data-target="home">
            <i class="fa-solid fa-house text-xl"></i>
            <span data-i18n="navHome" class="text-[10px] font-medium">Ana Sayfa</span>
        </button>
        <button onclick="switchView('search')"
            class="nav-btn-mobile flex flex-col items-center gap-1.5 w-16 text-brand-gray hover:text-brand-dark transition-colors"
            data-target="search">
            <i class="fa-solid fa-magnifying-glass text-xl"></i>
            <span data-i18n="navSearch" class="text-[10px] font-medium">Menü</span>
        </button>
        <button onclick="switchView('history')"
            class="nav-btn-mobile flex flex-col items-center gap-1.5 w-16 text-brand-gray hover:text-brand-dark transition-colors"
            data-target="history">
            <i class="fa-regular fa-clock text-xl"></i>
            <span data-i18n="navHistory" class="text-[10px] font-medium">Geçmiş</span>
        </button>
        <button onclick="window.location.href='/admin'"
            class="flex flex-col items-center gap-1.5 w-16 text-brand-gray hover:text-brand-dark transition-colors">
            <i class="fa-solid fa-user-shield text-xl"></i>
            <span class="text-[10px] font-medium">Admin</span>
        </button>
    </nav>

    <div id="overlay" class="overlay" onclick="closeProductModal()"></div>
    <div id="product-modal" class="modal-container shadow-2xl">
        <div class="flex flex-col md:flex-row h-full">
            <div class="relative w-full md:w-2/5 h-56 md:h-full shrink-0 bg-gray-50">
                <img id="modal-image" src="" class="w-full h-full object-cover" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent md:hidden"></div>
                <button type="button" onclick="closeProductModal()"
                    class="absolute top-4 right-4 w-10 h-10 bg-white/90 backdrop-blur rounded-full flex justify-center items-center text-brand-dark shadow-sm hover:scale-105 transition-transform z-10">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <div class="flex-1 flex flex-col h-full bg-white overflow-hidden">
                <div class="p-6 md:p-8 flex-1 overflow-y-auto no-scrollbar">

                    <div class="flex justify-between items-start mb-2">
                        <h2 id="modal-title"
                            class="text-2xl md:text-3xl font-serif font-bold text-brand-dark leading-tight">
                            Yükleniyor...</h2>
                        <div class="text-xl font-bold text-brand-gold">
                            <span id="modal-price">₺0</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 text-xs font-medium text-brand-gray mb-6 mt-3">
                        <span id="modal-cal" class="bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100"><i
                                class="fa-solid fa-fire mr-1 text-orange-400"></i> 0 kcal</span>
                        <span id="modal-time" class="bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100"><i
                                class="fa-regular fa-clock mr-1"></i> 15 dk</span>
                    </div>

                    <p id="modal-desc" class="text-sm text-brand-gray mb-6 leading-relaxed">Detaylar yükleniyor...</p>

                    <div class="w-full h-px bg-gray-100 mb-6"></div>

                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <h3 data-i18n="beverageChoice" class="font-bold text-brand-dark text-sm md:text-base">
                                    İçecek Seçimi</h3>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label
                                    class="flex justify-between items-center cursor-pointer bg-white border border-gray-200 p-3.5 rounded-xl">
                                    <span data-i18n="coke" class="font-medium text-sm text-brand-dark">Kutu Kola
                                        (+₺60)</span>
                                    <input type="checkbox" name="icecek" value="kola" class="w-4 h-4 rounded">
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const translations = {
            tr: {
                heroTitle: "Harika Tatlar,<br>Güzel Anılar...", heroDesc: "Gelenekten ilham alan lezzetleri modern bir dokunuşla sunuyor, her ziyareti özel bir anıya dönüştürüyoruz.",
                search: "Lezzet arayın...", tableLabel: "Masa", loadingCats: "Kategoriler yükleniyor...",
                orderHistory: "Sipariş Geçmişi", currentSession: "Güncel Oturum", activeLabel: "Aktif Sipariş",
                totalAmount: "Toplam Tutar", navHome: "Ana Sayfa", navSearch: "Menü", navHistory: "Geçmiş",
                productsTitle: "Lezzetlerimiz", beverageChoice: "İçecek Seçimi", sauceChoice: "Sos Seçimi", extraIngredients: "Ekstralar",
                optional: "Opsiyonel", required: "Zorunlu", coke: "Kutu Kola (+₺60)", ayran: "Ayran (+₺35)", water: "Su (+₺15)", pickles: "Turşu"
            },
            en: {
                heroTitle: "Great Tastes,<br>Beautiful Memories...", heroDesc: "Offering tradition-inspired flavors with a modern touch, turning every visit into a special memory.",
                search: "Search flavors...", tableLabel: "Table", loadingCats: "Loading categories...",
                orderHistory: "Order History", currentSession: "Current Session", activeLabel: "Active Order",
                totalAmount: "Total Amount", navHome: "Home", navSearch: "Menu", navHistory: "History",
                productsTitle: "Our Flavors", beverageChoice: "Beverages", sauceChoice: "Sauces", extraIngredients: "Extras",
                optional: "Optional", required: "Required", coke: "Coke (+₺60)", ayran: "Ayran (+₺35)", water: "Water (+₺15)", pickles: "Pickles"
            }
        };

        let currentLang = 'tr';
        let allProducts = [];
        let currentTable = '-';

        function changeLanguage(lang) {
            currentLang = lang;

            document.querySelectorAll('.btn-lang-tr').forEach(el => {
                if (lang === 'tr') el.classList.add('bg-white', 'text-brand-dark', 'shadow-sm', 'font-semibold');
                else el.classList.remove('bg-white', 'text-brand-dark', 'shadow-sm', 'font-semibold');
                if (lang !== 'tr') el.classList.add('text-brand-gray', 'bg-transparent');
                else el.classList.remove('text-brand-gray', 'bg-transparent');
            });
            document.querySelectorAll('.btn-lang-en').forEach(el => {
                if (lang === 'en') el.classList.add('bg-white', 'text-brand-dark', 'shadow-sm', 'font-semibold');
                else el.classList.remove('bg-white', 'text-brand-dark', 'shadow-sm', 'font-semibold');
                if (lang !== 'en') el.classList.add('text-brand-gray', 'bg-transparent');
                else el.classList.remove('text-brand-gray', 'bg-transparent');
            });

            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[lang][key]) el.innerHTML = translations[lang][key];
            });

            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                if (translations[lang][key]) el.setAttribute('placeholder', translations[lang][key]);
            });

            const prodTitle = document.getElementById('dynamic-products-title');
            if (prodTitle) prodTitle.innerText = translations[lang].productsTitle;
        }

        document.addEventListener("DOMContentLoaded", () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('masa')) currentTable = urlParams.get('masa');
            else if (urlParams.has('table')) currentTable = urlParams.get('table');

            document.querySelectorAll('.current-table-display').forEach(el => el.innerText = currentTable);
            changeLanguage('tr');

            const minSplashTime = new Promise(resolve => setTimeout(resolve, 800));
            const fetchCat = fetch('/api/categories').then(res => res.json()).catch(() => ({ status: 'error', data: [] }));

            fetchProducts();

            Promise.all([fetchCat, minSplashTime]).then(([result]) => {
                hideSplashScreen();
                if (result && result.status === 'success') renderCategories(result.data);
                else renderCategories([]);
            }).catch(() => { hideSplashScreen(); renderCategories([]); });
        });

        function renderCategories(categories) {
            const container = document.getElementById('category-list');
            container.innerHTML = '';

            const fallbackCategories = [
                { name: 'BAŞLANGIÇ', image_url: 'images/baslangic.jpg' },
                { name: 'PİZZA', image_url: 'images/pizza.jpg' },
                { name: 'KEBAP', image_url: 'images/kebap.webp' },
                { name: 'İÇECEKLER', image_url: 'images/kahve.png' }
            ];

            const dataToRender = (categories && categories.length > 0) ? categories : fallbackCategories;

            dataToRender.forEach(cat => {
                const imgUrl = cat.image_url || '';
                const catName = cat.name.toUpperCase();
                container.innerHTML += `
                    <div class="relative w-full h-32 md:h-40 rounded-[1.5rem] overflow-hidden cursor-pointer shadow-sm border border-gray-100" onclick="showProducts('${catName}')">
                        <img src="${imgUrl}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-300" alt="${catName}">
                        <div class="absolute inset-0 bg-black/40 hover:bg-black/50 transition-colors duration-300"></div>
                        <div class="absolute inset-0 flex items-center justify-center p-2 text-center">
                            <h3 class="text-white font-serif text-lg md:text-xl tracking-widest uppercase drop-shadow-md">${catName}</h3>
                        </div>
                    </div>
                `;
            });
        }

        function showProducts(categoryName) {
            document.getElementById('category-list').classList.add('hidden');
            document.getElementById('dynamic-product-list').classList.remove('hidden');
            renderProducts(allProducts);
        }

        function fetchProducts() {
            fetch('/api/products').then(res => res.json())
                .then(result => { if (result.status === 'success') allProducts = result.data; })
                .catch(err => console.error(err));
        }

        function renderProducts(products) {
            const container = document.getElementById('dynamic-product-list');
            const titleText = translations[currentLang].productsTitle;

            let html = `
                <div class="flex items-center gap-4 mb-6">
                    <button onclick="backToCategories()" class="w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center hover:bg-gray-50 transition-colors shadow-sm text-brand-dark"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 id="dynamic-products-title" class="font-serif text-2xl md:text-3xl font-semibold text-brand-dark">${titleText}</h3>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            `;

            products.forEach(product => {
                const glutenFreeTag = product.is_gluten_free ? '<div class="absolute top-2 right-2 bg-white/90 backdrop-blur-sm px-2 py-0.5 rounded text-[9px] font-bold text-brand-gold shadow-sm">GF</div>' : '';
                const imgUrl = product.image_url || '';


                html += `
                    <div onclick="openProductModal(${product.id})" class="bg-white rounded-[1.5rem] overflow-hidden shadow-sm border border-gray-100 cursor-pointer transition-transform duration-300 hover:-translate-y-1 flex flex-col">
                        <div class="relative w-full h-32 md:h-44 bg-gray-50">
                            <img src="${imgUrl}" class="w-full h-full object-cover" alt="${product.name}">
                            ${glutenFreeTag}
                        </div>
                        <div class="p-3 md:p-4 flex flex-col justify-between flex-1">
                            <div>
                                <h4 class="font-semibold text-brand-dark text-sm md:text-base line-clamp-1">${product.name}</h4>
                                <p class="text-[10px] md:text-xs text-brand-gray line-clamp-2 mt-1 leading-relaxed">${product.description}</p>
                            </div>
                            <div class="flex justify-between items-center mt-3 pt-3 border-t border-gray-50">
                                <span class="font-bold text-brand-dark text-base md:text-lg">₺${product.price}</span>
                                <div class="w-7 h-7 md:w-8 md:h-8 rounded-full bg-brand-gold text-white flex justify-center items-center shadow-sm">
                                    <i class="fa-solid fa-plus text-[10px] md:text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            html += `</div>`;
            container.innerHTML = html;
        }

        function backToCategories() {
            document.getElementById('category-list').classList.remove('hidden');
            document.getElementById('dynamic-product-list').classList.add('hidden');
            document.getElementById('dynamic-product-list').innerHTML = '';
        }

        function hideSplashScreen() {
            const splash = document.getElementById('splash-screen');
            splash.style.opacity = '0';
            setTimeout(() => splash.remove(), 300);
        }

        function switchView(viewName) {
            document.querySelectorAll('.page-view').forEach(view => view.classList.remove('active'));
            const targetView = document.getElementById(`view-${viewName}`);
            if (targetView) {
                targetView.classList.add('active');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            document.querySelectorAll('.nav-btn-desktop, .nav-btn-mobile').forEach(btn => {
                btn.classList.remove('text-brand-gold');
                if (btn.classList.contains('nav-btn-mobile')) btn.classList.add('text-brand-gray');

                if (btn.dataset.target === viewName) {
                    btn.classList.add('text-brand-gold');
                    if (btn.classList.contains('nav-btn-mobile')) btn.classList.remove('text-brand-gray');
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
            document.getElementById('modal-cal').innerHTML = `<i class="fa-solid fa-fire text-orange-400 mr-1.5"></i>${product.calories || 0} kcal`;
            document.getElementById('modal-time').innerHTML = `<i class="fa-regular fa-clock mr-1.5 text-gray-400"></i>${product.prep_time || 15} dk`;

            document.getElementById('overlay').classList.add('open');
            document.getElementById('product-modal').classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeProductModal() {
            document.getElementById('overlay').classList.remove('open');
            document.getElementById('product-modal').classList.remove('open');
            document.body.style.overflow = '';
        }
    </script>
</body>

</html>