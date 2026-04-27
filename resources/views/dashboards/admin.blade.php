@extends('layouts.dashboard')

@section('content')
    <div style="background: var(--bg-card); border-radius: 16px; border: 1px solid var(--glass-border); padding: 2rem;">
        <h1 style="color: var(--primary-accent); margin-bottom: 1rem;">
            {{ app()->getLocale() === 'ar' ? 'أهلاً بك يا مدير النظام!' : 'Welcome back, Admin!' }}
        </h1>
        <p style="color: var(--text-secondary); font-size: 1.1rem; margin-bottom: 2rem;">
            {{ app()->getLocale() === 'ar' ? 'هذه هي لوحة تحكم الإدارة الخاصة بك. يمكنك إدارة النظام من هنا.' : 'This is your central administration hub. Manage the platform from here.' }}
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <!-- Dummy Cards -->
            <div style="background: var(--bg-panel); border: 1px solid var(--glass-border); padding: 1.5rem; border-radius: 12px;">
                <h3 style="margin-bottom: 0.5rem;">Manage Users</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">View and manage registered tourists and locals.</p>
                <button class="btn-primary ripple" style="margin-top: 1rem; padding: 5px 15px; font-size: 0.8rem;">Go &rarr;</button>
            </div>
            <div style="background: var(--bg-panel); border: 1px solid var(--glass-border); padding: 1.5rem; border-radius: 12px;">
                <h3 style="margin-bottom: 0.5rem;">Manage Cities</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Edit destination content and Wikipedia keys.</p>
                <button class="btn-primary ripple" style="margin-top: 1rem; padding: 5px 15px; font-size: 0.8rem;">Go &rarr;</button>
            </div>
        </div>
    </div>
@endsection
