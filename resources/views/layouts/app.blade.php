<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="mainLayout()" :dir="language === 'ar' ? 'rtl' : 'ltr'">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Wayn? | وين؟ - السياحة الأردنية الأصيلة')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700;900&family=Lato:wght@300;400;700&family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* إضافة خط عربي جميل ليتناسب مع اللمسة الملكية */
        html[dir="rtl"] { font-family: 'Tajawal', sans-serif; }
        html[dir="ltr"] { font-family: 'Lato', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        html[dir="rtl"] .font-serif { font-family: 'Tajawal', sans-serif; font-weight: 900; }

        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#0a0c10] text-gray-100 antialiased overflow-x-hidden selection:bg-amber-500 selection:text-gray-900 scroll-smooth">

    <header class="fixed top-0 left-0 w-full z-50 transition-all duration-500 border-b"
            :class="scrolled ? 'bg-[#0a0c10]/90 backdrop-blur-xl border-gray-800 shadow-[0_10px_30px_rgba(0,0,0,0.8)] py-3' : 'bg-transparent border-transparent py-5'">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center">

                <a href="/" class="flex items-center gap-4 cursor-pointer group no-underline">
                    <div class="w-12 h-12 relative flex-shrink-0">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="w-full h-full drop-shadow-[0_0_15px_rgba(245,158,11,0.4)] group-hover:rotate-90 transition-transform duration-700 ease-out">
                            <defs>
                                <linearGradient id="goldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#F5C518" />
                                    <stop offset="100%" stop-color="#D4AF37" />
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="45" fill="none" stroke="url(#goldGradient)" stroke-width="2" opacity="0.3" stroke-dasharray="4 4" class="animate-[spin_10s_linear_infinite]"/>
                            <g>
                                <polygon points="50,10 58,42 50,50 42,42" fill="url(#goldGradient)"/>
                                <polygon points="50,90 58,58 50,50 42,58" fill="url(#goldGradient)" opacity="0.6"/>
                                <polygon points="90,50 58,58 50,50 58,42" fill="url(#goldGradient)"/>
                                <polygon points="10,50 42,58 50,50 42,42" fill="url(#goldGradient)" opacity="0.6"/>
                            </g>
                            <circle cx="50" cy="50" r="6" fill="#111827" stroke="url(#goldGradient)" stroke-width="2"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-serif text-3xl font-black bg-clip-text text-transparent bg-gradient-to-r from-amber-400 to-amber-600 tracking-tight">Wayn?</div>
                        <div class="text-[10px] text-amber-500/70 font-bold uppercase tracking-[0.2em]" x-text="language === 'ar' ? 'السياحة الأصيلة' : 'Authentic Travel'"></div>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-8">
                    <a href="#home" class="text-sm font-bold transition-colors hover:text-amber-500 text-gray-300" x-text="language === 'ar' ? 'الرئيسية' : 'Explore'"></a>
                    <a href="#cities" class="text-sm font-bold transition-colors hover:text-amber-500 text-gray-300" x-text="language === 'ar' ? 'المدن' : 'Cities'"></a>
                    <a href="#planner" class="text-sm font-bold transition-colors hover:text-amber-500 text-gray-300" x-text="language === 'ar' ? 'المخطط الذكي' : 'AI Planner'"></a>

                    <div class="h-6 w-px bg-gray-700"></div>

                    @auth
                        <a href="{{ url('/dashboard') }}" class="relative group px-6 py-2.5 rounded-full bg-gradient-to-r from-amber-600 to-amber-500 text-gray-900 font-black overflow-hidden shadow-[0_0_20px_rgba(245,158,11,0.3)] hover:shadow-[0_0_30px_rgba(245,158,11,0.6)] transition-all hover:-translate-y-0.5">
                            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></div>
                            <span class="relative flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <span x-text="language === 'ar' ? 'لوحة التحكم' : 'Dashboard'"></span>
                            </span>
                        </a>
                    @else
                        <div class="flex items-center gap-4">
                            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-300 hover:text-amber-500 transition-colors" x-text="language === 'ar' ? 'تسجيل الدخول' : 'Sign In'"></a>
                            <a href="{{ route('register') }}" class="text-sm font-bold text-amber-500 border border-amber-500/50 hover:bg-amber-500 hover:text-gray-900 px-5 py-2 rounded-full transition-all" x-text="language === 'ar' ? 'حساب جديد' : 'Sign Up'"></a>
                        </div>
                    @endauth

                    <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-700 bg-gray-800/50 hover:border-amber-500 text-gray-300 hover:text-amber-500 transition-all text-sm font-bold shadow-inner">
                        <span x-show="language === 'en'" class="font-arabic text-lg leading-none">ع</span>
                        <span x-show="language === 'ar'" class="text-xs leading-none mt-0.5">EN</span>
                    </button>
                </nav>

                <div class="md:hidden flex items-center gap-4">
                    <button @click="toggleLang()" class="flex items-center justify-center w-9 h-9 rounded-full border border-gray-700 bg-gray-800/50 text-gray-300">
                        <span x-show="language === 'en'" class="font-arabic text-lg leading-none">ع</span>
                        <span x-show="language === 'ar'" class="text-xs leading-none">EN</span>
                    </button>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-300 hover:text-amber-500 focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="mobileMenuOpen" x-collapse x-cloak class="md:hidden bg-[#0a0c10]/95 backdrop-blur-3xl border-b border-gray-800 absolute w-full shadow-2xl">
            <div class="px-6 py-6 space-y-4">
                <a href="#home" @click="mobileMenuOpen = false" class="block text-xl font-bold text-gray-300 hover:text-amber-500" x-text="language === 'ar' ? 'الرئيسية' : 'Explore'"></a>
                <a href="#cities" @click="mobileMenuOpen = false" class="block text-xl font-bold text-gray-300 hover:text-amber-500" x-text="language === 'ar' ? 'المدن الأردنية' : 'Cities'"></a>
                <a href="#planner" @click="mobileMenuOpen = false" class="block text-xl font-bold text-gray-300 hover:text-amber-500" x-text="language === 'ar' ? 'مخطط الرحلات الذكي' : 'AI Planner'"></a>

                <div class="h-px bg-gray-800 my-4"></div>

                @auth
                    <a href="{{ url('/dashboard') }}" class="block w-full text-center bg-amber-600 text-black font-black py-3 rounded-xl shadow-lg">
                        <span x-text="language === 'ar' ? 'دخول لوحة التحكم' : 'Enter Dashboard'"></span>
                    </a>
                @else
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('login') }}" class="block text-center border border-gray-700 text-white font-bold py-3 rounded-xl hover:bg-gray-800" x-text="language === 'ar' ? 'تسجيل الدخول' : 'Sign In'"></a>
                        <a href="{{ route('register') }}" class="block text-center bg-amber-600 text-black font-black py-3 rounded-xl shadow-lg" x-text="language === 'ar' ? 'حساب جديد' : 'Sign Up'"></a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <main class="min-h-screen pt-24 pb-12">
        @yield('content')
    </main>

    <footer class="bg-[#050608] border-t border-gray-800 pt-16 pb-8 relative overflow-hidden">
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-32 bg-amber-600/10 blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <svg viewBox="0 0 100 100" class="w-8 h-8">
                            <polygon points="50,10 58,42 50,50 42,42" fill="#F5C518"/>
                            <polygon points="50,90 58,58 50,50 42,58" fill="#F5C518" opacity="0.6"/>
                            <polygon points="90,50 58,58 50,50 58,42" fill="#F5C518"/>
                            <polygon points="10,50 42,58 50,50 42,42" fill="#F5C518" opacity="0.6"/>
                        </svg>
                        <span class="font-serif text-2xl font-black text-white">Wayn?</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed" x-text="language === 'ar' ? 'منصة السياحة الأردنية الأولى، نربط السياح بأبناء البلد لتقديم تجربة أصيلة وحقيقية.' : 'The premier Jordanian tourism platform connecting tourists with locals for an authentic experience.'"></p>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase tracking-wider" x-text="language === 'ar' ? 'روابط سريعة' : 'Quick Links'"></h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-amber-500 transition-colors text-sm" x-text="language === 'ar' ? 'الرئيسية' : 'Home'"></a></li>
                        <li><a href="#" class="text-gray-400 hover:text-amber-500 transition-colors text-sm" x-text="language === 'ar' ? 'عن الأردن' : 'About Jordan'"></a></li>
                        <li><a href="#" class="text-gray-400 hover:text-amber-500 transition-colors text-sm" x-text="language === 'ar' ? 'تواصل معنا' : 'Contact Us'"></a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase tracking-wider" x-text="language === 'ar' ? 'الخدمات' : 'Services'"></h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-amber-500 transition-colors text-sm" x-text="language === 'ar' ? 'المخطط الذكي AI' : 'AI Trip Planner'"></a></li>
                        <li><a href="#" class="text-gray-400 hover:text-amber-500 transition-colors text-sm" x-text="language === 'ar' ? 'عروض المطاعم' : 'Restaurant Deals'"></a></li>
                        <li><a href="#" class="text-gray-400 hover:text-amber-500 transition-colors text-sm" x-text="language === 'ar' ? 'حجز أدلاء سياحيين' : 'Book a Local Guide'"></a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase tracking-wider" x-text="language === 'ar' ? 'النشرة البريدية' : 'Newsletter'"></h4>
                    <p class="text-gray-500 text-sm mb-4" x-text="language === 'ar' ? 'اشترك لتصلك أحدث العروض والأماكن المخفية.' : 'Subscribe for the latest hidden gems and deals.'"></p>
                    <div class="flex">
                        <input type="email" class="bg-gray-900 border border-gray-700 text-white px-4 py-2 rounded-l-xl rtl:rounded-l-none rtl:rounded-r-xl w-full focus:outline-none focus:border-amber-500" :placeholder="language === 'ar' ? 'بريدك الإلكتروني' : 'Email Address'">
                        <button class="bg-amber-600 text-gray-900 font-bold px-4 py-2 rounded-r-xl rtl:rounded-r-none rtl:rounded-l-xl hover:bg-amber-500 transition-colors">
                            <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800/50 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-sm font-medium">
                    &copy; 2026 Wayn Platform. <span x-text="language === 'ar' ? 'جميع الحقوق محفوظة.' : 'All rights reserved.'"></span>
                </p>
                <div class="flex items-center gap-2 text-gray-600 text-sm font-medium">
                    Built with <svg class="w-4 h-4 text-red-500 fill-current animate-pulse" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> in Jordan 🇯🇴
                </div>
            </div>
        </div>
    </footer>

    <script>
        function mainLayout() {
            return {
                language: localStorage.getItem('wayn_lang') || 'ar',
                mobileMenuOpen: false,
                scrolled: false,

                init() {
                    // مراقبة النزول في الصفحة لتفعيل الـ Glassmorphism
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 20;
                    });

                    // حفظ اللغة عند التغيير وتحديث المتصفح لضمان توافق جميع اللوحات
                    this.$watch('language', val => {
                        localStorage.setItem('wayn_lang', val);
                        document.documentElement.dir = val === 'ar' ? 'rtl' : 'ltr';
                    });
                },

                toggleLang() {
                    this.language = this.language === 'ar' ? 'en' : 'ar';
                    this.mobileMenuOpen = false;
                }
            }
        }
    </script>
</body>
</html>
