@extends('layouts.dashboard')

@section('content')
    <div style="background: var(--bg-card); border-radius: 16px; border: 1px solid var(--glass-border); padding: 2rem;">
        <h1 style="color: var(--primary-accent); margin-bottom: 1rem;">
            {{ app()->getLocale() === 'ar' ? 'أهلاً بك في رحلتك الأردنية!' : 'Welcome to your Jordan journey!' }}
        </h1>
        <p style="color: var(--text-secondary); font-size: 1.1rem; margin-bottom: 2rem;">
            {{ app()->getLocale() === 'ar' ? 'استكشف مساراتك المحفوظة وخطط لرحلتك القادمة.' : 'Explore your saved itineraries and plan your next adventure.' }}
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <!-- Dummy Cards -->
            <div style="background: var(--bg-panel); border: 1px solid var(--glass-border); padding: 1.5rem; border-radius: 12px;">
                <h3 style="margin-bottom: 0.5rem;">My Itineraries</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">View your AI-generated trip plans and saved locations.</p>
                <button class="btn-primary ripple" style="margin-top: 1rem; padding: 5px 15px; font-size: 0.8rem;">View &rarr;</button>
            </div>
            <div style="background: var(--bg-panel); border: 1px solid var(--glass-border); padding: 1.5rem; border-radius: 12px;">
                <h3 style="margin-bottom: 0.5rem;">Currency & Budget</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Check live exchange rates and manage your trip budget.</p>
                <button class="btn-primary ripple" style="margin-top: 1rem; padding: 5px 15px; font-size: 0.8rem;">Open &rarr;</button>
            </div>
        </div>
    </div>
@endsection
