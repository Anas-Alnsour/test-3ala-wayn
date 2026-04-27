@extends('layouts.dashboard')

@section('content')
<div class="admin-panel">
    <div class="admin-header-bar" style="background: linear-gradient(135deg, rgba(42, 32, 29, 0.8), rgba(193, 117, 81, 0.2));">
        <div>
            <h2 class="admin-title" style="color: var(--text-main);">
                <span class="en-text">Welcome, Hotel Partner</span>
                <span class="ar-text">يا هلا بضيوف الرحمن</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 5px;">
                <span class="en-text">Manage your property, occupancy, and guest requests.</span>
                <span class="ar-text">أدر منشأتك، نسبة الإشغال، وطلبات النزلاء.</span>
            </p>
        </div>
        <button class="btn-secondary" style="border-radius: 20px;">Manage Property Details</button>
    </div>

    <!-- Current Occupancy Stats -->
    <div class="stats-bar" style="border-top: none; background: transparent;">
        <div class="stat-item">
            <div class="stat-num" style="color: var(--primary-accent);">85%</div>
            <div class="stat-label">
                <span class="en-text">Current Occupancy</span>
                <span class="ar-text">نسبة الإشغال الحالية</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-num">12</div>
            <div class="stat-label">
                <span class="en-text">Check-ins Today</span>
                <span class="ar-text">تسجيل الدخول اليوم</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-num" style="color: var(--highlight);">5</div>
            <div class="stat-label">
                <span class="en-text">Pending Requests</span>
                <span class="ar-text">طلبات قيد الانتظار</span>
            </div>
        </div>
    </div>

    <div class="admin-body">
        <h3 style="margin-bottom: 20px; color: var(--secondary-accent);">
            <span class="en-text">Live Guest Requests</span>
            <span class="ar-text">طلبات النزلاء المباشرة</span>
        </h3>
        
        <div class="table-wrapper" style="background: var(--bg-card); border-radius: 12px; border: 1px solid var(--glass-border); padding: 10px;">
            <table class="users-table">
                <thead>
                    <tr>
                        <th><span class="en-text">Room</span><span class="ar-text">الغرفة</span></th>
                        <th><span class="en-text">Guest Name</span><span class="ar-text">اسم النزيل</span></th>
                        <th><span class="en-text">Request Details</span><span class="ar-text">تفاصيل الطلب</span></th>
                        <th><span class="en-text">Status / Action</span><span class="ar-text">الحالة / الإجراء</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="color: var(--secondary-accent); font-weight: bold;">402</td>
                        <td>Mr. Smith</td>
                        <td>Extra pillows and towels</td>
                        <td>
                            <button class="btn-primary" style="padding: 4px 12px; font-size: 12px; border: none;">Mark Done</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: var(--secondary-accent); font-weight: bold;">115</td>
                        <td>Family Al-Qadi</td>
                        <td>Book a local guide for Jerash tomorrow</td>
                        <td>
                            <button class="btn-secondary" style="padding: 4px 12px; font-size: 12px;">Contact Guide</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: var(--secondary-accent); font-weight: bold;">308</td>
                        <td>Sarah J.</td>
                        <td>Late checkout request (2:00 PM)</td>
                        <td>
                            <span class="status-badge status-active" style="margin-right: 10px;">Approved</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
