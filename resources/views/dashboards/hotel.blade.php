@php
    $currentOccupancy = rand(70, 95);
    $todaysCheckins = rand(20, 60);
    $completedCheckins = round($todaysCheckins * (rand(50, 90) / 100));
    
    // Simulated guest requests
    $guestRequests = [
        (object)['room' => '412', 'guest' => 'John Smith', 'type' => 'Room Service (Dinner)', 'time' => '5 mins ago', 'status' => 'Pending'],
        (object)['room' => '205', 'guest' => 'Fatima Al-Sayed', 'type' => 'Late Checkout Request', 'time' => '15 mins ago', 'status' => 'In Progress'],
        (object)['room' => '510', 'guest' => 'David Chen', 'type' => 'Extra Towels', 'time' => '1 hour ago', 'status' => 'Resolved'],
        (object)['room' => '301', 'guest' => 'Amira Khalil', 'type' => 'Taxi Booking', 'time' => '2 hours ago', 'status' => 'Resolved'],
    ];
@endphp
@extends('layouts.dashboard')

@section('sidebar_links')
    <a href="#" @click.prevent="activeTab = 'overview'" class="nav-link" :class="{ 'active': activeTab === 'overview' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        <span class="en-text">Live Operations</span>
        <span class="ar-text">العمليات الحية</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'guest_requests'" class="nav-link" :class="{ 'active': activeTab === 'guest_requests' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        <span class="en-text">Guest Requests</span>
        <span class="ar-text">طلبات النزلاء</span>
    </a>
@endsection

@section('content')
<div x-data="{
    activeTab: 'overview',
    requests: {{ json_encode($guestRequests) }},
    get pendingCount() { return this.requests.filter(r => r.status === 'Pending').length; },
    changeStatus(index, newStatus) {
        if (!newStatus) return;
        this.requests[index].status = newStatus;
        if(newStatus === 'In Progress') {
            this.showToast('Request marked as In Progress', 'الطلب قيد التنفيذ');
        } else if(newStatus === 'Resolved') {
            this.showToast('Request Resolved', 'تم حل الطلب بنجاح');
        } else {
            this.showToast('Request reverted to Pending', 'عاد الطلب لقيد الانتظار');
        }
    }
}">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold font-serif text-white mb-2">
            <span class="en-text">Hotel Operations</span>
            <span class="ar-text">إدارة الفندق</span>
        </h1>
        <p class="text-gray-400">
            <span class="en-text">Manage live guest requests, occupancy, and daily operations.</span>
            <span class="ar-text">إدارة طلبات النزلاء الحية، نسبة الإشغال، والعمليات اليومية.</span>
        </p>
    </div>

    <!-- Overview Tab -->
    <div x-cloak x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        <div class="stats-bar mb-8">
            <div class="stat-card border-dynamic shadow-[0_0_15px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)]">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Current Occupancy</span>
                    <span class="ar-text">نسبة الإشغال</span>
                </div>
                <div class="text-3xl font-bold text-white mb-2">{{ $currentOccupancy }}%</div>
                <div class="w-full bg-gray-700 rounded-full h-2.5 mt-2 overflow-hidden">
                    <div class="bg-dynamic h-2.5 rounded-full transition-all duration-1000" style="width: {{ $currentOccupancy }}%"></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Today's Check-ins</span>
                    <span class="ar-text">وصول اليوم</span>
                </div>
                <div class="text-3xl font-bold text-white mb-2">{{ $todaysCheckins }}</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ $completedCheckins }} Completed</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Pending Requests</span>
                    <span class="ar-text">طلبات قيد الانتظار</span>
                </div>
                <div class="text-3xl font-bold text-red-500 mb-2" x-text="pendingCount"></div>
                <div class="text-red-400 text-sm flex items-center gap-1" x-show="pendingCount > 0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Requires attention</span>
                </div>
                <div class="text-emerald-500 text-sm flex items-center gap-1" x-show="pendingCount === 0" style="display:none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>All requests handled</span>
                </div>
            </div>
        </div>

        <div class="solid-panel p-6">
            <h3 class="text-xl font-bold text-white mb-4">
                <span class="en-text">Occupancy Chart placeholder</span>
                <span class="ar-text">مخطط الإشغال</span>
            </h3>
            <div class="h-48 border border-dashed border-gray-600 rounded-xl flex items-center justify-center text-gray-500 bg-gray-800/50">
                [ Chart Rendering Area ]
            </div>
        </div>
    </div>

    <!-- Guest Requests Tab -->
    <div x-cloak x-show="activeTab === 'guest_requests'" x-transition.opacity.duration.300ms>
        <div class="solid-panel overflow-hidden">
            <div class="px-6 py-4 border-b border-white/10 flex justify-between items-center bg-[#1F2937]">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></div>
                    <span class="en-text">Live Guest Requests</span>
                    <span class="ar-text">طلبات النزلاء المباشرة</span>
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th><span class="en-text">Room #</span><span class="ar-text">رقم الغرفة</span></th>
                            <th><span class="en-text">Guest Name</span><span class="ar-text">اسم النزيل</span></th>
                            <th><span class="en-text">Request Type</span><span class="ar-text">نوع الطلب</span></th>
                            <th><span class="en-text">Time</span><span class="ar-text">الوقت</span></th>
                            <th><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                            <th><span class="en-text">Action</span><span class="ar-text">إجراء</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(request, index) in requests" :key="index">
                            <tr class="hover:bg-white/5 transition-colors" :class="request.status === 'Resolved' ? 'opacity-50' : ''">
                                <td class="font-bold text-dynamic" x-text="request.room"></td>
                                <td class="text-white" x-text="request.guest"></td>
                                <td class="text-gray-300" x-text="request.type"></td>
                                <td :class="request.status === 'Pending' ? 'text-red-400 font-medium' : 'text-gray-400'" x-text="request.time"></td>
                                <td>
                                    <span x-show="request.status === 'Pending'" class="px-2 py-1 rounded-full bg-red-500/20 text-red-500 text-xs font-bold uppercase tracking-wider">Pending</span>
                                    <span x-show="request.status === 'In Progress'" class="px-2 py-1 rounded-full text-dynamic bg-dynamic/20 text-xs font-bold uppercase tracking-wider" style="display:none">In Progress</span>
                                    <span x-show="request.status === 'Resolved'" class="px-2 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider" style="display:none">Resolved</span>
                                </td>
                                <td>
                                    <select x-show="request.status === 'Pending'" @change="changeStatus(index, $event.target.value); $event.target.value = ''" class="bg-gray-800 border border-white/10 text-white text-xs rounded px-2 py-1 focus:outline-none focus:border-dynamic">
                                        <option value="">Actions...</option>
                                        <option value="In Progress">Mark In Progress</option>
                                        <option value="Resolved">Mark Resolved</option>
                                    </select>
                                    <select x-show="request.status === 'In Progress'" @change="changeStatus(index, $event.target.value); $event.target.value = ''" class="bg-gray-800 border border-white/10 text-white text-xs rounded px-2 py-1 focus:outline-none focus:border-dynamic" style="display:none">
                                        <option value="">Actions...</option>
                                        <option value="Resolved">Mark Resolved</option>
                                        <option value="Pending">Revert to Pending</option>
                                    </select>
                                    <span x-show="request.status === 'Resolved'" class="text-xs text-gray-500 font-bold" style="display:none">Done</span>
                                </td>
                            </tr>
                        </template>
                        <tr x-show="requests.length === 0" style="display:none">
                            <td colspan="6" class="text-center py-6 text-gray-500">No active requests.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
