@extends('layouts.dashboard')

@section('sidebar_links')
    <a href="#" @click.prevent="activeTab = 'overview'" class="nav-link" :class="{ 'active': activeTab === 'overview' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
        <span class="en-text">Active Itinerary</span>
        <span class="ar-text">مسار رحلتي</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'wishlist'" class="nav-link" :class="{ 'active': activeTab === 'wishlist' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
        <span class="en-text">Saved Locations</span>
        <span class="ar-text">الأماكن المحفوظة</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'tools'" class="nav-link" :class="{ 'active': activeTab === 'tools' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="en-text">Tools & Safety</span>
        <span class="ar-text">أدوات وطوارئ</span>
    </a>
@endsection

@section('content')
<div x-data="{ activeTab: 'overview' }">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold font-serif text-white mb-2">
            <span class="en-text">Welcome to Jordan</span>
            <span class="ar-text">يا هلا بضيوف الأردن</span>
        </h1>
        <p class="text-gray-400">
            <span class="en-text">Manage your journey, view saved spots, and access essential tools.</span>
            <span class="ar-text">أدر رحلتك، استعرض الأماكن المحفوظة، وادخل على الأدوات المهمة.</span>
        </p>
    </div>

    <!-- Overview Tab (Active Itinerary) -->
    <div x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        <div class="max-w-4xl">
            <h3 class="text-xl font-bold text-amber-500 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                <span class="en-text">Today's Itinerary</span>
                <span class="ar-text">مسار رحلتي اليوم</span>
            </h3>

            <div class="solid-panel p-6 lg:p-8 relative">
                <!-- Vertical Timeline Line -->
                <div class="absolute left-10 lg:left-12 top-10 bottom-10 w-0.5 bg-gray-700 rtl:left-auto rtl:right-10 lg:rtl:right-12"></div>

                <div class="space-y-8 relative z-10">
                    <!-- Timeline Item -->
                    <div class="flex gap-4 lg:gap-6">
                        <div class="w-8 h-8 rounded-full bg-amber-500 border-4 border-[#1F2937] flex-shrink-0 flex items-center justify-center text-white font-bold text-xs shadow-[0_0_10px_rgba(245,158,11,0.5)] z-10">1</div>
                        <div class="glass-panel p-4 rounded-xl flex-1 hover:border-amber-500/50 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-white text-lg">Amman Citadel</h4>
                                <span class="text-amber-500 text-sm font-medium">09:00 AM</span>
                            </div>
                            <p class="text-gray-400 text-sm mb-3">
                                <span class="en-text">Start your day exploring ancient ruins with panoramic views of the city.</span>
                                <span class="ar-text">ابدأ يومك باستكشاف الآثار القديمة مع إطلالة بانورامية على المدينة.</span>
                            </p>
                            <div class="flex gap-2">
                                <span class="px-2 py-1 bg-blue-500/10 text-blue-400 text-xs rounded border border-blue-500/20">History</span>
                                <span class="px-2 py-1 bg-emerald-500/10 text-emerald-400 text-xs rounded border border-emerald-500/20">Photography</span>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Item -->
                    <div class="flex gap-4 lg:gap-6">
                        <div class="w-8 h-8 rounded-full bg-gray-700 border-4 border-[#1F2937] flex-shrink-0 flex items-center justify-center text-gray-400 font-bold text-xs z-10">2</div>
                        <div class="glass-panel p-4 rounded-xl flex-1 hover:border-amber-500/50 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-white text-lg">Hashem Restaurant</h4>
                                <span class="text-amber-500 text-sm font-medium">01:00 PM</span>
                            </div>
                            <p class="text-gray-400 text-sm mb-3">
                                <span class="en-text">Authentic falafel and hummus experience in Downtown Amman.</span>
                                <span class="ar-text">تجربة فلافل وحمص أصيلة في وسط البلد.</span>
                            </p>
                            <div class="flex gap-2">
                                <span class="px-2 py-1 bg-amber-500/10 text-amber-400 text-xs rounded border border-amber-500/20">Food</span>
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded border border-purple-500/20">Local Vibe</span>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Item -->
                    <div class="flex gap-4 lg:gap-6">
                        <div class="w-8 h-8 rounded-full bg-gray-700 border-4 border-[#1F2937] flex-shrink-0 flex items-center justify-center text-gray-400 font-bold text-xs z-10">3</div>
                        <div class="glass-panel p-4 rounded-xl flex-1 hover:border-amber-500/50 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-white text-lg">Roman Theater</h4>
                                <span class="text-amber-500 text-sm font-medium">03:30 PM</span>
                            </div>
                            <p class="text-gray-400 text-sm mb-3">
                                <span class="en-text">A 2nd-century Roman theater that seats 6,000 people.</span>
                                <span class="ar-text">مدرج روماني من القرن الثاني يتسع لـ 6000 شخص.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wishlist Tab -->
    <div x-show="activeTab === 'wishlist'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="cities-grid">
            <!-- Saved Location -->
            <div class="solid-panel overflow-hidden group relative h-64">
                <img src="https://images.unsplash.com/photo-1579606032850-25275cb70d62?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Petra">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute top-4 right-4 rtl:left-4 rtl:right-auto z-10">
                    <button class="w-8 h-8 rounded-full bg-black/50 backdrop-blur text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-5 z-10">
                    <h4 class="text-xl font-bold text-white mb-1">Petra Treasury</h4>
                    <p class="text-gray-300 text-sm mb-3">
                        <span class="en-text">One of the New7Wonders of the World.</span>
                        <span class="ar-text">إحدى عجائب الدنيا السبع الجديدة.</span>
                    </p>
                    <button class="text-amber-500 text-sm font-bold hover:text-amber-400">
                        <span class="en-text">Add to Planner &rarr;</span>
                        <span class="ar-text">&larr; أضف للجدول</span>
                    </button>
                </div>
            </div>

            <!-- Saved Location -->
            <div class="solid-panel overflow-hidden group relative h-64">
                <img src="https://images.unsplash.com/photo-1542401886-65d6c61db217?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Wadi Rum">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute top-4 right-4 rtl:left-4 rtl:right-auto z-10">
                    <button class="w-8 h-8 rounded-full bg-black/50 backdrop-blur text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-5 z-10">
                    <h4 class="text-xl font-bold text-white mb-1">Wadi Rum</h4>
                    <p class="text-gray-300 text-sm mb-3">
                        <span class="en-text">The Valley of the Moon.</span>
                        <span class="ar-text">وادي القمر.</span>
                    </p>
                    <button class="text-amber-500 text-sm font-bold hover:text-amber-400">
                        <span class="en-text">Add to Planner &rarr;</span>
                        <span class="ar-text">&larr; أضف للجدول</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tools Tab -->
    <div x-show="activeTab === 'tools'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Currency Converter -->
            <div class="solid-panel p-6 border-t-4 border-t-amber-500">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="en-text">Currency Converter</span>
                    <span class="ar-text">محول العملات</span>
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">From (USD/EUR)</label>
                        <input type="number" class="glass-input-premium text-lg" value="100">
                    </div>
                    <div class="flex justify-center text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">To JOD (Jordanian Dinar)</label>
                        <input type="number" class="glass-input-premium text-lg text-amber-500 font-bold" value="70.9" readonly>
                    </div>
                    <p class="text-xs text-gray-500 text-center mt-2">1 USD ≈ 0.709 JOD</p>
                </div>
            </div>

            <!-- Emergency & Safety -->
            <div class="solid-panel p-6 border-t-4 border-t-red-600 bg-red-900/10">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <span class="en-text">Emergency & Safety</span>
                    <span class="ar-text">فزعة وطوارئ</span>
                </h3>
                
                <div class="space-y-4 mt-6">
                    <div class="bg-red-900/20 border border-red-500/20 p-4 rounded-xl flex items-center justify-between group hover:bg-red-900/30 transition-colors">
                        <div>
                            <div class="text-white font-bold text-lg mb-1">
                                <span class="en-text">General Emergency</span>
                                <span class="ar-text">الطوارئ العامة</span>
                            </div>
                            <div class="text-red-400 text-sm">Police, Fire, Ambulance</div>
                        </div>
                        <a href="tel:911" class="w-12 h-12 rounded-full bg-red-600 flex items-center justify-center text-white font-bold text-xl shadow-[0_0_15px_rgba(220,38,38,0.5)] group-hover:scale-110 transition-transform">
                            911
                        </a>
                    </div>

                    <div class="bg-amber-900/20 border border-amber-500/20 p-4 rounded-xl flex items-center justify-between group hover:bg-amber-900/30 transition-colors">
                        <div>
                            <div class="text-white font-bold text-lg mb-1">
                                <span class="en-text">Tourist Police</span>
                                <span class="ar-text">الشرطة السياحية</span>
                            </div>
                            <div class="text-amber-400 text-sm">Dedicated help for tourists</div>
                        </div>
                        <a href="tel:11777" class="w-14 h-14 rounded-full bg-amber-600 flex items-center justify-center text-white font-bold text-lg shadow-[0_0_15px_rgba(217,119,6,0.5)] group-hover:scale-110 transition-transform tracking-wider">
                            11777
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
