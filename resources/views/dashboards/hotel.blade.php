@php
    // Guest Requests
    $guestRequests = \App\Models\GuestRequest::where('user_id', auth()->id())->latest()->get();

    // Stats
    $occupancy = 82;
    $checkins = 24;
    $checkouts = 12;
    $pendingCount = $guestRequests->where('status', 'Pending')->count();

    // Mock Rooms
    $rooms = [];
    for($i=101; $i<=106; $i++) {
        $status = ['Available', 'Occupied', 'Cleaning'][rand(0,2)];
        $rooms[] = (object)['number' => $i, 'status' => $status, 'type' => 'Deluxe'];
    }
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="theme-hotel flex h-screen w-full bg-[#070b14] text-[#e0e6ed] font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #457B9D; --dynamic-glow: rgba(69, 123, 157, 0.4);"
     x-data="hotelDashboard()"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#0c1421] border-r border-[#1a273b] flex-shrink-0 hidden md:flex flex-col z-40 transition-all duration-300 shadow-[4px_0_30px_rgba(0,0,0,0.8)]"
           :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">

        <div class="p-6 border-b border-[#1a273b] flex justify-between items-center bg-gradient-to-b from-[#457B9D]/10 to-transparent">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <div class="p-2 bg-gradient-to-br from-[#457B9D] to-[#1D3557] rounded-xl shadow-[0_0_20px_var(--dynamic-glow)] transform group-hover:rotate-12 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <span class="block text-2xl font-black font-serif text-white tracking-wider">Wayn Hotel</span>
                    <span class="block text-xs text-[#A8DADC] font-bold uppercase tracking-widest">Resort Master</span>
                </div>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-[#457B9D] bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-5 space-y-3 overflow-y-auto">
            <button @click="activeTab = 'overview'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'overview' ? 'bg-[#457B9D]/10 border-[#457B9D]/30 text-[#A8DADC] shadow-2xl' : 'text-gray-400 hover:bg-[#121d2e] hover:text-white'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path></svg>
                <span x-text="language === 'ar' ? 'الاستقبال' : 'Front Desk'"></span>
            </button>

            <button @click="activeTab = 'rooms'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'rooms' ? 'bg-[#457B9D]/10 border-[#457B9D]/30 text-[#A8DADC] shadow-2xl' : 'text-gray-400 hover:bg-[#121d2e] hover:text-white'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span x-text="language === 'ar' ? 'إدارة الغرف' : 'Room Map'"></span>
            </button>
        </nav>

        <div class="p-6 border-t border-[#1a273b] space-y-3">
    <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#1a273b] text-gray-400 hover:text-white hover:border-[#457B9D] transition-all no-underline font-bold">
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
        <header class="h-24 bg-[#0c1421]/90 backdrop-blur-xl border-b border-[#1a273b] flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-400 hover:text-[#457B9D] rounded-lg cursor-pointer bg-transparent border-none">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'أهلاً بك، ' : 'Welcome, '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#457B9D] to-[#A8DADC]">{{ Auth::user()->name }}</span> 🛎️
                 </h2>
             </div>
             <div class="flex items-center gap-6">
                <button @click="toggleLang()" class="w-12 h-12 rounded-2xl border border-[#1a273b] bg-[#121d2e] hover:border-[#457B9D] text-sm font-bold text-[#A8DADC] cursor-pointer transition-all">
                    <span x-text="language === 'en' ? 'ع' : 'EN'"></span>
                </button>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative bg-transparent">
            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="bg-[#0c1421] border border-[#1a273b] p-8 rounded-[2rem] group hover:border-[#457B9D]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Occupancy</p>
                        <h3 class="text-5xl font-black text-[#A8DADC] group-hover:text-white transition-colors">{{ $occupancy }}%</h3>
                    </div>
                    <div class="bg-[#0c1421] border border-[#1a273b] p-8 rounded-[2rem] group hover:border-[#457B9D]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Check-ins</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#457B9D] transition-colors">{{ $checkins }}</h3>
                    </div>
                    <div class="bg-[#0c1421] border border-[#1a273b] p-8 rounded-[2rem] group hover:border-[#457B9D]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Requests</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#457B9D] transition-colors">{{ $pendingCount }}</h3>
                    </div>
                    <div class="bg-gradient-to-br from-[#1D3557] to-[#457B9D] p-8 rounded-[2rem] text-white">
                        <p class="font-black uppercase text-xs tracking-widest mb-2">Resort Status</p>
                        <h3 class="text-4xl font-black">ELITE</h3>
                    </div>
                </div>

                <div class="bg-[#0c1421] border border-[#1a273b] rounded-[2.5rem] overflow-hidden" x-wiki-image="'Dead Sea Marriott Resort & Spa'">
                    <div class="h-96 relative">
                        <img src="" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0c1421] via-transparent to-transparent"></div>
                        <div class="absolute bottom-10 left-10">
                            <h3 class="text-4xl font-black text-white mb-2">Resort Overview</h3>
                            <p class="text-gray-300">Live view of the property and guest satisfaction metrics.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'rooms'" x-transition x-cloak>
                 <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2">Room Inventory</h2>
                    <p class="text-gray-400 text-lg">Manage room availability and cleaning schedules.</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @foreach($rooms as $room)
                    <div class="bg-[#0c1421] border border-[#1a273b] p-6 rounded-[2rem] text-center group hover:border-[#457B9D] transition-all cursor-pointer">
                        <p class="text-3xl font-black text-white mb-1">{{ $room->number }}</p>
                        <p class="text-xs text-gray-500 font-black mb-4">{{ $room->type }}</p>
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase border border-current {{ $room->status === 'Available' ? 'text-emerald-500 bg-emerald-500/10' : ($room->status === 'Occupied' ? 'text-red-500 bg-red-500/10' : 'text-yellow-500 bg-yellow-500/10') }}">
                            {{ $room->status }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-50 flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function hotelDashboard() {
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

            toggleLang() { this.language = this.language === 'ar' ? 'en' : 'ar'; },

            showToast(message, colorClass = 'bg-[#0c1421] border-[#457B9D]') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `${colorClass} text-white px-8 py-5 rounded-[2rem] shadow-2xl font-black flex items-center gap-4 transform translate-y-10 opacity-0 transition-all duration-500 border z-[100] backdrop-blur-xl pointer-events-auto`;
                toast.innerHTML = `<span class='text-2xl font-serif'>✦</span> <span class='text-lg'>${message}</span>`;
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
