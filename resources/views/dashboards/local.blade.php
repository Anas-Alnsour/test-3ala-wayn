@php
    $cities = \App\Models\City::with('attractions')->get();
    
    // Simulated Hidden Gems for Local
    $myContributions = [
        (object)['name' => 'Wadi Bin Hammad Secret Trail', 'name_ar' => 'مسار وادي بن حماد', 'date' => 'Oct 24, 2023', 'status' => 'Pending', 'wiki_img' => 'Wadi_Mujib'], // using Wadi_Mujib as fallback for Wadi Hammad
        (object)['name' => 'Old Salt Viewpoint', 'name_ar' => 'مطل السلط القديم', 'date' => 'Sep 10, 2023', 'status' => 'Approved', 'wiki_img' => 'Al-Salt'],
    ];

    // Local exclusive deals (Simulated)
    $localDeals = [
        (object)[
            'name' => 'Wadi Rum Desert Camp',
            'name_ar' => 'مخيم وادي رم الصحراوي',
            'desc' => 'Valid for Jordanian ID holders only.',
            'desc_ar' => 'صالح لحاملي الهوية الأردنية فقط.',
            'original_price' => 80,
            'discount_price' => 40,
            'discount_percent' => '50%',
            'wiki_img' => 'Wadi_Rum'
        ],
        (object)[
            'name' => 'Dead Sea Resort Day Pass',
            'name_ar' => 'دخولية منتجع البحر الميت',
            'desc' => 'Includes lunch buffet and pool access.',
            'desc_ar' => 'يشمل بوفيه الغداء واستخدام المسابح.',
            'original_price' => 50,
            'discount_price' => 35,
            'discount_percent' => '30%',
            'wiki_img' => 'Dead_Sea'
        ]
    ];
@endphp
@extends('layouts.dashboard')

