<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" x-data="landingPage()">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Wayn?') }} | Authentic Jordan - Official Platform</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700;900&family=Inter:wght@300;400;600;700;900&family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --petra-rose: #E56B6F;
            --desert-sand: #C17551;
            --saffron: #F4A261;
            --deep-brown: #140b08;
            --gold-accent: #D4AF37;
        }

        html[dir="rtl"] { font-family: 'Tajawal', sans-serif; }
        html[dir="ltr"] { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        html[dir="rtl"] .font-serif { font-family: 'Tajawal', sans-serif; font-weight: 900; }

        [x-cloak] { display: none !important; }

        body {
            background-color: var(--deep-brown);
            color: #F9FAFB;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* 🇯🇴 Jordanian Flag Bar - Preserved 🇯🇴 */
        .jordan-flag-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }
        .jordan-triangle {
            position: absolute;
            top: 0;
            height: 100%;
            width: 100px;
            background-color: #CE1126;
            z-index: 1001;
        }
        html[dir="ltr"] .jordan-triangle {
            left: 0;
            clip-path: polygon(0 0, 100% 50%, 0 100%);
        }
        html[dir="rtl"] .jordan-triangle {
            right: 0;
            clip-path: polygon(100% 0, 0 50%, 100% 100%);
        }

        /* Glassmorphism System */
        .glass-card {
            background: rgba(30, 20, 15, 0.4);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(193, 117, 81, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Hero Background Slider */
        .hero-slider-container {
            position: absolute;
            inset: 0;
            z-index: -2;
            overflow: hidden;
        }
        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 2s ease-in-out, transform 8s linear;
            transform: scale(1.1);
        }
        .hero-slide.active {
            opacity: 0.6;
            transform: scale(1);
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(20, 11, 8, 0.4) 0%, var(--deep-brown) 100%);
            z-index: -1;
        }

        /* Wiki Image Handling */
        .wiki-img-wrapper {
            position: relative;
            overflow: hidden;
            background: #1f130e;
        }
        .wiki-img-wrapper img {
            opacity: 0;
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .wiki-img-wrapper img.loaded {
            opacity: 1;
        }
        .wiki-img-wrapper:hover img.loaded {
            transform: scale(1.1);
        }

        /* Masonry Grid Simulation */
        .masonry-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-auto-rows: 200px;
            gap: 1.5rem;
        }
        .masonry-item { grid-row: span 2; }
        .masonry-item:nth-child(2n) { grid-row: span 1.5; }

        /* Text Gradients */
        .text-gradient-gold {
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .text-gradient-saffron {
            background: linear-gradient(135deg, var(--saffron), var(--desert-sand));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Mobile Menu Animation */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body x-data="{
    language: localStorage.getItem('wayn_lang') || 'ar',
    scrolled: false,
    mobileMenuOpen: false,
    init() {
        document.documentElement.dir = this.language === 'ar' ? 'rtl' : 'ltr';
        window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 50; });
    },
    toggleLang() {
        this.language = this.language === 'ar' ? 'en' : 'ar';
        localStorage.setItem('wayn_lang', this.language);
        document.documentElement.dir = this.language === 'ar' ? 'rtl' : 'ltr';
    }
}" @keydown.escape="mobileMenuOpen = false">    <!-- 🇯🇴 Jordanian Flag Top Bar 🇯🇴 -->
    <div class="jordan-flag-bar">
        <div class="h-1/3 w-full bg-black"></div>
        <div class="h-1/3 w-full bg-white"></div>
        <div class="h-1/3 w-full bg-[#007A3D]"></div>
        <div class="jordan-triangle"></div>
    </div>

    <!-- Navigation -->
    <header class="fixed top-0 w-full z-50 transition-all duration-500 mt-[8px]"
            :class="scrolled ? 'bg-[#140b08]/90 backdrop-blur-xl border-b border-white/5 py-3 shadow-2xl' : 'bg-transparent py-6'">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-12 h-12 relative">
                    <svg viewBox="0 0 100 100" class="w-full h-full drop-shadow-[0_0_15px_rgba(212,175,55,0.4)] group-hover:rotate-180 transition-transform duration-1000">
                        <circle cx="50" cy="50" r="45" fill="none" stroke="var(--gold-accent)" stroke-width="2" opacity="0.3" stroke-dasharray="4 4"/>
                        <path d="M50 15 L85 50 L50 85 L15 50 Z" fill="var(--gold-accent)"/>
                        <circle cx="50" cy="50" r="8" fill="var(--deep-brown)"/>
                    </svg>
                </div>
                <span class="font-serif text-2xl font-black tracking-tighter text-gradient-gold">Wayn?</span>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-8">
                <div class="flex items-center gap-8">
                    <a href="#destinations" class="text-sm font-bold text-gray-300 hover:text-white transition-colors" x-text="language === 'ar' ? 'وجهاتنا' : 'Destinations'"></a>
                    <a href="#royal-welcome" class="text-sm font-bold text-gray-300 hover:text-white transition-colors" x-text="language === 'ar' ? 'الرؤية الملكية' : 'The Vision'"></a>
                    <a href="#planner" class="text-sm font-bold text-gray-300 hover:text-white transition-colors" x-text="language === 'ar' ? 'المخطط الذكي' : 'AI Planner'"></a>
                </div>

                <div class="w-px h-6 bg-white/10 mx-2"></div>

                {{-- 🔐 Desktop Auth Logic 🔐 --}}
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-var(--desert-sand) to-var(--petra-rose) text-white px-6 py-2.5 rounded-xl font-black shadow-lg hover:shadow-var(--petra-rose)/20 transition-all">
                        <span x-text="language === 'ar' ? 'لوحة التحكم' : 'Dashboard'"></span>
                    </a>
                @endauth

                @guest
                    <div class="flex items-center gap-4">
    @guest
        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-300 hover:text-[#c17551] no-underline" x-text="language === 'ar' ? 'تسجيل الدخول' : 'Sign In'"></a>
        <a href="{{ route('register') }}" class="border border-[#c17551] text-[#c17551] hover:bg-[#c17551] hover:text-white px-5 py-2 rounded-full font-bold transition-all no-underline" x-text="language === 'ar' ? 'حساب جديد' : 'Sign Up'"></a>
    @else
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-sm font-bold text-gray-400 hover:text-red-500 bg-transparent border-none cursor-pointer" x-text="language === 'ar' ? 'خروج' : 'Logout'"></button>
        </form>
    @endguest
</div>
                @endguest

                <button @click="toggleLang()" class="w-10 h-10 rounded-xl border border-white/10 bg-white/5 flex items-center justify-center hover:border-var(--gold-accent) transition-colors">
                    <span x-text="language === 'en' ? 'ع' : 'EN'" class="font-bold text-xs"></span>
                </button>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenuOpen = true" class="md:hidden text-white hover:text-var(--gold-accent) transition-colors cursor-pointer bg-transparent border-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen"
         x-cloak
         class="fixed inset-0 z-[100] bg-var(--deep-brown) flex flex-col p-8 transition-all duration-500"
         x-transition:enter="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="translate-x-0"
         x-transition:leave-end="translate-x-full">

        <div class="flex justify-between items-center mb-12">
            <span class="font-serif text-3xl font-black text-gradient-gold">Wayn?</span>
            <button @click="mobileMenuOpen = false" class="text-white hover:text-var(--gold-accent) cursor-pointer bg-transparent border-none">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex flex-col gap-8 mb-12">
            <a href="#destinations" @click="mobileMenuOpen = false" class="text-3xl font-black text-white" x-text="language === 'ar' ? 'وجهاتنا' : 'Destinations'"></a>
            <a href="#royal-welcome" @click="mobileMenuOpen = false" class="text-3xl font-black text-white" x-text="language === 'ar' ? 'الرؤية الملكية' : 'The Vision'"></a>
            <a href="#planner" @click="mobileMenuOpen = false" class="text-3xl font-black text-white" x-text="language === 'ar' ? 'المخطط الذكي' : 'AI Planner'"></a>
        </nav>

        <div class="mt-auto pt-8 border-t border-white/10">
            {{-- 🔐 Mobile Auth Logic 🔐 --}}
            @auth
                <a href="{{ url('/dashboard') }}" class="block w-full text-center bg-gradient-to-r from-var(--desert-sand) to-var(--petra-rose) text-white py-5 rounded-2xl font-black text-xl mb-6">
                    <span x-text="language === 'ar' ? 'لوحة التحكم' : 'Dashboard'"></span>
                </a>
            @endauth

            @guest
                <div class="flex flex-col gap-4 mb-8">
                    <a href="{{ route('login') }}" class="block w-full text-center bg-white/5 border-2 border-white/20 text-white py-5 rounded-2xl font-black text-xl" x-text="language === 'ar' ? 'دخول' : 'Login'"></a>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-var(--gold-accent) text-black py-5 rounded-2xl font-black text-xl" x-text="language === 'ar' ? 'حساب جديد' : 'Join Us'"></a>
                </div>
            @endguest

            <button @click="toggleLang(); mobileMenuOpen = false" class="flex items-center gap-4 text-white font-bold">
                <span class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center" x-text="language === 'en' ? 'ع' : 'EN'"></span>
                <span x-text="language === 'en' ? 'Switch to Arabic' : 'اللغة الإنجليزية'"></span>
            </button>
        </div>
    </div>

    <!-- 💡 Global Custom Toast Container 💡 -->
    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-[200] flex flex-col gap-4 pointer-events-none" id="toast-container"></div>


    <main>
        <!-- Phase 1: Auto-Sliding Hero Gallery -->
        <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden"
                 x-data="{
                    current: 0,
                    slides: [
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Al_Khanyz_Petra_Jordan_BW_21.JPG/1280px-Al_Khanyz_Petra_Jordan_BW_21.JPG',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Wadi_Rum_-_Jordan_Desert.jpg/1280px-Wadi_Rum_-_Jordan_Desert.jpg',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Dead_Sea_Jordan_by_Wilson44691.jpg/1280px-Dead_Sea_Jordan_by_Wilson44691.jpg'
                    ],
                    next() { this.current = (this.current + 1) % this.slides.length },
                    init() { setInterval(() => this.next(), 6000) }
                 }">
            <div class="hero-slider-container">
                <template x-for="(slide, index) in slides" :key="index">
                    <div class="hero-slide" :class="current === index ? 'active' : ''" :style="`background-image: url('${slide}')`"></div>
                </template>
            </div>
            <div class="hero-overlay"></div>

            <div class="max-w-7xl mx-auto px-6 text-center relative z-10 pt-20">
                <div class="inline-flex items-center gap-3 px-6 py-3 rounded-full bg-white/5 backdrop-blur-md border border-white/10 mb-10">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#CE1126] animate-pulse"></span>
                    <span class="text-sm font-black tracking-widest uppercase text-gray-200"
                          x-text="language === 'ar' ? 'يا هلا بك في ديرتنا الأردن' : 'Welcome to the Kingdom of Hospitality'"></span>
                </div>

                <h1 class="text-6xl md:text-9xl font-black font-serif mb-8 leading-none tracking-tight">
                    <span x-text="language === 'ar' ? 'اكتشف ' : 'Discover '"></span>
                    <span class="text-gradient-saffron">Jordan</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto mb-12 font-medium leading-relaxed"
                   x-text="language === 'ar' ? 'من حضارة الأنباط في البتراء، إلى رمال وادي رم الساحرة — رحلتك تبدأ بلمسة واحدة.' : 'From the ancient Nabataean majesty of Petra to the Martian sands of Wadi Rum — your journey begins with a single touch.'"></p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <a href="#destinations" class="w-full sm:w-auto px-10 py-5 bg-gradient-to-r from-var(--desert-sand) to-var(--petra-rose) text-white rounded-2xl font-black text-xl shadow-2xl hover:-translate-y-2 transition-all no-underline flex items-center justify-center">
                        <span x-text="language === 'ar' ? 'ابدأ مغامرتك الآن' : 'Start Your Adventure'"></span>
                    </a>
                    <a href="#destinations" class="w-full sm:w-auto px-10 py-5 bg-white/5 border-2 border-white/20 backdrop-blur-xl text-white rounded-2xl font-black text-xl hover:bg-white/10 transition-all no-underline flex items-center justify-center">
                        <span x-text="language === 'ar' ? 'شاهد وجهاتنا' : 'View Destinations'"></span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Phase 1: Royal Welcome Section -->
        <section id="royal-welcome" class="relative py-32 overflow-hidden bg-gradient-to-b from-var(--deep-brown) to-[#0f0705]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="glass-card rounded-[3rem] overflow-hidden flex flex-col lg:flex-row items-center">
                    <div class="lg:w-1/2 h-[600px] relative overflow-hidden">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Abdullah_II_of_Jordan_on_World_Economic_Forum_2011.jpg/800px-Abdullah_II_of_Jordan_on_World_Economic_Forum_2011.jpg"
                             alt="HM King Abdullah II"
                             class="absolute inset-0 w-full h-full object-cover object-top grayscale hover:grayscale-0 transition-all duration-1000">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-transparent to-var(--deep-brown)/80 lg:block hidden"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-var(--deep-brown) via-transparent to-transparent lg:hidden block"></div>
                    </div>
                    <div class="lg:w-1/2 p-12 lg:p-20 text-center lg:text-left rtl:lg:text-right">
                        <div class="mb-10">
                            <span class="text-var(--gold-accent) font-black tracking-[0.3em] uppercase text-sm mb-4 block">The Royal Vision</span>
                            <h2 class="text-4xl md:text-5xl font-serif font-black text-white mb-8">
                                <span x-text="language === 'ar' ? 'أهلاً بكم في دار أبي الحسين' : 'Welcome to the Kingdom of Hospitality'"></span>
                            </h2>
                            <div class="w-20 h-1 bg-var(--gold-accent) mx-auto lg:mx-0 mb-10"></div>

                            <p class="text-2xl md:text-3xl italic text-gray-300 font-serif leading-relaxed mb-10"
                               x-text="language === 'ar' ? '«الأردن هو بلد الضيافة والوئام، حيث يلتقي عبق التاريخ بمستقبل مشرق لكل زواره.»' : '“Jordan is a land of hospitality and harmony, where the fragrance of history meets a bright future for all its visitors.”'"></p>

                            <p class="text-lg text-gray-400 font-medium max-w-xl"
                               x-text="language === 'ar' ? 'تعكس هذه المنصة رؤية جلالة الملك عبدالله الثاني ابن الحسين في جعل الأردن وجهة سياحية عالمية رائدة، ترحب بالجميع بقلوب مفتوحة.' : 'This platform reflects the vision of HM King Abdullah II to establish Jordan as a leading global tourism destination, welcoming everyone with open hearts.'"></p>
                        </div>
                        <div class="flex items-center gap-4 justify-center lg:justify-start">
                            <div class="w-12 h-12 rounded-full border-2 border-var(--gold-accent) flex items-center justify-center text-var(--gold-accent)">
                                🇯🇴
                            </div>
                            <span class="font-black text-white uppercase tracking-widest text-sm">Official Jordanian Initiative</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Phase 1: Top Destinations (Masonry Grid with Wiki API) -->
        <section id="destinations" class="py-32 bg-[#0f0705]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-20">
                    <h2 class="text-5xl md:text-6xl font-serif font-black text-white mb-6">
                        <span x-text="language === 'ar' ? 'أبرز ' : 'Top '"></span>
                        <span class="text-gradient-gold" x-text="language === 'ar' ? 'الوجهات' : 'Destinations'"></span>
                    </h2>
                    <p class="text-gray-400 text-xl max-w-2xl mx-auto"
                       x-text="language === 'ar' ? 'اكتشف جواهر الأردن الخفية التي يتم جلب تفاصيلها حياً من الويكيبيديا.' : 'Discover Jordan\'s hidden gems with real-time data fetched directly from Wikipedia.'"></p>
                </div>

                <div class="masonry-grid" x-data="{ items: ['Amman', 'Petra', 'Aqaba', 'Jerash', 'Wadi_Rum', 'Dead_Sea'] }">
                    <template x-for="city in items" :key="city">
                        <div class="masonry-item glass-card rounded-3xl overflow-hidden group wiki-img-wrapper" x-wiki-image="city">
                            <img src="" alt="" class="w-full h-full object-cover rounded-3xl shadow-2xl transition-all duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                            <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform">
                                <h3 class="text-2xl font-black text-white mb-2" x-text="city.replace('_', ' ')"></h3>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-var(--gold-accent)"></span>
                                    <span class="text-xs font-bold text-gray-300 uppercase tracking-widest">Explore Local History</span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- AI Planner Section -->
        <section id="planner" class="py-32 relative z-10 border-t border-white/5">
             <div class="max-w-5xl mx-auto px-6">
                <div class="glass-card rounded-[3rem] p-12 md:p-20 relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-var(--petra-rose) opacity-10 rounded-full blur-3xl"></div>
                    <div class="flex flex-col md:flex-row items-center gap-10 mb-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-var(--desert-sand) to-var(--petra-rose) rounded-3xl flex items-center justify-center text-5xl shadow-2xl">🤖</div>
                        <div class="text-center md:text-left rtl:md:text-right">
                            <h2 class="text-4xl font-black text-white mb-4" x-text="language === 'ar' ? 'مساعدك الذكي للطشات' : 'AI Smart Trip Planner'"></h2>
                            <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'حدد وجهتك واترك الباقي لذكائنا الاصطناعي ليخطط لك رحلة العمر.' : 'Choose your destination and let our AI plan the trip of a lifetime for you.'"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                        <div class="space-y-3">
                            <label class="block text-sm font-black text-gray-500 uppercase tracking-widest" x-text="language === 'ar' ? 'الوجهة' : 'Destination'"></label>
                            <select class="w-full bg-black/40 border border-white/10 rounded-2xl px-6 py-4 text-white focus:border-var(--petra-rose) outline-none transition-all cursor-pointer">
                                <option x-text="language === 'ar' ? 'عمان' : 'Amman'"></option>
                                <option x-text="language === 'ar' ? 'البتراء' : 'Petra'"></option>
                                <option x-text="language === 'ar' ? 'وادي رم' : 'Wadi Rum'"></option>
                            </select>
                        </div>
                    </div>

                    <button class="w-full py-5 bg-gradient-to-r from-var(--desert-sand) to-var(--petra-rose) text-white rounded-2xl font-black text-xl hover:shadow-[0_20px_50px_rgba(229,107,111,0.3)] transition-all cursor-pointer border-none shadow-xl">
                        <span x-text="language === 'ar' ? 'اصنع خطتي الآن ✦' : 'Generate My Itinerary ✦'"></span>
                    </button>
                </div>
             </div>
        </section>
    </main>

    <footer class="bg-black py-20 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left rtl:md:text-right mb-20">
                <div class="col-span-1">
                    <span class="font-serif text-4xl font-black text-gradient-gold">Wayn?</span>
                    <p class="text-gray-500 mt-4 leading-relaxed" x-text="language === 'ar' ? 'نحن نأخذك في رحلة عبر الزمن والأصالة في قلب المملكة الأردنية الهاشمية.' : 'We take you on a journey through time and authenticity in the heart of the Hashemite Kingdom of Jordan.'"></p>
                </div>
                <div class="col-span-1">
                    <h4 class="text-white font-black uppercase tracking-widest text-sm mb-6" x-text="language === 'ar' ? 'روابط سريعة' : 'Quick Links'"></h4>
                    <nav class="flex flex-col gap-4">
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-white transition-colors" x-text="language === 'ar' ? 'تسجيل الدخول' : 'Sign In'"></a>
                        <a href="{{ route('register') }}" class="text-gray-500 hover:text-white transition-colors" x-text="language === 'ar' ? 'انضم كشريك' : 'Join as Partner'"></a>
                    </nav>
                </div>
                <div class="col-span-1">
                    <h4 class="text-white font-black uppercase tracking-widest text-sm mb-6" x-text="language === 'ar' ? 'تابعنا' : 'Follow Us'"></h4>
                    <div class="flex justify-center md:justify-start gap-6">
                        <a href="#" class="text-gray-500 hover:text-white transition-colors">Instagram</a>
                        <a href="#" class="text-gray-500 hover:text-white transition-colors">Twitter</a>
                        <a href="#" class="text-gray-500 hover:text-white transition-colors">Facebook</a>
                    </div>
                </div>
            </div>
            <div class="pt-10 border-t border-white/5 text-center text-gray-600 font-bold text-sm">
                &copy; 2026 Wayn Platform. Proudly Made in Jordan 🇯🇴
            </div>
        </div>
    </footer>

    <script>
        function landingPage() {
            return {
                // Keep for component compatibility
            }
        }
    </script>
</body>
</html>
