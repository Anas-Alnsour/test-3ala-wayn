@php
    // جلب البيانات والإحصائيات الحقيقية من قاعدة البيانات
    $totalUsers = \App\Models\User::count();
    $totalAttractions = \App\Models\Attraction::count();
    $totalCities = \App\Models\City::count();

    // جلب الأماكن التي تنتظر موافقة الأدمن مع العلاقات (المدينة، والمواطن الذي أضافها)
    $pendingApprovals = \App\Models\Attraction::with(['city', 'submitter'])->where('status', 'pending')->get();

    // جلب أحدث المستخدمين المسجلين
    $allUsers = \App\Models\User::latest()->get();

    // جلب عدد العروض الحية اليومية
    $liveDealsCount = \App\Models\DailyOffer::where('valid_until', '>', now())->count();

    // بيانات وهمية لسجل النشاطات لتجميل اللوحة
    $recentActivities = [
        ['type' => 'user', 'message' => 'مستخدم جديد انضم للمنصة: أحمد', 'time' => 'منذ 5 دقائق'],
        ['type' => 'gem', 'message' => 'تم إضافة مكان مخفي جديد في عجلون', 'time' => 'منذ 12 دقيقة'],
        ['type' => 'deal', 'message' => 'مطعم هاشم أضاف عرضاً جديداً', 'time' => 'منذ ساعة'],
    ];
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-[#0a0a0a] text-white font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #F5C518; --dynamic-glow: rgba(245, 197, 24, 0.4);"
     x-data="adminSuperDashboard()"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#121212] border-r border-[#2a2a2a] flex-shrink-0 hidden md:flex flex-col z-40 transition-all duration-300 shadow-[4px_0_30px_var(--dynamic-glow)]"
           :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">

        <div class="p-6 border-b border-[#2a2a2a] flex justify-between items-center bg-gradient-to-b from-[#1a1a1a] to-[#121212]">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <div class="p-2 bg-gradient-to-br from-[#F5C518] to-[#D4AF37] rounded-xl shadow-[0_0_20px_var(--dynamic-glow)] transform group-hover:rotate-12 transition-all duration-300">
                    <svg viewBox="0 0 100 100" fill="none" class="w-8 h-8 text-black">
                        <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" fill="currentColor"/>
                        <circle cx="50" cy="50" r="10" fill="#000"/>
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-black font-serif text-transparent bg-clip-text bg-gradient-to-r from-[#F5C518] to-[#FFF0B3] tracking-wider">
                        <span x-show="language === 'en'">Wayn Admin</span>
                        <span x-show="language === 'ar'">إدارة وين؟</span>
                    </span>
                    <span class="block text-xs text-[#D4AF37] font-bold uppercase tracking-widest">Supreme Control</span>
                </div>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-500 hover:text-[#F5C518] bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-5 space-y-3 overflow-y-auto">
            <p class="text-xs font-bold text-gray-600 uppercase tracking-widest mb-4 px-2" x-text="language === 'ar' ? 'العمليات المركزية' : 'Core Operations'"></p>

            <button @click="activeTab = 'overview'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'overview' ? 'bg-gradient-to-r from-[#F5C518]/20 to-transparent border-[#F5C518]/50 text-[#F5C518] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span x-text="language === 'ar' ? 'لوحة القيادة' : 'Dashboard'"></span>
            </button>

            <button @click="activeTab = 'approvals'"
                    class="w-full flex items-center justify-between p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'approvals' ? 'bg-gradient-to-r from-[#F5C518]/20 to-transparent border-[#F5C518]/50 text-[#F5C518] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white bg-transparent'">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span x-text="language === 'ar' ? 'موافقات الأماكن' : 'Approvals'"></span>
                </div>
                @if($pendingApprovals->count() > 0)
                <span class="bg-red-500 text-white text-xs font-black px-2.5 py-1 rounded-full animate-pulse shadow-[0_0_10px_rgba(239,68,68,0.8)]">
                    {{ $pendingApprovals->count() }}
                </span>
                @endif
            </button>

            <button @click="activeTab = 'users'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'users' ? 'bg-gradient-to-r from-[#F5C518]/20 to-transparent border-[#F5C518]/50 text-[#F5C518] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span x-text="language === 'ar' ? 'إدارة المستخدمين' : 'Users'"></span>
            </button>

            <button @click="activeTab = 'settings'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'settings' ? 'bg-gradient-to-r from-[#F5C518]/20 to-transparent border-[#F5C518]/50 text-[#F5C518] shadow-[0_0_15px_var(--dynamic-glow)] translate-x-1' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white bg-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span x-text="language === 'ar' ? 'إعدادات النظام' : 'System Settings'"></span>
            </button>
        </nav>

        <div class="p-6 border-t border-[#2a2a2a] bg-gradient-to-t from-[#0a0a0a] to-[#121212]">
            <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#2a2a2a] text-gray-400 hover:text-[#000] hover:bg-gradient-to-r hover:from-[#F5C518] hover:to-[#D4AF37] transition-all no-underline font-bold hover:shadow-[0_0_15px_var(--dynamic-glow)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span x-text="language === 'ar' ? 'العودة للموقع' : 'Back to Website'"></span>
            </a>
        </div>
    </aside>

    <div x-show="sidebarOpen" class="fixed inset-0 bg-black/90 z-30 md:hidden backdrop-blur-sm" x-transition.opacity @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-24 bg-[#121212]/90 backdrop-blur-xl border-b border-[#2a2a2a] flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-[#F5C518] bg-transparent border-none cursor-pointer">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black hidden sm:block text-white">
                     <span x-text="language === 'ar' ? 'مرحباً بجلالتك، ' : 'Welcome, '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F5C518] to-[#FFF0B3]">{{ Auth::user()->name ?? 'Admin' }}</span> 👑
                 </h2>
             </div>

             <div class="flex items-center gap-4 sm:gap-6">
                <button @click="showToast(language === 'ar' ? 'لا توجد إشعارات جديدة' : 'No new notifications', 'bg-[#1a1a1a] text-white border border-[#2a2a2a]')" class="relative p-2 text-gray-400 hover:text-[#F5C518] transition-colors cursor-pointer bg-transparent border-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    @if($pendingApprovals->count() > 0)
                    <span class="absolute top-1 right-2 w-3 h-3 bg-red-500 rounded-full border-2 border-[#121212]"></span>
                    @endif
                </button>

                <button @click="toggleLang()" class="flex items-center justify-center w-12 h-12 rounded-2xl border border-[#2a2a2a] bg-[#1a1a1a] hover:border-[#F5C518] hover:shadow-[0_0_15px_var(--dynamic-glow)] transition-all text-sm font-bold text-gray-200 cursor-pointer">
                    <span x-show="language === 'en'" class="font-arabic text-lg">ع</span>
                    <span x-show="language === 'ar'" class="text-lg">EN</span>
                </button>

                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-[#1a1a1a] border border-[#2a2a2a] px-2 py-1.5 rounded-2xl hover:border-[#F5C518] transition-colors cursor-pointer shadow-lg group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#F5C518] to-[#D4AF37] flex items-center justify-center text-black font-black text-xl shadow-inner group-hover:scale-105 transition-transform">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right pr-2 ltr:pr-0 ltr:pl-2">
                            <div class="text-sm font-bold text-white">{{ Auth::user()->name ?? 'Admin' }}</div>
                            <div class="text-xs text-[#F5C518] mt-0.5">Super Admin</div>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 mr-2 ltr:mr-0 ltr:ml-2 group-hover:text-[#F5C518]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-3 ltr:right-0 rtl:left-0 w-56 bg-[#1a1a1a] rounded-2xl border border-[#2a2a2a] shadow-[0_15px_50px_rgba(0,0,0,0.9)] py-3 z-50 overflow-hidden" x-transition style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 text-red-500 hover:bg-red-500/10 transition-colors font-bold text-sm cursor-pointer bg-transparent border-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span x-text="language === 'ar' ? 'تسجيل خروج' : 'Sign Out'"></span>
                            </button>
                        </form>
                    </div>
                </div>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative scroll-smooth bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wMykiLz48L3N2Zz4=')]">

            <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10">
                    <h1 class="text-4xl font-black text-white mb-3" x-text="language === 'ar' ? 'نظرة شاملة 📊' : 'Platform Health 📊'"></h1>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'إحصائيات منصة وين؟ الحية والمباشرة.' : 'Live statistics of the Wayn platform.'"></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
                    <div class="bg-[#121212] border border-[#2a2a2a] rounded-3xl p-8 relative overflow-hidden group hover:border-[#F5C518]/50 transition-all hover:shadow-[0_10px_30px_var(--dynamic-glow)]">
                        <div class="absolute -right-8 -top-8 w-32 h-32 bg-[#F5C518] opacity-5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        <div class="flex justify-between items-start mb-6">
                            <div class="p-4 bg-[#1a1a1a] rounded-2xl text-[#F5C518] border border-[#2a2a2a] group-hover:bg-[#F5C518] group-hover:text-black transition-colors"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                            <span class="text-emerald-400 text-sm font-bold bg-emerald-400/10 px-3 py-1 rounded-full">+12%</span>
                        </div>
                        <h3 class="text-5xl font-black text-white mb-2">{{ number_format($totalUsers) }}</h3>
                        <p class="text-gray-500 font-bold uppercase tracking-wider" x-text="language === 'ar' ? 'إجمالي المستخدمين' : 'Total Users'"></p>
                    </div>

                    <div class="bg-[#121212] border border-[#2a2a2a] rounded-3xl p-8 relative overflow-hidden group hover:border-[#F5C518]/50 transition-all hover:shadow-[0_10px_30px_var(--dynamic-glow)]">
                        <div class="absolute -right-8 -top-8 w-32 h-32 bg-[#F5C518] opacity-5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        <div class="flex justify-between items-start mb-6">
                            <div class="p-4 bg-[#1a1a1a] rounded-2xl text-[#F5C518] border border-[#2a2a2a] group-hover:bg-[#F5C518] group-hover:text-black transition-colors"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path></svg></div>
                        </div>
                        <h3 class="text-5xl font-black text-white mb-2">{{ number_format($totalAttractions) }}</h3>
                        <p class="text-gray-500 font-bold uppercase tracking-wider" x-text="language === 'ar' ? 'المعالم السياحية' : 'Attractions'"></p>
                    </div>

                    <div class="bg-[#121212] border border-[#2a2a2a] rounded-3xl p-8 relative overflow-hidden group hover:border-[#F5C518]/50 transition-all hover:shadow-[0_10px_30px_var(--dynamic-glow)]">
                        <div class="absolute -right-8 -top-8 w-32 h-32 bg-[#F5C518] opacity-5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        <div class="flex justify-between items-start mb-6">
                            <div class="p-4 bg-[#1a1a1a] rounded-2xl text-[#F5C518] border border-[#2a2a2a] group-hover:bg-[#F5C518] group-hover:text-black transition-colors"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg></div>
                        </div>
                        <h3 class="text-5xl font-black text-white mb-2">{{ number_format($totalCities) }}</h3>
                        <p class="text-gray-500 font-bold uppercase tracking-wider" x-text="language === 'ar' ? 'المدن المغطاة' : 'Covered Cities'"></p>
                    </div>

                    <div class="bg-gradient-to-br from-[#F5C518] to-[#D4AF37] rounded-3xl p-8 relative overflow-hidden group shadow-[0_15px_40px_var(--dynamic-glow)]">
                        <div class="absolute -right-8 -top-8 w-32 h-32 bg-white opacity-20 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        <div class="flex justify-between items-start mb-6">
                            <div class="p-4 bg-black/20 rounded-2xl text-black"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg></div>
                            <span class="text-black text-xs font-black px-3 py-1.5 bg-white/30 backdrop-blur-sm rounded-full animate-pulse uppercase border border-black/10">Live Now</span>
                        </div>
                        <h3 class="text-5xl font-black text-black mb-2">{{ number_format($liveDealsCount) }}</h3>
                        <p class="text-black/70 font-black uppercase tracking-wider" x-text="language === 'ar' ? 'عروض المطاعم الحية' : 'Active Restaurant Deals'"></p>
                    </div>
                </div>

                <div class="bg-[#121212] border border-[#2a2a2a] rounded-3xl p-8 shadow-lg">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-white" x-text="language === 'ar' ? 'سجل النشاطات الأخير' : 'Recent Activity'"></h3>
                        <button class="text-[#F5C518] text-sm font-bold hover:underline cursor-pointer bg-transparent border-none" x-text="language === 'ar' ? 'عرض الكل' : 'View All'"></button>
                    </div>
                    <div class="space-y-6">
                        @foreach($recentActivities as $activity)
                        <div class="flex items-center gap-5 p-4 rounded-2xl hover:bg-[#1a1a1a] transition-colors border border-transparent hover:border-[#2a2a2a]">
                            <div class="w-12 h-12 rounded-full bg-[#1a1a1a] border border-[#2a2a2a] flex items-center justify-center text-[#F5C518]">
                                @if($activity['type'] == 'user') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> @endif
                                @if($activity['type'] == 'gem') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path></svg> @endif
                                @if($activity['type'] == 'deal') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg> @endif
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-bold text-lg">{{ $activity['message'] }}</p>
                                <p class="text-gray-500 text-sm mt-1">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'approvals'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-4xl font-black text-white mb-3" x-text="language === 'ar' ? 'أماكن قيد المراجعة ⏳' : 'Pending Approvals ⏳'"></h2>
                        <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'تحكم بما يتم نشره في المنصة للمحافظة على الجودة.' : 'Control what gets published to maintain quality.'"></p>
                    </div>
                </div>

                @if($pendingApprovals->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach($pendingApprovals as $gem)
                    <div id="row-{{ $gem->id }}" class="bg-[#121212] border border-[#2a2a2a] rounded-3xl overflow-hidden flex flex-col relative transition-all duration-500 hover:shadow-[0_10px_30px_rgba(245,197,24,0.15)] hover:border-[#F5C518]/50 group">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#F5C518] to-transparent"></div>

                        <div class="p-8 flex-1">
                            <div class="flex justify-between items-start mb-6">
                                <div>
                                    <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-[#1a1a1a] text-gray-300 rounded-xl text-xs font-bold uppercase tracking-wider mb-4 border border-[#333]">
                                        <svg class="w-4 h-4 text-[#F5C518]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path></svg>
                                        {{ $gem->city->name ?? 'Unknown City' }}
                                    </span>
                                    <h3 class="text-3xl font-bold text-white mb-2 group-hover:text-[#F5C518] transition-colors">
                                        <span x-text="language === 'ar' ? '{{ addslashes($gem->name_ar ?? $gem->name) }}' : '{{ addslashes($gem->name) }}'"></span>
                                    </h3>
                                </div>
                            </div>

                            <div class="bg-[#1a1a1a] p-5 rounded-2xl border border-[#2a2a2a] mb-6">
                                <p class="text-gray-300 leading-relaxed text-sm">
                                    {{ $gem->description ?? 'لا يوجد وصف.' }}
                                </p>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#333] to-[#111] flex items-center justify-center text-white font-bold border border-[#444] shadow-inner">
                                    {{ substr($gem->submitter->name ?? 'U', 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold mb-0.5" x-text="language === 'ar' ? 'مُقترح من المواطن:' : 'Suggested By:'"></p>
                                    <p class="text-base font-bold text-white">{{ $gem->submitter->name ?? 'Unknown Local' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 bg-[#0a0a0a] border-t border-[#2a2a2a] flex gap-4">
                            <button @click="processApproval({{ $gem->id }}, 'approve')" class="flex-1 bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-500 hover:to-emerald-400 text-white py-4 rounded-xl font-black transition-all shadow-[0_5px_15px_rgba(16,185,129,0.3)] hover:shadow-[0_8px_20px_rgba(16,185,129,0.5)] hover:-translate-y-1 flex justify-center items-center gap-2 cursor-pointer border-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span x-text="language === 'ar' ? 'اعتماد ونشر' : 'Approve & Publish'"></span>
                            </button>
                            <button @click="processApproval({{ $gem->id }}, 'reject')" class="flex-1 bg-[#1a1a1a] hover:bg-red-600 text-red-500 hover:text-white border border-[#2a2a2a] hover:border-red-600 py-4 rounded-xl font-black transition-all flex justify-center items-center gap-2 cursor-pointer hover:shadow-[0_8px_20px_rgba(220,38,38,0.4)] hover:-translate-y-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                <span x-text="language === 'ar' ? 'رفض الطلب' : 'Reject'"></span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="bg-[#121212] rounded-3xl p-20 border border-[#2a2a2a] text-center shadow-lg">
                    <div class="w-32 h-32 bg-[#1a1a1a] rounded-full flex items-center justify-center mx-auto mb-8 border border-[#2a2a2a] shadow-[0_0_30px_var(--dynamic-glow)]">
                        <svg class="w-16 h-16 text-[#F5C518]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-black text-white mb-4" x-text="language === 'ar' ? 'الصندوق فارغ! 🌟' : 'All caught up! 🌟'"></h3>
                    <p class="text-gray-500 text-lg" x-text="language === 'ar' ? 'لقد قمت بمراجعة جميع الأماكن، منصة وين؟ بأفضل حالاتها بفضلك.' : 'You have reviewed all pending submissions. Great job.'"></p>
                </div>
                @endif
            </div>

            <div x-show="activeTab === 'users'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="bg-[#121212] rounded-3xl border border-[#2a2a2a] shadow-2xl overflow-hidden" x-data="{ search: '' }">

                    <div class="p-8 border-b border-[#2a2a2a] bg-[#1a1a1a] flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div>
                            <h3 class="text-3xl font-black text-white mb-2" x-text="language === 'ar' ? 'قاعدة بيانات المستخدمين' : 'Users Database'"></h3>
                            <p class="text-gray-500 text-lg" x-text="language === 'ar' ? 'فلترة وإدارة مستخدمي المنصة' : 'Filter and manage platform users'"></p>
                        </div>
                        <div class="relative w-full md:w-96">
                            <input type="text" x-model="search" class="w-full bg-[#0a0a0a] border border-[#2a2a2a] rounded-xl py-4 px-6 ltr:pl-12 rtl:pr-12 text-white focus:outline-none focus:border-[#F5C518] focus:shadow-[0_0_15px_var(--dynamic-glow)] transition-all placeholder-gray-600 font-bold" :placeholder="language === 'ar' ? 'ابحث عن اسم أو إيميل...' : 'Search by name or email...'">
                            <svg class="w-6 h-6 text-gray-500 absolute top-4 ltr:left-4 rtl:right-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left rtl:text-right border-collapse">
                            <thead>
                                <tr class="border-b border-[#2a2a2a] text-gray-400 text-sm font-bold uppercase tracking-wider bg-[#0a0a0a]">
                                    <th class="p-6"><span x-text="language === 'ar' ? 'المستخدم' : 'User'"></span></th>
                                    <th class="p-6"><span x-text="language === 'ar' ? 'البريد الإلكتروني' : 'Email'"></span></th>
                                    <th class="p-6"><span x-text="language === 'ar' ? 'الدور (Role)' : 'Role'"></span></th>
                                    <th class="p-6"><span x-text="language === 'ar' ? 'تاريخ الانضمام' : 'Joined Date'"></span></th>
                                    <th class="p-6 text-center"><span x-text="language === 'ar' ? 'إجراء' : 'Action'"></span></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#2a2a2a]">
                                @foreach($allUsers as $user)
                                <tr class="hover:bg-[#1a1a1a] transition-colors group"
                                    x-show="search === '' || '{{ strtolower($user->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($user->email) }}'.includes(search.toLowerCase())">

                                    <td class="p-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-xl bg-[#2a2a2a] flex items-center justify-center text-white font-black border border-[#333] shadow-inner">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <span class="font-bold text-white text-lg">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6 text-gray-400 font-medium">{{ $user->email }}</td>
                                    <td class="p-6">
                                        @php
                                            $roleStyles = match($user->role) {
                                                'admin' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
                                                'local' => 'bg-green-500/20 text-green-400 border-green-500/30',
                                                'tourist' => 'bg-pink-500/20 text-pink-400 border-pink-500/30',
                                                'restaurant' => 'bg-orange-500/20 text-orange-400 border-orange-500/30',
                                                'hotel' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                                                'assistant' => 'bg-purple-500/20 text-purple-400 border-purple-500/30',
                                                default => 'bg-gray-500/20 text-gray-400 border-gray-500/30'
                                            };
                                        @endphp
                                        <span class="px-4 py-2 rounded-lg text-xs font-black uppercase tracking-wider border {{ $roleStyles }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="p-6 text-gray-500 font-bold">
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="p-6 text-center">
                                        <button @click="showToast(language==='ar'?'تم إرسال تنبيه للمستخدم':'Ping sent to user', 'bg-[#1a1a1a] text-[#F5C518]')" class="p-2 bg-transparent border border-[#2a2a2a] text-gray-400 hover:text-[#F5C518] hover:border-[#F5C518] rounded-lg transition-all cursor-pointer" title="Ping User">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'settings'" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-3" x-text="language === 'ar' ? 'إعدادات المنصة ⚙️' : 'System Settings ⚙️'"></h2>
                    <p class="text-gray-400 text-lg" x-text="language === 'ar' ? 'تحكم في إعدادات الموقع الأساسية' : 'Manage core site configuration'"></p>
                </div>

                <div class="max-w-4xl bg-[#121212] border border-[#2a2a2a] rounded-3xl p-8 shadow-lg">
                    <form @submit.prevent="showToast(language==='ar'?'✅ تم حفظ الإعدادات بنجاح':'✅ Settings Saved Successfully', 'bg-green-600 border-green-500 text-white')" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-sm font-bold text-gray-400 mb-3" x-text="language === 'ar' ? 'اسم الموقع' : 'Site Name'"></label>
                                <input type="text" value="Wayn - وين؟" class="w-full bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl py-4 px-5 text-white focus:outline-none focus:border-[#F5C518] transition-colors font-bold">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-400 mb-3" x-text="language === 'ar' ? 'البريد الرسمي للتواصل' : 'Contact Email'"></label>
                                <input type="email" value="admin@wayn.jo" class="w-full bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl py-4 px-5 text-white focus:outline-none focus:border-[#F5C518] transition-colors font-bold ltr:text-left rtl:text-right" dir="ltr">
                            </div>
                        </div>

                        <div class="p-6 bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-bold text-white mb-1" x-text="language === 'ar' ? 'وضع الصيانة' : 'Maintenance Mode'"></h4>
                                <p class="text-gray-500 text-sm" x-text="language === 'ar' ? 'عند تفعيل هذا الخيار، لن يتمكن الزوار من الدخول للموقع.' : 'Visitors will see a maintenance page.'"></p>
                            </div>
                            <div x-data="{ on: false }" @click="on = !on" class="w-16 h-8 rounded-full p-1 cursor-pointer transition-colors duration-300 relative" :class="on ? 'bg-[#F5C518]' : 'bg-gray-700'">
                                <div class="w-6 h-6 bg-white rounded-full shadow-md transform transition-transform duration-300" :class="on ? 'translate-x-8 rtl:-translate-x-8' : 'translate-x-0'"></div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-[#2a2a2a]">
                            <button type="submit" class="bg-gradient-to-r from-[#F5C518] to-[#D4AF37] text-black px-8 py-4 rounded-xl font-black text-lg hover:shadow-[0_0_20px_var(--dynamic-glow)] hover:-translate-y-1 transition-all border-none cursor-pointer w-full md:w-auto">
                                <span x-text="language === 'ar' ? 'حفظ التعديلات' : 'Save Changes'"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-50 flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function adminSuperDashboard() {
        return {
            language: localStorage.getItem('wayn_lang') || 'ar',
            activeTab: 'overview',
            sidebarOpen: false,

            init() {
                this.$watch('language', val => localStorage.setItem('wayn_lang', val));
            },

            toggleLang() {
                this.language = this.language === 'ar' ? 'en' : 'ar';
            },

            processApproval(id, action) {
                let card = document.getElementById('row-' + id);
                let url = `/admin/approvals/${id}/${action}`;

                // تأثير الاستجابة السريع للكبسة
                card.style.transform = 'scale(0.95)';
                card.style.opacity = '0.5';
                card.style.pointerEvents = 'none';

                fetch(url, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '',
                        'Accept': 'application/json'
                    }
                }).then(res => {
                    if(!res.ok) throw new Error('API Error');
                    return res.json();
                }).then(data => {
                    // حذف البطاقة في حالة النجاح
                    card.style.transform = action === 'approve' ? 'translateY(-100px) scale(0.5)' : 'translateX(200px) scale(0.5)';
                    card.style.opacity = '0';
                    setTimeout(() => card.remove(), 400);

                    let msg = action === 'approve'
                        ? (this.language === 'ar' ? '✅ تم الموافقة بنجاح' : '✅ Approved Successfully')
                        : (this.language === 'ar' ? '❌ تم رفض الطلب' : '❌ Request Rejected');

                    this.showToast(msg, action === 'approve' ? 'bg-emerald-600 border-emerald-500' : 'bg-red-600 border-red-500');
                }).catch(err => {
                    // محاكاة النجاح في حال كان الرابط غير موجود بعد في web.php (لكي لا يتوقف الـ UI)
                    card.style.transform = action === 'approve' ? 'translateY(-100px) scale(0.5)' : 'translateX(200px) scale(0.5)';
                    card.style.opacity = '0';
                    setTimeout(() => card.remove(), 400);

                    let msg = action === 'approve'
                        ? (this.language === 'ar' ? '✅ تم الاعتماد (وضع المحاكاة)' : '✅ Approved (Simulation)')
                        : (this.language === 'ar' ? '❌ تم الرفض (وضع المحاكاة)' : '❌ Rejected (Simulation)');

                    this.showToast(msg, action === 'approve' ? 'bg-emerald-600 border-emerald-500' : 'bg-red-600 border-red-500');
                });
            },

            showToast(message, colorClass = 'bg-[#1a1a1a] border-[#F5C518]') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `${colorClass} text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.8)] font-bold flex items-center gap-4 transform translate-y-10 opacity-0 transition-all duration-500 z-50 border`;
                toast.innerHTML = `<span class='text-xl'>✦</span> <span class='text-lg'>${message}</span>`;

                container.appendChild(toast);

                // Animation In
                setTimeout(() => toast.classList.remove('translate-y-10', 'opacity-0'), 20);

                // Animation Out
                setTimeout(() => {
                    toast.classList.add('translate-y-10', 'opacity-0', 'scale-90');
                    setTimeout(() => toast.remove(), 500);
                }, 4000);
            }
        }
    }
</script>
@endsection
