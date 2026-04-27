@php
    $wishlistCities = \App\Models\City::with('attractions')->take(4)->get();
@endphp
@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-gray-900" x-data="{ 
    activeTab: 'overview', 
    sidebarOpen: false,
    
    // Tools logic
    amountJod: 1,
    amountUsd: 1.41,
    updateFromJod() { this.amountUsd = (this.amountJod * 1.41).toFixed(2); },
    updateFromUsd() { this.amountJod = (this.amountUsd / 1.41).toFixed(2); },
    
    callEmergency() {
        this.showToast('Calling 911 / 11777 Tourist Police...', 'جاري الاتصال بشرطة السياحة 11777...');
    },

    // Wiki Image Logic
    initWikiImages() {
        const images = document.querySelectorAll('.city-img');
        images.forEach(img => {
            const title = img.getAttribute('data-wiki');
            if (title) {
                fetch(`https://en.wikipedia.org/api/rest_v1/page/summary/${title}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.thumbnail && data.thumbnail.source) {
                            img.src = data.thumbnail.source;
                        } else if (data.originalimage && data.originalimage.source) {
                            img.src = data.originalimage.source;
                        }
                    })
                    .catch(err => console.error('Wiki image load error:', err));
            }
        });
    }
}" x-init="initWikiImages(); $watch('activeTab', value => { if(value === 'wishlist') setTimeout(() => initWikiImages(), 100); })">

    <aside class="w-72 bg-[#1a1513] border-r border-gray-800 flex-shrink-0 hidden md:flex flex-col z-20" :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">
        <div class="p-6 border-b border-gray-800 flex justify-between items-center">
             <a href="/" class="flex items-center gap-2 no-underline group">
                <svg viewBox="0 0 100 100" fill="none" class="w-8 h-8 transition-transform duration-500 group-hover:rotate-45">
                    <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" class="fill-dynamic"/>
                    <circle cx="50" cy="50" r="15" fill="#111827"/>
                    <circle cx="50" cy="50" r="5" class="fill-dynamic"/>
                </svg>
                <span class="text-xl font-bold text-white en-text">Wayn?</span>
                <span class="text-xl font-bold text-white ar-text">وين؟</span>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <button @click="activeTab = 'overview'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'overview' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="font-medium en-text">My Itinerary</span>
                <span class="font-medium ar-text">خطتي اليومية</span>
            </button>
            <button @click="activeTab = 'wishlist'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'wishlist' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                <span class="font-medium en-text">My Wishlist</span>
                <span class="font-medium ar-text">المفضلة</span>
            </button>
            <button @click="activeTab = 'tools'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'tools' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                <span class="font-medium en-text">Tourist Tools</span>
                <span class="font-medium ar-text">أدوات السياح</span>
            </button>
        </nav>
        
        <div class="p-4 border-t border-gray-800">
            <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-gray-800 transition-colors no-underline">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span class="font-medium">
                    <span class="en-text">Back to Explore</span>
                    <span class="ar-text">العودة للاستكشاف</span>
                </span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="h-20 bg-[#1a1513]/80 backdrop-blur-md border-b border-gray-800 flex items-center justify-between px-6 z-10 sticky top-0">
             <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
             </button>
             
             <div class="flex-1"></div>
             
             <div class="flex items-center gap-4 sm:gap-6">
                <!-- Language Toggle -->
                <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-600 bg-gray-800 hover:bg-gray-700 transition-colors text-sm font-bold text-gray-200 cursor-pointer">
                    <span class="en-text font-arabic">ع</span>
                    <span class="ar-text">EN</span>
                </button>

                <!-- Profile Dropdown -->
                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-transparent border-none p-0 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-dynamic border border-white/20 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ substr(Auth::user()->name ?? 'T', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'Explorer' }}</div>
                            <div class="text-xs text-dynamic capitalize leading-tight">Tourist</div>
                        </div>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-2 ltr:right-0 rtl:left-0 w-48 bg-gray-800 rounded-xl border border-gray-700 shadow-2xl py-2 z-50" x-transition.opacity style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full ltr:text-left rtl:text-right px-4 py-2 text-sm text-red-400 hover:bg-gray-700 transition-colors cursor-pointer bg-transparent border-none">
                                <span class="en-text">Sign Out</span>
                                <span class="ar-text">تسجيل خروج</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold font-serif text-white mb-2">
                    <span class="en-text">Your Jordanian Adventure</span>
                    <span class="ar-text">مغامرتك الأردنية</span>
                </h1>
                <p class="text-gray-400">
                    <span class="en-text">Follow your AI-generated itinerary and explore safely.</span>
                    <span class="ar-text">اتبع خطتك المخصصة واستكشف الأردن بأمان.</span>
                </p>
            </div>

            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="max-w-3xl">
                    <h3 class="text-xl font-bold text-white mb-8 border-b border-gray-800 pb-4">Today's Schedule / جدول اليوم</h3>
                    
                    <div class="relative ltr:pl-8 rtl:pr-8 ltr:border-l rtl:border-r border-dynamic/30 space-y-10">
                        <div class="relative">
                            <div class="absolute ltr:-left-10 rtl:-right-10 top-0 w-4 h-4 rounded-full bg-dynamic shadow-[0_0_10px_var(--dynamic-primary)] border-2 border-gray-900"></div>
                            <div class="text-dynamic text-sm font-bold mb-1">09:00 AM</div>
                            <div class="solid-panel p-5 border border-gray-800 hover:border-dynamic/50 transition-colors bg-[#1F2937]">
                                <h4 class="text-lg font-bold text-white mb-2">Amman Citadel</h4>
                                <p class="text-gray-400 text-sm">Start your morning exploring the historic ruins of Jabal Al Qal'a. Don't miss the Temple of Hercules and the Umayyad Palace.</p>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute ltr:-left-10 rtl:-right-10 top-0 w-4 h-4 rounded-full bg-gray-700 border-2 border-gray-900"></div>
                            <div class="text-gray-400 text-sm font-bold mb-1">12:30 PM</div>
                            <div class="solid-panel p-5 border border-gray-800 hover:border-dynamic/50 transition-colors bg-[#1F2937]">
                                <h4 class="text-lg font-bold text-white mb-2">Lunch at Hashem Restaurant</h4>
                                <p class="text-gray-400 text-sm">Head down to Downtown Amman (Al-Balad) for the most famous falafel and hummus in the city.</p>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute ltr:-left-10 rtl:-right-10 top-0 w-4 h-4 rounded-full bg-gray-700 border-2 border-gray-900"></div>
                            <div class="text-gray-400 text-sm font-bold mb-1">03:00 PM</div>
                            <div class="solid-panel p-5 border border-gray-800 hover:border-dynamic/50 transition-colors bg-[#1F2937]">
                                <h4 class="text-lg font-bold text-white mb-2">Roman Theater & Souq</h4>
                                <p class="text-gray-400 text-sm">Walk to the 6,000-seat Roman Theater, then explore the surrounding old markets for authentic souvenirs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'wishlist'" x-transition x-cloak>
                <h3 class="text-xl font-bold text-white mb-6">
                    <span class="en-text">Saved Destinations</span>
                    <span class="ar-text">الوجهات المحفوظة</span>
                </h3>
                
                <div class="cities-grid">
                    @foreach($wishlistCities as $city)
                    <div class="solid-panel rounded-2xl overflow-hidden group cursor-pointer border border-gray-800 hover:border-dynamic transition-colors relative bg-[#1F2937]">
                        <button class="absolute top-3 ltr:right-3 rtl:left-3 z-10 w-8 h-8 rounded-full bg-black/50 text-white hover:bg-red-600 transition-colors flex items-center justify-center border border-white/20 backdrop-blur-sm" @click.stop="$el.closest('.solid-panel').remove(); showToast('Removed from wishlist', 'تمت الإزالة من المفضلة')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                        
                        <div class="relative h-48 overflow-hidden">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                                 data-wiki="{{ $city->wiki_title }}" 
                                 class="city-img w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                 alt="{{ $city->name }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#111827] via-[#111827]/40 to-transparent"></div>
                            <div class="absolute bottom-4 ltr:left-4 rtl:right-4">
                                <h4 class="text-xl font-bold font-serif text-white shadow-sm">{{ $city->name }}</h4>
                                <div class="text-sm text-dynamic font-bold">{{ $city->attractions->count() }} Attractions</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'tools'" x-transition x-cloak>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    <div class="solid-panel p-8 border-t-4 border-dynamic bg-[#1F2937]">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-dynamic/20 flex items-center justify-center text-dynamic">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">
                                <span class="en-text">Currency Converter</span>
                                <span class="ar-text">محول العملات</span>
                            </h3>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-gray-900 border border-gray-700 rounded-xl p-4 flex items-center">
                                <div class="text-gray-400 font-bold ltr:mr-4 rtl:ml-4">JOD</div>
                                <input type="number" x-model="amountJod" @input="updateFromJod" class="w-full bg-transparent border-none text-white text-2xl font-bold ltr:text-right rtl:text-left focus:outline-none focus:ring-0">
                            </div>
                            
                            <div class="flex justify-center text-dynamic">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                            </div>

                            <div class="bg-gray-900 border border-gray-700 rounded-xl p-4 flex items-center">
                                <div class="text-gray-400 font-bold ltr:mr-4 rtl:ml-4">USD</div>
                                <input type="number" x-model="amountUsd" @input="updateFromUsd" class="w-full bg-transparent border-none text-white text-2xl font-bold ltr:text-right rtl:text-left focus:outline-none focus:ring-0">
                            </div>

                            <p class="text-sm text-gray-500 text-center">Fixed Peg Rate: 1 JOD = 1.41 USD</p>
                        </div>
                    </div>

                    <div class="solid-panel p-8 border-t-4 border-red-500 relative overflow-hidden bg-[#1F2937]">
                        <div class="absolute top-0 right-0 p-8 opacity-10">
                            <svg class="w-32 h-32 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </div>

                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold text-white mb-2">
                                <span class="en-text">Emergency Services</span>
                                <span class="ar-text">الطوارئ وفزعة</span>
                            </h3>
                            <p class="text-gray-400 mb-8">
                                <span class="en-text">Immediate assistance across Jordan.</span>
                                <span class="ar-text">مساعدة فورية في جميع أنحاء الأردن.</span>
                            </p>

                            <div class="space-y-4">
                                <button @click="callEmergency" class="w-full bg-red-600 hover:bg-red-700 text-white p-4 rounded-xl font-bold text-lg flex items-center justify-between transition-colors cursor-pointer border-none shadow-lg">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        <span class="en-text">Tourist Police (11777)</span>
                                        <span class="ar-text">الشرطة السياحية</span>
                                    </div>
                                    <span class="opacity-50">CALL</span>
                                </button>

                                <button @click="callEmergency" class="w-full bg-gray-900 border border-gray-700 hover:border-gray-500 text-white p-4 rounded-xl font-bold text-lg flex items-center justify-between transition-colors cursor-pointer shadow-lg">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        <span class="en-text">General Emergency (911)</span>
                                        <span class="ar-text">الطوارئ العامة</span>
                                    </div>
                                    <span class="opacity-50">CALL</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>
</div>
@endsection
