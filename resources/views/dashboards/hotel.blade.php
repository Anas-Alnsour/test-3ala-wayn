@extends('layouts.dashboard')

@section('content')
<div class="admin-panel" style="padding: 2rem; max-width: 1400px; margin: 0 auto;">
    
    <!-- Header -->
    <div style="margin-bottom: 3rem; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 style="color: var(--highlight); margin-bottom: 0.5rem; font-size: 2.5rem;">
                <span class="en-text">Hotel Management</span>
                <span class="ar-text">لوحة إدارة الفندق</span>
            </h1>
            <p style="color: var(--text-secondary); font-size: 1.1rem;">
                <span class="en-text">Monitor live guests and manage bookings.</span>
                <span class="ar-text">متابعة النزلاء وإدارة الحجوزات.</span>
            </p>
        </div>
        <div style="display: flex; gap: 1rem;">
            <div style="background: rgba(30, 23, 21, 0.7); border: 1px solid var(--primary-accent); padding: 1rem 2rem; border-radius: 12px; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: bold; color: #fff;">85%</div>
                <div style="color: var(--secondary-accent); font-size: 0.9rem;">
                    <span class="en-text">Current Occupancy</span>
                    <span class="ar-text">الإشغال الحالي</span>
                </div>
            </div>
            <div style="background: rgba(30, 23, 21, 0.7); border: 1px solid var(--highlight); padding: 1rem 2rem; border-radius: 12px; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: bold; color: #fff;">12</div>
                <div style="color: var(--secondary-accent); font-size: 0.9rem;">
                    <span class="en-text">Pending Check-ins</span>
                    <span class="ar-text">وصول اليوم</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Requests Table -->
    <div>
        <h3 style="color: var(--primary-accent); margin-bottom: 1.5rem; font-size: 1.8rem;">
            <span class="en-text">Live Guest Requests</span>
            <span class="ar-text">طلبات النزلاء الحالية</span>
        </h3>
        
        <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: rgba(0,0,0,0.4); border-bottom: 1px solid rgba(255,255,255,0.1);">
                        <th style="padding: 1.5rem; color: var(--secondary-accent);">
                            <span class="en-text">Room</span>
                            <span class="ar-text">رقم الغرفة</span>
                        </th>
                        <th style="padding: 1.5rem; color: var(--secondary-accent);">
                            <span class="en-text">Request Type</span>
                            <span class="ar-text">نوع الطلب</span>
                        </th>
                        <th style="padding: 1.5rem; color: var(--secondary-accent);">
                            <span class="en-text">Status</span>
                            <span class="ar-text">الحالة</span>
                        </th>
                        <th style="padding: 1.5rem; color: var(--secondary-accent); text-align: right;">
                            <span class="en-text">Action</span>
                            <span class="ar-text">إجراء</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 1.5rem; color: #fff; font-weight: bold; font-size: 1.2rem;">304</td>
                        <td style="padding: 1.5rem; color: #a3a3a3;">
                            <span class="en-text">Late Checkout</span>
                            <span class="ar-text">تأخير خروج</span>
                        </td>
                        <td style="padding: 1.5rem;">
                            <span style="background: rgba(193, 117, 81, 0.2); color: var(--primary-accent); padding: 4px 12px; border-radius: 20px; font-size: 0.85rem;">
                                <span class="en-text">Pending</span>
                                <span class="ar-text">قيد الانتظار</span>
                            </span>
                        </td>
                        <td style="padding: 1.5rem; text-align: right;">
                            <button class="btn-premium" style="padding: 0.5rem 1rem; font-size: 0.9rem; width: auto; display: inline-block;">
                                <span class="en-text">Approve</span>
                                <span class="ar-text">موافقة</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 1.5rem; color: #fff; font-weight: bold; font-size: 1.2rem;">512</td>
                        <td style="padding: 1.5rem; color: #a3a3a3;">
                            <span class="en-text">Room Service (Towels)</span>
                            <span class="ar-text">خدمة غرف (مناشف)</span>
                        </td>
                        <td style="padding: 1.5rem;">
                            <span style="background: rgba(230, 184, 133, 0.2); color: var(--highlight); padding: 4px 12px; border-radius: 20px; font-size: 0.85rem;">
                                <span class="en-text">In Progress</span>
                                <span class="ar-text">جاري التنفيذ</span>
                            </span>
                        </td>
                        <td style="padding: 1.5rem; text-align: right;">
                            <button class="btn-premium" style="padding: 0.5rem 1rem; font-size: 0.9rem; width: auto; display: inline-block; background: rgba(0,0,0,0.5) !important; border: 1px solid rgba(255,255,255,0.2) !important;">
                                <span class="en-text">Mark Done</span>
                                <span class="ar-text">تم الإنجاز</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
