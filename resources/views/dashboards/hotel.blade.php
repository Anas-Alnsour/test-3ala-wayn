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
<div x-data="{ activeTab: 'overview' }">

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
    <div x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        <div class="stats-bar mb-8">
            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Current Occupancy</span>
                    <span class="ar-text">نسبة الإشغال</span>
                </div>
                <div class="text-3xl font-bold text-white mb-2">85%</div>
                <div class="w-full bg-gray-700 rounded-full h-2.5 mt-2">
                    <div class="bg-amber-500 h-2.5 rounded-full" style="width: 85%"></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Today's Check-ins</span>
                    <span class="ar-text">وصول اليوم</span>
                </div>
                <div class="text-3xl font-bold text-white mb-2">42</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>28 Completed</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Pending Requests</span>
                    <span class="ar-text">طلبات قيد الانتظار</span>
                </div>
                <div class="text-3xl font-bold text-red-500 mb-2">7</div>
                <div class="text-red-400 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Requires attention</span>
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
    <div x-show="activeTab === 'guest_requests'" style="display: none;" x-transition.opacity.duration.300ms>
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
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="font-bold text-amber-500">412</td>
                            <td class="text-white">John Smith</td>
                            <td class="text-gray-300">Room Service (Dinner)</td>
                            <td class="text-red-400 font-medium">5 mins ago</td>
                            <td><span class="px-2 py-1 rounded-full bg-red-500/20 text-red-500 text-xs font-bold uppercase tracking-wider">Pending</span></td>
                            <td>
                                <select class="bg-gray-800 border border-white/10 text-white text-xs rounded px-2 py-1 focus:outline-none focus:border-amber-500">
                                    <option>Mark In Progress</option>
                                    <option>Mark Resolved</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="font-bold text-amber-500">205</td>
                            <td class="text-white">Fatima Al-Sayed</td>
                            <td class="text-gray-300">Late Checkout Request</td>
                            <td class="text-gray-400 font-medium">15 mins ago</td>
                            <td><span class="px-2 py-1 rounded-full bg-amber-500/20 text-amber-500 text-xs font-bold uppercase tracking-wider">In Progress</span></td>
                            <td>
                                <select class="bg-gray-800 border border-white/10 text-white text-xs rounded px-2 py-1 focus:outline-none focus:border-amber-500">
                                    <option>Mark Resolved</option>
                                    <option>Revert to Pending</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors opacity-50">
                            <td class="font-bold text-amber-500">510</td>
                            <td class="text-white">David Chen</td>
                            <td class="text-gray-300">Extra Towels</td>
                            <td class="text-gray-500 font-medium">1 hour ago</td>
                            <td><span class="px-2 py-1 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold uppercase tracking-wider">Resolved</span></td>
                            <td>
                                <span class="text-xs text-gray-500">Done</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
