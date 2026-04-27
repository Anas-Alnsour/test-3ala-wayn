@php
    $totalUsers = \App\Models\User::count();
    $totalAttractions = \App\Models\Attraction::count();
    $totalCities = \App\Models\City::count();
    
    $pendingApprovals = \App\Models\Attraction::with(['city', 'submitter'])->where('status', 'pending')->get();
    $allUsers = \App\Models\User::latest()->get();
@endphp
@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-gray-900" x-data="{ 
    activeTab: 'overview', 
    sidebarOpen: false,
    
    approveAttraction(id) {
        fetch(`/admin/approvals/${id}/approve`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            }
        }).then(res => res.json()).then(data => {
            this.showToast(data.message, data.message);
            document.getElementById('row-' + id).remove();
        });
    },
    
    rejectAttraction(id) {
        fetch(`/admin/approvals/${id}/reject`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            }
        }).then(res => res.json()).then(data => {
            this.showToast(data.message, data.message);
            document.getElementById('row-' + id).remove();
        });
    }
}">

    <!-- Sidebar -->
    <aside class="w-72 bg-[#1a1513] border-r border-gray-800 flex-shrink-0 hidden md:flex flex-col z-40 transition-transform" :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">
        <div class="p-6 border-b border-gray-800 flex justify-between items-center">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <svg viewBox="0 0 100 100" fill="none" class="w-8 h-8 transition-transform duration-500 group-hover:rotate-45">
                    <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" class="fill-dynamic"/>
                    <circle cx="50" cy="50" r="15" fill="#111827"/>
                    <circle cx="50" cy="50" r="5" class="fill-dynamic"/>
                </svg>
                <span class="text-xl font-bold font-serif text-white en-text tracking-wider">Wayn?</span>
                <span class="text-xl font-bold font-serif text-white ar-text tracking-wider">وين؟</span>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <button @click="activeTab = 'overview'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'overview' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-medium en-text">Overview</span>
                <span class="font-medium ar-text">نظرة عامة</span>
            </button>
            <button @click="activeTab = 'approvals'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'approvals' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium en-text">Approvals</span>
                <span class="font-medium ar-text">الموافقات</span>
            </button>
            <button @click="activeTab = 'users'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'users' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-medium en-text">Users</span>
                <span class="font-medium ar-text">المستخدمين</span>
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

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" 
         class="fixed inset-0 bg-black/60 z-30 md:hidden backdrop-blur-sm"
         x-transition.opacity
         @click="sidebarOpen = false" style="display: none;"></div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
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
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'Admin' }}</div>
                            <div class="text-xs text-dynamic capitalize leading-tight">Admin</div>
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
                    <span class="en-text">Admin Command Center</span>
                    <span class="ar-text">مركز تحكم الإدارة</span>
                </h1>
                <p class="text-gray-400">
                    <span class="en-text">Manage the Wayn? ecosystem and approve authentic content.</span>
                    <span class="ar-text">إدارة نظام وين؟ والموافقة على المحتوى الأصيل.</span>
                </p>
            </div>

            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="stats-bar mb-10">
                    <div class="stat-card border-dynamic shadow-[0_0_15px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)]">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Total Users</span>
                            <span class="ar-text">إجمالي المستخدمين</span>
                        </div>
                        <div class="text-4xl font-bold text-dynamic mb-2">{{ number_format($totalUsers) }}</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Total Attractions</span>
                            <span class="ar-text">المعالم السياحية</span>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2">{{ number_format($totalAttractions) }}</div>
                    </div>

                    <div class="stat-card">
                        <div class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">
                            <span class="en-text">Supported Cities</span>
                            <span class="ar-text">المدن المدعومة</span>
                        </div>
                        <div class="text-4xl font-bold text-white mb-2">{{ number_format($totalCities) }}</div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'approvals'" x-transition x-cloak>
                <div class="solid-panel overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-800 bg-[#1F2937]">
                        <h3 class="text-lg font-bold text-white">
                            <span class="en-text">Pending Approvals</span>
                            <span class="ar-text">بانتظار الموافقة</span>
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="users-table">
                            <thead>
                                <tr>
                                    <th><span class="en-text">Attraction Name</span><span class="ar-text">اسم المكان</span></th>
                                    <th><span class="en-text">City</span><span class="ar-text">المدينة</span></th>
                                    <th><span class="en-text">Submitted By</span><span class="ar-text">مقدم الطلب</span></th>
                                    <th><span class="en-text">Action</span><span class="ar-text">إجراء</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendingApprovals as $gem)
                                <tr id="row-{{ $gem->id }}" class="hover:bg-white/5 transition-colors">
                                    <td class="font-medium text-white">
                                        <span class="en-text">{{ $gem->name }}</span>
                                        <span class="ar-text">{{ $gem->name_ar ?? $gem->name }}</span>
                                    </td>
                                    <td class="text-gray-300">{{ $gem->city->name ?? 'N/A' }}</td>
                                    <td class="text-gray-400">{{ $gem->submitter->name ?? 'Unknown' }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <button @click="approveAttraction({{ $gem->id }})" class="px-3 py-1 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold rounded transition-colors shadow-[0_0_10px_rgba(52,211,153,0.3)] border-none cursor-pointer">
                                                <span class="en-text">Approve</span><span class="ar-text">قبول</span>
                                            </button>
                                            <button @click="rejectAttraction({{ $gem->id }})" class="px-3 py-1 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded transition-colors border-none cursor-pointer">
                                                <span class="en-text">Reject</span><span class="ar-text">رفض</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-gray-500">No pending approvals found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'users'" x-transition x-cloak>
                <div class="solid-panel overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-800 bg-[#1F2937]">
                        <h3 class="text-lg font-bold text-white">
                            <span class="en-text">Platform Users</span>
                            <span class="ar-text">مستخدمو المنصة</span>
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="users-table">
                            <thead>
                                <tr>
                                    <th><span class="en-text">Name</span><span class="ar-text">الاسم</span></th>
                                    <th><span class="en-text">Email</span><span class="ar-text">البريد الإلكتروني</span></th>
                                    <th><span class="en-text">Role</span><span class="ar-text">الدور</span></th>
                                    <th><span class="en-text">Joined</span><span class="ar-text">تاريخ الانضمام</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allUsers as $user)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="font-bold text-white">{{ $user->name }}</td>
                                    <td class="text-gray-300">{{ $user->email }}</td>
                                    <td>
                                        <span class="px-2 py-1 rounded bg-white/10 text-xs font-bold uppercase tracking-wider text-dynamic border border-white/5">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="text-gray-500 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
