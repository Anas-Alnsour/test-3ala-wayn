@extends('layouts.dashboard')

@section('content')
<div class="admin-panel">
    <div class="admin-header-bar" style="background: linear-gradient(135deg, rgba(193, 117, 81, 0.1), rgba(18, 14, 12, 0.8));">
        <div>
            <h2 class="admin-title" style="color: var(--primary-accent);">
                <span class="en-text">Welcome, Restaurant Partner</span>
                <span class="ar-text">يا هلا بصاحب المنشأة</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 5px;">
                <span class="en-text">Manage your menu and track Wayn-driven visits.</span>
                <span class="ar-text">أدر قائمة طعامك وتابع الزيارات القادمة من وين.</span>
            </p>
        </div>
        <span class="admin-badge" style="background: var(--highlight);">Verified Partner</span>
    </div>

    <!-- Today's Menu Traffic Stats -->
    <div class="stats-bar" style="border-top: none; background: transparent;">
        <div class="stat-item">
            <div class="stat-num">142</div>
            <div class="stat-label">
                <span class="en-text">Menu Views Today</span>
                <span class="ar-text">مشاهدات القائمة اليوم</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-num" style="color: var(--highlight);">28</div>
            <div class="stat-label">
                <span class="en-text">Wayn Referrals</span>
                <span class="ar-text">زوار عبر المنصة</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-num">Mansaf</div>
            <div class="stat-label">
                <span class="en-text">Most Popular Dish</span>
                <span class="ar-text">الطبق الأكثر طلباً</span>
            </div>
        </div>
    </div>

    <div class="admin-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <!-- Publish New Offer Form -->
            <div style="background: var(--bg-card); padding: 30px; border-radius: 16px; border: 1px solid var(--glass-border);">
                <h3 style="margin-bottom: 20px; color: var(--text-main);">
                    <span class="en-text">Publish New Daily Offer</span>
                    <span class="ar-text">نشر عرض يومي جديد</span>
                </h3>
                <form style="display: flex; flex-direction: column; gap: 15px;">
                    <div>
                        <label style="color: var(--text-secondary); font-size: 14px; margin-bottom: 5px; display: block;">Offer Title / عنوان العرض</label>
                        <input type="text" class="glass-input" placeholder="e.g. 20% off Zarb tonight">
                    </div>
                    <div>
                        <label style="color: var(--text-secondary); font-size: 14px; margin-bottom: 5px; display: block;">Description / التفاصيل</label>
                        <textarea class="glass-input" rows="3" placeholder="Describe the meal and discount..."></textarea>
                    </div>
                    <div>
                        <label style="color: var(--text-secondary); font-size: 14px; margin-bottom: 5px; display: block;">Valid Until / صالح حتى</label>
                        <input type="time" class="glass-input">
                    </div>
                    <button type="button" class="btn-primary" style="margin-top: 10px; border: none;">Publish Offer / نشر العرض</button>
                </form>
            </div>

            <!-- Active Offers List -->
            <div>
                <h3 style="margin-bottom: 20px; color: var(--text-main);">
                    <span class="en-text">Active Offers</span>
                    <span class="ar-text">العروض النشطة</span>
                </h3>
                <div class="admin-action-btn" style="margin-bottom: 15px; border-color: var(--primary-accent);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <div class="action-title" style="color: var(--secondary-accent);">Free Arabic Coffee with Any Meal</div>
                            <div class="action-desc">Valid until 11:00 PM tonight. Over 45 tourists claimed this.</div>
                        </div>
                        <span class="status-badge status-active">Live</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
