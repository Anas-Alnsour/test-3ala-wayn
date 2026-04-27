@extends('layouts.dashboard')

@section('content')
<div class="solid-panel" style="background: var(--bg-panel); border: 1px solid var(--glass-border); border-radius: 16px; padding: 2rem;">
    <h2 style="color: var(--primary-accent); margin-bottom: 1rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
        {{ app()->getLocale() === 'ar' ? 'يا هلا بابن البلد' : 'Ya Hala, Local' }}
    </h2>
    <p style="color: var(--text-secondary); margin-bottom: 2rem;">
        {{ app()->getLocale() === 'ar' ? 'حياك الله بزاويتك. شاركنا الأماكن المخفية ونصائح التوفير.' : 'Welcome to your hub. Share hidden gems and local budget tips.' }}
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <!-- Hidden Gems -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Hidden Gems / الأماكن المخفية</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Add lesser-known beautiful spots in Jordan that tourists miss.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Add a Gem</button>
        </div>

        <!-- Budget Tips -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Budget Tips / نصائح التوفير</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Share the best ways to enjoy Jordan on a budget (transport, food, etc).</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Share a Tip</button>
        </div>

        <!-- Community Posts -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Community / مجتمع وين؟</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Engage with tourists and answer their questions about Jordan.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">View Discussions</button>
        </div>
    </div>
</div>
@endsection
