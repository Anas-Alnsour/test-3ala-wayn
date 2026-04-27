@php
    $totalUsers = \App\Models\User::count();
    $activeItineraries = rand(500, 1000);
    $platformRevenue = number_format(rand(3000, 8000));
    
    $pendingApprovals = [
        (object)['name' => 'Wadi Bin Hammad Secret Trail', 'name_ar' => 'مسار وادي بن حماد السري', 'submitter' => 'Ahmad Local', 'date' => now()->format('M d, Y'), 'status' => 'Pending'],
        (object)['name' => 'Old Salt Viewpoint', 'name_ar' => 'مطل السلط القديم', 'submitter' => 'Omar K.', 'date' => now()->subDay()->format('M d, Y'), 'status' => 'Approved'],
        (object)['name' => 'Ajloun Forest Cabin', 'name_ar' => 'كوخ غابة عجلون', 'submitter' => 'Fatima S.', 'date' => now()->subDays(2)->format('M d, Y'), 'status' => 'Pending'],
    ];

    $recentUsers = \App\Models\User::latest()->take(6)->get();
@endphp
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
<div x-data="{
    activeTab: 'overview',
    pendingApprovals: {{ json_encode($pendingApprovals) }},
    get pendingCount() {
        return this.pendingApprovals.filter(g => g.status === 'Pending').length;
    },
    approveGem(index) {
        this.pendingApprovals[index].status = 'Approved';
        this.showToast('Submission Approved!', 'تم قبول الطلب بنجاح');
    },
    rejectGem(index) {
        this.pendingApprovals.splice(index, 1);
        this.showToast('Submission Rejected', 'تم رفض الطلب');
    }
}">

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
                <div class="text-3xl font-bold text-white mb-2">{{ number_format($totalUsers) }}</div>
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
                <div class="text-3xl font-bold text-white mb-2">{{ $activeItineraries }}</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    <span>5% <span class="en-text">vs last month</span><span class="ar-text">عن الشهر الماضي</span></span>
                </div>
            </div>

            <div class="stat-card border-dynamic shadow-[0_0_15px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)]">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Platform Revenue (JOD)</span>
                    <span class="ar-text">أرباح المنصة (دينار)</span>
                </div>
                <div class="text-3xl font-bold text-dynamic mb-2">{{ $platformRevenue }} JD</div>
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
                <div class="text-3xl font-bold text-red-500 mb-2" x-text="pendingCount"></div>
                <div class="text-red-400 text-sm flex items-center gap-1" x-show="pendingCount > 0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <span><span class="en-text">Action required</span><span class="ar-text">إجراء مطلوب</span></span>
                </div>
                <div class="text-emerald-500 text-sm flex items-center gap-1" x-show="pendingCount === 0" style="display:none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span><span class="en-text">All caught up!</span><span class="ar-text">تم إنجاز كل شيء!</span></span>
                </div>
            </div>
        </div>

        <div class="solid-panel p-6">
            <h3 class="text-xl font-bold text-white mb-4">
                <span class="en-text">Recent Activity</span>
                <span class="ar-text">النشاط الأخير</span>
            </h3>
            <div class="text-gray-400 text-center py-10 border border-dashed border-gray-700 rounded-xl bg-gray-800/30">
                <span class="en-text">Activity graph rendering...</span>
                <span class="ar-text">جاري تحميل الرسم البياني...</span>
            </div>
        </div>
    </div>

    <!-- Approvals Tab -->
    <div x-cloak x-show="activeTab === 'approvals'" x-transition.opacity.duration.300ms>
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
                        <template x-for="(gem, index) in pendingApprovals" :key="index">
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="font-medium text-white">
                                    <span class="en-text" x-text="gem.name"></span>
                                    <span class="ar-text" x-text="gem.name_ar"></span>
                                </td>
                                <td class="text-gray-300" x-text="gem.submitter"></td>
                                <td class="text-gray-400" x-text="gem.date"></td>
                                <td>
                                    <span x-show="gem.status === 'Pending'" class="px-2 py-1 rounded-full bg-amber-500/20 text-amber-500 text-xs font-bold uppercase tracking-wider">Pending</span>
                                    <span x-show="gem.status === 'Approved'" class="px-2 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider" style="display:none">Approved</span>
                                </td>
                                <td>
                                    <div x-show="gem.status === 'Pending'" class="flex gap-2">
                                        <button @click="approveGem(index)" class="px-3 py-1 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold rounded transition-colors shadow-[0_0_10px_rgba(52,211,153,0.3)] hover:shadow-[0_0_15px_rgba(52,211,153,0.5)]">
                                            <span class="en-text">Approve</span><span class="ar-text">قبول</span>
                                        </button>
                                        <button @click="rejectGem(index)" class="px-3 py-1 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded transition-colors">
                                            <span class="en-text">Reject</span><span class="ar-text">رفض</span>
                                        </button>
                                    </div>
                                    <button x-show="gem.status === 'Approved'" class="text-gray-400 hover:text-white underline text-xs" style="display:none">
                                        <span class="en-text">View</span><span class="ar-text">عرض</span>
                                    </button>
                                </td>
                            </tr>
                        </template>
                        <tr x-show="pendingApprovals.length === 0" style="display:none">
                            <td colspan="5" class="text-center py-6 text-gray-500">No submissions found.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Users Tab -->
    <div x-cloak x-show="activeTab === 'users'" x-transition.opacity.duration.300ms>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse($recentUsers as $user)
            <!-- User Card -->
            <div class="solid-panel p-6 flex flex-col items-center text-center hover:border-dynamic transition-colors">
                <div class="w-20 h-20 rounded-full bg-gray-800 border-2 border-dynamic flex items-center justify-center mb-4 overflow-hidden text-2xl font-bold text-white shadow-lg shadow-black/30">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <h4 class="text-lg font-bold text-white">{{ $user->name }}</h4>
                <div class="text-sm text-gray-400 mb-1">{{ $user->email }}</div>
                <div class="text-xs text-dynamic mb-4 font-bold uppercase tracking-wider">{{ $user->role ?? 'User' }}</div>
                <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    Registered
                </span>
                <button class="w-full py-2 border border-white/10 hover:bg-white/5 rounded-lg text-sm font-medium transition-colors">
                    <span class="en-text">View Details</span><span class="ar-text">التفاصيل</span>
                </button>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-400 py-10">No users found.</div>
            @endforelse
        </div>
    </div>

</div>
@endsection
