@extends('layouts.dashboard')

@section('content')
<div class="admin-panel" style="padding: 2rem; max-width: 1400px; margin: 0 auto;">
    
    <!-- Header -->
    <div style="margin-bottom: 3rem; display: flex; justify-content: space-between; align-items: center; background: rgba(30, 23, 21, 0.7); border: 1px solid rgba(193, 117, 81, 0.2); padding: 2rem 3rem; border-radius: 24px;">
        <div>
            <h1 style="color: var(--secondary-accent); margin-bottom: 0.5rem; font-size: 2.5rem;">
                <span class="en-text">Welcome to Jordan!</span>
                <span class="ar-text">يا هلا بضيف الأردن!</span>
            </h1>
            <p style="color: var(--text-secondary); font-size: 1.1rem;">
                <span class="en-text">Your personal guide and trip manager.</span>
                <span class="ar-text">دليلك الشخصي ومدير رحلتك.</span>
            </p>
        </div>
        <div>
            <button class="btn-premium" style="background: linear-gradient(135deg, #a83232, #5c1818) !important; box-shadow: 0 4px 15px rgba(168, 50, 50, 0.4);">
                <span class="en-text">🚨 Emergency & Help</span>
                <span class="ar-text">🚨 فزعة وأرقام تهمك</span>
            </button>
        </div>
    </div>

    <!-- Active Itinerary -->
    <div style="margin-bottom: 4rem;">
        <h3 style="color: var(--primary-accent); margin-bottom: 1.5rem; font-size: 1.8rem;">
            <span class="en-text">My Active Itinerary</span>
            <span class="ar-text">مسار رحلتي</span>
        </h3>
        
        <div style="background: rgba(0,0,0,0.3); border-left: 4px solid var(--highlight); padding: 2rem; border-radius: 0 16px 16px 0;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <h4 style="color: #fff; font-size: 1.5rem; margin-bottom: 1rem;">
                        <span class="en-text">Day 1: Historical Amman</span>
                        <span class="ar-text">اليوم الأول: عمان القديمة</span>
                    </h4>
                    <ul style="list-style: none; padding: 0; margin: 0; color: #a3a3a3; font-size: 1.1rem; line-height: 2;">
                        <li><span style="color: var(--primary-accent); margin-right: 10px;">10:00 AM</span> <span class="en-text">Amman Citadel</span><span class="ar-text">جبل القلعة</span></li>
                        <li><span style="color: var(--primary-accent); margin-right: 10px;">01:00 PM</span> <span class="en-text">Lunch at Hashem Restaurant</span><span class="ar-text">غداء في مطعم هاشم</span></li>
                        <li><span style="color: var(--primary-accent); margin-right: 10px;">03:00 PM</span> <span class="en-text">Roman Theater</span><span class="ar-text">المدرج الروماني</span></li>
                    </ul>
                </div>
                <div style="text-align: right;">
                    <div style="font-size: 2rem; color: var(--highlight); font-weight: bold; margin-bottom: 1rem;">
                        <span class="en-text">Today</span>
                        <span class="ar-text">اليوم</span>
                    </div>
                    <button class="btn-premium" style="padding: 0.5rem 1.5rem; font-size: 1rem;">
                        <span class="en-text">View Full Plan</span>
                        <span class="ar-text">عرض كامل الخطة</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Saved Locations Grid -->
    <div>
        <h3 style="color: var(--primary-accent); margin-bottom: 1.5rem; font-size: 1.8rem;">
            <span class="en-text">Saved Locations</span>
            <span class="ar-text">أماكن حابب أزورها</span>
        </h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
            
            <div style="position: relative; border-radius: 16px; overflow: hidden; height: 250px; border: 1px solid rgba(255,255,255,0.1); cursor: pointer;">
                <div style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1541432901042-2d8bd64b4a9b?w=600&q=80'); background-size: cover; background-position: center; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></div>
                <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);"></div>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem;">
                    <span style="background: var(--highlight); color: #000; padding: 4px 10px; border-radius: 8px; font-size: 0.8rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block;">
                        <span class="en-text">Must Visit</span>
                        <span class="ar-text">لازم تزوره</span>
                    </span>
                    <h3 style="color: #fff; font-size: 1.5rem; margin: 0;">
                        <span class="en-text">Petra</span>
                        <span class="ar-text">البترا</span>
                    </h3>
                </div>
            </div>

            <div style="position: relative; border-radius: 16px; overflow: hidden; height: 250px; border: 1px solid rgba(255,255,255,0.1); cursor: pointer;">
                <div style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1554522965-f93fc3e02812?w=600&q=80'); background-size: cover; background-position: center; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></div>
                <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);"></div>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem;">
                    <span style="background: var(--secondary-accent); color: #000; padding: 4px 10px; border-radius: 8px; font-size: 0.8rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block;">
                        <span class="en-text">Booked Tour</span>
                        <span class="ar-text">جولة محجوزة</span>
                    </span>
                    <h3 style="color: #fff; font-size: 1.5rem; margin: 0;">
                        <span class="en-text">Wadi Rum</span>
                        <span class="ar-text">وادي رم</span>
                    </h3>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
