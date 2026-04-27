@php
    $activeOffers = \App\Models\DailyOffer::where('user_id', auth()->id())->latest()->get();
    
    // Simulated Stats
    $profileViews = rand(1200, 4500);
    $menuScans = rand(500, 1200);
@endphp
@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-dynamic-main text-white font-sans" x-data="{ 
    activeTab: 'overview', 
    sidebarOpen: false,
    
    offerForm: { name: '', original_price: '', discount_price: '', valid_until: '', audience: 'all' },
    
    submitOffer() {
        fetch('{{ route('restaurant.offers.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify(this.offerForm)
        }).then(res => res.json()).then(data => {
            this.showToast(data.message, data.message);
            this.offerForm = { name: '', original_price: '', discount_price: '', valid_until: '', audience: 'all' };
            this.activeTab = 'active_offers';
            setTimeout(() => window.location.reload(), 1500);
        });
    },

    toggleOffer(id) {
        fetch(`/restaurant/offers/${id}/toggle`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            }
        }).then(res => res.json()).then(data => {
            this.showToast(data.message, data.message);
            setTimeout(() => window.location.reload(), 1000);
        });
    }
}">

    <aside class="w-72 bg-dynamic-sidebar border-r border-gray-800 flex-shrink-0 hidden md:flex flex-col z-20 transition-all duration-300" :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">
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
                    :class="activeTab === 'overview' ? 'sidebar-active' : 'text-gray-400 hover:bg-white/5 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span class="font-medium en-text">Analytics</span>
                <span class="font-medium ar-text">التحليلات</span>
            </button>
            <button @click="activeTab = 'post_offer'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'post_offer' ? 'sidebar-active' : 'text-gray-400 hover:bg-white/5 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span class="font-medium en-text">Post Offer</span>
                <span class="font-medium ar-text">إضافة عرض</span>
            </button>
            <button @click="activeTab = 'active_offers'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'active_offers' ? 'sidebar-active' : 'text-gray-400 hover:bg-white/5 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span class="font-medium en-text">Active Offers</span>
                <span class="font-medium ar-text">العروض الفعالة</span>
            </button>
        </nav>
        
        <div class="p-4 border-t border-gray-800">
            <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-colors no-underline">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span class="font-medium">
                    <span class="en-text">Back to Explore</span>
                    <span class="ar-text">العودة للاستكشاف</span>
                </span>
            </a>
        </div>
    </aside>

    <div x-show="sidebarOpen" 
         class="fixed inset-0 bg-black/60 z-30 md:hidden backdrop-blur-sm"
         x-transition.opacity
         @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <header class="h-20 bg-dynamic-main/80 backdrop-blur-md border-b border-gray-800 flex items-center justify-between px-6 z-10 sticky top-0">
             <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
             </button>
             
             <div class="flex-1"></div>
             
             <div class="flex items-center gap-4 sm:gap-6">
                <!-- Language Toggle -->
                <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-600 bg-dynamic-sidebar hover:bg-white/10 transition-colors text-sm font-bold text-gray-200 cursor-pointer">
                    <span class="en-text font-arabic">ع</span>
                    <span class="ar-text">EN</span>
                </button>

                <!-- Profile Dropdown -->
                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-transparent border-none p-0 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-dynamic border border-white/20 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ substr(Auth::user()->name ?? 'R', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'Restaurant Owner' }}</div>
                            <div class="text-xs text-dynamic capitalize leading-tight">Partner</div>
                        </div>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-2 ltr:right-0 rtl:left-0 w-48 bg-dynamic-sidebar rounded-xl border border-gray-700 shadow-2xl py-2 z-50" x-transition.opacity style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full ltr:text-left rtl:text-right px-4 py-2 text-sm text-red-400 hover:bg-white/5 transition-colors cursor-pointer bg-transparent border-none">
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
                    <span class="en-text">Restaurant Partner Center</span>
                    <span class="ar-text">مركز الشركاء - المطاعم</span>
                </h1>
                <p class="text-gray-400">
                    <span class="en-text">Manage your real-time offers and drive foot traffic.</span>
                    <span class="ar-text">إدارة العروض المباشرة وزيادة الزوار.</span>
                </p>
            </div>

            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="stats-bar mb-10">
                    <div class="stat-card border-dynamic shadow-[0_0_15px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)] bg-dynamic-sidebar">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Profile Views</span>
                            <span class="ar-text">مشاهدات الصفحة</span>
                        </div>
                        <div class="text-4xl font-bold text-dynamic mb-2">{{ number_format($profileViews) }}</div>
                        <div class="text-sm text-emerald-400">+12% from last week</div>
                    </div>
                    
                    <div class="stat-card bg-dynamic-sidebar border border-gray-800">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Menu Scans (QR)</span>
                            <span class="ar-text">مسح قائمة الطعام (QR)</span>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2">{{ number_format($menuScans) }}</div>
                        <div class="text-sm text-emerald-400">+8% from last week</div>
                    </div>
                    
                    <div class="stat-card bg-dynamic-sidebar border border-gray-800">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Active Offers</span>
                            <span class="ar-text">العروض الفعالة</span>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2">{{ $activeOffers->where('is_active', true)->count() }}</div>
                        <div class="text-sm text-gray-500">Currently live on the app</div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'post_offer'" x-transition x-cloak>
                <div class="solid-panel p-6 md:p-10 max-w-4xl mx-auto rounded-2xl border-t-4 border-dynamic shadow-[0_10px_40px_rgba(0,0,0,0.5)] bg-dynamic-sidebar">
                    <h2 class="text-2xl font-bold font-serif text-white mb-6">
                        <span class="en-text">Create Flash Deal</span>
                        <span class="ar-text">إنشاء عرض سريع</span>
                    </h2>
                    
                    <form @submit.prevent="submitOffer" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                <span class="en-text">Meal / Offer Name</span>
                                <span class="ar-text">اسم الوجبة / العرض</span>
                            </label>
                            <input type="text" x-model="offerForm.name" required class="glass-input-premium w-full bg-dynamic-main border border-gray-700 text-white" placeholder="e.g. Mansaf Friday Special">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">Original Price (JOD)</span>
                                    <span class="ar-text">السعر الأصلي (دينار)</span>
                                </label>
                                <input type="number" step="0.01" x-model="offerForm.original_price" required class="glass-input-premium w-full bg-dynamic-main border border-gray-700 text-white" placeholder="15.00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">Discount Price (JOD)</span>
                                    <span class="ar-text">سعر الخصم (دينار)</span>
                                </label>
                                <input type="number" step="0.01" x-model="offerForm.discount_price" required class="glass-input-premium w-full bg-dynamic-main border border-dynamic shadow-[0_0_10px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)] text-dynamic focus:ring-dynamic focus:border-dynamic" placeholder="9.99">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">Valid Until</span>
                                    <span class="ar-text">صالح حتى</span>
                                </label>
                                <input type="time" x-model="offerForm.valid_until" required class="glass-input-premium w-full bg-dynamic-main border border-gray-700 text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">Target Audience</span>
                                    <span class="ar-text">الفئة المستهدفة</span>
                                </label>
                                <select x-model="offerForm.audience" required class="glass-input-premium w-full bg-dynamic-main border border-gray-700 text-white">
                                    <option value="all">Everyone / الجميع</option>
                                    <option value="tourist">Tourists Only / السياح فقط</option>
                                    <option value="local">Locals Only / أبناء البلد فقط</option>
                                </select>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-4 btn-dynamic text-lg font-bold rounded-xl transition-all shadow-lg border-none cursor-pointer">
                                <span class="en-text">Publish Immediately</span>
                                <span class="ar-text">نشر العرض فوراً</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="activeTab === 'active_offers'" x-transition x-cloak>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @forelse($activeOffers as $offer)
                    <div class="solid-panel p-6 border-l-4 {{ $offer->is_active ? 'border-emerald-500' : 'border-gray-600' }} flex flex-col justify-between bg-dynamic-sidebar border-y border-r border-gray-800">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-white mb-1">
                                    <span class="en-text">{{ $offer->name }}</span>
                                    <span class="ar-text">{{ $offer->name_ar ?? $offer->name }}</span>
                                </h3>
                                <div class="text-sm text-gray-400">Valid until {{ $offer->valid_until }} • Target: <span class="capitalize">{{ $offer->audience }}</span></div>
                            </div>
                            <div class="text-right rtl:text-left bg-dynamic-main p-2 rounded-lg border border-white/10 shadow-inner">
                                <div class="text-xs text-gray-500 line-through">{{ $offer->original_price }} JOD</div>
                                <div class="text-lg font-bold text-dynamic">{{ $offer->discount_price }} JOD</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-800/50 mt-4">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full {{ $offer->is_active ? 'bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.8)]' : 'bg-gray-600' }}"></div>
                                <span class="text-sm font-bold {{ $offer->is_active ? 'text-emerald-500' : 'text-gray-500' }}">
                                    {{ $offer->is_active ? 'LIVE' : 'PAUSED' }}
                                </span>
                            </div>
                            
                            <button @click="toggleOffer({{ $offer->id }})" class="px-4 py-2 bg-dynamic-main hover:bg-white/10 border border-gray-700 text-white text-sm font-bold rounded-lg transition-colors cursor-pointer">
                                @if($offer->is_active)
                                    <span class="en-text">Pause Offer</span><span class="ar-text">إيقاف العرض</span>
                                @else
                                    <span class="en-text text-dynamic">Reactivate</span><span class="ar-text text-dynamic">تفعيل العرض</span>
                                @endif
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full solid-panel p-10 text-center border border-gray-700 border-dashed bg-dynamic-sidebar">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <p class="text-gray-400 text-lg">No offers created yet. Start driving traffic by posting a flash deal!</p>
                    </div>
                    @endforelse
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
