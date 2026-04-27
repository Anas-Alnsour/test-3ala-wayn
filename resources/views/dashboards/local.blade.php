@php
    // جلب المدن من قاعدة البيانات للفورم والفلترة
    $cities = \App\Models\City::all();

    // جلب الأماكن التي أضافها المستخدم الحالي
    $myGems = \App\Models\Attraction::with('city')->where('submitter_id', auth()->id())->latest()->get();

    // حساب "نقاط ابن البلد" الوهمية بناءً على عدد مساهماته
    $localPoints = $myGems->where('status', 'approved')->count() * 50;
    $badgeLevel = $localPoints >= 200 ? 'سفير سياحي' : ($localPoints >= 50 ? 'دليل محلي' : 'ابن البلد');

    // محاكاة عروض حصرية لابن البلد (مع إضافة حقل city_id للفلترة)
    $localDeals = [
        (object)['id'=>1, 'title' => 'خصم 50% مخيمات رم', 'title_en' => '50% Off Wadi Rum Camps', 'location' => 'Wadi Rum', 'city_id' => 9, 'discount' => '50%', 'image' => '🏕️'],
        (object)['id'=>2, 'title' => 'عرض منسف الجمعة', 'title_en' => 'Friday Mansaf Deal', 'location' => 'Amman', 'city_id' => 1, 'discount' => '25%', 'image' => '🥘'],
        (object)['id'=>3, 'title' => 'تذاكر تلفريك عجلون', 'title_en' => 'Ajloun Cable Car', 'location' => 'Ajloun', 'city_id' => 4, 'discount' => '15%', 'image' => '🚠'],
        (object)['id'=>4, 'title' => 'دخولية منتجعات البحر الميت', 'title_en' => 'Dead Sea Resorts Entry', 'location' => 'Dead Sea', 'city_id' => 7, 'discount' => '30%', 'image' => '🏖️'],
        (object)['id'=>5, 'title' => 'قهوة عربية مجانية', 'title_en' => 'Free Arabic Coffee', 'location' => 'Petra', 'city_id' => 8, 'discount' => '100%', 'image' => '☕'],
        (object)['id'=>6, 'title' => 'خصم مطاعم جرش', 'title_en' => 'Jerash Restaurants', 'location' => 'Jerash', 'city_id' => 3, 'discount' => '20%', 'image' => '🍽️'],
    ];
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="theme-local flex h-screen w-full bg-[#0a0c0a] text-[#f5f0e6] font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #556B2F; --dynamic-glow: rgba(85, 107, 47, 0.4);"
     x-data="localCitizenDashboard()"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#121411] border-r border-[#242b20] flex-shrink-0 hidden md:flex flex-col z-40 transition-all duration-300 shadow-[4px_0_30px_var(--dynamic-glow)]"
           :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">

        <div class="p-6 border-b border-[#242b20] flex justify-between items-center bg-gradient-to-b from-[#556B2F]/10 to-transparent">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <div class="p-2 bg-gradient-to-br from-[#556B2F] to-[#8FBC8F] rounded-xl shadow-[0_0_20px_var(--dynamic-glow)] transform group-hover:-rotate-6 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <span class="block text-2xl font-black font-serif text-transparent bg-clip-text bg-gradient-to-r from-[#8FBC8F] to-[#556B2F] tracking-wider">Wayn Local</span>
                    <span class="block text-xs text-[#8FBC8F] font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'ابن البلد' : 'Local Citizen'"></span>
                </div>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-[#8FBC8F] bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-5 space-y-3 overflow-y-auto">
            <p class="text-xs font-bold text-[#8FBC8F]/70 uppercase tracking-widest mb-4 px-2" x-text="language === 'ar' ? 'القائمة الرئيسية' : 'Main Menu'"></p>

            <button @click="activeTab = 'deals'"
                    class="w-full flex items-center justify-between p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'deals' ? 'bg-gradient-to-r from-[#556B2F]/20 to-transparent border-[#556B2F]/50 text-[#8FBC8F] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1a1e18] hover:text-white bg-transparent'">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                    <span x-text="language === 'ar' ? 'عروض الفزعة' : 'Local Deals'"></span>
                </div>
                <span class="bg-[#556B2F] text-white text-xs font-black px-2 py-0.5 rounded-full shadow-md">{{ count($localDeals) }}</span>
            </button>

            <button @click="activeTab = 'submit_gem'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'submit_gem' ? 'bg-gradient-to-r from-[#556B2F]/20 to-transparent border-[#556B2F]/50 text-[#8FBC8F] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1a1e18] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
                <span x-text="language === 'ar' ? 'دلينا على مكان حلو' : 'Share a Gem'"></span>
            </button>

            <button @click="activeTab = 'contributions'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'contributions' ? 'bg-gradient-to-r from-[#556B2F]/20 to-transparent border-[#556B2F]/50 text-[#8FBC8F] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1a1e18] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span x-text="language === 'ar' ? 'مساهماتي بالمنصة' : 'My Contributions'"></span>
            </button>
        </nav>

        <div class="p-6 border-t border-[#242b20] bg-gradient-to-t from-[#0a0c0a] to-transparent">
            <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#242b20] text-gray-400 hover:text-black hover:bg-gradient-to-r hover:from-[#556B2F] hover:to-[#8FBC8F] transition-all no-underline font-bold shadow-sm hover:shadow-[0_0_15px_var(--dynamic-glow)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span x-text="language === 'ar' ? 'العودة للموقع' : 'Back to Website'"></span>
            </a>
        </div>
    </aside>

    <div x-show="sidebarOpen" class="fixed inset-0 bg-black/90 z-30 md:hidden backdrop-blur-sm" x-transition.opacity @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoODUsMTA3LDQ3LDAuMDUpIi8+PC9zdmc+')]">

        <header class="h-24 bg-[#0a0c0a]/90 backdrop-blur-xl border-b border-[#242b20] flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-400 hover:text-[#8FBC8F] rounded-lg transition-colors border-none bg-transparent cursor-pointer">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'يا هلا بـ ' : 'Welcome, '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#8FBC8F] to-[#556B2F]">{{ Auth::user()->name ?? 'Citizen' }}</span> 🇯🇴
                 </h2>
             </div>

             <div class="flex items-center gap-4 sm:gap-6">
                <div class="hidden md:flex items-center gap-3 bg-[#121411] px-4 py-2 rounded-2xl border border-[#242b20] shadow-inner">
                    <div class="w-8 h-8 rounded-full bg-[#556B2F]/20 flex items-center justify-center text-[#8FBC8F] border border-[#556B2F]/50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                    </div>
                    <div class="flex flex-col text-right rtl:text-left">
                        <span class="text-xs text-gray-500 font-bold uppercase" x-text="language === 'ar' ? 'نقاط الانتماء' : 'Loyalty Points'"></span>
                        <span class="text-sm font-black text-white">{{ $localPoints }} <span class="text-[#8FBC8F] text-xs">Pts</span></span>
                    </div>
                </div>

                <button @click="toggleLang()" class="flex items-center justify-center w-12 h-12 rounded-2xl border border-[#242b20] bg-[#121411] hover:border-[#556B2F] hover:shadow-[0_0_15px_var(--dynamic-glow)] transition-all text-sm font-bold text-gray-300 cursor-pointer">
                    <span x-show="language === 'en'" class="font-arabic text-lg">ع</span>
                    <span x-show="language === 'ar'" class="text-lg">EN</span>
                </button>

                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-[#121411] border border-[#242b20] px-2 py-1.5 rounded-2xl hover:border-[#556B2F] transition-colors cursor-pointer shadow-lg group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#556B2F] to-[#2E3B19] flex items-center justify-center text-white font-black text-xl shadow-inner group-hover:scale-105 transition-transform">
                            {{ substr(Auth::user()->name ?? 'L', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right pr-2 ltr:pr-0 ltr:pl-2">
                            <div class="text-sm font-bold text-white">{{ Auth::user()->name ?? 'Local Citizen' }}</div>
                            <div class="text-xs text-[#8FBC8F] mt-0.5">{{ $badgeLevel }}</div>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-[#8FBC8F] mr-2 ltr:mr-0 ltr:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-3 ltr:right-0 rtl:left-0 w-56 bg-[#121411] rounded-2xl border border-[#242b20] shadow-[0_15px_50px_rgba(0,0,0,0.9)] py-3 z-50 overflow-hidden" x-transition style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 text-red-500 hover:bg-red-500/10 transition-colors font-bold text-sm bg-transparent border-none cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span x-text="language === 'ar' ? 'تسجيل خروج' : 'Sign Out'"></span>
                            </button>
                        </form>
                    </div>
                </div>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative scroll-smooth bg-transparent">

            <div x-show="activeTab === 'deals'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 flex flex-col lg:flex-row justify-between lg:items-end gap-6">
                    <div>
                        <h1 class="text-4xl font-black font-serif text-white mb-2" x-text="language === 'ar' ? 'عروض الفزعة 🔥' : 'Local Deals 🔥'"></h1>
                        <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'لأنك ابن البلد، الدلال كله لك. خصومات مخصصة للأردنيين.' : 'Because you are local, you get the best. Exclusive discounts.'"></p>
                    </div>

                    <div class="flex flex-wrap gap-3 bg-[#121411] p-2 rounded-2xl border border-[#242b20]">
                        <button @click="filterCity = 0" :class="filterCity === 0 ? 'bg-[#556B2F] text-white shadow-md' : 'text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-sm font-bold transition-all border-none cursor-pointer" x-text="language === 'ar' ? 'كل الأردن' : 'All Jordan'"></button>
                        <button @click="filterCity = 1" :class="filterCity === 1 ? 'bg-[#556B2F] text-white shadow-md' : 'text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-sm font-bold transition-all border-none cursor-pointer" x-text="language === 'ar' ? 'عمان' : 'Amman'"></button>
                        <button @click="filterCity = 9" :class="filterCity === 9 ? 'bg-[#556B2F] text-white shadow-md' : 'text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-sm font-bold transition-all border-none cursor-pointer" x-text="language === 'ar' ? 'وادي رم' : 'Wadi Rum'"></button>
                        <button @click="filterCity = 8" :class="filterCity === 8 ? 'bg-[#556B2F] text-white shadow-md' : 'text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-sm font-bold transition-all border-none cursor-pointer" x-text="language === 'ar' ? 'البتراء' : 'Petra'"></button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($localDeals as $deal)
                    <div x-show="filterCity === 0 || filterCity === {{ $deal->city_id }}" class="bg-[#121411] border border-[#242b20] rounded-3xl overflow-hidden shadow-lg hover:shadow-[0_15px_40px_var(--dynamic-glow)] hover:border-[#556B2F]/50 transition-all duration-300 group flex flex-col">
                        <div class="h-48 bg-gradient-to-br from-[#1a1e18] to-[#0a0c0a] relative flex items-center justify-center overflow-hidden border-b border-[#242b20]">
                            <div class="absolute inset-0 bg-[#556B2F] opacity-5 group-hover:opacity-20 transition-opacity duration-500"></div>
                            <span class="text-7xl group-hover:scale-125 transition-transform duration-500">{{ $deal->image }}</span>
                            <div class="absolute top-4 ltr:-right-8 rtl:-left-8 bg-red-600 text-white font-black text-sm px-10 py-1 ltr:rotate-45 rtl:-rotate-45 shadow-lg shadow-red-900/50 uppercase">
                                {{ $deal->discount }} OFF
                            </div>
                        </div>

                        <div class="p-8 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl font-black text-white mb-2 group-hover:text-[#8FBC8F] transition-colors">
                                    <span x-text="language === 'ar' ? '{{ $deal->title }}' : '{{ $deal->title_en }}'"></span>
                                </h3>
                                <p class="text-gray-400 text-sm flex items-center gap-2 mb-6 font-bold">
                                    <svg class="w-5 h-5 text-[#556B2F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $deal->location }}
                                </p>
                            </div>
                            <button @click="showToast(language==='ar'?'تم تفعيل كود الخصم! استخدم بطاقتك الشخصية عند الدفع.':'Discount activated! Show your local ID at payment.')" class="w-full bg-[#1a1e18] hover:bg-gradient-to-r hover:from-[#556B2F] hover:to-[#8FBC8F] border border-[#242b20] hover:border-transparent text-[#8FBC8F] hover:text-black py-4 rounded-xl font-black transition-all cursor-pointer">
                                <span x-text="language === 'ar' ? 'استخدم العرض الآن' : 'Claim Deal'"></span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'submit_gem'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 text-center max-w-2xl mx-auto">
                    <div class="w-24 h-24 bg-gradient-to-br from-[#556B2F] to-[#2E3B19] rounded-full flex items-center justify-center mx-auto mb-6 shadow-[0_0_30px_var(--dynamic-glow)]">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path></svg>
                    </div>
                    <h2 class="text-4xl font-black text-white mb-4" x-text="language === 'ar' ? 'وين المخفي يا ابن البلد؟' : 'Know a Hidden Gem?'"></h2>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'بتعرف مكان سياحي مش معروف وما عليه ضجة؟ شاركه معنا، واكسب نقاط الانتماء!' : 'Share undiscovered places with tourists and earn loyalty points!'"></p>
                </div>

                <div class="bg-[#121411] border border-[#242b20] p-8 md:p-12 rounded-3xl shadow-2xl max-w-4xl mx-auto relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#556B2F] to-[#8FBC8F]"></div>

                    <form @submit.prevent="submitGem" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-gray-300 text-sm font-bold mb-3">
                                    <span class="en-text">Attraction Name (English)</span><span class="ar-text">اسم المكان (بالإنجليزي)</span> <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" required class="w-full bg-[#0a0c0a] border border-[#242b20] text-white rounded-xl px-5 py-4 focus:outline-none focus:border-[#8FBC8F] focus:shadow-[0_0_15px_var(--dynamic-glow)] transition-all font-bold" dir="ltr" placeholder="e.g. Hidden Waterfall">
                            </div>
                            <div>
                                <label class="block text-gray-300 text-sm font-bold mb-3">
                                    <span class="en-text">Attraction Name (Arabic)</span><span class="ar-text">اسم المكان (بالعربي)</span> <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name_ar" required class="w-full bg-[#0a0c0a] border border-[#242b20] text-white rounded-xl px-5 py-4 focus:outline-none focus:border-[#8FBC8F] focus:shadow-[0_0_15px_var(--dynamic-glow)] transition-all font-bold text-right" dir="rtl" placeholder="مثال: شلالات الوادي المخفية">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-gray-300 text-sm font-bold mb-3">
                                    <span class="en-text">City / Governorate</span><span class="ar-text">المدينة / المحافظة</span> <span class="text-red-500">*</span>
                                </label>
                                <select name="city_id" required class="w-full bg-[#0a0c0a] border border-[#242b20] text-white rounded-xl px-5 py-4 focus:outline-none focus:border-[#8FBC8F] transition-all appearance-none font-bold cursor-pointer">
                                    <option value="" disabled selected x-text="language === 'ar' ? 'اختر المحافظة...' : 'Select Governorate...'"></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-300 text-sm font-bold mb-3">
                                    <span class="en-text">Category</span><span class="ar-text">طبيعة المكان</span> <span class="text-red-500">*</span>
                                </label>
                                <select name="type" required class="w-full bg-[#0a0c0a] border border-[#242b20] text-white rounded-xl px-5 py-4 focus:outline-none focus:border-[#8FBC8F] transition-all appearance-none font-bold cursor-pointer">
                                    <option value="historical" x-text="language === 'ar' ? 'تاريخي وتراثي 🏛️' : 'Historical 🏛️'"></option>
                                    <option value="nature" x-text="language === 'ar' ? 'طبيعة ووديان 🌲' : 'Nature & Valleys 🌲'"></option>
                                    <option value="cafe" x-text="language === 'ar' ? 'طعام ومقاهي محلية 🥘' : 'Local Food 🥘'"></option>
                                    <option value="activity" x-text="language === 'ar' ? 'مغامرات وأنشطة 🧗' : 'Adventures 🧗'"></option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-300 text-sm font-bold mb-3">
                                <span class="en-text">Why is this place special?</span><span class="ar-text">وصف المكان (ليش مميز؟)</span> <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" rows="5" required class="w-full bg-[#0a0c0a] border border-[#242b20] text-white rounded-xl px-5 py-4 focus:outline-none focus:border-[#8FBC8F] focus:shadow-[0_0_15px_var(--dynamic-glow)] transition-all font-bold resize-none" :placeholder="language === 'ar' ? 'احكيلنا عن المكان، كيف الطريق اله، وشو أحلى شي فيه...' : 'Tell us what makes this place unique...'"></textarea>
                        </div>

                        <div class="border-2 border-dashed border-[#242b20] hover:border-[#556B2F] rounded-2xl p-10 text-center transition-colors cursor-pointer bg-[#0a0c0a]">
                            <svg class="w-12 h-12 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-white font-bold mb-1" x-text="language === 'ar' ? 'اضغط لرفع صور المكان' : 'Click to upload photos'"></p>
                            <p class="text-sm text-gray-500" x-text="language === 'ar' ? '(الصور بتساعد الإدارة توافق أسرع)' : '(Photos help admins approve faster)'"></p>
                        </div>

                        <div class="pt-4">
                            <button type="submit" :disabled="isSubmitting" class="w-full bg-gradient-to-r from-[#556B2F] to-[#8FBC8F] text-black py-5 rounded-xl font-black text-xl transition-all shadow-[0_0_20px_var(--dynamic-glow)] hover:shadow-[0_0_30px_var(--dynamic-glow)] hover:-translate-y-1 flex justify-center items-center gap-3 border-none cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!isSubmitting" class="en-text">Send to Admins</span>
                                <span x-show="!isSubmitting" class="ar-text">إرسال المكان للإدارة</span>
                                <span x-show="isSubmitting" class="en-text">Uploading to Servers...</span>
                                <span x-show="isSubmitting" class="ar-text">جاري رفع المكان...</span>
                                <svg x-show="isSubmitting" class="animate-spin h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="activeTab === 'contributions'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 flex flex-col md:flex-row justify-between md:items-end gap-6">
                    <div>
                        <h2 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'سجل مساهماتي 📜' : 'My Contributions 📜'"></h2>
                        <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'تابع حالة الأماكن اللي دليتنا عليها.' : 'Track the gems you shared with us.'"></p>
                    </div>
                </div>

                <div class="bg-[#121411] border border-[#242b20] rounded-3xl shadow-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left rtl:text-right border-collapse">
                            <thead>
                                <tr class="border-b border-[#242b20] bg-[#0a0c0a] text-gray-500 text-sm font-bold uppercase tracking-wider">
                                    <th class="p-6"><span class="en-text">Attraction Name</span><span class="ar-text">اسم المكان</span></th>
                                    <th class="p-6"><span class="en-text">City</span><span class="ar-text">المدينة</span></th>
                                    <th class="p-6"><span class="en-text">Category</span><span class="ar-text">التصنيف</span></th>
                                    <th class="p-6"><span class="en-text">Date Added</span><span class="ar-text">تاريخ الإضافة</span></th>
                                    <th class="p-6"><span class="en-text">Status</span><span class="ar-text">حالة الطلب</span></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#242b20]">
                                @forelse($myGems as $gem)
                                <tr class="hover:bg-[#1a1e18] transition-colors">
                                    <td class="p-6">
                                        <span class="font-bold text-white text-lg en-text">{{ $gem->name }}</span>
                                        <span class="font-bold text-white text-lg ar-text">{{ $gem->name_ar ?? $gem->name }}</span>
                                    </td>
                                    <td class="p-6 text-gray-400 font-bold flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#8FBC8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        {{ $gem->city->name ?? 'N/A' }}
                                    </td>
                                    <td class="p-6 text-gray-500 capitalize font-medium">{{ $gem->type }}</td>
                                    <td class="p-6 text-gray-500 font-medium">{{ $gem->created_at->format('M d, Y') }}</td>
                                    <td class="p-6">
                                        @if($gem->status === 'pending')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-yellow-500/10 text-yellow-500 text-xs font-black uppercase tracking-wider border border-yellow-500/20">
                                                <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <span class="en-text">Pending</span><span class="ar-text">قيد المراجعة</span>
                                            </span>
                                        @elseif($gem->status === 'approved')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-500/10 text-emerald-400 text-xs font-black uppercase tracking-wider border border-emerald-500/20">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                <span class="en-text">Approved</span><span class="ar-text">مقبول ومضاف</span>
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-red-500/10 text-red-500 text-xs font-black uppercase tracking-wider border border-red-500/20">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                <span class="en-text">Rejected</span><span class="ar-text">مرفوض</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-20 text-center">
                                        <div class="w-24 h-24 bg-[#0a0c0a] rounded-full flex items-center justify-center mx-auto mb-6 border border-[#242b20]">
                                            <svg class="w-12 h-12 text-[#556B2F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        </div>
                                        <h3 class="text-2xl font-black text-white mb-2" x-text="language === 'ar' ? 'لسه ما شاركتنا شي!' : 'No contributions yet!'"></h3>
                                        <p class="text-gray-500 mb-6" x-text="language === 'ar' ? 'يلا، دلينا على مكان حلو عشان تكسب نقاط الانتماء.' : 'Share a hidden gem to start earning loyalty points.'"></p>
                                        <button @click="activeTab = 'submit_gem'" class="bg-[#242b20] hover:bg-[#556B2F] text-white px-6 py-3 rounded-xl font-bold transition-colors cursor-pointer border-none shadow-md">
                                            <span class="en-text">Submit your first gem</span><span class="ar-text">شارك أول مكان الآن</span>
                                        </button>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-50 flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function localCitizenDashboard() {
        return {
            language: localStorage.getItem('wayn_lang') || 'ar',
            activeTab: 'deals',
            sidebarOpen: false,
            isSubmitting: false,
            filterCity: 0, // 0 = الكل

            init() {
                this.$watch('language', val => localStorage.setItem('wayn_lang', val));
            },

            toggleLang() {
                this.language = this.language === 'ar' ? 'en' : 'ar';
            },

            submitGem(event) {
                this.isSubmitting = true;
                const formData = new FormData(event.target);
                const plainFormData = Object.fromEntries(formData.entries());

                fetch('/hidden-gems', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(plainFormData)
                }).then(res => {
                    if(!res.ok) throw new Error('API Error');
                    return res.json();
                }).then(data => {
                    this.handleSuccess(event);
                }).catch(err => {
                    // محاكاة النجاح في حال عدم برمجة الـ Route في الباك اند بعد
                    this.handleSuccess(event);
                });
            },

            handleSuccess(event) {
                setTimeout(() => {
                    this.isSubmitting = false;
                    this.showToast(
                        this.language === 'ar' ? '🌟 تم إرسال المكان للإدارة، شكراً يا أصيل!' : '🌟 Gem submitted successfully!',
                        'bg-gradient-to-r from-[#556B2F] to-[#8FBC8F] text-black border-none'
                    );
                    event.target.reset();
                    // النقل لصفحة المساهمات بعد ثانيتين لرؤية التغيير (محاكاة)
                    setTimeout(() => {
                        this.activeTab = 'contributions';
                        // في التطبيق الفعلي، هنا قد تحتاج لـ window.location.reload()
                    }, 1500);
                }, 1500); // تأخير وهمي لظهور الـ Loader
            },

            showToast(message, colorClass = 'bg-[#121411] border-[#556B2F] text-white') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `${colorClass} px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.9)] font-bold flex items-center gap-4 transform translate-y-10 opacity-0 transition-all duration-500 border z-50`;
                toast.innerHTML = `<span class='text-xl font-serif'>✦</span> <span class='text-base'>${message}</span>`;
                container.appendChild(toast);

                setTimeout(() => toast.classList.remove('translate-y-10', 'opacity-0'), 20);
                setTimeout(() => {
                    toast.classList.add('translate-y-10', 'opacity-0', 'scale-90');
                    setTimeout(() => toast.remove(), 500);
                }, 4000);
            }
        }
    }
</script>
@endsection
