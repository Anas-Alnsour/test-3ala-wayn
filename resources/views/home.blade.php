<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" x-data="landingPage()">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Wayn?') }} | Authentic Jordan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700;900&family=Lato:wght@300;400;700;900&family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html[dir="rtl"] { font-family: 'Tajawal', sans-serif; }
        html[dir="ltr"] { font-family: 'Lato', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        html[dir="rtl"] .font-serif { font-family: 'Tajawal', sans-serif; font-weight: 900; }

        [x-cloak] { display: none !important; }

        body {
            /* خلفية بني داكن جداً دافئة */
            background-color: #140b08;
            color: #F9FAFB;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* شريط العلم الأردني العلوي */
        .jordan-flag-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }
        .jordan-triangle {
            position: absolute;
            top: 0;
            height: 100%;
            width: 80px;
            background-color: #CE1126; /* أحمر العلم */
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

        /* شبكة خلفية فاخرة */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(to right, rgba(193,117,81,0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(193,117,81,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: -1;
            pointer-events: none;
        }

        /* تأثير التوهج المتبع للماوس (لون بني بتراوي) */
        .glow-blob {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(193, 117, 81, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
            transition: top 0.2s ease, left 0.2s ease;
        }

        /* Glassmorphism Classes */
        .glass-card {
            background: rgba(30, 20, 15, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(193, 117, 81, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .glass-input {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(193, 117, 81, 0.2);
            color: white;
            transition: all 0.3s ease;
        }
        .glass-input:focus {
            border-color: #c17551;
            box-shadow: 0 0 0 2px rgba(193, 117, 81, 0.2);
            outline: none;
        }

        /* ألوان الأقسام والهوية البنية */
        .text-gradient-brown {
            background: linear-gradient(135deg, #c17551, #8E3D1D);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body @mousemove="updateGlow($event)">


    <div class="bg-grid"></div>
    <div class="glow-blob" :style="`top: ${mouseY}px; left: ${mouseX}px; transform: translate(-50%, -50%);`"></div>

    <header class="fixed top-0 w-full z-50 transition-all duration-500 mt-[6px]" :class="scrolled ? 'bg-[#140b08]/90 backdrop-blur-xl border-b border-[#3a251c] py-3' : 'bg-transparent py-5'">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex justify-between items-center">

            <a href="#" @click.prevent="scrollTo('hero')" class="flex items-center gap-3 cursor-pointer group no-underline">
                <div class="w-12 h-12 relative flex-shrink-0">
                    <svg viewBox="0 0 100 100" class="w-full h-full drop-shadow-[0_0_15px_rgba(193,117,81,0.4)] group-hover:rotate-90 transition-transform duration-700 ease-out">
                        <defs><linearGradient id="brownGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#c17551" /><stop offset="100%" stop-color="#8E3D1D" /></linearGradient></defs>
                        <circle cx="50" cy="50" r="45" fill="none" stroke="url(#brownGrad)" stroke-width="2" opacity="0.3" stroke-dasharray="4 4" class="animate-[spin_10s_linear_infinite]"/>
                        <polygon points="50,10 58,42 50,50 42,42" fill="url(#brownGrad)"/>
                        <polygon points="50,90 58,58 50,50 42,58" fill="url(#brownGrad)" opacity="0.6"/>
                        <polygon points="90,50 58,58 50,50 58,42" fill="url(#brownGrad)"/>
                        <polygon points="10,50 42,58 50,50 42,42" fill="url(#brownGrad)" opacity="0.6"/>
                        <circle cx="50" cy="50" r="6" fill="#140b08" stroke="url(#brownGrad)" stroke-width="2"/>
                    </svg>
                </div>
                <div>
                    <div class="font-serif text-2xl font-black text-gradient-brown tracking-tight">Wayn?</div>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <button @click="scrollTo('modes')" class="text-sm font-bold text-gray-300 hover:text-[#c17551] transition-colors border-none bg-transparent cursor-pointer" x-text="language === 'ar' ? 'التجارب' : 'Experiences'"></button>
                <button @click="scrollTo('planner')" class="text-sm font-bold text-gray-300 hover:text-[#c17551] transition-colors border-none bg-transparent cursor-pointer" x-text="language === 'ar' ? 'مخطط الذكاء الاصطناعي' : 'AI Planner'"></button>
                <button @click="scrollTo('currency')" class="text-sm font-bold text-gray-300 hover:text-[#c17551] transition-colors border-none bg-transparent cursor-pointer" x-text="language === 'ar' ? 'العملات' : 'Currency'"></button>

                <div class="w-px h-6 bg-[#3a251c]"></div>

                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-[#c17551] to-[#8E3D1D] text-white px-6 py-2.5 rounded-full font-black hover:shadow-[0_0_20px_rgba(193,117,81,0.4)] hover:-translate-y-0.5 transition-all no-underline">
                        <span x-text="language === 'ar' ? 'لوحة التحكم' : 'Dashboard'"></span>
                    </a>
                @else
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
                @endauth

                <button @click="toggleLang()" class="w-10 h-10 rounded-full border border-[#3a251c] bg-[#1f130e]/50 hover:border-[#c17551] text-gray-300 hover:text-[#c17551] flex items-center justify-center font-bold transition-colors cursor-pointer">
                    <span x-show="language === 'en'" class="font-arabic">ع</span>
                    <span x-show="language === 'ar'" class="text-xs">EN</span>
                </button>
            </nav>
        </div>
    </header>

    <main>
        <section id="hero" class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(193,117,81,0.1)_0%,transparent_70%)]"></div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-8">
                    <span class="w-2 h-2 rounded-full bg-[#CE1126] animate-pulse"></span>
                    <span class="text-sm font-bold text-gray-300" x-text="language === 'ar' ? 'منصة السياحة الأردنية الأصيلة' : 'Authentic Jordanian Tourism Platform'"></span>
                </div>

                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black font-serif mb-6 leading-tight">
                    <span x-text="language === 'ar' ? 'اكتشف ' : 'Discover '"></span>
                    <span class="text-gradient-brown">Jordan</span><br>
                    <span x-text="language === 'ar' ? 'على طريقتك.' : 'Your Way.'"></span>
                </h1>

                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed" x-text="language === 'ar' ? 'من شوارع عمان القديمة إلى سحر البتراء ورم، خطط لرحلتك، اكتشف الأماكن المخفية، واستفد من عروض لا تفوت.' : 'From the ancient streets of Petra to the crystal waters of Aqaba — plan your perfect journey with locals and AI.'"></p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button @click="scrollTo('planner')" class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-[#c17551] to-[#8E3D1D] text-white rounded-full font-black text-lg hover:shadow-[0_0_30px_rgba(193,117,81,0.5)] hover:-translate-y-1 transition-all border-none cursor-pointer">
                        <span x-text="language === 'ar' ? 'خطط رحلتك بالذكاء الاصطناعي ✦' : 'Plan Trip with AI ✦'"></span>
                    </button>
                    <button @click="scrollTo('modes')" class="w-full sm:w-auto px-8 py-4 bg-transparent border-2 border-[#3a251c] text-white rounded-full font-bold text-lg hover:border-[#c17551] hover:text-[#c17551] transition-all cursor-pointer">
                        <span x-text="language === 'ar' ? 'استكشف المنصة' : 'Explore Platform'"></span>
                    </button>
                </div>
            </div>

            <div class="absolute bottom-0 left-0 w-full border-t border-white/5 bg-[#0a0605]/60 backdrop-blur-md">
                <div class="max-w-7xl mx-auto px-6 py-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/5 rtl:divide-x-reverse">
                    <div>
                        <div class="text-3xl font-black text-[#c17551] mb-1">12+</div>
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'مدينة مغطاة' : 'Cities Covered'"></div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-[#c17551] mb-1">500+</div>
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'معلم سياحي' : 'Attractions'"></div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-[#c17551] mb-1">250+</div>
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'مطعم وفندق' : 'Partners'"></div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-[#c17551] mb-1">24/7</div>
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'دعم ذكي' : 'AI Support'"></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="modes" class="py-24 relative z-10">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-black font-serif text-white mb-4">
                        <span x-text="language === 'ar' ? 'اختر ' : 'Choose Your '"></span>
                        <span class="text-gradient-brown" x-text="language === 'ar' ? 'تجربتك' : 'Experience'"></span>
                    </h2>
                    <p class="text-gray-400" x-text="language === 'ar' ? 'هل أنت سائح تزور الأردن، أم ابن بلد تبحث عن الفزعة والخصومات؟' : 'Are you a visitor exploring Jordan, or a local looking for exclusive deals?'"></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="glass-card rounded-3xl p-8 border-t-4 border-t-[#c17551] hover:-translate-y-2 transition-transform duration-500 group flex flex-col h-full relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-[#c17551] opacity-10 rounded-full blur-3xl group-hover:opacity-30 transition-opacity"></div>
                        <div class="mb-6">
                            <h3 class="text-3xl font-black text-white mb-2 font-serif">Where To, Traveler?</h3>
                            <p class="text-[#c17551] font-bold text-sm uppercase tracking-widest mb-6">For International Visitors</p>
                            <ul class="space-y-4 text-gray-300">
                                <li class="flex items-center gap-3"><svg class="w-5 h-5 text-[#c17551]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span x-text="language==='ar'?'مسارات سياحية كاملة وموجهة':'Full guided itineraries'"></span></li>
                                <li class="flex items-center gap-3"><svg class="w-5 h-5 text-[#c17551]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span x-text="language==='ar'?'معلومات ثقافية ونصائح أمان':'Cultural context & safety tips'"></span></li>
                                <li class="flex items-center gap-3"><svg class="w-5 h-5 text-[#c17551]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span x-text="language==='ar'?'حجز أدلاء محليين':'Curated local guides'"></span></li>
                            </ul>
                        </div>
                        <div class="mt-auto pt-8">
                            <a href="{{ route('register') }}" class="block text-center w-full bg-[#1f130e] hover:bg-[#c17551] border border-[#3a251c] hover:border-transparent text-[#c17551] hover:text-white py-4 rounded-xl font-black transition-colors no-underline">
                                <span x-text="language === 'ar' ? 'ابدأ التخطيط الآن' : 'Start Planning &rarr;'"></span>
                            </a>
                        </div>
                    </div>

                    <div class="glass-card rounded-3xl p-8 border-t-4 border-t-[#8E3D1D] hover:-translate-y-2 transition-transform duration-500 group flex flex-col h-full relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-[#8E3D1D] opacity-10 rounded-full blur-3xl group-hover:opacity-30 transition-opacity"></div>
                        <div class="mb-6">
                            <h3 class="text-3xl font-black text-white mb-2 font-serif">وين طشّتنا اليوم؟</h3>
                            <p class="text-[#8E3D1D] font-bold text-sm uppercase tracking-widest mb-6">للمواطن الأردني (Locals)</p>
                            <ul class="space-y-4 text-gray-300">
                                <li class="flex items-center gap-3"><svg class="w-5 h-5 text-[#8E3D1D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span x-text="language==='ar'?'أماكن قريبة منك هسّا':'Nearby hidden places'"></span></li>
                                <li class="flex items-center gap-3"><svg class="w-5 h-5 text-[#8E3D1D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span x-text="language==='ar'?'طشّات بتجنن على قد الجيبة':'Budget-friendly trips'"></span></li>
                                <li class="flex items-center gap-3"><svg class="w-5 h-5 text-[#8E3D1D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span x-text="language==='ar'?'عروض مطاعم حصرية (فزعة)':'Exclusive flash deals'"></span></li>
                            </ul>
                        </div>
                        <div class="mt-auto pt-8">
                            <a href="{{ route('register') }}" class="block text-center w-full bg-[#1f130e] hover:bg-[#8E3D1D] border border-[#3a251c] hover:border-transparent text-[#8E3D1D] hover:text-white py-4 rounded-xl font-black transition-colors no-underline">
                                <span x-text="language === 'ar' ? 'يلّا نبلّش &larr;' : 'Explore Deals'"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="planner" class="py-24 relative z-10 border-y border-white/5 bg-[#0a0605]/40">
            <div class="max-w-5xl mx-auto px-6 lg:px-8">
                <div class="glass-card rounded-3xl p-8 md:p-12">
                    <div class="flex flex-col md:flex-row items-center gap-6 mb-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#c17551] to-[#8E3D1D] rounded-2xl flex items-center justify-center text-4xl shadow-[0_0_20px_rgba(193,117,81,0.3)]">🤖</div>
                        <div class="text-center md:text-left rtl:md:text-right">
                            <h2 class="text-3xl font-black text-white mb-2" x-text="language === 'ar' ? 'المخطط الذكي للرحلات' : 'AI Smart Trip Planner'"></h2>
                            <p class="text-gray-400" x-text="language === 'ar' ? 'حدد تفضيلاتك وسنقوم ببناء خطة رحلة كاملة في ثوانٍ.' : 'Generate a personalized itinerary powered by artificial intelligence.'"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2" x-text="language === 'ar' ? 'الوجهة' : 'Destination'"></label>
                            <select class="glass-input w-full px-4 py-3 rounded-xl appearance-none cursor-pointer">
                                <option x-text="language === 'ar' ? 'كل الأردن' : 'All Jordan'"></option>
                                <option x-text="language === 'ar' ? 'عمان' : 'Amman'"></option>
                                <option x-text="language === 'ar' ? 'البتراء' : 'Petra'"></option>
                                <option x-text="language === 'ar' ? 'العقبة' : 'Aqaba'"></option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2" x-text="language === 'ar' ? 'المدة' : 'Duration'"></label>
                            <select class="glass-input w-full px-4 py-3 rounded-xl appearance-none cursor-pointer">
                                <option x-text="language === 'ar' ? 'يوم واحد' : '1 Day'"></option>
                                <option x-text="language === 'ar' ? '3 أيام' : '3 Days'"></option>
                                <option x-text="language === 'ar' ? 'أسبوع' : '1 Week'"></option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2" x-text="language === 'ar' ? 'أسلوب السفر' : 'Travel Style'"></label>
                            <select class="glass-input w-full px-4 py-3 rounded-xl appearance-none cursor-pointer">
                                <option x-text="language === 'ar' ? 'عائلة' : 'Family'"></option>
                                <option x-text="language === 'ar' ? 'شباب / مغامرة' : 'Adventure'"></option>
                                <option x-text="language === 'ar' ? 'تاريخ وثقافة' : 'History & Culture'"></option>
                            </select>
                        </div>
                    </div>

                    <div x-data="{ isGenerating: false, generated: false }">
                        <button @click="isGenerating = true; setTimeout(() => { isGenerating = false; generated = true; }, 2000)"
                                :disabled="isGenerating || generated"
                                class="w-full bg-gradient-to-r from-[#c17551] to-[#8E3D1D] text-white py-4 rounded-xl font-black text-lg hover:shadow-[0_0_20px_rgba(193,117,81,0.4)] transition-all flex items-center justify-center gap-3 border-none cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed">

                            <svg x-show="isGenerating" class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>

                            <span x-show="!isGenerating && !generated" x-text="language === 'ar' ? 'اصنع خطتي الآن ✦' : 'Generate My Itinerary ✦'"></span>
                            <span x-show="isGenerating" x-text="language === 'ar' ? 'الذكاء الاصطناعي يفكر...' : 'AI is thinking...'"></span>
                            <span x-show="generated" x-text="language === 'ar' ? 'تم إنشاء الخطة!' : 'Itinerary Ready!'"></span>
                        </button>

                        <div x-show="generated" x-transition.duration.500ms class="mt-8 bg-black/40 p-6 rounded-2xl border border-[#c17551]/30">
                            <h4 class="text-[#c17551] font-bold mb-4" x-text="language === 'ar' ? 'مقتطف من خطتك:' : 'Snippet of your plan:'"></h4>
                            <div class="space-y-4 border-l-2 rtl:border-l-0 rtl:border-r-2 border-[#3a251c] ltr:pl-4 rtl:pr-4">
                                <div><span class="text-white font-bold">09:00 AM</span> - <span class="text-gray-400" x-text="language === 'ar' ? 'زيارة قلعة عمان' : 'Visit Amman Citadel'"></span></div>
                                <div><span class="text-white font-bold">01:00 PM</span> - <span class="text-gray-400" x-text="language === 'ar' ? 'غداء في مطعم هاشم (عضو في منصة وين)' : 'Lunch at Hashem Restaurant (Wayn Partner)'"></span></div>
                                <div><span class="text-white font-bold">04:00 PM</span> - <span class="text-gray-400" x-text="language === 'ar' ? 'المدرج الروماني' : 'Roman Theater'"></span></div>
                            </div>
                            <div class="mt-6 text-center">
                                <a href="{{ route('register') }}" class="text-[#c17551] hover:underline font-bold text-sm" x-text="language === 'ar' ? 'سجل حسابك لرؤية الخطة الكاملة' : 'Sign up to see the full plan and map'"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="currency" class="py-24 relative z-10">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="section-header text-center mb-16">
                    <h2 class="text-4xl font-black font-serif text-white mb-2">
                        <span x-text="language === 'ar' ? 'محول ' : 'Currency '"></span>
                        <span class="text-gradient-brown" x-text="language === 'ar' ? 'العملات' : 'Converter'"></span>
                    </h2>
                    <p class="text-gray-400" x-text="language === 'ar' ? 'أسعار الصرف المباشرة والدقيقة في الأردن.' : 'Live exchange rates in Jordan. 1 JOD is pegged to 1.41 USD.'"></p>
                </div>

                <div class="max-w-lg mx-auto glass-card rounded-3xl p-8 text-center" x-data="{ usd: 100, jod: 70.92 }">
                    <div class="flex items-center justify-between bg-black/40 border border-[#3a251c] rounded-2xl p-4 mb-4">
                        <span class="text-2xl font-black text-gray-400">USD</span>
                        <input type="number" x-model="usd" @input="jod = (usd / 1.41).toFixed(2)" class="bg-transparent border-none text-right text-3xl font-black text-white focus:outline-none w-1/2">
                    </div>

                    <div class="w-10 h-10 bg-[#c17551] rounded-full flex items-center justify-center text-white mx-auto -my-4 relative z-10 shadow-lg border-4 border-[#140b08]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                    </div>

                    <div class="flex items-center justify-between bg-gradient-to-r from-[#c17551]/10 to-transparent border border-[#c17551]/30 rounded-2xl p-4 mt-4">
                        <span class="text-2xl font-black text-[#c17551]">JOD</span>
                        <input type="number" x-model="jod" @input="usd = (jod * 1.41).toFixed(2)" class="bg-transparent border-none text-right text-3xl font-black text-[#c17551] focus:outline-none w-1/2">
                    </div>
                    <p class="text-xs text-gray-500 mt-6" x-text="language === 'ar' ? '* الدينار الأردني مرتبط بالدولار الأمريكي.' : '* JOD is strictly pegged to the US Dollar.'"></p>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-[#050302] border-t border-white/10 pt-16 pb-8 relative overflow-hidden z-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="font-serif text-3xl font-black text-[#c17551]">Wayn?</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-md" x-text="language === 'ar' ? 'منصة السياحة الأردنية الأولى التي تجمع بين التكنولوجيا المتقدمة والأصالة الأردنية، لتقديم تجربة سياحية لا مثيل لها.' : 'The ultimate Jordanian tourism platform combining advanced tech with authentic hospitality.'"></p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4 uppercase tracking-wider" x-text="language === 'ar' ? 'المنصة' : 'Platform'"></h4>
                    <ul class="space-y-3">
    <li>
        <a href="{{ route('login') }}" class="text-gray-400 hover:text-[#c17551] transition-colors text-sm no-underline" x-text="language === 'ar' ? 'تسجيل الدخول' : 'Sign In'"></a>
    </li>
    <li>
        <a href="{{ route('register') }}" class="text-gray-400 hover:text-[#c17551] transition-colors text-sm no-underline" x-text="language === 'ar' ? 'انضم إلينا كشريك' : 'Join as Partner'"></a>
    </li>
</ul>
                </div>
            </div>
            <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-sm font-medium">&copy; 2026 Wayn Platform. All rights reserved.</p>
                <div class="flex items-center gap-2 text-gray-600 text-sm font-medium">
                    Built with <svg class="w-4 h-4 text-[#CE1126] fill-current animate-pulse" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> in Jordan 🇯🇴
                </div>
            </div>
        </div>
    </footer>

    <script>
        function landingPage() {
            return {
                language: localStorage.getItem('wayn_lang') || 'ar',
                scrolled: false,
                mouseX: 0,
                mouseY: 0,

                init() {
                    document.documentElement.dir = this.language === 'ar' ? 'rtl' : 'ltr';

                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 20;
                    });

                    this.$watch('language', val => {
                        localStorage.setItem('wayn_lang', val);
                        document.documentElement.dir = val === 'ar' ? 'rtl' : 'ltr';
                    });
                },

                toggleLang() {
                    this.language = this.language === 'ar' ? 'en' : 'ar';
                },

                scrollTo(id) {
                    const el = document.getElementById(id);
                    if(el) el.scrollIntoView({ behavior: 'smooth' });
                },

                updateGlow(e) {
                    this.mouseX = e.clientX;
                    this.mouseY = e.clientY + window.scrollY;
                }
            }
        }
    </script>
</body>
</html>
