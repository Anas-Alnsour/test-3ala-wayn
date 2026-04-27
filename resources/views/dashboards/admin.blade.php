@extends('layouts.dashboard')

@section('content')
<div class="admin-panel" style="padding: 2rem; max-width: 1400px; margin: 0 auto;">
    
    <!-- Header -->
    <div style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: flex-end;">
        <div>
            <h1 style="color: var(--highlight); margin-bottom: 0.5rem; font-size: 2.5rem;">
                <span class="en-text">Admin Command Center</span>
                <span class="ar-text">مركز تحكم الإدارة</span>
            </h1>
            <p style="color: var(--text-secondary); font-size: 1.1rem;">
                <span class="en-text">Platform Overview & Moderation</span>
                <span class="ar-text">نظرة عامة على المنصة والإشراف</span>
            </p>
        </div>
        <div style="background: rgba(193, 117, 81, 0.2); border: 1px solid var(--primary-accent); padding: 0.5rem 1rem; border-radius: 20px;">
            <span class="en-text" style="color: var(--primary-accent); font-weight: bold;">Super Admin</span>
            <span class="ar-text" style="color: var(--primary-accent); font-weight: bold;">مدير النظام</span>
        </div>
    </div>

    <!-- Stats Bar -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
        <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: 16px; text-align: center;">
            <div style="font-size: 3rem; font-weight: bold; color: #fff; margin-bottom: 0.5rem;">12,450</div>
            <div style="color: var(--secondary-accent); font-size: 1.1rem;">
                <span class="en-text">Total Users</span>
                <span class="ar-text">إجمالي المستخدمين</span>
            </div>
        </div>
        <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: 16px; text-align: center;">
            <div style="font-size: 3rem; font-weight: bold; color: var(--primary-accent); margin-bottom: 0.5rem;">842</div>
            <div style="color: var(--secondary-accent); font-size: 1.1rem;">
                <span class="en-text">Active Itineraries</span>
                <span class="ar-text">الرحلات النشطة</span>
            </div>
        </div>
        <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: 16px; text-align: center;">
            <div style="font-size: 3rem; font-weight: bold; color: var(--highlight); margin-bottom: 0.5rem;">406</div>
            <div style="color: var(--secondary-accent); font-size: 1.1rem;">
                <span class="en-text">Registered Partners</span>
                <span class="ar-text">الشركاء المسجلين</span>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 2rem;">
        <!-- Quick Actions -->
        <div>
            <h3 style="color: var(--primary-accent); margin-bottom: 1.5rem; font-size: 1.5rem;">
                <span class="en-text">Quick Actions</span>
                <span class="ar-text">إجراءات سريعة</span>
            </h3>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <button class="btn-premium" style="justify-content: flex-start; text-align: left; background: rgba(0,0,0,0.4) !important; border: 1px solid rgba(193, 117, 81, 0.3) !important;">
                    <span class="en-text">➕ Add New City</span>
                    <span class="ar-text">➕ إضافة محافظة جديدة</span>
                </button>
                <button class="btn-premium" style="justify-content: flex-start; text-align: left; background: rgba(0,0,0,0.4) !important; border: 1px solid rgba(193, 117, 81, 0.3) !important;">
                    <span class="en-text">📍 Manage Attractions</span>
                    <span class="ar-text">📍 إدارة الأماكن السياحية</span>
                </button>
                <button class="btn-premium" style="justify-content: flex-start; text-align: left; background: rgba(0,0,0,0.4) !important; border: 1px solid rgba(193, 117, 81, 0.3) !important;">
                    <span class="en-text">📝 Review Content</span>
                    <span class="ar-text">📝 مراجعة المحتوى</span>
                </button>
            </div>
        </div>

        <!-- Recent Activity Table -->
        <div>
            <h3 style="color: var(--primary-accent); margin-bottom: 1.5rem; font-size: 1.5rem;">
                <span class="en-text">Recent System Activity</span>
                <span class="ar-text">أحدث النشاطات في النظام</span>
            </h3>
            <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; overflow: hidden;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: rgba(0,0,0,0.4); border-bottom: 1px solid rgba(255,255,255,0.1);">
                            <th style="padding: 1.5rem; color: var(--secondary-accent);">
                                <span class="en-text">User / Entity</span>
                                <span class="ar-text">المستخدم / المنشأة</span>
                            </th>
                            <th style="padding: 1.5rem; color: var(--secondary-accent);">
                                <span class="en-text">Action</span>
                                <span class="ar-text">الإجراء</span>
                            </th>
                            <th style="padding: 1.5rem; color: var(--secondary-accent);">
                                <span class="en-text">Time</span>
                                <span class="ar-text">الوقت</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 1.5rem; color: #fff; font-weight: bold;">Reem Shawarma</td>
                            <td style="padding: 1.5rem; color: #a3a3a3;">
                                <span class="en-text">Posted a new offer</span>
                                <span class="ar-text">نزل عرض جديد</span>
                            </td>
                            <td style="padding: 1.5rem; color: var(--primary-accent);">
                                <span class="en-text">10 mins ago</span>
                                <span class="ar-text">قبل 10 دقايق</span>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 1.5rem; color: #fff; font-weight: bold;">Ahmad (Local)</td>
                            <td style="padding: 1.5rem; color: #a3a3a3;">
                                <span class="en-text">Added a hidden gem</span>
                                <span class="ar-text">ضاف مكان مخفي</span>
                            </td>
                            <td style="padding: 1.5rem; color: var(--primary-accent);">
                                <span class="en-text">1 hour ago</span>
                                <span class="ar-text">قبل ساعة</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 1.5rem; color: #fff; font-weight: bold;">Petra Palace</td>
                            <td style="padding: 1.5rem; color: #a3a3a3;">
                                <span class="en-text">Updated room availability</span>
                                <span class="ar-text">حدّث حالة الغرف</span>
                            </td>
                            <td style="padding: 1.5rem; color: var(--primary-accent);">
                                <span class="en-text">3 hours ago</span>
                                <span class="ar-text">قبل 3 ساعات</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
