@extends('layouts.dashboard')

@section('content')
<div class="admin-panel" style="padding: 2rem; max-width: 1400px; margin: 0 auto;">
    
    <!-- Header -->
    <div style="margin-bottom: 3rem; border-bottom: 1px solid rgba(193, 117, 81, 0.3); padding-bottom: 2rem;">
        <h1 style="color: var(--highlight); margin-bottom: 0.5rem; font-size: 2.5rem;">
            <span class="en-text">Restaurant Portal</span>
            <span class="ar-text">يا هلا بصاحب المنشأة</span>
        </h1>
        <p style="color: var(--text-secondary); font-size: 1.1rem;">
            <span class="en-text">Manage your daily offers and track visitor engagement.</span>
            <span class="ar-text">إدارة العروض اليومية ومتابعة تفاعل الزوار.</span>
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 3rem;">
        <!-- Stats Sidebar -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: 16px; text-align: center;">
                <div style="font-size: 3.5rem; font-weight: bold; color: var(--primary-accent); margin-bottom: 0.5rem;">1,204</div>
                <div style="color: var(--secondary-accent); font-size: 1.1rem;">
                    <span class="en-text">Menu Views</span>
                    <span class="ar-text">مشاهدات المنيو</span>
                </div>
            </div>
            <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); padding: 2rem; border-radius: 16px; text-align: center;">
                <div style="font-size: 3.5rem; font-weight: bold; color: var(--highlight); margin-bottom: 0.5rem;">85</div>
                <div style="color: var(--secondary-accent); font-size: 1.1rem;">
                    <span class="en-text">Today's Referrals</span>
                    <span class="ar-text">زوار من المنصة اليوم</span>
                </div>
            </div>
        </div>

        <!-- Post Offer Form -->
        <div>
            <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(193, 117, 81, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); border-radius: 24px; padding: 3rem;">
                <h3 style="color: var(--primary-accent); margin-bottom: 2rem; font-size: 1.8rem;">
                    <span class="en-text">Post Daily Offer</span>
                    <span class="ar-text">نزل عرض اليوم</span>
                </h3>
                <form style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div>
                        <label class="form-label" style="color: var(--secondary-accent); display: block; margin-bottom: 0.5rem;">
                            <span class="en-text">Offer Title</span>
                            <span class="ar-text">عنوان العرض</span>
                        </label>
                        <input type="text" class="glass-input-premium" placeholder="..." />
                    </div>
                    <div>
                        <label class="form-label" style="color: var(--secondary-accent); display: block; margin-bottom: 0.5rem;">
                            <span class="en-text">Details & Conditions</span>
                            <span class="ar-text">التفاصيل والشروط</span>
                        </label>
                        <textarea class="glass-input-premium" rows="4" placeholder="..."></textarea>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <div>
                            <label class="form-label" style="color: var(--secondary-accent); display: block; margin-bottom: 0.5rem;">
                                <span class="en-text">Valid Until</span>
                                <span class="ar-text">صالح لغاية</span>
                            </label>
                            <input type="time" class="glass-input-premium" />
                        </div>
                        <div style="display: flex; align-items: flex-end;">
                            <button type="button" class="btn-premium">
                                <span class="en-text">Publish Live</span>
                                <span class="ar-text">انشر العرض</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
