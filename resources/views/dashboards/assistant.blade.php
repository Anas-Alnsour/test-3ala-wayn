@php
    // --- بيانات وهمية مجهزة باحترافية لتشغيل اللوحة 100% ---
    $user = Auth::user();

    // 1. الإحصائيات السريعة للدليل
    $stats = (object)[
        'total_tours' => 42,
        'rating' => 4.9,
        'earnings' => 1250,
        'monthly_goal' => 2000,
        'upcoming_count' => 5
    ];

    // 2. الجولات القادمة مع تفاصيل إضافية للمهام
    $upcomingTours = [
        (object)[
            'id' => 1,
            'tourist_name' => 'Michael Smith',
            'tourist_country' => '🇺🇸 USA',
            'route_name' => 'Wadi Mujib Siq Trail',
            'route_name_ar' => 'مسار السيق في وادي الموجب',
            'date' => now()->addDays(2)->format('M d, Y'),
            'day_num' => now()->addDays(2)->format('d'),
            'month_short' => now()->addDays(2)->format('M'),
            'time' => '08:00 AM - 12:00 PM',
            'group_size' => 4,
            'status' => 'confirmed',
            'price' => '60 JOD'
        ],
        (object)[
            'id' => 2,
            'tourist_name' => 'Elena Rossi',
            'tourist_country' => '🇮🇹 Italy',
            'route_name' => 'Dana Biosphere Reserve Hike',
            'route_name_ar' => 'مسار محمية ضانا',
            'date' => now()->addDays(4)->format('M d, Y'),
            'day_num' => now()->addDays(4)->format('d'),
            'month_short' => now()->addDays(4)->format('M'),
            'time' => '06:00 AM - 02:00 PM',
            'group_size' => 2,
            'status' => 'pending',
            'price' => '45 JOD'
        ],
    ];

    // 3. التقييمات
    $reviews = [
        (object)['id'=>1, 'tourist' => 'John D.', 'rating' => 5, 'comment' => 'Amazing experience! Best guide in Jordan.', 'date' => '2 days ago'],
        (object)['id'=>2, 'tourist' => 'Sarah M.', 'rating' => 4, 'comment' => 'Very knowledgeable and friendly. Highly recommended.', 'date' => '1 week ago'],
        (object)['id'=>3, 'tourist' => 'Ali K.', 'rating' => 5, 'comment' => 'رحلة لا تنسى، الكابتن محترف جداً ويعرف كل الأماكن المخفية.', 'date' => '2 weeks ago'],
    ];

    // 4. سجل الدفعات (لشاشة الأرباح)
    $payouts = [
        (object)['id'=>'TRX-9821', 'amount' => '150 JOD', 'date' => 'Oct 12, 2025', 'status' => 'Paid'],
        (object)['id'=>'TRX-9822', 'amount' => '85 JOD', 'date' => 'Oct 05, 2025', 'status' => 'Paid'],
        (object)['id'=>'TRX-9823', 'amount' => '210 JOD', 'date' => 'Pending', 'status' => 'Processing'],
    ];
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="theme-assistant flex h-screen w-full bg-[#0d0a09] text-[#f5f0e6] font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #E76F51; --dynamic-glow: rgba(231, 111, 81, 0.4);"
     x-data="assistantAdvancedDashboard()"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#16110f] border-r border-[#2d221e] flex-shrink-0 hidden md:flex flex-col z-40 transition-all duration-300 shadow-[4px_0_30px_var(--dynamic-glow)]"
           :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">

        <div class="p-6 border-b border-[#2d221e] flex justify-between items-center bg-gradient-to-b from-[#E76F51]/10 to-transparent">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <div class="p-2 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-xl shadow-[0_0_20px_var(--dynamic-glow)] transform group-hover:rotate-12 transition-transform duration-300">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <span class="block text-2xl font-black font-serif text-transparent bg-clip-text bg-gradient-to-r from-[#E76F51] to-[#F4A261] tracking-wider">Wayn Guide</span>
                    <span class="block text-xs text-[#F4A261] font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'الكابتن' : 'Captain'"></span>
                </div>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-[#E76F51] transition-colors bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-5 space-y-3 overflow-y-auto">
            <p class="text-xs font-bold text-[#E76F51]/70 uppercase tracking-widest mb-4 px-2" x-text="language === 'ar' ? 'لوحة القيادة' : 'Main Menu'"></p>

            <button @click="activeTab = 'tours'"
                    class="w-full flex items-center justify-between p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'tours' ? 'bg-gradient-to-r from-[#E76F51]/20 to-transparent border-[#E76F51]/50 text-[#E76F51] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1f1815] hover:text-white bg-transparent'">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    <span x-text="language === 'ar' ? 'جولاتي الجاية' : 'Upcoming Tours'"></span>
                </div>
                <span class="bg-[#E76F51] text-black text-xs font-black px-2 py-0.5 rounded-full">{{ count($upcomingTours) }}</span>
            </button>

            <button @click="activeTab = 'availability'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'availability' ? 'bg-gradient-to-r from-[#E76F51]/20 to-transparent border-[#E76F51]/50 text-[#E76F51] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1f1815] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span x-text="language === 'ar' ? 'أوقات الفراغ' : 'Availability'"></span>
            </button>

            <button @click="activeTab = 'financials'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'financials' ? 'bg-gradient-to-r from-[#E76F51]/20 to-transparent border-[#E76F51]/50 text-[#E76F51] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1f1815] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span x-text="language === 'ar' ? 'المحفظة والأرباح' : 'Financials'"></span>
            </button>

            <button @click="activeTab = 'reviews'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'reviews' ? 'bg-gradient-to-r from-[#E76F51]/20 to-transparent border-[#E76F51]/50 text-[#E76F51] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1f1815] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                <span x-text="language === 'ar' ? 'تقييمات السياح' : 'My Reviews'"></span>
            </button>
        </nav>

        <div class="p-6 border-t border-[#2d221e] bg-gradient-to-t from-[#0d0a09] to-transparent">
            <a href="/" class="flex items-center justify-center gap-3 w-full py-4 rounded-xl border border-[#2d221e] text-gray-400 hover:text-black hover:bg-gradient-to-r hover:from-[#E76F51] hover:to-[#F4A261] transition-all font-black no-underline shadow-sm hover:shadow-[0_0_15px_var(--dynamic-glow)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span x-text="language === 'ar' ? 'العودة للموقع' : 'Back to Site'"></span>
            </a>
        </div>
    </aside>

    <div x-show="sidebarOpen" class="fixed inset-0 bg-black/90 z-30 md:hidden backdrop-blur-sm" x-transition.opacity @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-24 bg-[#120e0c]/90 backdrop-blur-xl border-b border-[#2d221e] flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-400 hover:text-[#E76F51] rounded-lg transition-colors border-none bg-transparent cursor-pointer">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'يا هلا بالكابتن، ' : 'Welcome, Captain '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#E76F51] to-[#F4A261]">{{ Auth::user()->name ?? 'Guide' }}</span> 🧭
                 </h2>
             </div>

             <div class="flex items-center gap-4 sm:gap-6">
                <div class="hidden md:flex items-center gap-3 bg-[#1f1815] px-4 py-2 rounded-full border border-[#2d221e]">
                    <span class="text-sm font-bold" :class="isOnline ? 'text-green-400' : 'text-gray-500'" x-text="language === 'ar' ? 'متاح للعمل' : 'Available'"></span>
                    <button @click="toggleStatus()" class="w-12 h-6 rounded-full p-1 cursor-pointer transition-colors duration-300 relative border-none" :class="isOnline ? 'bg-green-500' : 'bg-gray-600'">
                        <div class="w-4 h-4 bg-white rounded-full shadow-md transform transition-transform duration-300" :class="isOnline ? 'translate-x-6 rtl:-translate-x-6' : 'translate-x-0'"></div>
                    </button>
                </div>

                <button @click="toggleLang()" class="flex items-center justify-center w-12 h-12 rounded-2xl border border-[#2d221e] bg-[#1a1311] hover:border-[#E76F51] hover:shadow-[0_0_15px_var(--dynamic-glow)] transition-all text-sm font-bold text-gray-200 cursor-pointer">
                    <span x-show="language === 'en'" class="font-arabic text-lg">ع</span>
                    <span x-show="language === 'ar'" class="text-lg">EN</span>
                </button>

                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none p-1.5 pr-4 bg-[#1a1311] border border-[#2d221e] rounded-2xl hover:border-[#E76F51] transition-all cursor-pointer group shadow-lg">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#E76F51] to-[#F4A261] flex items-center justify-center text-black font-black shadow-inner group-hover:scale-105 transition-transform text-lg">
                            {{ substr(Auth::user()->name ?? 'G', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white">{{ Auth::user()->name ?? 'Local Guide' }}</div>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-[#E76F51]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-3 ltr:right-0 rtl:left-0 w-56 bg-[#16110f] rounded-2xl border border-[#2d221e] shadow-[0_15px_50px_rgba(0,0,0,0.9)] py-3 z-50 overflow-hidden" x-transition style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 text-red-500 hover:bg-red-500/10 hover:text-red-400 transition-colors font-bold text-sm bg-transparent border-none cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span x-text="language === 'ar' ? 'تسجيل الخروج' : 'Sign Out'"></span>
                            </button>
                        </form>
                    </div>
                </div>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative scroll-smooth bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJ চুক্তnYmEoMjMxLDExMSw4MSwwLjAzKSIvPjwvc3ZnPg==')]">

            <div x-show="activeTab === 'tours'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h1 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'جولاتي الجاية 🚙' : 'Upcoming Tours 🚙'"></h1>
                        <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'جهز حالك، عندك مغامرات تنتظرك.' : 'Gear up, adventures await.'"></p>
                    </div>
                    <div class="bg-[#16110f] border border-[#2d221e] p-3 rounded-2xl flex items-center gap-4">
                        <div class="text-center px-4 border-r rtl:border-l rtl:border-r-0 border-[#2d221e]">
                            <span class="block text-3xl font-black text-[#E76F51]">{{ $stats->upcoming_count }}</span>
                            <span class="text-xs text-gray-500 font-bold uppercase" x-text="language === 'ar' ? 'جولة قادمة' : 'Upcoming'"></span>
                        </div>
                        <div class="text-center px-4">
                            <span class="block text-3xl font-black text-[#F4A261]">{{ $stats->rating }}</span>
                            <span class="text-xs text-gray-500 font-bold uppercase" x-text="language === 'ar' ? 'التقييم' : 'Rating'"></span>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    @foreach($upcomingTours as $tour)
                    <div id="tour-{{ $tour->id }}" class="bg-[#16110f] rounded-3xl p-6 md:p-8 border border-[#2d221e] hover:border-[#E76F51]/50 shadow-lg flex flex-col xl:flex-row gap-8 transition-all hover:shadow-[0_10px_30px_var(--dynamic-glow)]">

                        <div class="flex-1 flex flex-col md:flex-row gap-6">
                            <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-[#2a201d] to-[#120e0c] border border-[#3a2c27] flex flex-col items-center justify-center flex-shrink-0 shadow-inner">
                                <span class="text-sm text-[#E76F51] font-black uppercase tracking-widest">{{ $tour->month_short }}</span>
                                <span class="text-3xl text-white font-black leading-none mt-1">{{ $tour->day_num }}</span>
                            </div>

                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <h4 class="text-2xl font-bold text-white">
                                        <span x-text="language === 'ar' ? '{{ $tour->route_name_ar }}' : '{{ $tour->route_name }}'"></span>
                                    </h4>
                                    @if($tour->status === 'confirmed')
                                        <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-black uppercase tracking-widest rounded-lg border border-green-500/30">Confirmed</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 text-xs font-black uppercase tracking-widest rounded-lg border border-yellow-500/30">Pending</span>
                                    @endif
                                </div>

                                <div class="flex flex-wrap gap-6 text-sm text-gray-400 mb-4 font-medium bg-[#0d0a09] p-3 rounded-xl border border-[#2d221e] inline-flex">
                                    <span class="flex items-center gap-2"><svg class="w-5 h-5 text-[#E76F51]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ $tour->time }}</span>
                                    <span class="flex items-center gap-2"><svg class="w-5 h-5 text-[#E76F51]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> <span x-text="language === 'ar' ? 'سياح: {{ $tour->group_size }}' : 'Group: {{ $tour->group_size }}'"></span></span>
                                    <span class="flex items-center gap-2 font-bold text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ $tour->price }}</span>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-900 rounded-full flex items-center justify-center text-sm font-bold text-white border border-gray-600">{{ substr($tour->tourist_name, 0, 1) }}</div>
                                    <div>
                                        <p class="text-white text-base font-bold">{{ $tour->tourist_name }}</p>
                                        <p class="text-gray-500 text-sm">{{ $tour->tourist_country }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="xl:w-64 bg-[#0d0a09] p-4 rounded-2xl border border-[#2d221e]" x-data="{ task1: false, task2: false }">
                            <p class="text-sm font-bold text-gray-400 mb-3 uppercase tracking-widest" x-text="language === 'ar' ? 'تجهيزات الجولة' : 'Tour Checklist'"></p>
                            <label class="flex items-center gap-3 mb-3 cursor-pointer group">
                                <input type="checkbox" x-model="task1" class="w-5 h-5 accent-[#E76F51] bg-[#1a1311] border-[#3a2c27] rounded focus:ring-[#E76F51]">
                                <span class="text-sm font-medium transition-colors" :class="task1 ? 'text-gray-500 line-through' : 'text-gray-200 group-hover:text-white'" x-text="language === 'ar' ? 'تأكيد المواصلات' : 'Confirm Transport'"></span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" x-model="task2" class="w-5 h-5 accent-[#E76F51] bg-[#1a1311] border-[#3a2c27] rounded focus:ring-[#E76F51]">
                                <span class="text-sm font-medium transition-colors" :class="task2 ? 'text-gray-500 line-through' : 'text-gray-200 group-hover:text-white'" x-text="language === 'ar' ? 'تجهيز معدات الهايكنج' : 'Prepare Hiking Gear'"></span>
                            </label>
                        </div>

                        <div class="flex flex-col gap-3 xl:w-48 justify-center">
                            <button @click="startTour({{ $tour->id }}, '{{ addslashes($tour->route_name) }}')" class="w-full bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-black py-3.5 px-4 rounded-xl font-black text-lg transition-all shadow-[0_0_15px_var(--dynamic-glow)] hover:shadow-[0_0_25px_var(--dynamic-glow)] hover:-translate-y-1 flex items-center justify-center gap-2 border-none cursor-pointer">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span x-text="language === 'ar' ? 'ابدأ الرحلة' : 'Start Tour'"></span>
                            </button>
                            <button @click="contactTourist('{{ addslashes($tour->tourist_name) }}')" class="w-full bg-[#1a1311] hover:bg-[#2a201d] text-gray-300 border border-[#3a2c27] hover:border-[#E76F51] hover:text-[#E76F51] py-3.5 px-4 rounded-xl font-bold transition-all flex items-center justify-center gap-2 cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                <span x-text="language === 'ar' ? 'تواصل مع السائح' : 'Message Tourist'"></span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'availability'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'إدارة المواعيد 📅' : 'Manage Availability 📅'"></h2>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'حدد الأيام اللي بتقدر تطلع فيها جولات.' : 'Select the days you are free to guide.'"></p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <div class="lg:col-span-4">
                        <form @submit.prevent="saveAvailability" class="bg-[#16110f] rounded-3xl p-8 border border-[#2d221e] shadow-xl relative overflow-hidden sticky top-32">
                            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#E76F51] to-[#F4A261]"></div>
                            <h3 class="text-2xl font-bold text-white mb-6" x-text="language === 'ar' ? 'موعد جديد' : 'New Slot'"></h3>

                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-400 mb-2" x-text="language === 'ar' ? 'تاريخ اليوم' : 'Select Date'"></label>
                                    <input type="date" x-model="slotForm.date" required class="w-full bg-[#0d0a09] border border-[#2d221e] rounded-xl py-4 px-5 text-white font-bold focus:outline-none focus:border-[#E76F51] focus:shadow-[0_0_10px_var(--dynamic-glow)] transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-400 mb-2" x-text="language === 'ar' ? 'فترة الجولة' : 'Shift'"></label>
                                    <select x-model="slotForm.shift" required class="w-full bg-[#0d0a09] border border-[#2d221e] rounded-xl py-4 px-5 text-white font-bold focus:outline-none focus:border-[#E76F51] transition-all appearance-none cursor-pointer">
                                        <option value="Morning" x-text="language === 'ar' ? 'صباحي (8:00 - 13:00)' : 'Morning (8am - 1pm)'"></option>
                                        <option value="Afternoon" x-text="language === 'ar' ? 'مسائي (14:00 - 19:00)' : 'Afternoon (2pm - 7pm)'"></option>
                                        <option value="Full Day" x-text="language === 'ar' ? 'يوم كامل' : 'Full Day'"></option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-400 mb-2" x-text="language === 'ar' ? 'أقصى عدد تستقبله' : 'Max Tourists'"></label>
                                    <input type="number" x-model="slotForm.capacity" min="1" max="20" required class="w-full bg-[#0d0a09] border border-[#2d221e] rounded-xl py-4 px-5 text-white font-bold focus:outline-none focus:border-[#E76F51] transition-all">
                                </div>
                                <button type="submit" class="w-full bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-black py-4 rounded-xl font-black text-lg transition-all hover:shadow-[0_0_20px_var(--dynamic-glow)] hover:-translate-y-1 mt-4 border-none cursor-pointer">
                                    <span x-text="language === 'ar' ? 'فتح الموعد للحجز' : 'Open for Booking'"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="lg:col-span-8">
                        <div class="bg-[#16110f] rounded-3xl border border-[#2d221e] overflow-hidden shadow-lg h-full">
                            <div class="p-8 border-b border-[#2d221e] bg-[#1a1311] flex justify-between items-center">
                                <h3 class="text-2xl font-bold text-white" x-text="language === 'ar' ? 'أيامك المتاحة' : 'Your Open Days'"></h3>
                                <span class="bg-[#E76F51]/20 text-[#E76F51] px-3 py-1 rounded-lg text-sm font-bold border border-[#E76F51]/30" x-text="openSlots.length + (language==='ar'?' أيام':' Days')"></span>
                            </div>

                            <div class="p-8">
                                <template x-if="openSlots.length === 0">
                                    <div class="text-center py-16 text-gray-500">
                                        <svg class="w-20 h-20 mx-auto mb-6 text-[#2d221e]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p class="text-xl" x-text="language === 'ar' ? 'جدولك فاضي، ضيف أيام جديدة!' : 'Your schedule is empty. Add new days!'"></p>
                                    </div>
                                </template>

                                <div class="space-y-4">
                                    <template x-for="(slot, index) in openSlots" :key="index">
                                        <div class="flex items-center justify-between bg-[#0d0a09] p-5 rounded-2xl border border-[#2d221e] hover:border-[#E76F51] transition-colors group">
                                            <div class="flex items-center gap-6">
                                                <div class="p-4 bg-[#1a1311] text-[#E76F51] rounded-xl border border-[#2d221e] group-hover:bg-[#E76F51] group-hover:text-black transition-colors">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                </div>
                                                <div>
                                                    <p class="text-white font-black text-lg mb-1" x-text="slot.date"></p>
                                                    <div class="flex gap-3 text-sm font-bold text-gray-400">
                                                        <span class="bg-[#16110f] px-2 py-1 rounded border border-[#2d221e]" x-text="slot.shift"></span>
                                                        <span class="bg-[#16110f] px-2 py-1 rounded border border-[#2d221e]" x-text="language === 'ar' ? 'سعة: '+slot.capacity : 'Max: '+slot.capacity"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button @click="deleteSlot(index)" class="p-3 text-gray-500 hover:text-white hover:bg-red-600 rounded-xl transition-all border border-transparent hover:border-red-500 bg-transparent cursor-pointer shadow-sm">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'financials'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'المحفظة المالية 💰' : 'Financials 💰'"></h2>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'تابع أرباحك ومدفوعاتك من المنصة.' : 'Track your earnings and payouts.'"></p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <div class="lg:col-span-2 bg-[#16110f] rounded-3xl p-8 border border-[#2d221e] shadow-lg relative overflow-hidden">
                        <div class="absolute right-0 top-0 w-64 h-64 bg-[#E76F51] opacity-5 rounded-full blur-3xl"></div>
                        <h3 class="text-xl font-bold text-gray-400 mb-6 uppercase tracking-widest" x-text="language === 'ar' ? 'الهدف الشهري' : 'Monthly Goal'"></h3>
                        <div class="flex items-end gap-3 mb-6">
                            <h2 class="text-6xl font-black text-white">{{ $stats->earnings }}</h2>
                            <span class="text-2xl text-gray-500 font-bold mb-1">/ {{ $stats->monthly_goal }} JOD</span>
                        </div>

                        @php $percent = min(100, ($stats->earnings / $stats->monthly_goal) * 100); @endphp
                        <div class="w-full bg-[#0d0a09] rounded-full h-6 mb-3 border border-[#2d221e] overflow-hidden">
                            <div class="bg-gradient-to-r from-[#E76F51] to-[#F4A261] h-6 rounded-full transition-all duration-1000 relative" style="width: {{ $percent }}%">
                                <div class="absolute inset-0 bg-white/20 w-full h-full animate-pulse"></div>
                            </div>
                        </div>
                        <p class="text-gray-400 text-sm font-bold" x-text="language === 'ar' ? 'لقد حققت {{ $percent }}% من هدفك هذا الشهر. استمر!' : 'You reached {{ $percent }}% of your goal. Keep it up!'"></p>
                    </div>

                    <div class="lg:col-span-1 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-3xl p-8 shadow-[0_15px_40px_var(--dynamic-glow)] flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center text-white mb-6 backdrop-blur-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-black/70 font-black uppercase tracking-widest text-sm mb-1" x-text="language === 'ar' ? 'الرصيد القابل للسحب' : 'Available Balance'"></p>
                            <h3 class="text-4xl font-black text-black mb-4">420 JOD</h3>
                        </div>
                        <button @click="showToast(language==='ar'?'تم إرسال طلب السحب لحسابك البنكي':'Withdrawal request sent to your bank', 'bg-green-600 border-green-500')" class="w-full bg-black text-white py-4 rounded-xl font-black text-lg hover:bg-gray-900 transition-colors border-none cursor-pointer">
                            <span x-text="language === 'ar' ? 'سحب الأرباح' : 'Withdraw Funds'"></span>
                        </button>
                    </div>
                </div>

                <div class="bg-[#16110f] rounded-3xl border border-[#2d221e] overflow-hidden shadow-lg">
                    <div class="p-6 border-b border-[#2d221e] bg-[#1a1311]">
                        <h3 class="text-xl font-bold text-white" x-text="language === 'ar' ? 'سجل الدفعات' : 'Payout History'"></h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left rtl:text-right">
                            <thead class="bg-[#0d0a09] border-b border-[#2d221e] text-gray-500 text-xs font-bold uppercase tracking-wider">
                                <tr>
                                    <th class="p-5" x-text="language === 'ar' ? 'رقم العملية' : 'Transaction ID'"></th>
                                    <th class="p-5" x-text="language === 'ar' ? 'التاريخ' : 'Date'"></th>
                                    <th class="p-5" x-text="language === 'ar' ? 'المبلغ' : 'Amount'"></th>
                                    <th class="p-5" x-text="language === 'ar' ? 'الحالة' : 'Status'"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#2d221e]">
                                @foreach($payouts as $pay)
                                <tr class="hover:bg-[#1a1311] transition-colors">
                                    <td class="p-5 text-white font-bold">{{ $pay->id }}</td>
                                    <td class="p-5 text-gray-400">{{ $pay->date }}</td>
                                    <td class="p-5 text-[#F4A261] font-black">{{ $pay->amount }}</td>
                                    <td class="p-5">
                                        @if($pay->status === 'Paid')
                                            <span class="px-3 py-1 bg-green-500/10 text-green-400 rounded-lg text-xs font-bold border border-green-500/20">Paid</span>
                                        @else
                                            <span class="px-3 py-1 bg-yellow-500/10 text-yellow-400 rounded-lg text-xs font-bold border border-yellow-500/20">Processing</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'reviews'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 flex flex-col md:flex-row justify-between md:items-center gap-6">
                    <div>
                        <h2 class="text-4xl font-black text-white mb-2" x-text="language === 'ar' ? 'شهادات السياح فيك 🌟' : 'Tourist Reviews 🌟'"></h2>
                        <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'شوف شو بيحكوا عنك.' : 'See what tourists are saying.'"></p>
                    </div>
                    <div class="flex bg-[#16110f] p-2 rounded-2xl border border-[#2d221e]">
                        <button @click="filterRating = 0" class="px-4 py-2 rounded-xl text-sm font-bold transition-all border-none cursor-pointer" :class="filterRating === 0 ? 'bg-[#E76F51] text-black' : 'text-gray-400 hover:text-white bg-transparent'" x-text="language === 'ar' ? 'الكل' : 'All'"></button>
                        <button @click="filterRating = 5" class="px-4 py-2 rounded-xl text-sm font-bold transition-all flex items-center gap-1 border-none cursor-pointer" :class="filterRating === 5 ? 'bg-[#E76F51] text-black' : 'text-gray-400 hover:text-white bg-transparent'">5 <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg></button>
                        <button @click="filterRating = 4" class="px-4 py-2 rounded-xl text-sm font-bold transition-all flex items-center gap-1 border-none cursor-pointer" :class="filterRating === 4 ? 'bg-[#E76F51] text-black' : 'text-gray-400 hover:text-white bg-transparent'">4 <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg></button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($reviews as $review)
                    <div class="bg-[#16110f] rounded-3xl p-8 border border-[#2d221e] shadow-lg relative group hover:border-[#E76F51]/30 transition-all" x-show="filterRating === 0 || filterRating === {{ $review->rating }}">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#E76F51] to-[#F4A261] flex items-center justify-center text-black font-black text-2xl shadow-inner">{{ substr($review->tourist, 0, 1) }}</div>
                                <div>
                                    <h4 class="text-white font-bold text-lg">{{ $review->tourist }}</h4>
                                    <p class="text-sm text-gray-500">{{ $review->date }}</p>
                                </div>
                            </div>
                            <div class="flex gap-1 text-[#F5C518]">
                                @for($i=0; $i<$review->rating; $i++)
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                        </div>
                        <div class="bg-[#0d0a09] p-5 rounded-2xl border border-[#2d221e]">
                            <p class="text-gray-300 italic text-lg leading-relaxed">"{{ $review->comment }}"</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </main>
    </div>

    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-50 flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function assistantAdvancedDashboard() {
        return {
            language: localStorage.getItem('wayn_lang') || 'ar',
            activeTab: 'tours',
            sidebarOpen: false,
            isOnline: true,
            filterRating: 0,

            slotForm: { date: '', shift: 'Morning', capacity: 4 },

            openSlots: [
                { date: '2026-05-01', shift: 'Morning', capacity: 4 },
                { date: '2026-05-02', shift: 'Full Day', capacity: 2 },
                { date: '2026-05-05', shift: 'Afternoon', capacity: 8 }
            ],

            init() {
                this.$watch('language', val => localStorage.setItem('wayn_lang', val));
            },

            toggleLang() {
                this.language = this.language === 'ar' ? 'en' : 'ar';
            },

            toggleStatus() {
                this.isOnline = !this.isOnline;
                this.showToast(
                    this.isOnline
                    ? (this.language === 'ar' ? '🟢 أنت الآن متاح لاستقبال الحجوزات' : '🟢 You are now Online')
                    : (this.language === 'ar' ? '🔴 أنت الآن غير متاح (مشغول)' : '🔴 You are now Offline'),
                    this.isOnline ? 'bg-[#1a1311] border-green-500' : 'bg-[#1a1311] border-gray-500'
                );
            },

            saveAvailability() {
                if (!this.slotForm.date) return;

                this.openSlots.unshift({
                    date: this.slotForm.date,
                    shift: this.slotForm.shift,
                    capacity: this.slotForm.capacity
                });

                this.showToast(this.language === 'ar' ? '📅 تم فتح الموعد بنجاح!' : '📅 Availability slot opened!');
                this.slotForm = { date: '', shift: 'Morning', capacity: 4 };
            },

            deleteSlot(index) {
                this.openSlots.splice(index, 1);
                this.showToast(this.language === 'ar' ? '🗑️ تم حذف الموعد المفتوح' : '🗑️ Slot removed from schedule', 'bg-red-600/20 border-red-500 text-white');
            },

            startTour(id, name) {
                let card = document.getElementById('tour-' + id);
                card.style.transform = 'scale(0.97)';
                card.style.opacity = '0.7';
                setTimeout(() => {
                    card.style.transform = 'scale(1)';
                    card.style.opacity = '1';
                }, 300);
                this.showToast(this.language === 'ar' ? '🚀 انطلقت جولة: ' + name : '🚀 Tour Started: ' + name, 'bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-black border-none');
            },

            contactTourist(name) {
                this.showToast(this.language === 'ar' ? '💬 جاري تجهيز المحادثة مع ' + name : '💬 Opening secure chat with ' + name);
            },

            showToast(message, colorClass = 'bg-[#1a1311] border-[#E76F51] text-white') {
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
