@extends('layouts.dashboard')

@section('sidebar_links')
    <a href="#" @click.prevent="activeTab = 'overview'" class="nav-link" :class="{ 'active': activeTab === 'overview' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        <span class="en-text">Overview</span>
        <span class="ar-text">نظرة عامة</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'approvals'" class="nav-link" :class="{ 'active': activeTab === 'approvals' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="en-text">Approvals</span>
        <span class="ar-text">الموافقات</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'users'" class="nav-link" :class="{ 'active': activeTab === 'users' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <span class="en-text">Users</span>
        <span class="ar-text">المستخدمين</span>
    </a>
@endsection

@section('content')
<div x-data="{ activeTab: 'overview' }">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold font-serif text-white mb-2">
            <span class="en-text">Admin Command Center</span>
            <span class="ar-text">مركز تحكم الإدارة</span>
        </h1>
        <p class="text-gray-400">
            <span class="en-text">Manage the Wayn? ecosystem, approve authentic content, and monitor operations.</span>
            <span class="ar-text">إدارة نظام وين؟، الموافقة على المحتوى الأصيل، ومراقبة العمليات.</span>
        </p>
    </div>

    <!-- Overview Tab -->
    <div x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        <div class="stats-bar mb-10">
            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Total Users</span>
                    <span class="ar-text">إجمالي المستخدمين</span>
                </div>
                <div class="text-3xl font-bold text-white mb-2">12,450</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    <span>12% <span class="en-text">vs last month</span><span class="ar-text">عن الشهر الماضي</span></span>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Active Itineraries</span>
                    <span class="ar-text">مسارات نشطة</span>
                </div>
                <div class="text-3xl font-bold text-white mb-2">843</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    <span>5% <span class="en-text">vs last month</span><span class="ar-text">عن الشهر الماضي</span></span>
                </div>
            </div>

            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Platform Revenue (JOD)</span>
                    <span class="ar-text">أرباح المنصة (دينار)</span>
                </div>
                <div class="text-3xl font-bold text-amber-500 mb-2">4,290 JD</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    <span>18% <span class="en-text">vs last month</span><span class="ar-text">عن الشهر الماضي</span></span>
                </div>
            </div>

            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Pending Approvals</span>
                    <span class="ar-text">بانتظار الموافقة</span>
                </div>
                <div class="text-3xl font-bold text-red-500 mb-2">24</div>
                <div class="text-red-400 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <span><span class="en-text">Action required</span><span class="ar-text">إجراء مطلوب</span></span>
                </div>
            </div>
        </div>

        <div class="solid-panel p-6">
            <h3 class="text-xl font-bold text-white mb-4">
                <span class="en-text">Recent Activity</span>
                <span class="ar-text">النشاط الأخير</span>
            </h3>
            <div class="text-gray-400 text-center py-10">
                <span class="en-text">Activity graph rendering...</span>
                <span class="ar-text">جاري تحميل الرسم البياني...</span>
            </div>
        </div>
    </div>

    <!-- Approvals Tab -->
    <div x-show="activeTab === 'approvals'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="solid-panel overflow-hidden">
            <div class="px-6 py-4 border-b border-white/10 flex justify-between items-center">
                <h3 class="text-lg font-bold text-white">
                    <span class="en-text">Hidden Gems Submissions</span>
                    <span class="ar-text">طلبات الأماكن المخفية</span>
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th><span class="en-text">Place Name</span><span class="ar-text">اسم المكان</span></th>
                            <th><span class="en-text">Submitted By</span><span class="ar-text">مقدم الطلب</span></th>
                            <th><span class="en-text">Date</span><span class="ar-text">التاريخ</span></th>
                            <th><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                            <th><span class="en-text">Action</span><span class="ar-text">إجراء</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="font-medium text-white">Wadi Bin Hammad Secret Trail</td>
                            <td class="text-gray-300">Ahmad Local</td>
                            <td class="text-gray-400">Today, 10:30 AM</td>
                            <td><span class="px-2 py-1 rounded-full bg-amber-500/20 text-amber-500 text-xs font-bold uppercase tracking-wider">Pending</span></td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold rounded transition-colors shadow-[0_0_10px_rgba(52,211,153,0.3)] hover:shadow-[0_0_15px_rgba(52,211,153,0.5)]">
                                        <span class="en-text">Approve</span><span class="ar-text">قبول</span>
                                    </button>
                                    <button class="px-3 py-1 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded transition-colors">
                                        <span class="en-text">Reject</span><span class="ar-text">رفض</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="font-medium text-white">Old Salt Viewpoint</td>
                            <td class="text-gray-300">Omar K.</td>
                            <td class="text-gray-400">Yesterday</td>
                            <td><span class="px-2 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider">Approved</span></td>
                            <td>
                                <button class="text-gray-400 hover:text-white underline text-xs">
                                    <span class="en-text">View</span><span class="ar-text">عرض</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Users Tab -->
    <div x-show="activeTab === 'users'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Partner Card -->
            <div class="solid-panel p-6 flex flex-col items-center text-center">
                <div class="w-20 h-20 rounded-full bg-gray-800 border-2 border-amber-500 flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h4 class="text-lg font-bold text-white">Amman Rotana</h4>
                <div class="text-sm text-gray-400 mb-4">Hotel Partner</div>
                <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    Verified
                </span>
                <button class="w-full py-2 border border-white/10 hover:bg-white/5 rounded-lg text-sm font-medium transition-colors">
                    <span class="en-text">Manage Access</span><span class="ar-text">إدارة الصلاحيات</span>
                </button>
            </div>
            
            <!-- Partner Card -->
            <div class="solid-panel p-6 flex flex-col items-center text-center">
                <div class="w-20 h-20 rounded-full bg-gray-800 border-2 border-amber-500 flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z"></path></svg>
                </div>
                <h4 class="text-lg font-bold text-white">Hashem Restaurant</h4>
                <div class="text-sm text-gray-400 mb-4">Restaurant Partner</div>
                <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    Verified
                </span>
                <button class="w-full py-2 border border-white/10 hover:bg-white/5 rounded-lg text-sm font-medium transition-colors">
                    <span class="en-text">Manage Access</span><span class="ar-text">إدارة الصلاحيات</span>
                </button>
            </div>
        </div>
    </div>

</div>
@endsection
