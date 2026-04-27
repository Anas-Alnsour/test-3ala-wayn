@extends('layouts.dashboard')

@section('content')
<div class="solid-panel" style="background: var(--bg-panel); border: 1px solid var(--glass-border); border-radius: 16px; padding: 2rem;">
    <h2 style="color: var(--primary-accent); margin-bottom: 1rem; border-bottom: 1px solid var(--glass-border); padding-bottom: 0.5rem;">
        {{ app()->getLocale() === 'ar' ? 'يا هلا بضيوف الرحمن' : 'Welcome, Hotel Partner' }}
    </h2>
    <p style="color: var(--text-secondary); margin-bottom: 2rem;">
        {{ app()->getLocale() === 'ar' ? 'أدر فندقك، حدّث الغرف المتاحة، وقدم أفضل تجربة لزوار الأردن.' : 'Manage your hotel profile, update rooms, and welcome guests to Jordan.' }}
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <!-- Room Types -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Room Types / أنواع الغرف</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Manage available rooms, pricing, and specific views (e.g., Petra View).</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Manage Rooms</button>
        </div>

        <!-- Amenities -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Amenities / المرافق</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Update your list of amenities, spas, and traditional Bedouin tents.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Update Amenities</button>
        </div>

        <!-- Guest Welcome Guide -->
        <div style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05);">
            <h3 style="color: var(--text-main); margin-bottom: 1rem;">Welcome Guide / دليل النزلاء</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Create a digital welcome guide with local tips for your specific guests.</p>
            <button class="btn-secondary mt-4" style="width: 100%;">Edit Guide</button>
        </div>
    </div>
</div>
@endsection
