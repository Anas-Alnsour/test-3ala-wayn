@extends('layouts.dashboard')

@section('content')
    <div style="background: var(--bg-card); border-radius: 16px; border: 1px solid var(--glass-border); padding: 2rem;">
        <h1 style="color: var(--primary-accent); margin-bottom: 1rem;">
            {{ app()->getLocale() === 'ar' ? 'يا هلا بابن البلد!' : 'Welcome back, Local Guide!' }}
        </h1>
        <p style="color: var(--text-secondary); font-size: 1.1rem; margin-bottom: 2rem;">
            {{ app()->getLocale() === 'ar' ? 'شكراً لمساهمتك في إثراء المحتوى السياحي الأردني. شاركنا تجاربك وأماكنك المفضلة.' : 'Thank you for contributing to Jordan\'s authentic tourism. Share your favorite spots and experiences.' }}
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <!-- Dummy Cards -->
            <div style="background: var(--bg-panel); border: 1px solid var(--glass-border); padding: 1.5rem; border-radius: 12px;">
                <h3 style="margin-bottom: 0.5rem;">My Contributions</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">View your submitted reviews and hidden gems.</p>
                <button class="btn-primary ripple" style="margin-top: 1rem; padding: 5px 15px; font-size: 0.8rem;">View &rarr;</button>
            </div>
            <div style="background: var(--bg-panel); border: 1px solid var(--glass-border); padding: 1.5rem; border-radius: 12px;">
                <h3 style="margin-bottom: 0.5rem;">Add New Experience</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Know a great local spot? Add it to the platform.</p>
                <button class="btn-primary ripple" style="margin-top: 1rem; padding: 5px 15px; font-size: 0.8rem;">Create &rarr;</button>
            </div>
        </div>
    </div>
@endsection
