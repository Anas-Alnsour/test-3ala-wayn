@extends('layouts.dashboard')

@section('content')
<div class="admin-panel">
    <div class="admin-header-bar">
        <div>
            <h2 class="admin-title">
                <span class="en-text">Admin Command Center</span>
                <span class="ar-text">مركز تحكم الإدارة</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 5px;">
                <span class="en-text">Platform Overview & Moderation</span>
                <span class="ar-text">نظرة عامة على المنصة والإشراف</span>
            </p>
        </div>
        <span class="admin-badge">Super Admin</span>
    </div>

    <!-- Stats Bar -->
    <div class="stats-bar" style="border-top: none; background: transparent;">
        <div class="stat-item">
            <div class="stat-num">12,450</div>
            <div class="stat-label">
                <span class="en-text">Total Users</span>
                <span class="ar-text">إجمالي المستخدمين</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-num">842</div>
            <div class="stat-label">
                <span class="en-text">Active Trips</span>
                <span class="ar-text">الرحلات النشطة</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-num">JOD 45K</div>
            <div class="stat-label">
                <span class="en-text">Monthly Revenue</span>
                <span class="ar-text">العائد الشهري</span>
            </div>
        </div>
    </div>

    <div class="admin-body">
        <h3 style="margin-bottom: 20px; color: var(--secondary-accent);">
            <span class="en-text">Recent Activity</span>
            <span class="ar-text">أحدث النشاطات</span>
        </h3>
        
        <div class="table-wrapper" style="background: var(--bg-card); border-radius: 12px; border: 1px solid var(--glass-border); padding: 10px;">
            <table class="users-table">
                <thead>
                    <tr>
                        <th><span class="en-text">User / Provider</span><span class="ar-text">المستخدم / المزود</span></th>
                        <th><span class="en-text">Action</span><span class="ar-text">الحدث</span></th>
                        <th><span class="en-text">Time</span><span class="ar-text">الوقت</span></th>
                        <th><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="color: var(--text-main); font-weight: bold;">Petra Palace Hotel</td>
                        <td>Added a new room type (Deluxe Petra View)</td>
                        <td style="color: var(--text-secondary);">10 mins ago</td>
                        <td><span class="status-badge status-active">Approved</span></td>
                    </tr>
                    <tr>
                        <td style="color: var(--text-main); font-weight: bold;">Ahmed (Local Assistant)</td>
                        <td>Registered and pending verification</td>
                        <td style="color: var(--text-secondary);">2 hours ago</td>
                        <td><span class="status-badge status-inactive">Pending</span></td>
                    </tr>
                    <tr>
                        <td style="color: var(--text-main); font-weight: bold;">Sarah (Tourist)</td>
                        <td>Generated an AI 3-day itinerary for Amman</td>
                        <td style="color: var(--text-secondary);">5 hours ago</td>
                        <td><span class="status-badge status-active">Active</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
