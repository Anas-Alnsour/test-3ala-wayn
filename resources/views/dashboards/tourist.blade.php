@php
    // جلب المفضلة الخاصة بالسائح (بيانات حقيقية مع صور من ويكيبيديا إن وجدت)
    $wishlistCities = \App\Models\City::with('attractions')->take(4)->get();
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="theme-tourist flex h-screen w-full bg-[#140b0d] text-[#f5f0e6] font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #B56576; --dynamic-glow: rgba(181, 101, 118, 0.4);"
     x-data="touristDashboard()"
     x-init="initWikiImages(); $watch('activeTab', value => { if(value === 'wishlist') setTimeout(() => initWikiImages(), 100); })"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#1a0e11] border-r border-[#2e191e] flex-shrink-0 hidden md:flex flex-col z-40 transition-all duration-300 shadow-[4px_0_30px_rgba(0,0,0,0.8)]"
           :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">

        <div class="p-6 border-b border-[#2e191e] flex justify-between items-center bg-gradient-to-b from-[#B56576]/10 to-transparent">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <div class="p-2 bg-gradient-to-br from-[#B56576] to-[#E56B6F] rounded-xl shadow-[0_0_20px_var(--dynamic-glow)] transform group-hover:rotate-12 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <span class="block text-2xl font-black font-serif text-transparent bg-clip-text bg-gradient-to-r from-[#E56B6F] to-[#B56576] tracking-wider">Wayn Explorer</span>
                    <span class="block text-xs text-[#B56576] font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'السائح' : 'Tourist'"></span>
                </div>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-[#B56576] bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-5 space-y-3 overflow-y-auto">
            <p class="text-xs font-bold text-[#B56576]/70 uppercase tracking-widest mb-4 px-2" x-text="language === 'ar' ? 'مساعدك الشخصي' : 'Your Assistant'"></p>

            <button @click="activeTab = 'overview'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'overview' ? 'bg-gradient-to-r from-[#B56576]/20 to-transparent border-[#B56576]/50 text-[#E56B6F] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#2e191e]/50 hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span x-text="language === 'ar' ? 'مسار رحلتي اليوم' : 'My Itinerary'"></span>
            </button>

            <button @click="activeTab = 'wishlist'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'wishlist' ? 'bg-gradient-to-r from-[#B56576]/20 to-transparent border-[#B56576]/50 text-[#E56B6F] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#2e191e]/50 hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                <span x-text="language === 'ar' ? 'الأماكن المحفوظة' : 'My Wishlist'"></span>
            </button>

            <button @click="activeTab = 'tools'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'tools' ? 'bg-gradient-to-r from-[#B56576]/20 to-transparent border-[#B56576]/50 text-[#E56B6F] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#2e191e]/50 hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                <span x-text="language === 'ar' ? 'أدوات وفزعة' : 'Tourist Tools'"></span>
            </button>
        </nav>

        <div class="p-6 border-t border-[#2e191e] bg-gradient-to-t from-[#140b0d] to-transparent">
            <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#2e191e] text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-[#B56576] hover:to-[#E56B6F] transition-all no-underline font-bold shadow-sm hover:shadow-[0_0_15px_var(--dynamic-glow)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span x-text="language === 'ar' ? 'العودة للاستكشاف' : 'Back to Explore'"></span>
            </a>
        </div>
    </aside>

    <div x-show="sidebarOpen" class="fixed inset-0 bg-black/90 z-30 md:hidden backdrop-blur-sm" x-transition.opacity @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMTgxLDEwMSwxMTgsMC4wNSkiLz48L3N2Zz4=')]">

        <header class="h-24 bg-[#140b0d]/90 backdrop-blur-xl border-b border-[#2e191e] flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-400 hover:text-[#B56576] rounded-lg transition-colors border-none bg-transparent cursor-pointer">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'أهلاً بك في الأردن، ' : 'Welcome to Jordan, '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#B56576] to-[#E56B6F]">{{ Auth::user()->name ?? 'Explorer' }}</span> 🇯🇴
                 </h2>
             </div>

             <div class="flex items-center gap-4 sm:gap-6">
                <div class="hidden md:flex items-center gap-2 bg-[#1a0e11] border border-[#2e191e] px-3 py-1.5 rounded-2xl">
                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                    <span class="text-white font-bold text-sm">24°C</span>
                </div>

                <button @click="toggleLang()" class="flex items-center justify-center w-12 h-12 rounded-2xl border border-[#2e191e] bg-[#1a0e11] hover:border-[#B56576] hover:shadow-[0_0_15px_var(--dynamic-glow)] transition-all text-sm font-bold text-gray-300 cursor-pointer">
                    <span x-show="language === 'en'" class="font-arabic text-lg">ع</span>
                    <span x-show="language === 'ar'" class="text-lg">EN</span>
                </button>

                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-[#1a0e11] border border-[#2e191e] px-2 py-1.5 rounded-2xl hover:border-[#B56576] transition-colors cursor-pointer shadow-lg group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#B56576] to-[#E56B6F] flex items-center justify-center text-white font-black text-xl shadow-inner group-hover:scale-105 transition-transform">
                            {{ substr(Auth::user()->name ?? 'E', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right pr-2 ltr:pr-0 ltr:pl-2">
                            <div class="text-sm font-bold text-white">{{ Auth::user()->name ?? 'Explorer' }}</div>
                            <div class="text-xs text-[#E56B6F] mt-0.5">Tourist</div>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-[#B56576] mr-2 ltr:mr-0 ltr:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-3 ltr:right-0 rtl:left-0 w-56 bg-[#1a0e11] rounded-2xl border border-[#2e191e] shadow-[0_15px_50px_rgba(0,0,0,0.9)] py-3 z-50 overflow-hidden" x-transition style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 text-red-400 hover:bg-red-500/10 transition-colors font-bold text-sm bg-transparent border-none cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span x-text="language === 'ar' ? 'تسجيل الخروج' : 'Sign Out'"></span>
                            </button>
                        </form>
                    </div>
                </div>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative scroll-smooth bg-transparent">

            <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 text-center max-w-2xl mx-auto">
                    <h1 class="text-4xl font-black font-serif text-white mb-2" x-text="language === 'ar' ? 'خطتك لليوم 📍' : 'Your Schedule Today 📍'"></h1>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'اتبع هذا المسار المصمم خصيصاً لك لتجربة سياحية لا تُنسى في العاصمة.' : 'Follow this AI-crafted itinerary for an unforgettable experience.'"></p>
                </div>

                <div class="max-w-4xl mx-auto relative">
                    <div class="absolute ltr:left-[35px] rtl:right-[35px] top-0 bottom-0 w-1 bg-gradient-to-b from-[#B56576] to-transparent rounded-full opacity-50"></div>

                    <div class="relative mb-12 group" x-data="{ done: true }">
                        <div class="absolute ltr:left-[21px] rtl:right-[21px] top-0 w-8 h-8 rounded-full border-4 border-[#140b0d] flex items-center justify-center transition-colors cursor-pointer z-10"
                             :class="done ? 'bg-green-500 text-white shadow-[0_0_15px_rgba(34,197,94,0.5)]' : 'bg-[#B56576] text-transparent'" @click="done = !done; showToast(done ? '✅ تم زيارة المكان!' : '🔄 تم التراجع')">
                            <svg x-show="done" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div class="ltr:ml-20 rtl:mr-20">
                            <div class="text-[#E56B6F] text-sm font-black tracking-widest mb-2 bg-[#B56576]/10 inline-block px-3 py-1 rounded-lg border border-[#B56576]/20">09:00 AM</div>
                            <div class="bg-[#1a0e11] p-6 md:p-8 rounded-3xl border border-[#2e191e] hover:border-[#B56576]/50 transition-all shadow-lg hover:shadow-[0_10px_30px_var(--dynamic-glow)]" :class="done ? 'opacity-70' : ''">
                                <h4 class="text-2xl font-black text-white mb-2" :class="done ? 'line-through text-gray-500' : ''">Amman Citadel</h4>
                                <p class="text-gray-400 text-base leading-relaxed mb-4">Start your morning exploring the historic ruins of Jabal Al Qal'a. Don't miss the Temple of Hercules and the beautiful Umayyad Palace.</p>
                                <button class="bg-[#140b0d] text-gray-300 hover:text-[#B56576] border border-[#2e191e] px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 cursor-pointer transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span x-text="language === 'ar' ? 'افتح الخريطة' : 'Get Directions'"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="relative mb-12 group" x-data="{ done: false }">
                        <div class="absolute ltr:left-[21px] rtl:right-[21px] top-0 w-8 h-8 rounded-full border-4 border-[#140b0d] flex items-center justify-center transition-colors cursor-pointer z-10"
                             :class="done ? 'bg-green-500 text-white shadow-[0_0_15px_rgba(34,197,94,0.5)]' : 'bg-[#B56576] text-transparent hover:scale-110'" @click="done = !done; showToast(done ? '✅ صحتين وعافية!' : '🔄 تم التراجع')">
                            <svg x-show="done" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div class="ltr:ml-20 rtl:mr-20">
                            <div class="text-[#E56B6F] text-sm font-black tracking-widest mb-2 bg-[#B56576]/10 inline-block px-3 py-1 rounded-lg border border-[#B56576]/20">12:30 PM</div>
                            <div class="bg-gradient-to-br from-[#1a0e11] to-[#2e191e] p-6 md:p-8 rounded-3xl border border-[#B56576]/30 transition-all shadow-lg hover:shadow-[0_10px_30px_var(--dynamic-glow)]" :class="done ? 'opacity-70' : ''">
                                <div class="flex items-center gap-3 mb-2">
                                    <h4 class="text-2xl font-black text-white" :class="done ? 'line-through text-gray-500' : ''">Hashem Restaurant</h4>
                                    <span class="px-2 py-1 bg-yellow-500/20 text-yellow-500 text-xs font-black rounded-lg">Popular</span>
                                </div>
                                <p class="text-gray-400 text-base leading-relaxed mb-4">Head down to Downtown Amman (Al-Balad) for the most famous falafel and hummus in the city. A true local experience.</p>
                                <button class="bg-[#B56576] text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 cursor-pointer transition-colors shadow-md hover:bg-[#E56B6F] border-none">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <span x-text="language === 'ar' ? 'عرض المنيو (QR)' : 'Scan Menu'"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="relative group" x-data="{ done: false }">
                        <div class="absolute ltr:left-[21px] rtl:right-[21px] top-0 w-8 h-8 rounded-full border-4 border-[#140b0d] flex items-center justify-center transition-colors cursor-pointer z-10 bg-[#2e191e] hover:bg-[#B56576] text-transparent" @click="done = !done"></div>
                        <div class="ltr:ml-20 rtl:mr-20">
                            <div class="text-gray-500 text-sm font-black tracking-widest mb-2 px-3 py-1 inline-block">03:00 PM</div>
                            <div class="bg-[#1a0e11] p-6 md:p-8 rounded-3xl border border-[#2e191e] hover:border-[#B56576]/50 transition-all shadow-lg">
                                <h4 class="text-2xl font-black text-white mb-2 text-gray-300">Roman Theater & Souq</h4>
                                <p class="text-gray-500 text-base leading-relaxed">Walk to the 6,000-seat Roman Theater, then explore the surrounding old markets for authentic souvenirs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'wishlist'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'أماكن تود زيارتها 🔖' : 'Your Wishlist 🔖'"></h2>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'المدن اللي حفظتها عشان تزورها في المستقبل.' : 'Cities you saved for your upcoming trips.'"></p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                    @foreach($wishlistCities as $city)
                    <div class="bg-[#1a0e11] rounded-3xl overflow-hidden group cursor-pointer border border-[#2e191e] hover:border-[#B56576]/50 transition-all duration-300 shadow-lg relative flex flex-col h-72">

                        <button class="absolute top-4 ltr:right-4 rtl:left-4 z-10 w-10 h-10 rounded-full bg-black/60 text-white hover:bg-red-600 transition-colors flex items-center justify-center border border-white/20 backdrop-blur-md cursor-pointer" @click.stop="$el.closest('.bg-\\[\\#1a0e11\\]').remove(); showToast(language==='ar'?'تم الإزالة':'Removed from wishlist')">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </button>

                        <div class="absolute inset-0 overflow-hidden">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                 data-wiki="{{ $city->wiki_title }}"
                                 class="city-img w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-70 group-hover:opacity-100"
                                 alt="{{ $city->name }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#140b0d] via-[#140b0d]/60 to-transparent"></div>
                        </div>

                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h4 class="text-3xl font-black font-serif text-white shadow-sm mb-1">{{ $city->name }}</h4>
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-[#B56576]/20 text-[#E56B6F] text-xs font-bold rounded-lg border border-[#B56576]/30 backdrop-blur-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                {{ $city->attractions->count() }} Places
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'tools'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'أدوات السائح والفزعة 🧰' : 'Tourist Toolkit 🧰'"></h2>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'كل ما تحتاجه في مكان واحد لتسهيل رحلتك.' : 'Everything you need in one place for a smooth trip.'"></p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    <div class="bg-[#1a0e11] p-8 md:p-10 rounded-3xl border border-[#2e191e] shadow-xl relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-[#B56576] opacity-10 rounded-full blur-3xl"></div>
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#B56576] to-[#E56B6F] flex items-center justify-center text-white shadow-[0_0_15px_var(--dynamic-glow)]">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white">
                                <span class="en-text">Live Currency Exchange</span>
                                <span class="ar-text">محول العملات الفوري</span>
                            </h3>
                        </div>

                        <div class="space-y-6 relative z-10">
                            <div class="bg-[#140b0d] border border-[#2e191e] rounded-2xl p-5 flex items-center shadow-inner hover:border-[#B56576] transition-colors focus-within:border-[#B56576] focus-within:ring-1 focus-within:ring-[#B56576]">
                                <div class="flex items-center gap-3 w-32 border-r rtl:border-l rtl:border-r-0 border-[#2e191e]">
                                    <span class="text-2xl">🇯🇴</span>
                                    <span class="text-gray-400 font-bold tracking-widest text-lg">JOD</span>
                                </div>
                                <input type="number" step="0.01" x-model="amountJod" @input="updateFromJod" class="w-full bg-transparent border-none text-white text-3xl font-black ltr:text-right rtl:text-left focus:outline-none focus:ring-0 px-4">
                            </div>

                            <div class="flex justify-center text-[#B56576] -my-2">
                                <div class="bg-[#1a0e11] p-2 rounded-full border border-[#2e191e]">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                                </div>
                            </div>

                            <div class="bg-[#140b0d] border border-[#2e191e] rounded-2xl p-5 flex items-center shadow-inner hover:border-[#B56576] transition-colors focus-within:border-[#B56576] focus-within:ring-1 focus-within:ring-[#B56576]">
                                <div class="flex items-center gap-3 w-32 border-r rtl:border-l rtl:border-r-0 border-[#2e191e]">
                                    <span class="text-2xl">🇺🇸</span>
                                    <span class="text-gray-400 font-bold tracking-widest text-lg">USD</span>
                                </div>
                                <input type="number" step="0.01" x-model="amountUsd" @input="updateFromUsd" class="w-full bg-transparent border-none text-[#E56B6F] text-3xl font-black ltr:text-right rtl:text-left focus:outline-none focus:ring-0 px-4">
                            </div>

                            <div class="bg-[#B56576]/10 border border-[#B56576]/30 p-4 rounded-xl text-center">
                                <p class="text-sm font-bold text-[#E56B6F]" x-text="language === 'ar' ? 'سعر الصرف الأردني ثابت: 1 دينار = 1.41 دولار' : 'Fixed Peg Rate: 1 JOD = 1.41 USD'"></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1a0e11] p-8 md:p-10 border border-[#2e191e] rounded-3xl relative overflow-hidden shadow-xl flex flex-col justify-between">
                        <div class="absolute top-0 right-0 p-8 opacity-5">
                            <svg class="w-40 h-40 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </div>

                        <div class="relative z-10 mb-8">
                            <h3 class="text-3xl font-black text-white mb-2">
                                <span class="en-text">Emergency & Help</span>
                                <span class="ar-text">الطوارئ والمساعدة</span>
                            </h3>
                            <p class="text-gray-400 text-lg">
                                <span class="en-text">Jordan is extremely safe, but we are always here for you.</span>
                                <span class="ar-text">الأردن بلد الأمان، بس إحنا دائماً معك.</span>
                            </p>
                        </div>

                        <div class="space-y-4 relative z-10">
                            <button @click="callEmergency('11777')" class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white p-5 rounded-2xl font-black text-xl flex items-center justify-between transition-transform hover:-translate-y-1 cursor-pointer border-none shadow-[0_10px_20px_rgba(220,38,38,0.3)]">
                                <div class="flex items-center gap-4">
                                    <div class="bg-white/20 p-2 rounded-xl backdrop-blur-sm"><svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg></div>
                                    <div class="text-left rtl:text-right">
                                        <span class="block en-text">Tourist Police (11777)</span>
                                        <span class="block ar-text">الشرطة السياحية (11777)</span>
                                    </div>
                                </div>
                                <span class="opacity-50 text-sm font-bold bg-black/20 px-3 py-1 rounded-lg">CALL</span>
                            </button>

                            <button @click="callEmergency('911')" class="w-full bg-[#140b0d] border border-[#2e191e] hover:border-[#B56576] text-white p-5 rounded-2xl font-black text-xl flex items-center justify-between transition-colors cursor-pointer shadow-md">
                                <div class="flex items-center gap-4">
                                    <div class="bg-[#2e191e] p-2 rounded-xl"><svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></div>
                                    <div class="text-left rtl:text-right">
                                        <span class="block en-text">General Emergency (911)</span>
                                        <span class="block ar-text">الطوارئ العامة (911)</span>
                                    </div>
                                </div>
                                <span class="opacity-50 text-sm font-bold bg-black/50 px-3 py-1 rounded-lg">CALL</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-50 flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function touristDashboard() {
        return {
            language: localStorage.getItem('wayn_lang') || 'ar',
            activeTab: 'overview',
            sidebarOpen: false,

            // Logic for Currency Converter
            amountJod: 1,
            amountUsd: 1.41,

            init() {
                this.$watch('language', val => localStorage.setItem('wayn_lang', val));
            },

            toggleLang() {
                this.language = this.language === 'ar' ? 'en' : 'ar';
            },

            updateFromJod() {
                this.amountUsd = (this.amountJod * 1.41).toFixed(2);
            },

            updateFromUsd() {
                this.amountJod = (this.amountUsd / 1.41).toFixed(2);
            },

            callEmergency(number) {
                this.showToast(
                    this.language === 'ar' ? `📞 جاري الاتصال بالرقم ${number}...` : `📞 Dialing ${number}...`,
                    'bg-red-600 border-red-500 text-white'
                );
            },

            // جلب صور ويكيبيديا للأماكن المحفوظة لتكون اللوحة واقعية جداً
            initWikiImages() {
                const images = document.querySelectorAll('.city-img');
                images.forEach(img => {
                    const title = img.getAttribute('data-wiki');
                    if (title && !img.dataset.loaded) {
                        fetch(`https://en.wikipedia.org/api/rest_v1/page/summary/${encodeURIComponent(title)}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.thumbnail && data.thumbnail.source) {
                                    img.src = data.thumbnail.source;
                                } else if (data.originalimage && data.originalimage.source) {
                                    img.src = data.originalimage.source;
                                }
                                img.dataset.loaded = 'true';
                            })
                            .catch(err => console.error('Wiki image load error:', err));
                    }
                });
            },

            showToast(message, colorClass = 'bg-[#1a0e11] border-[#B56576] text-white') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `${colorClass} px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.8)] font-bold flex items-center gap-4 transform translate-y-10 opacity-0 transition-all duration-500 border z-50`;
                toast.innerHTML = `<span class='text-xl'>✧</span> <span class='text-lg'>${message}</span>`;
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