@section('sidebar_links')
    <a href="#" @click.prevent="activeTab = 'overview'" class="nav-link" :class="{ 'active': activeTab === 'overview' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        <span class="en-text">Overview</span>
        <span class="ar-text">نظرة عامة</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'submit_gem'" class="nav-link" :class="{ 'active': activeTab === 'submit_gem' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="en-text">Submit a Gem</span>
        <span class="ar-text">شارك مكان</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'contributions'" class="nav-link" :class="{ 'active': activeTab === 'contributions' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        <span class="en-text">My Contributions</span>
        <span class="ar-text">مساهماتي</span>
    </a>
@endsection

@section('content')
<div x-data="{ activeTab: 'overview' }">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold font-serif text-white mb-2">
            <span class="en-text">Welcome, Son of the Country</span>
            <span class="ar-text">يا هلا بابن البلد</span>
        </h1>
        <p class="text-gray-400">
            <span class="en-text">Share the real Jordan and unlock exclusive deals for locals.</span>
            <span class="ar-text">شارك الأردن الحقيقي واستمتع بعروض حصرية للأردنيين.</span>
        </p>
    </div>

    <!-- Overview Tab -->
    <div x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        <h3 class="text-xl font-bold text-dynamic mb-6 flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="en-text">Exclusive Local Deals</span>
            <span class="ar-text">عروض حصرية للأردنيين</span>
        </h3>
        
        <div class="cities-grid">
            @forelse($localDeals as $deal)
            <!-- Deal Card -->
            <div class="solid-panel overflow-hidden group cursor-pointer relative hover:border-dynamic transition-colors">
                <div class="absolute top-4 right-4 rtl:left-4 rtl:right-auto z-10 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                    {{ $deal->discount_percent }} OFF
                </div>
                <div class="h-48 bg-gray-800 relative overflow-hidden">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wiki="{{ $deal->wiki_img }}" class="city-img w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $deal->name }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F2937] to-transparent"></div>
                </div>
                <div class="p-5 relative z-10">
                    <h4 class="text-lg font-bold text-white mb-1">
                        <span class="en-text">{{ $deal->name }}</span>
                        <span class="ar-text">{{ $deal->name_ar }}</span>
                    </h4>
                    <p class="text-gray-400 text-sm mb-4">
                        <span class="en-text">{{ $deal->desc }}</span>
                        <span class="ar-text">{{ $deal->desc_ar }}</span>
                    </p>
                    <div class="flex justify-between items-center mt-4 border-t border-white/10 pt-4">
                        <div>
                            <span class="text-gray-500 line-through text-xs">{{ $deal->original_price }} JD</span>
                            <span class="text-dynamic font-bold text-lg ml-2 rtl:ml-0 rtl:mr-2">{{ $deal->discount_price }} JD</span>
                        </div>
                        <button class="px-4 py-2 bg-dynamic hover:opacity-90 text-white text-sm font-bold rounded-lg transition-colors">
                            <span class="en-text">Claim Deal</span>
                            <span class="ar-text">احصل على العرض</span>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-400 py-10">No local deals available right now.</div>
            @endforelse
        </div>
    </div>

    <!-- Submit Gem Tab -->
    <div x-show="activeTab === 'submit_gem'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="solid-panel p-6 lg:p-10 max-w-3xl mx-auto border-t-4 border-dynamic">
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-full text-dynamic flex items-center justify-center mx-auto mb-4 border border-dynamic" style="background-color: color-mix(in srgb, var(--dynamic-primary) 20%, transparent);">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">
                    <span class="en-text">Share a Hidden Gem</span>
                    <span class="ar-text">شارك مكان مخفي</span>
                </h2>
                <p class="text-gray-400">
                    <span class="en-text">Know a place tourists don't usually see? Share it with the world.</span>
                    <span class="ar-text">بتعرف مكان السياح ما بيشوفوه؟ شاركه مع العالم.</span>
                </p>
            </div>

            <form class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Place Name</span><span class="ar-text">اسم المكان</span>
                    </label>
                    <input type="text" class="glass-input-premium" placeholder="e.g. Ain Qunya Waterfall / شلال عين قينيا">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Region / Governorate</span><span class="ar-text">المحافظة</span>
                        </label>
                        <select class="glass-input-premium">
                            <option value="">Select...</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">GPS Coordinates</span><span class="ar-text">إحداثيات GPS</span>
                        </label>
                        <div class="flex">
                            <input type="text" class="glass-input-premium rounded-r-none rtl:rounded-r-lg rtl:rounded-l-none" placeholder="32.0123, 35.8456">
                            <button type="button" class="bg-gray-700 px-4 rounded-r-lg rtl:rounded-r-none rtl:rounded-l-lg border border-l-0 rtl:border-l rtl:border-r-0 border-white/10 text-gray-300 hover:text-white transition-colors flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Description & Authentic Context</span><span class="ar-text">الوصف والسياق الأصيل</span>
                    </label>
                    <textarea class="glass-input-premium h-32 resize-none" placeholder="What makes this place special? / شو اللي بيميز هالمكان؟"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Upload Images</span><span class="ar-text">رفع الصور</span>
                    </label>
                    <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center hover:border-dynamic transition-colors cursor-pointer bg-gray-800/50">
                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-gray-400 text-sm">
                            <span class="en-text">Click to upload or drag and drop</span><span class="ar-text">اضغط للرفع أو اسحب وأفلت</span>
                        </p>
                        <p class="text-gray-500 text-xs mt-1">PNG, JPG up to 10MB</p>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="button" class="w-full py-3 bg-dynamic hover:opacity-90 text-white font-bold rounded-lg transition-all shadow-lg">
                        <span class="en-text">Submit for Review</span>
                        <span class="ar-text">إرسال للمراجعة</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Contributions Tab -->
    <div x-show="activeTab === 'contributions'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="solid-panel overflow-hidden">
            <div class="px-6 py-4 border-b border-white/10">
                <h3 class="text-lg font-bold text-white">
                    <span class="en-text">Your Submitted Gems</span>
                    <span class="ar-text">الأماكن اللي شاركتها</span>
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th><span class="en-text">Place</span><span class="ar-text">المكان</span></th>
                            <th><span class="en-text">Date Submitted</span><span class="ar-text">تاريخ الإرسال</span></th>
                            <th><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($myContributions as $gem)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="font-medium text-white flex items-center gap-3">
                                <div class="w-10 h-10 rounded bg-gray-700 overflow-hidden shrink-0">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wiki="{{ $gem->wiki_img }}" class="city-img w-full h-full object-cover">
                                </div>
                                <div>
                                    <span class="en-text block">{{ $gem->name }}</span>
                                    <span class="ar-text block">{{ $gem->name_ar }}</span>
                                </div>
                            </td>
                            <td class="text-gray-400">{{ $gem->date }}</td>
                            <td>
                                @if($gem->status === 'Pending')
                                <span class="px-2 py-1 rounded-full bg-amber-500/20 text-amber-500 text-xs font-bold uppercase tracking-wider">Pending</span>
                                @else
                                <span class="px-2 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider">Approved</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center text-gray-500 py-6">No contributions yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
