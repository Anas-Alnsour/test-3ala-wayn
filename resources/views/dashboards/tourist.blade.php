@extends('layouts.dashboard')

@section('content')
<div class="solid-panel" style="background: var(--bg-panel); border: 1px solid var(--glass-border); border-radius: 16px; padding: 2rem;">
    <h2 style="color: var(--primary-accent); margin-bottom: 1rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
        {{ app()->getLocale() === 'ar' ? 'يا هلا بضيفنا' : 'Welcome to Jordan, Tourist' }}
    </h2>
    <p style="color: var(--text-secondary); margin-bottom: 2rem;">
        {{ app()->getLocale() === 'ar' ? 'أهلاً بك في الأردن. رتب رحلتك واستمتع بأفضل الأماكن.' : 'Your professional hub to explore Jordan safely and comfortably.' }}
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <!-- Itinerary History -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">My Itineraries / خطط الرحلات</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">View your saved tours, booked restaurants, and favorite attractions.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">View History</button>
        </div>

        <!-- Safety Links -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Safety & Emergency / الطوارئ والسلامة</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Quick access to tourist police, embassy contacts, and medical facilities.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Safety Hub</button>
        </div>

        <!-- Currency & Tools -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Currency Tools / تحويل العملات</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Fast-access JOD converter and common local prices guide.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Open Tools</button>
        </div>
    </div>
</div>
@endsection
