@php
    // Fetch stats and real data safely
    $totalUsers = \App\Models\User::count();
    $totalAttractions = \App\Models\Attraction::count();
    $totalCities = \App\Models\City::count();

    // جلب الأماكن المعلقة مع علاقاتها لتجنب N+1 query
    $pendingApprovals = \App\Models\Attraction::with(['city', 'submitter'])
        ->where('status', 'pending')
        ->latest()
        ->get();

    $recentActivities = [
        ['type' => 'user', 'message' => 'New Explorer joined: Sarah', 'time' => '5m ago'],
        ['type' => 'gem', 'message' => 'Hidden waterfall submitted in Ajloun', 'time' => '12m ago'],
        ['type' => 'deal', 'message' => 'Hashem Resto added 20% discount', 'time' => '1h ago'],
    ];
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-[#0a0a0a] text-white font-sans overflow-hidden transition-colors duration-500"
     style="--dynamic-primary: #F5C518; --dynamic-glow: rgba(245, 197, 24, 0.4);"
     x-data="adminSuperDashboard()"
     :dir="language === 'ar' ? 'rtl' : 'ltr'">

    <aside class="w-72 bg-[#121212] border-r border-[#2a2a2a] flex-shrink-0 hidden md:flex flex-col z-[60] transition-all duration-300 shadow-[4px_0_30px_var(--dynamic-glow)]"
           :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">

        <div class="p-6 border-b border-[#2a2a2a] flex justify-between items-center bg-gradient-to-b from-[#1a1a1a] to-[#121212]">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <div class="p-2 bg-gradient-to-br from-[#F5C518] to-[#D4AF37] rounded-xl shadow-[0_0_20px_var(--dynamic-glow)] transform group-hover:rotate-12 transition-all duration-300">
                    <svg viewBox="0 0 100 100" fill="none" class="w-8 h-8 text-black">
                        <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" fill="currentColor"/>
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-black font-serif text-transparent bg-clip-text bg-gradient-to-r from-[#F5C518] to-[#FFF0B3] tracking-wider">Wayn Admin</span>
                    <span class="block text-xs text-[#D4AF37] font-bold uppercase tracking-widest">Supreme Command</span>
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
                    :class="activeTab === 'overview' ? 'bg-[#F5C518]/10 border-[#F5C518]/30 text-[#F5C518] shadow-[0_0_15px_var(--dynamic-glow)]' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span x-text="language === 'ar' ? 'لوحة القيادة' : 'Dashboard'"></span>
            </button>

            <button @click="activeTab = 'approvals'"
                    class="w-full flex items-center justify-between p-4 rounded-xl transition-all duration-300 font-bold border border-transparent cursor-pointer ltr:text-left rtl:text-right group"
                    :class="activeTab === 'approvals' ? 'bg-[#F5C518]/10 border-[#F5C518]/30 text-[#F5C518] shadow-[0_0_15px_var(--dynamic-glow)]' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white'">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span x-text="language === 'ar' ? 'موافقات الأماكن' : 'Approvals'"></span>
                </div>
                @if($pendingApprovals->count() > 0)
                <span class="bg-red-500 text-white text-xs font-black px-2 py-0.5 rounded-full animate-pulse">{{ $pendingApprovals->count() }}</span>
                @endif
            </button>
        </nav>

        <div class="p-6 border-t border-[#2a2a2a] space-y-3">
            <a href="/" class="flex items-center justify-center gap-3 px-4 py-3 rounded-xl border border-[#2a2a2a] text-gray-400 hover:text-white hover:border-[#F5C518] transition-all no-underline font-bold">
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
        <header class="h-24 bg-[#121212]/90 backdrop-blur-xl border-b border-[#2a2a2a] flex items-center justify-between px-6 lg:px-10 z-50 sticky top-0 shadow-lg">
             <div class="flex items-center gap-4">
                 <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-[#F5C518] cursor-pointer bg-transparent border-none">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 </button>
                 <h2 class="text-3xl font-black text-white hidden sm:block">
                     <span x-text="language === 'ar' ? 'مرحباً ادمن، ' : 'Welcome, '"></span>
                     <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F5C518] to-[#D4AF37]">{{ Auth::user()->name ?? 'Admin' }}</span> 👑
                 </h2>
             </div>
             <div class="flex items-center gap-6">
                <button @click="toggleLang()" class="w-12 h-12 rounded-2xl border border-[#2a2a2a] bg-[#1a1a1a] hover:border-[#F5C518] text-sm font-bold text-gray-200 cursor-pointer transition-all">
                    <span x-text="language === 'en' ? 'ع' : 'EN'"></span>
                </button>
             </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative bg-transparent z-10">
            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="bg-[#121212] border border-[#2a2a2a] p-8 rounded-[2rem] group hover:border-[#F5C518]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Total Users</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#F5C518] transition-colors">{{ $totalUsers }}</h3>
                    </div>
                    <div class="bg-[#121212] border border-[#2a2a2a] p-8 rounded-[2rem] group hover:border-[#F5C518]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Attractions</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#F5C518] transition-colors">{{ $totalAttractions }}</h3>
                    </div>
                    <div class="bg-[#121212] border border-[#2a2a2a] p-8 rounded-[2rem] group hover:border-[#F5C518]/50 transition-all">
                        <p class="text-gray-500 font-black uppercase text-xs tracking-widest mb-2">Governorates</p>
                        <h3 class="text-5xl font-black text-white group-hover:text-[#F5C518] transition-colors">{{ $totalCities }}</h3>
                    </div>
                    <div class="bg-gradient-to-br from-[#F5C518] to-[#D4AF37] p-8 rounded-[2rem] text-black">
                        <p class="font-black uppercase text-xs tracking-widest mb-2">System Status</p>
                        <h3 class="text-4xl font-black">OPERATIONAL</h3>
                    </div>
                </div>

                <div class="bg-[#121212] border border-[#2a2a2a] rounded-[2.5rem] p-8 shadow-2xl">
                    <h3 class="text-2xl font-black text-white mb-8">System Pulse</h3>
                    <div class="space-y-6">
                        @foreach($recentActivities as $activity)
                        <div class="flex items-center gap-6 p-4 rounded-2xl hover:bg-white/5 transition-colors group">
                            <div class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center text-[#F5C518]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-bold group-hover:text-[#F5C518] transition-colors">{{ $activity['message'] }}</p>
                                <p class="text-gray-500 text-sm">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'approvals'" x-transition x-cloak>
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white mb-2">Pending Approvals</h2>
                    <p class="text-gray-400 text-lg">Review submissions from locals before they go public.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @forelse($pendingApprovals as $gem)
                    <div id="gem-{{ $gem->id }}" class="bg-[#121212] border border-[#2a2a2a] rounded-[2.5rem] overflow-hidden flex flex-col hover:border-[#F5C518]/50 transition-all shadow-2xl group">

                        <div class="h-64 relative bg-[#1a1a1a]" x-wiki-image="'{{ $gem->wiki_title ?? $gem->city->wiki_title ?? 'Amman' }}'">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Amman_Citadel_Temple_of_Hercules.jpg/800px-Amman_Citadel_Temple_of_Hercules.jpg" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000" alt="Jordan Attraction">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#121212] via-transparent to-transparent"></div>
                            <div class="absolute top-6 left-6 px-4 py-2 bg-[#F5C518] text-black font-black rounded-xl text-xs uppercase shadow-md">
                                {{ $gem->city->name ?? 'Jordan' }}
                            </div>
                        </div>

                        <div class="p-8">
                            <h3 class="text-3xl font-black text-white mb-4 group-hover:text-[#F5C518] transition-colors">{{ $gem->name }}</h3>
                            <p class="text-gray-400 mb-8 leading-relaxed italic">"{{ $gem->description }}"</p>

                            <div class="flex items-center gap-4 mb-8">
                                <div class="w-10 h-10 rounded-full bg-white/10 border border-white/20 flex items-center justify-center font-bold text-[#F5C518]">
                                    {{ substr($gem->submitter?->name ?? 'W', 0, 1) }}
                                </div>
                                <p class="text-sm text-gray-500">Submitted by
                                    <span class="text-white font-bold">{{ $gem->submitter?->name ?? 'Wayn System' }}</span>
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <button @click="processApproval({{ $gem->id }}, 'approve')" class="flex-1 bg-emerald-600 hover:bg-emerald-500 text-white py-4 rounded-2xl font-black transition-all cursor-pointer border-none shadow-[0_0_15px_rgba(5,150,105,0.4)]">APPROVE</button>
                                <button @click="processApproval({{ $gem->id }}, 'reject')" class="flex-1 bg-white/5 hover:bg-red-600 text-white py-4 rounded-2xl font-black transition-all cursor-pointer border border-white/10 hover:border-transparent hover:shadow-[0_0_15px_rgba(220,38,38,0.4)]">REJECT</button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full p-20 text-center bg-[#121212] border border-dashed border-[#2a2a2a] rounded-[2.5rem]">
                        <svg class="w-20 h-20 text-gray-700 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-gray-400 font-black text-xl tracking-widest uppercase">The Throne is Silent. No pending tasks.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>

    <div class="fixed bottom-8 ltr:right-8 rtl:left-8 z-[9999] flex flex-col gap-4 pointer-events-none" id="toast-container"></div>
</div>

<script>
    function adminSuperDashboard() {
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

            processApproval(id, action) {
                const el = document.getElementById('gem-' + id);
                el.style.opacity = '0.5';
                el.style.pointerEvents = 'none';

                fetch(`/admin/approvals/${id}/${action}`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        'Content-Type': 'application/json'
                    }
                }).then(() => {
                    el.style.transform = 'scale(0.9) translateY(-20px)';
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 500);
                    this.showToast(action === 'approve' ? '✅ Action Approved' : '❌ Submission Rejected', 'bg-[#121212] border-[#F5C518] text-white');
                }).catch(err => {
                    console.error(err);
                    this.showToast('⚠️ Error processing request', 'bg-red-600 text-white border-none');
                    el.style.opacity = '1';
                    el.style.pointerEvents = 'auto';
                });
            },

            showToast(message, colorClass = 'bg-[#121212] border-[#F5C518]') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `${colorClass} text-white px-8 py-5 rounded-[2rem] shadow-2xl font-black flex items-center gap-4 transform translate-y-10 opacity-0 transition-all duration-500 border pointer-events-auto`;
                toast.innerHTML = `<span class='text-2xl font-serif text-[#F5C518]'>✦</span> <span class='text-lg'>${message}</span>`;
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
