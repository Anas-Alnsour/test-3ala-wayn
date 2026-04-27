@extends('layouts.dashboard')

@section('content')
<div class="solid-panel" style="background: var(--bg-panel); border: 1px solid var(--glass-border); border-radius: 16px; padding: 2rem;">
    <h2 style="color: var(--primary-accent); margin-bottom: 1rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
        {{ app()->getLocale() === 'ar' ? 'لوحة تحكم المسؤول' : 'Admin Dashboard' }}
    </h2>
    <p style="color: var(--text-secondary); margin-bottom: 2rem;">
        {{ app()->getLocale() === 'ar' ? 'يا هلا بالمدير. من هنا بتقدر تدير المنصة وتتحكم بالمحتوى.' : 'Welcome Admin. Manage platform content and users here.' }}
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <!-- Stats Overview -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Stats Overview / إحصائيات المنصة</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Monitor daily traffic, registered users, and active service providers.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">View Stats</button>
        </div>

        <!-- Content Management -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Content Management / إدارة المحتوى</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Add or update Jordanian cities, historical attractions, and Wikipedia links.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Manage Content</button>
        </div>

        <!-- User Moderation -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">User Moderation / إدارة المستخدمين</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Review reports, approve local assistants, and moderate community posts.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Moderate Users</button>
        </div>
    </div>
</div>
@endsection
