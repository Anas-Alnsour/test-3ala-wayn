@extends('layouts.dashboard')

@section('content')
<div class="solid-panel" style="background: var(--bg-panel); border: 1px solid var(--glass-border); border-radius: 16px; padding: 2rem;">
    <h2 style="color: var(--primary-accent); margin-bottom: 1rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
        {{ app()->getLocale() === 'ar' ? 'حيّ الله خوينا المساعد' : 'Welcome, Tour Assistant' }}
    </h2>
    <p style="color: var(--text-secondary); margin-bottom: 2rem;">
        {{ app()->getLocale() === 'ar' ? 'أنت واجهة الأردن السياحية. نظم مساراتك وشارك قصصك مع الزوار.' : 'You are the face of Jordanian tourism. Organize your routes and stories.' }}
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <!-- My Stories/Tours -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">My Tours / جولاتي وقصصي</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Manage your active guided tours, historical storytelling, and bookings.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Manage Tours</button>
        </div>

        <!-- Hiking Routes -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Hiking Routes / المسارات البيئية</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Update trail conditions and offer eco-friendly hiking routes (e.g., Jordan Trail).</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Update Routes</button>
        </div>

        <!-- Availability -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Availability / أوقات الفراغ</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Set your schedule so tourists can book your guidance efficiently.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Set Calendar</button>
        </div>
    </div>
</div>
@endsection
