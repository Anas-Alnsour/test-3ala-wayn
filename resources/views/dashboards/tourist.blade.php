@php
    $cities = \App\Models\City::with('attractions')->get();
    // In a real scenario, this would be auth()->user()->savedLocations()->get()
    // but we use cities as requested
    $savedLocations = $cities->take(4); 
    
    $itinerarySteps = [
        (object)[
            'id' => 1, 
            'name' => 'Amman Citadel', 
            'name_ar' => 'جبل القلعة', 
            'time' => '09:00 AM', 
            'desc' => 'Start your day exploring ancient ruins with panoramic views of the city.', 
            'desc_ar' => 'ابدأ يومك باستكشاف الآثار القديمة مع إطلالة بانورامية على المدينة.', 
            'tags' => ['History', 'Photography'], 
            'type' => 'sightseeing'
        ],
        (object)[
            'id' => 2, 
            'name' => 'Hashem Restaurant', 
            'name_ar' => 'مطعم هاشم', 
            'time' => '01:00 PM', 
            'desc' => 'Authentic falafel and hummus experience in Downtown Amman.', 
            'desc_ar' => 'تجربة فلافل وحمص أصيلة في وسط البلد.', 
            'tags' => ['Food', 'Local Vibe'], 
            'type' => 'food'
        ],
        (object)[
            'id' => 3, 
            'name' => 'Roman Theater', 
            'name_ar' => 'المدرج الروماني', 
            'time' => '03:30 PM', 
            'desc' => 'A 2nd-century Roman theater that seats 6,000 people.', 
            'desc_ar' => 'مدرج روماني من القرن الثاني يتسع لـ 6000 شخص.', 
            'tags' => [], 
            'type' => 'sightseeing'
        ],
    ];
@endphp
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
            <h3 class="text-xl font-bold text-dynamic mb-6 flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                <span class="en-text">Today's Itinerary</span>
                <span class="ar-text">مسار رحلتي اليوم</span>
            </h3>

            <div class="solid-panel p-6 lg:p-8 relative">
                <!-- Vertical Timeline Line -->
                <div class="absolute left-10 lg:left-12 top-10 bottom-10 w-0.5 bg-gray-700 rtl:left-auto rtl:right-10 lg:rtl:right-12"></div>

                <div class="space-y-8 relative z-10">
                    @foreach($itinerarySteps as $index => $step)
                    <!-- Timeline Item -->
                    <div class="flex gap-4 lg:gap-6">
                        <div class="w-8 h-8 rounded-full {{ $index === 0 ? 'bg-dynamic border-4 border-[#1F2937]' : 'bg-gray-700 border-4 border-[#1F2937]' }} flex-shrink-0 flex items-center justify-center {{ $index === 0 ? 'text-white' : 'text-gray-400' }} font-bold text-xs z-10 {{ $index === 0 ? 'shadow-lg' : '' }}" @if($index === 0) style="box-shadow: 0 0 10px var(--dynamic-primary);" @endif>
                            {{ $step->id }}
                        </div>
                        <div class="glass-panel p-4 rounded-xl flex-1 hover:border-dynamic transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-white text-lg">
                                    <span class="en-text">{{ $step->name }}</span>
                                    <span class="ar-text">{{ $step->name_ar }}</span>
                                </h4>
                                <span class="text-dynamic text-sm font-medium">{{ $step->time }}</span>
                            </div>
                            <p class="text-gray-400 text-sm mb-3">
                                <span class="en-text">{{ $step->desc }}</span>
                                <span class="ar-text">{{ $step->desc_ar }}</span>
                            </p>
                            @if(!empty($step->tags))
                            <div class="flex gap-2">
                                @foreach($step->tags as $tag)
                                <span class="px-2 py-1 bg-white/5 text-gray-300 text-xs rounded border border-white/10">{{ $tag }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Wishlist Tab -->
    <div x-show="activeTab === 'wishlist'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="cities-grid">
            @forelse($savedLocations as $location)
            <!-- Saved Location -->
            <div class="solid-panel overflow-hidden group relative h-64 hover:border-dynamic transition-colors">
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wiki="{{ $location->wiki_name ?? $location->name }}" class="city-img absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $location->name }}">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute top-4 right-4 rtl:left-4 rtl:right-auto z-10">
                    <button class="w-8 h-8 rounded-full bg-black/50 backdrop-blur text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-5 z-10">
                    <h4 class="text-xl font-bold text-white mb-1">
                        <span class="en-text">{{ $location->name }}</span>
                        <span class="ar-text">{{ $location->name_ar ?? $location->name }}</span>
                    </h4>
                    <p class="text-gray-300 text-sm mb-3">
                        <span class="en-text">{{ Str::limit($location->description ?? 'Beautiful destination in Jordan.', 50) }}</span>
                        <span class="ar-text">{{ Str::limit($location->description_ar ?? 'وجهة جميلة في الأردن.', 50) }}</span>
                    </p>
                    <button class="text-dynamic text-sm font-bold hover:opacity-80">
                        <span class="en-text">Add to Planner &rarr;</span>
                        <span class="ar-text">&larr; أضف للجدول</span>
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-10">No saved locations found.</div>
            @endforelse
        </div>
    </div>

    <!-- Tools Tab -->
    <div x-show="activeTab === 'tools'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Currency Converter -->
            <div class="solid-panel p-6 border-t-4 border-dynamic">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-dynamic" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="en-text">Currency Converter</span>
                    <span class="ar-text">محول العملات</span>
                </h3>
                <div class="space-y-4" x-data="{ usd: 100, get jod() { return (this.usd * 0.709).toFixed(2); } }">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">From (USD/EUR)</label>
                        <input type="number" x-model="usd" class="glass-input-premium text-lg" min="0">
                    </div>
                    <div class="flex justify-center text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">To JOD (Jordanian Dinar)</label>
                        <input type="text" :value="jod" class="glass-input-premium text-lg text-dynamic font-bold" readonly>
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
