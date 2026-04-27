@extends('layouts.dashboard')

@section('content')
<div class="admin-panel">
    <div class="admin-header-bar" style="background: linear-gradient(135deg, rgba(230, 184, 133, 0.1), rgba(193, 117, 81, 0.1));">
        <div>
            <h2 class="admin-title" style="color: var(--secondary-accent);">
                <span class="en-text">Welcome to Jordan, Tourist</span>
                <span class="ar-text">يا هلا بضيفنا</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 5px;">
                <span class="en-text">Your personal guide and itinerary manager.</span>
                <span class="ar-text">دليلك الشخصي ومدير رحلاتك.</span>
            </p>
        </div>
        <button class="btn-primary" style="border: none;">Emergency SOS / طوارئ</button>
    </div>

    <div class="admin-body">
        <div style="margin-bottom: 40px;">
            <h3 style="margin-bottom: 20px; color: var(--text-main);">
                <span class="en-text">Active Itinerary: 3 Days in Amman & Dead Sea</span>
                <span class="ar-text">الرحلة الحالية: 3 أيام في عمان والبحر الميت</span>
            </h3>
            <div class="itinerary-box" style="display: flex; justify-content: space-between; align-items: center; background: rgba(193, 117, 81, 0.05);">
                <div>
                    <h4 style="color: var(--secondary-accent); font-size: 20px; margin-bottom: 10px;">Day 1: Historical Amman</h4>
                    <ul class="mode-features" style="margin-bottom: 0;">
                        <li>10:00 AM - Amman Citadel</li>
                        <li>01:00 PM - Lunch at Hashem Restaurant</li>
                        <li>03:00 PM - Roman Theater</li>
                    </ul>
                </div>
                <div style="text-align: right;">
                    <div style="font-size: 24px; color: var(--highlight); font-weight: bold; margin-bottom: 10px;">Today</div>
                    <button class="btn-secondary">View Full Schedule</button>
                </div>
            </div>
        </div>

        <h3 style="margin-bottom: 20px; color: var(--text-main);">
            <span class="en-text">Saved Locations</span>
            <span class="ar-text">الأماكن المحفوظة</span>
        </h3>
        <div class="cities-grid">
            <div class="city-card">
                <div class="city-img"><img src="https://images.unsplash.com/photo-1541432901042-2d8bd64b4a9b?w=600&q=80" alt="Petra"></div>
                <div class="city-img-overlay"></div>
                <span class="city-badge">Must Visit</span>
                <div class="city-body">
                    <h3 class="city-name">Petra</h3>
                    <div class="city-tags">
                        <span class="city-tag">Historical</span>
                        <span class="city-tag">South Jordan</span>
                    </div>
                </div>
            </div>
            <div class="city-card">
                <div class="city-img"><img src="https://images.unsplash.com/photo-1554522965-f93fc3e02812?w=600&q=80" alt="Wadi Rum"></div>
                <div class="city-img-overlay"></div>
                <span class="city-badge">Booked Tour</span>
                <div class="city-body">
                    <h3 class="city-name">Wadi Rum</h3>
                    <div class="city-tags">
                        <span class="city-tag">Desert</span>
                        <span class="city-tag">Camping</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
