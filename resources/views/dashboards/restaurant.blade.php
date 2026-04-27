@php
    // Fetch restaurant's active offers safely
    $activeOffers = \App\Models\DailyOffer::where('user_id', auth()->id() ?? 1)->latest()->get();

    // Stats
    $profileViews = 4850;
    $menuScans = 1240;
    $activeCount = $activeOffers->where('is_active', true)->count();
    $totalSaved = 420;

    // Live Orders with Direct Wikimedia fallback links for Guaranteed Quality (Jordanian Food)
    $liveOrders = [
        (object)[
            'id' => '#ORD-001',
            'guest' => 'John Doe',
            'deal' => 'Mansaf',
            'fallback_img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Mansaf.jpg/800px-Mansaf.jpg',
            'time' => '10m ago',
            'status' => 'Arriving'
        ],
        (object)[
            'id' => '#ORD-002',
            'guest' => 'Sarah M.',
            'deal' => 'Falafel Platter',
            'fallback_img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Falafel_02.jpg/800px-Falafel_02.jpg',
            'time' => '25m ago',
            'status' => 'Seated'
        ],
        (object)[
            'id' => '#ORD-003',
            'guest' => 'Ahmad R.',
            'deal' => 'Knafeh',
            'fallback_img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Kanafeh.jpg/800px-Kanafeh.jpg',
            'time' => '1h ago',
            'status' => 'Completed'
        ],
    ];
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="theme-restaurant flex h-screen w-full bg-[#120a07] text-[#f5ebd9] font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #F4A261; --dynamic-glow: rgba(244, 162, 97, 0.4);"
     x-data="restaurantDashboard()"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#1a0f0a] border-r border-[#2e1c12] flex-shrink-0 hidden md:flex flex-col z-[60] transition-all duration-300 shadow-[4px_0_30px_rgba(0,0,0,0.8)]"
           :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">

        <div class="p-6 border-b border-[#2e1c12] flex justify-between items-center bg-gradient-to-b from-[#F4A261]/10 to-transparent">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <div class="p-2 bg-gradient-to-br from-[#F4A261] to-[#E76F51] rounded-xl shadow-[0_0_20px_var(--dynamic-glow)] transform group-hover:rotate-12 transition-transform duration-300">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                </div>
                <div>
                    <span class="block text-2xl font-black font-serif text-transparent bg-clip-text bg-gradient-to-r from-[#F4A261] to-[#E76F51] tracking-wider">Wayn Food</span>
                    <span class="block text-xs text-[#F4A261] font-bold uppercase tracking-widest">Kitchen Partner</span>
                </div>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-[#F4A261] bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-5 space-y-3 overflow-y-auto">
            <button @click="activeTab = 'overview'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'overview' ? 'bg-[#F4A261]/10 border-[#F4A261]/30 text-[#F4A261] shadow-[0_0_15px_var(--dynamic-glow)]' : 'text-gray-400 hover:bg-[#2e1c12]/50 hover:text-white'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span x-text="language === 'ar' ? 'نظرة عامة' : 'Analytics'"></span>
            </button>

            <button @click="activeTab = 'live_orders'"
                    class="w-full flex items-center justify-between p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'live_orders' ? 'bg-[#F4A261]/10 border-[#F4A261]/30 text-[#F4A261] shadow-[0_0_15px_var(--dynamic-glow)]' : 'text-gray-400 hover:bg-[#2e1c12]/50 hover:text-white'">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                    <span x-text="language === 'ar' ? 'الطلبات الحية' : 'Live Orders'"></span>
                </div>
                <span class="bg-red-500 text-white text-xs font-black px-2 py-0.5 rounded-full animate-pulse">LIVE</span>
            </button>
        </nav>

        <div class="p-6 border-t border-[#2e1c12] space-y-3">
            <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#2e1c12] text-gray-400 hover:text-white hover:border-[#F4A261] transition-all no-underline font-bold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span x-text="language === 'ar' ? 'العودة للموقع' : 'Back to Website'"></span>
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

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="h-24 bg-[#120a07]/90 backdrop-blur-xl border-b border-[#2e1c12] flex items-center justify-between px-6 lg:px-10 z-50 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-400 hover:text-[#F4A261] rounded-lg cursor-pointer bg-transparent border-none">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'يا هلا بالشيف، ' : 'Welcome, Chef '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F4A261] to-[#E76F51]">{{ Auth::user()->name ?? 'Partner' }}</span> 👨‍🍳
                 </h2>
             </div>
             <div class="flex items-center gap-6">
                <button @click="toggleLang()" class="w-12 h-12 rounded-2xl border border-[#2e1c12] bg-[#1a0f0a] hover:border-[#F4A261] text-sm font-bold text-gray-300 cursor-pointer transition-all shadow-inner">
                    <span x-show="language === 'en'" class="font-arabic text-lg">ع</span>
                    <span x-show="language === 'ar'" class="text-xs">EN</span>
                </button>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative bg-transparent z-10">
            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="bg-[#1a0f0a] border border-[#2e1c12] p-8 rounded-[2rem] group hover:border-[#F4A261]/50 transition-all shadow-lg">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Profile Views</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#F4A261] transition-colors">{{ $profileViews }}</h3>
                    </div>
                    <div class="bg-[#1a0f0a] border border-[#2e1c12] p-8 rounded-[2rem] group hover:border-[#F4A261]/50 transition-all shadow-lg">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Menu Scans</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#F4A261] transition-colors">{{ $menuScans }}</h3>
                    </div>
                    <div class="bg-[#1a0f0a] border border-[#2e1c12] p-8 rounded-[2rem] group hover:border-[#F4A261]/50 transition-all shadow-lg">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Active Deals</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#F4A261] transition-colors">{{ $activeCount }}</h3>
                    </div>
                    <div class="bg-gradient-to-br from-[#F4A261] to-[#E76F51] p-8 rounded-[2rem] text-black shadow-lg">
                        <p class="font-black uppercase text-xs tracking-widest mb-2">Total Saved</p>
                        <h3 class="text-4xl font-black">{{ $totalSaved }} JOD</h3>
                    </div>
                </div>

                <div class="bg-[#1a0f0a] border border-[#2e1c12] rounded-[2.5rem] p-8 shadow-2xl">
                    <h3 class="text-2xl font-black text-white mb-8">Recent Activity</h3>
                    <div class="space-y-6">
                         @foreach($liveOrders as $ord)
                            @if($ord->status === 'Completed')
                            <div class="flex items-center gap-6 p-4 rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 transition-colors">
                                <div class="w-14 h-14 rounded-xl relative overflow-hidden bg-[#2e1c12]">
                                    <img src="{{ $ord->fallback_img }}" alt="{{ $ord->deal }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <p class="text-white font-bold">{{ $ord->guest }} enjoyed <span class="text-[#F4A261]">{{ $ord->deal }}</span></p>
                                    <p class="text-gray-500 text-sm">{{ $ord->time }}</p>
                                </div>
                            </div>
                            @endif
                         @endforeach
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'live_orders'" x-transition x-cloak>
                 <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2">Live Flash Orders</h2>
                    <p class="text-gray-400 text-lg">Real-time tracker for guests arriving for your flash deals.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                     @foreach($liveOrders as $ord)
                        @if($ord->status !== 'Completed')
                        <div class="bg-[#1a0f0a] border border-[#2e1c12] rounded-[2.5rem] overflow-hidden group hover:border-[#F4A261]/50 transition-all flex flex-col shadow-2xl">
                            <div class="h-48 relative bg-[#2e1c12]">
                                <img src="{{ $ord->fallback_img }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000" alt="{{ $ord->deal }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1a0f0a] via-transparent to-transparent"></div>
                                <div class="absolute top-6 left-6 px-4 py-2 bg-[#F4A261] text-black font-black rounded-xl text-xs uppercase shadow-md">
                                    {{ $ord->status }}
                                </div>
                            </div>
                            <div class="p-8">
                                <h3 class="text-3xl font-black text-white mb-2 group-hover:text-[#F4A261] transition-colors">{{ $ord->deal }}</h3>
                                <p class="text-gray-400 font-bold mb-6 italic">Guest: {{ $ord->guest }}</p>
                                <button @click="showToast('Order Updated!', 'bg-[#F4A261] text-black border-none')" class="w-full py-4 bg-white/5 hover:bg-[#F4A261] border border-white/10 hover:border-transparent text-white hover:text-black font-black rounded-2xl transition-all cursor-pointer shadow-lg">MARK AS SEATED</button>
                            </div>
                        </div>
                        @endif
                     @endforeach
                </div>
            </div>
        </main>
    </div>

    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-[9999] flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function restaurantDashboard() {
        return {
            language: localStorage.getItem('wayn_lang') || 'ar',
            activeTab: 'overview',
            sidebarOpen: false,

            init() {
                this.$watch('language', val => {
                    localStorage.setItem('wayn_lang', val);
                    document.documentElement.dir = val === 'ar' ? 'rtl' : 'ltr';
                });
            },

            toggleLang() {
                this.language = this.language === 'ar' ? 'en' : 'ar';
            },

            showToast(message, colorClass = 'bg-[#1a0f0a] border-[#F4A261]') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `${colorClass} text-white px-8 py-5 rounded-[2rem] shadow-2xl font-black flex items-center gap-4 transform translate-y-10 opacity-0 transition-all duration-500 border pointer-events-auto`;
                toast.innerHTML = `<span class='text-2xl font-serif text-current'>✦</span> <span class='text-lg'>${message}</span>`;
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
