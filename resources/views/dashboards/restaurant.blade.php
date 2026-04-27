@extends('layouts.dashboard')

@section('content')
<div class="solid-panel" style="background: var(--bg-panel); border: 1px solid var(--glass-border); border-radius: 16px; padding: 2rem;">
    <h2 style="color: var(--primary-accent); margin-bottom: 1rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
        {{ app()->getLocale() === 'ar' ? 'يا هلا بصاحب المنشأة' : 'Welcome, Restaurant Partner' }}
    </h2>
    <p style="color: var(--text-secondary); margin-bottom: 2rem;">
        {{ app()->getLocale() === 'ar' ? 'أدر مطعمك، أضف عروضك اليومية، وتابع زيارات السياح لمنشأتك.' : 'Manage your restaurant profile, add daily offers, and track tourist visits.' }}
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <!-- Menu Highlights -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Menu Highlights / أبرز الأطباق</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Showcase your best traditional Jordanian dishes like Mansaf and Zarb.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Manage Menu</button>
        </div>

        <!-- Daily Offers -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Daily Offers / العروض اليومية</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Create special promotions to attract tourists visiting your city.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Add Offer</button>
        </div>

        <!-- Platform Traffic -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Traffic Insights / إحصائيات الزوار</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">View how many tourists discovered your restaurant through the Wayn platform.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">View Stats</button>
        </div>
    </div>
</div>
@endsection
