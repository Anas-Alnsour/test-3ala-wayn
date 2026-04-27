@php
    $guestRequests = \App\Models\GuestRequest::where('user_id', auth()->id())->latest()->get();
    
    // Simulated Stats
    $occupancy = rand(70, 98);
    $checkins = rand(10, 45);
@endphp
@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-gray-900" x-data="{ 
    activeTab: 'overview', 
    sidebarOpen: false,
    
    updateStatus(id, newStatus) {
        fetch(`/hotel/requests/${id}/status`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ status: newStatus })
        }).then(res => res.json()).then(data => {
            this.showToast(data.message, data.message);
            setTimeout(() => window.location.reload(), 1000);
        });
    }
}">

    <aside class="w-72 bg-[#1a1513] border-r border-gray-800 flex-shrink-0 hidden md:flex flex-col z-20" :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">
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
                    :class="activeTab === 'overview' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <span class="font-medium en-text">Operations</span>
                <span class="font-medium ar-text">العمليات</span>
            </button>
            <button @click="activeTab = 'guest_requests'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'guest_requests' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="font-medium en-text">Guest Requests</span>
                <span class="font-medium ar-text">طلبات النزلاء</span>
                @if($guestRequests->where('status', 'Pending')->count() > 0)
                    <span class="ml-auto rtl:mr-auto rtl:ml-0 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $guestRequests->where('status', 'Pending')->count() }}</span>
                @endif
            </button>
        </nav>
        
        <div class="p-4 border-t border-gray-800">
            <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-gray-800 transition-colors no-underline">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span class="font-medium">
                    <span class="en-text">Back to Explore</span>
                    <span class="ar-text">العودة للاستكشاف</span>
                </span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="h-20 bg-[#1a1513]/80 backdrop-blur-md border-b border-gray-800 flex items-center justify-between px-6 z-10 sticky top-0">
             <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
             </button>
             
             <div class="flex-1"></div>
             
             <div class="flex items-center gap-4 sm:gap-6">
                <!-- Language Toggle -->
                <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-600 bg-gray-800 hover:bg-gray-700 transition-colors text-sm font-bold text-gray-200 cursor-pointer">
                    <span class="en-text font-arabic">ع</span>
                    <span class="ar-text">EN</span>
                </button>

                <!-- Profile Dropdown -->
                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-transparent border-none p-0 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-dynamic border border-white/20 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ substr(Auth::user()->name ?? 'H', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'Hotel Manager' }}</div>
                            <div class="text-xs text-dynamic capitalize leading-tight">Partner</div>
                        </div>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-2 ltr:right-0 rtl:left-0 w-48 bg-gray-800 rounded-xl border border-gray-700 shadow-2xl py-2 z-50" x-transition.opacity style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full ltr:text-left rtl:text-right px-4 py-2 text-sm text-red-400 hover:bg-gray-700 transition-colors cursor-pointer bg-transparent border-none">
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
                    <span class="en-text">Live Operations Center</span>
                    <span class="ar-text">مركز العمليات المباشر</span>
                </h1>
                <p class="text-gray-400">
                    <span class="en-text">Monitor hotel occupancy and serve your guests instantly.</span>
                    <span class="ar-text">مراقبة الإشغال وخدمة النزلاء بشكل فوري.</span>
                </p>
            </div>

            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="stats-bar mb-10">
                    <div class="stat-card border-dynamic shadow-[0_0_15px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)] relative overflow-hidden">
                        <div class="absolute inset-0 bg-dynamic opacity-10"></div>
                        <div class="relative z-10">
                            <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                                <span class="en-text">Current Occupancy</span>
                                <span class="ar-text">نسبة الإشغال الحالية</span>
                            </div>
                            <div class="text-4xl font-bold text-dynamic mb-2">{{ $occupancy }}%</div>
                            <div class="w-full bg-[#111827] h-2 rounded-full overflow-hidden mt-4">
                                <div class="bg-dynamic h-full rounded-full" style="width: {{ $occupancy }}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Check-ins Today</span>
                            <span class="ar-text">تسجيل الدخول اليوم</span>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2">{{ $checkins }}</div>
                        <div class="text-sm text-gray-500">Expected arrivals</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Pending Requests</span>
                            <span class="ar-text">الطلبات المعلقة</span>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2">{{ $guestRequests->where('status', 'Pending')->count() }}</div>
                        <div class="text-sm {{ $guestRequests->where('status', 'Pending')->count() > 0 ? 'text-red-400' : 'text-emerald-400' }}">Requires immediate action</div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'guest_requests'" x-transition x-cloak>
                <div class="solid-panel overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-800 bg-[#1F2937] flex justify-between items-center">
                        <h3 class="text-lg font-bold text-white">
                            <span class="en-text">Live Guest Requests</span>
                            <span class="ar-text">طلبات النزلاء الحية</span>
                        </h3>
                        <div class="flex items-center gap-2 text-sm text-gray-400">
                            <span class="relative flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-dynamic opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-dynamic"></span>
                            </span>
                            Auto-syncing...
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="users-table">
                            <thead>
                                <tr>
                                    <th><span class="en-text">Room</span><span class="ar-text">الغرفة</span></th>
                                    <th><span class="en-text">Guest Name</span><span class="ar-text">اسم النزيل</span></th>
                                    <th><span class="en-text">Request Type</span><span class="ar-text">نوع الطلب</span></th>
                                    <th><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                                    <th><span class="en-text">Action</span><span class="ar-text">إجراء</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($guestRequests as $request)
                                <tr class="hover:bg-white/5 transition-colors {{ $request->status === 'Pending' ? 'bg-red-500/5' : '' }}">
                                    <td class="font-bold text-white text-lg">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                            {{ $request->room }}
                                        </div>
                                    </td>
                                    <td class="text-gray-300">{{ $request->guest_name }}</td>
                                    <td class="text-white font-medium">{{ $request->request_type }}</td>
                                    <td>
                                        @if($request->status === 'Pending')
                                            <span class="px-3 py-1 rounded-full bg-red-500/20 text-red-400 text-xs font-bold uppercase border border-red-500/30">Pending</span>
                                        @elseif($request->status === 'In Progress')
                                            <span class="px-3 py-1 rounded-full bg-dynamic/20 text-dynamic text-xs font-bold uppercase border border-dynamic/30 shadow-[0_0_10px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)]">In Progress</span>
                                        @else
                                            <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-bold uppercase border border-emerald-500/30">Resolved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <select class="glass-input-premium w-full text-sm bg-gray-900 border border-gray-700" @change="updateStatus({{ $request->id }}, $event.target.value)">
                                            <option value="Pending" {{ $request->status === 'Pending' ? 'selected' : '' }}>Pending / معلق</option>
                                            <option value="In Progress" {{ $request->status === 'In Progress' ? 'selected' : '' }}>In Progress / قيد التنفيذ</option>
                                            <option value="Resolved" {{ $request->status === 'Resolved' ? 'selected' : '' }}>Resolved / تم الإنجاز</option>
                                        </select>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-10 text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 mb-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span class="text-lg">No active guest requests. All caught up!</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
