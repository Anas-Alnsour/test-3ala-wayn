@php
    // Fetch wishlist cities for the tourist (Real data with Null Safety)
    $user = Auth::user();
    $wishlistCities = \App\Models\City::with('attractions')->take(4)->get();
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="theme-tourist flex h-screen w-full bg-[#140b0d] text-[#f5f0e6] font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #B56576; --dynamic-glow: rgba(181, 101, 118, 0.4);"
     x-data="touristDashboard()"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#1a0e11] border-r border-[#2e191e] flex-shrink-0 hidden md:flex flex-col z-[60] transition-all duration-300 shadow-[4px_0_30px_rgba(0,0,0,0.8)]"
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

        <div class="p-6 border-t border-[#2e191e] bg-gradient-to-t from-[#140b0d] to-transparent space-y-3">
            <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#2e191e] text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-[#B56576] hover:to-[#E56B6F] transition-all no-underline font-bold shadow-sm hover:shadow-[0_0_15px_var(--dynamic-glow)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span x-text="language === 'ar' ? 'العودة للاستكشاف' : 'Back to Explore'"></span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 hover:bg-red-500 hover:text-white transition-all font-black cursor-pointer uppercase tracking-widest text-[10px]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span x-text="language === 'ar' ? 'تسجيل الخروج' : 'Logout'"></span>
                </button>
            </form>
        </div>
    </aside>

    <div x-show="sidebarOpen" class="fixed inset-0 bg-black/90 z-30 md:hidden backdrop-blur-sm" x-transition.opacity @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMTgxLDEwMSwxMTgsMC4wNSkiLz48L3N2Zz4=')]">

        <header class="h-24 bg-[#140b0d]/90 backdrop-blur-xl border-b border-[#2e191e] flex items-center justify-between px-6 lg:px-10 z-50 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-400 hover:text-[#B56576] rounded-lg transition-colors border-none bg-transparent cursor-pointer">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'أهلاً بك في الأردن، ' : 'Welcome to Jordan, '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#B56576] to-[#E56B6F]">{{ $user->name ?? 'Explorer' }}</span> 🇯🇴
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
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative scroll-smooth bg-transparent z-10">

            <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 text-center max-w-2xl mx-auto">
                    <h1 class="text-4xl font-black font-serif text-white mb-2" x-text="language === 'ar' ? 'خطتك لليوم 📍' : 'Your Schedule Today 📍'"></h1>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'اتبع هذا المسار المصمم خصيصاً لك لتجربة سياحية لا تُنسى في العاصمة.' : 'Follow this AI-crafted itinerary for an unforgettable experience.'"></p>
                </div>

                <div class="max-w-4xl mx-auto relative">
                    <div class="absolute ltr:left-[35px] rtl:right-[35px] top-0 bottom-0 w-1 bg-gradient-to-b from-[#B56576] to-transparent rounded-full opacity-50"></div>

                    <div class="relative mb-12 group" x-data="{ done: true }">
                        <div class="absolute ltr:left-[21px] rtl:right-[21px] top-0 w-8 h-8 rounded-full border-4 border-[#140b0d] flex items-center justify-center transition-colors cursor-pointer z-10"
                             :class="done ? 'bg-green-500 text-white shadow-[0_0_15px_rgba(34,197,94,0.5)]' : 'bg-[#B56576] text-transparent'" @click="done = !done">
                            <svg x-show="done" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div class="ltr:ml-20 rtl:mr-20">
                            <div class="text-[#E56B6F] text-sm font-black tracking-widest mb-2 bg-[#B56576]/10 inline-block px-3 py-1 rounded-lg border border-[#B56576]/20">09:00 AM</div>
                            <div class="bg-[#1a0e11] p-0 rounded-3xl border border-[#2e191e] hover:border-[#B56576]/50 transition-all shadow-lg overflow-hidden flex flex-col md:flex-row h-auto md:h-60" :class="done ? 'opacity-70' : ''">
                                <div class="w-full md:w-1/3 h-48 md:h-full relative overflow-hidden bg-[#2e191e]">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Amman_Citadel_Temple_of_Hercules.jpg/800px-Amman_Citadel_Temple_of_Hercules.jpg" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Amman Citadel">
                                </div>
                                <div class="p-6 md:p-8 flex-1 flex flex-col justify-center">
                                    <h4 class="text-2xl font-black text-white mb-2" :class="done ? 'line-through text-gray-500' : ''">Amman Citadel</h4>
                                    <p class="text-gray-400 text-base leading-relaxed mb-4">Explore the Temple of Hercules and Umayyad Palace with panoramic city views.</p>
                                    <button class="w-fit bg-[#140b0d] text-gray-300 hover:text-[#B56576] border border-[#2e191e] px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 cursor-pointer transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        <span x-text="language === 'ar' ? 'افتح الخريطة' : 'Get Directions'"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative mb-12 group" x-data="{ done: false }">
                        <div class="absolute ltr:left-[21px] rtl:right-[21px] top-0 w-8 h-8 rounded-full border-4 border-[#140b0d] flex items-center justify-center transition-colors cursor-pointer z-10"
                             :class="done ? 'bg-green-500 text-white shadow-[0_0_15px_rgba(34,197,94,0.5)]' : 'bg-[#B56576] text-transparent hover:scale-110'" @click="done = !done">
                            <svg x-show="done" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div class="ltr:ml-20 rtl:mr-20">
                            <div class="text-[#E56B6F] text-sm font-black tracking-widest mb-2 bg-[#B56576]/10 inline-block px-3 py-1 rounded-lg border border-[#B56576]/20">12:30 PM</div>
                            <div class="bg-[#1a0e11] p-0 rounded-3xl border border-[#B56576]/30 transition-all shadow-lg overflow-hidden flex flex-col md:flex-row h-auto md:h-60" :class="done ? 'opacity-70' : ''">
                                <div class="w-full md:w-1/3 h-48 md:h-full relative overflow-hidden bg-[#2e191e]">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Falafel_02.jpg/800px-Falafel_02.jpg" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Hashem Restaurant">
                                </div>
                                <div class="p-6 md:p-8 flex-1 flex flex-col justify-center">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h4 class="text-2xl font-black text-white" :class="done ? 'line-through text-gray-500' : ''">Hashem Restaurant</h4>
                                        <span class="px-2 py-1 bg-yellow-500/20 text-yellow-500 text-xs font-black rounded-lg">Iconic</span>
                                    </div>
                                    <p class="text-gray-400 text-base leading-relaxed mb-4">Legendary street food experience in the heart of Downtown Amman.</p>
                                    <button class="w-fit bg-[#B56576] text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 cursor-pointer transition-colors shadow-md border-none">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14"></path></svg>
                                        <span x-text="language === 'ar' ? 'عرض المنيو' : 'Scan Menu'"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative group" x-data="{ done: false }">
                        <div class="absolute ltr:left-[21px] rtl:right-[21px] top-0 w-8 h-8 rounded-full border-4 border-[#140b0d] flex items-center justify-center transition-colors cursor-pointer z-10 bg-[#2e191e] hover:bg-[#B56576] text-transparent" @click="done = !done"></div>
                        <div class="ltr:ml-20 rtl:mr-20">
                            <div class="text-gray-500 text-sm font-black tracking-widest mb-2 px-3 py-1 inline-block">03:30 PM</div>
                            <div class="bg-[#1a0e11] p-0 rounded-3xl border border-[#2e191e] hover:border-[#B56576]/50 transition-all shadow-lg overflow-hidden flex flex-col md:flex-row h-auto md:h-60">
                                <div class="w-full md:w-1/3 h-48 md:h-full relative overflow-hidden bg-[#2e191e]">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Roman_Theater_Amman_Jordan.jpg/800px-Roman_Theater_Amman_Jordan.jpg" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="Roman Theatre">
                                </div>
                                <div class="p-6 md:p-8 flex-1 flex flex-col justify-center">
                                    <h4 class="text-2xl font-black text-white mb-2">Roman Theatre</h4>
                                    <p class="text-gray-400 text-base leading-relaxed mb-4">Marvel at the 6,000-seat amphitheater dating back to the 2nd century.</p>
                                </div>
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
                    @forelse($wishlistCities as $city)
                    <div class="bg-[#1a0e11] rounded-3xl overflow-hidden group cursor-pointer border border-[#2e191e] hover:border-[#B56576]/50 transition-all duration-300 shadow-lg relative flex flex-col h-80">

                        <button class="absolute top-4 ltr:right-4 rtl:left-4 z-20 w-10 h-10 rounded-full bg-black/60 text-white hover:bg-red-600 transition-colors flex items-center justify-center border border-white/20 backdrop-blur-md cursor-pointer" @click.stop="$el.closest('.bg-\\[\\#1a0e11\\]').remove(); showToast(language==='ar'?'تم الإزالة':'Removed from wishlist')">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </button>

                        <div class="absolute inset-0 overflow-hidden bg-[#2e191e]">
                            <img src="{{ $city->image_url ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Petra_Jordan_BW_21.JPG/800px-Petra_Jordan_BW_21.JPG' }}"
                                 onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Petra_Jordan_BW_21.JPG/800px-Petra_Jordan_BW_21.JPG'"
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 opacity-60 group-hover:opacity-100"
                                 alt="{{ $city->name }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#140b0d] via-transparent to-transparent"></div>
                        </div>

                        <div class="absolute bottom-0 left-0 right-0 p-6 z-10 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                            <h4 class="text-3xl font-black font-serif text-white mb-2">{{ $city->name }}</h4>
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/5 border border-white/10 backdrop-blur-md rounded-xl">
                                <span class="w-2 h-2 rounded-full bg-[#B56576]"></span>
                                <span class="text-xs font-black text-gray-300 uppercase tracking-widest">{{ $city->attractions->count() }} Attractions</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full p-10 text-center border border-dashed border-[#2e191e] rounded-3xl">
                        <p class="text-gray-500">Your wishlist is empty. Start exploring Jordan!</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <div x-show="activeTab === 'tools'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'أدوات السائح والفزعة 🧰' : 'Tourist Toolkit 🧰'"></h2>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'كل ما تحتاجه في مكان واحد لتسهيل رحلتك.' : 'Everything you need in one place for a smooth trip.'"></p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-[#1a0e11] p-8 md:p-10 rounded-[2.5rem] border border-[#2e191e] shadow-2xl relative overflow-hidden">
                        <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#B56576] opacity-10 rounded-full blur-3xl"></div>
                        <div class="flex items-center gap-6 mb-10">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#B56576] to-[#E56B6F] flex items-center justify-center text-white shadow-2xl">
                                <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-3xl font-black text-white">Live Currency</h3>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-[#140b0d] border border-white/5 rounded-3xl p-6 flex items-center shadow-inner focus-within:border-[#B56576] transition-all">
                                <div class="flex items-center gap-3 w-32 border-r border-white/5">
                                    <span class="text-3xl">🇯🇴</span>
                                    <span class="text-gray-400 font-black tracking-widest text-lg">JOD</span>
                                </div>
                                <input type="number" x-model="amountJod" @input="updateFromJod" class="w-full bg-transparent border-none text-white text-4xl font-black ltr:text-right rtl:text-left focus:outline-none px-4">
                            </div>
                            <div class="flex justify-center -my-3">
                                <div class="bg-[#B56576] p-3 rounded-full shadow-lg z-10"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg></div>
                            </div>
                            <div class="bg-[#140b0d] border border-white/5 rounded-3xl p-6 flex items-center shadow-inner focus-within:border-[#B56576] transition-all">
                                <div class="flex items-center gap-3 w-32 border-r border-white/5">
                                    <span class="text-3xl">🇺🇸</span>
                                    <span class="text-gray-400 font-black tracking-widest text-lg">USD</span>
                                </div>
                                <input type="number" x-model="amountUsd" @input="updateFromUsd" class="w-full bg-transparent border-none text-[#E56B6F] text-4xl font-black ltr:text-right rtl:text-left focus:outline-none px-4">
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1a0e11] p-8 md:p-10 border border-[#2e191e] rounded-[2.5rem] relative overflow-hidden shadow-2xl flex flex-col justify-between">
                         <div class="relative z-10">
                            <h3 class="text-3xl font-black text-white mb-4">Emergency Support</h3>
                            <p class="text-gray-400 text-lg mb-10 leading-relaxed">Safety is our priority. In any event of emergency, these numbers are available 24/7 across the Kingdom.</p>
                        </div>
                        <div class="space-y-4">
                            <button @click="callEmergency('11777')" class="w-full bg-red-600/10 border border-red-600/30 hover:bg-red-600 text-red-500 hover:text-white p-6 rounded-[2rem] font-black text-xl flex items-center justify-between transition-all group cursor-pointer">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 bg-red-600/20 group-hover:bg-white/20 rounded-2xl transition-colors"><svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg></div>
                                    <div class="text-left rtl:text-right">
                                        <span class="block text-xs uppercase tracking-widest opacity-60 mb-1">Tourist Police</span>
                                        <span class="block">11777</span>
                                    </div>
                                </div>
                                <span class="text-xs font-black border border-current px-3 py-1 rounded-lg uppercase">Dial Now</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-[9999] flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function touristDashboard() {
        return {
            language: localStorage.getItem('wayn_lang') || 'ar',
            activeTab: 'overview',
            sidebarOpen: false,
            amountJod: 1,
            amountUsd: 1.41,

            init() {
                this.$watch('language', val => {
                    localStorage.setItem('wayn_lang', val);
                    document.documentElement.dir = val === 'ar' ? 'rtl' : 'ltr';
                });
            },

            toggleLang() {
                this.language = this.language === 'ar' ? 'en' : 'ar';
            },

            updateFromJod() { this.amountUsd = (this.amountJod * 1.41).toFixed(2); },
            updateFromUsd() { this.amountJod = (this.amountUsd / 1.41).toFixed(2); },

            callEmergency(number) {
                this.showToast(this.language === 'ar' ? `📞 جاري الاتصال بـ ${number}...` : `📞 Dialing ${number}...`, 'bg-red-600 border-red-500 text-white');
            },

            showToast(message, colorClass = 'bg-[#1a0e11] border-[#B56576] text-white') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `${colorClass} px-8 py-5 rounded-[2rem] shadow-2xl font-black flex items-center gap-4 transform translate-y-10 opacity-0 transition-all duration-500 border pointer-events-auto`;
                toast.innerHTML = `<span class='text-2xl font-serif'>✦</span> <span class='text-lg'>${message}</span>`;
                container.appendChild(toast);

                requestAnimationFrame(() => {
                    toast.classList.remove('translate-y-10', 'opacity-0');
                });

                setTimeout(() => {
                    toast.classList.add('translate-y-10', 'opacity-0', 'scale-90');
                    setTimeout(() => toast.remove(), 500);
                }, 4000);
            }
        }
    }
</script>
@endsection
