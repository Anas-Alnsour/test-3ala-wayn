@php
    $user = Auth::user();

    // Stats
    $stats = (object)[
        'total_tours' => 48,
        'rating' => 4.9,
        'earnings' => 1420,
        'monthly_goal' => 2000,
        'upcoming_count' => 3
    ];

    // Upcoming Tours with Wiki titles for trails
    $upcomingTours = [
        (object)[
            'id' => 1,
            'tourist_name' => 'Michael Smith',
            'tourist_country' => '🇺🇸 USA',
            'route_name' => 'Wadi Mujib Siq Trail',
            'wiki_title' => 'Wadi Mujib',
            'date' => 'Oct 29',
            'time' => '08:00 AM',
            'status' => 'confirmed',
        ],
        (object)[
            'id' => 2,
            'tourist_name' => 'Elena Rossi',
            'tourist_country' => '🇮🇹 Italy',
            'route_name' => 'Dana Biosphere Hike',
            'wiki_title' => 'Dana Biosphere Reserve',
            'date' => 'Nov 02',
            'time' => '06:00 AM',
            'status' => 'pending',
        ],
    ];

    $payouts = [
        (object)['id'=>'TRX-9821', 'amount' => '150 JOD', 'date' => 'Oct 12, 2025', 'status' => 'Paid'],
        (object)['id'=>'TRX-9823', 'amount' => '210 JOD', 'date' => 'Pending', 'status' => 'Processing'],
    ];
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="theme-assistant flex h-screen w-full bg-[#0d0a09] text-[#f5f0e6] font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #E76F51; --dynamic-glow: rgba(231, 111, 81, 0.4);"
     x-data="assistantDashboard()"
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
                    <span class="block text-xs text-[#F4A261] font-bold uppercase tracking-widest">Captain</span>
                </div>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-[#E76F51] bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-5 space-y-3 overflow-y-auto">
            <button @click="activeTab = 'tours'"
                    class="w-full flex items-center justify-between p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'tours' ? 'bg-[#E76F51]/10 border-[#E76F51]/30 text-[#E76F51] shadow-2xl' : 'text-gray-400 hover:bg-[#1f1815] hover:text-white'">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    <span x-text="language === 'ar' ? 'رحلاتي' : 'Tours'"></span>
                </div>
                <span class="bg-[#E76F51] text-black text-xs font-black px-2 py-0.5 rounded-full">{{ count($upcomingTours) }}</span>
            </button>

            <button @click="activeTab = 'financials'"
                    class="w-full flex items-center gap-4 p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'financials' ? 'bg-[#E76F51]/10 border-[#E76F51]/30 text-[#E76F51] shadow-2xl' : 'text-gray-400 hover:bg-[#1f1815] hover:text-white'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span x-text="language === 'ar' ? 'المحفظة' : 'Earnings'"></span>
            </button>
        </nav>

        <div class="p-6 border-t border-[#2d221e] space-y-3">
    <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#2d221e] text-gray-400 hover:text-white hover:border-[#E76F51] transition-all no-underline font-bold">
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
        <header class="h-24 bg-[#120e0c]/90 backdrop-blur-xl border-b border-[#2d221e] flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-400 hover:text-[#E76F51] rounded-lg cursor-pointer bg-transparent border-none">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'يا هلا بالكابتن، ' : 'Welcome, Captain '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#E76F51] to-[#F4A261]">{{ Auth::user()->name }}</span> 🧭
                 </h2>
             </div>
             <div class="flex items-center gap-6">
                <button @click="toggleLang()" class="w-12 h-12 rounded-2xl border border-[#2d221e] bg-[#1a1311] hover:border-[#E76F51] text-sm font-bold text-gray-200 cursor-pointer transition-all">
                    <span x-text="language === 'en' ? 'ع' : 'EN'"></span>
                </button>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative bg-transparent">
            <div x-show="activeTab === 'tours'" x-transition x-cloak>
                 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="bg-[#16110f] border border-[#2d221e] p-8 rounded-[2rem] group hover:border-[#E76F51]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Total Tours</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#E76F51] transition-colors">{{ $stats->total_tours }}</h3>
                    </div>
                    <div class="bg-[#16110f] border border-[#2d221e] p-8 rounded-[2rem] group hover:border-[#E76F51]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Rating</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#E76F51] transition-colors">{{ $stats->rating }}</h3>
                    </div>
                    <div class="bg-[#16110f] border border-[#2d221e] p-8 rounded-[2rem] group hover:border-[#E76F51]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Upcoming</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#E76F51] transition-colors">{{ $stats->upcoming_count }}</h3>
                    </div>
                    <div class="bg-gradient-to-br from-[#E76F51] to-[#F4A261] p-8 rounded-[2rem] text-black">
                        <p class="font-black uppercase text-xs tracking-widest mb-2">Monthly Earnings</p>
                        <h3 class="text-4xl font-black">{{ $stats->earnings }} JOD</h3>
                    </div>
                </div>

                <div class="space-y-8">
                     @foreach($upcomingTours as $tour)
                    <div class="bg-[#16110f] border border-[#2d221e] rounded-[2.5rem] overflow-hidden group hover:border-[#E76F51]/50 transition-all flex flex-col lg:flex-row">
                        <div class="lg:w-80 h-64 lg:h-auto relative" x-wiki-image="'{{ $tour->wiki_title }}'">
                            <img src="" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000">
                            <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-[#16110f] via-transparent to-transparent"></div>
                        </div>
                        <div class="flex-1 p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-3 py-1 bg-[#E76F51] text-black text-[10px] font-black uppercase rounded-lg">{{ $tour->status }}</span>
                                <span class="text-gray-500 text-sm font-bold">{{ $tour->date }} • {{ $tour->time }}</span>
                            </div>
                            <h3 class="text-4xl font-black text-white mb-4 group-hover:text-[#E76F51] transition-colors">{{ $tour->route_name }}</h3>
                            <p class="text-gray-400 mb-8 font-bold italic">Tourist: {{ $tour->tourist_name }} ({{ $tour->tourist_country }})</p>
                            <div class="flex gap-4">
                                <button @click="showToast('Tour Started! 🚀', 'bg-[#E76F51] text-black')" class="px-8 py-4 bg-white/5 hover:bg-[#E76F51] border border-white/10 hover:border-transparent text-white hover:text-black font-black rounded-2xl transition-all cursor-pointer">START MISSION</button>
                                <button class="p-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl transition-all cursor-pointer"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'financials'" x-transition x-cloak>
                 <div class="mb-10 text-center max-w-2xl mx-auto">
                    <h2 class="text-5xl font-black text-white mb-4">The Captain's Vault</h2>
                    <p class="text-gray-400 text-lg">Your hard-earned wealth from guiding explorers through Jordan's soul.</p>
                </div>

                <div class="bg-[#16110f] border border-[#2d221e] rounded-[3rem] p-8 lg:p-12 shadow-2xl">
                    <table class="w-full text-left rtl:text-right border-collapse">
                        <thead>
                            <tr class="text-gray-500 text-xs font-black uppercase tracking-widest border-b border-[#2d221e]">
                                <th class="pb-6">Transaction</th>
                                <th class="pb-6">Date</th>
                                <th class="pb-6">Amount</th>
                                <th class="pb-6">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#2d221e]">
                            @foreach($payouts as $pay)
                            <tr class="group hover:bg-white/5 transition-all">
                                <td class="py-8 font-black text-white text-lg">{{ $pay->id }}</td>
                                <td class="py-8 text-gray-400 font-bold">{{ $pay->date }}</td>
                                <td class="py-8 text-[#F4A261] font-black text-xl">{{ $pay->amount }}</td>
                                <td class="py-8">
                                    <span class="px-4 py-2 rounded-xl text-[10px] font-black uppercase border {{ $pay->status === 'Paid' ? 'border-emerald-500 text-emerald-500 bg-emerald-500/10' : 'border-yellow-500 text-yellow-500 bg-yellow-500/10 animate-pulse' }}">
                                        {{ $pay->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-50 flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function assistantDashboard() {
        return {
            language: localStorage.getItem('wayn_lang') || 'ar',
            activeTab: 'tours',
            sidebarOpen: false,

            init() {
                this.$watch('language', val => {
                    localStorage.setItem('wayn_lang', val);
                    document.documentElement.dir = val === 'ar' ? 'rtl' : 'ltr';
                });
            },

            toggleLang() { this.language = this.language === 'ar' ? 'en' : 'ar'; },

            showToast(message, colorClass = 'bg-[#16110f] border-[#E76F51]') {
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
