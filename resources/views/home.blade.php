<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title data-i18n="page_title">Wayn? | Authentic Jordan</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Lato:wght@300;400;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
</head>
<body>
  
  <!-- HEADER -->
  <header class="header">
<div class="logo" id="logoBtn">
      <div class="logo-icon-svg">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="premium-logo-svg">
          <defs>
            <linearGradient id="goldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="var(--secondary-accent)" />
              <stop offset="100%" stop-color="var(--primary-accent)" />
            </linearGradient>
            <filter id="glow">
              <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
              <feMerge>
                <feMergeNode in="coloredBlur"/>
                <feMergeNode in="SourceGraphic"/>
              </feMerge>
            </filter>
          </defs>
          <circle cx="50" cy="50" r="45" fill="none" stroke="url(#goldGradient)" stroke-width="1.5" opacity="0.5" stroke-dasharray="2 4"/>
          <g class="star-group" filter="url(#glow)">
            <rect x="25" y="25" width="50" height="50" fill="none" stroke="url(#goldGradient)" stroke-width="2" transform="rotate(0 50 50)"/>
            <rect x="25" y="25" width="50" height="50" fill="none" stroke="url(#goldGradient)" stroke-width="2" transform="rotate(45 50 50)"/>
          </g>
          <g class="compass-needles">
            <polygon points="50,5 55,45 50,50 45,45" fill="url(#goldGradient)"/>
            <polygon points="50,95 55,55 50,50 45,55" fill="url(#goldGradient)" opacity="0.6"/>
            <polygon points="95,50 55,55 50,50 55,45" fill="url(#goldGradient)"/>
            <polygon points="5,50 45,55 50,50 45,45" fill="url(#goldGradient)" opacity="0.6"/>
          </g>
          <circle cx="50" cy="50" r="5" fill="var(--bg-dark)" stroke="url(#goldGradient)" stroke-width="2"/>
        </svg>
      </div>
      <div class="logo-text-group">
        <div class="logo-text" data-i18n="logo_text">Wayn?</div>
        <div class="logo-sub" data-i18n="logo_sub">Authentic Travel · Jordan</div>
      </div>
    </div>
    
    <div class="header-mobile-controls">
      <div class="mode-toggle" style="display:flex;">
        <button class="mode-btn active" id="modeEnMobile" data-mode="en">EN</button>
        <button class="mode-btn" id="modeArMobile" data-mode="ar">عربي</button>
      </div>
    </div>

    <nav class="header-nav" id="mainNav">
      <button class="nav-btn active" data-target="home" data-i18n="nav_explore">Explore</button>
      <button class="nav-btn" data-target="cities" data-i18n="nav_cities">Cities</button>
      <button class="nav-btn" data-target="planner" data-i18n="nav_planner">AI Planner</button>
      <button class="nav-btn" data-target="currency" data-i18n="nav_currency">Currency</button>
      <button class="nav-btn" data-target="admin" data-i18n="nav_admin">Admin</button>
      <div class="mode-toggle desktop-only" id="desktopModeToggle">
        <button class="mode-btn active" id="modeEn" data-mode="en">EN</button>
        <button class="mode-btn" id="modeAr" data-mode="ar">عربي</button>
      </div>
    </nav>
  </header>

  <main id="mainContainer">
    <!-- HOME SECTION -->
    <section id="sec-home" class="view-section active">
      <!-- HERO -->
      <article class="hero">
        <div class="parallax-bg" data-speed="0.2"></div>
        <div class="hero-content">
          <div class="hero-badge parallax-element" data-speed="0.05" data-i18n="hero_badge">✦ Authentic Jordanian Experience</div>
          <h1 id="heroTitle" class="parallax-element" data-speed="0.15" data-i18n="hero_title">Discover <span class="gradient-text">Jordan</span>,<br>Your Way</h1>
          <p id="heroDesc" class="parallax-element" data-speed="0.1" data-i18n="hero_desc">From the ancient streets of Petra to the crystal waters of Aqaba — plan your perfect Jordanian journey.</p>
          <div class="hero-actions parallax-element" data-speed="0.05">
            <button class="btn-primary ripple" id="btnPlanHero" data-i18n="btn_plan_hero">✦ Plan My Trip</button>
            <button class="btn-secondary ripple" id="btnExploreHero" data-i18n="btn_explore_hero">Explore Cities &rarr;</button>
          </div>
        </div>
      </article>

      <!-- STATS -->
      <article class="stats-bar stagger-item">
        <div class="stat-item"><div class="stat-num" data-i18n="stat_cities_val">17+</div><div class="stat-label" data-i18n="stat_cities_lbl">Cities</div></div>
        <div class="stat-item"><div class="stat-num" data-i18n="stat_attr_val">480+</div><div class="stat-label" data-i18n="stat_attr_lbl">Attractions</div></div>
        <div class="stat-item"><div class="stat-num" data-i18n="stat_rest_val">250+</div><div class="stat-label" data-i18n="stat_rest_lbl">Restaurants</div></div>
        <div class="stat-item"><div class="stat-num" data-i18n="stat_ai_val">AI</div><div class="stat-label" data-i18n="stat_ai_lbl">Powered</div></div>
        <div class="stat-item"><div class="stat-num" data-i18n="stat_247_val">24/7</div><div class="stat-label" data-i18n="stat_247_lbl">Smart Guide</div></div>
      </article>

      <!-- DUAL MODE -->
      <article class="section">
        <div class="section-header"><h2 class="section-title stagger-item" data-i18n="sec_choose_exp">Choose Your <span class="gradient-text">Experience</span></h2></div>
        <div class="dual-mode">
          <div class="mode-card local stagger-item">
            <div class="mode-card-title" data-i18n="mode_local_title">وين طشّتنا اليوم؟</div>
            <div class="mode-card-sub" data-i18n="mode_local_sub">للمواطن الأردني</div>
            <ul class="mode-features">
              <li data-i18n="mode_local_f1">أماكن قريبة منك هسّا</li>
              <li data-i18n="mode_local_f2">طشّات بتجنن على قد الجيبة</li>
              <li data-i18n="mode_local_f3">مناطق مخفية ما بتعرفها</li>
              <li data-i18n="mode_local_f4">مطاعم شعبية بتفتح النفس</li>
            </ul>
            <button class="mode-card-btn ripple" id="btnModeArAction" data-i18n="btn_mode_local">يلّا نبلّش &larr;</button>
          </div>
          <div class="mode-card tourist stagger-item">
            <div class="mode-card-title" data-i18n="mode_tourist_title">Where To, Traveler?</div>
            <div class="mode-card-sub" data-i18n="mode_tourist_sub">For International Visitors</div>
            <ul class="mode-features">
              <li data-i18n="mode_tourist_f1">Full guided itineraries</li>
              <li data-i18n="mode_tourist_f2">Cultural context & tips</li>
              <li data-i18n="mode_tourist_f3">Curated experiences</li>
              <li data-i18n="mode_tourist_f4">Safety & logistics info</li>
            </ul>
            <button class="mode-card-btn ripple" id="btnModeEnAction" data-i18n="btn_mode_tourist">Start Planning &rarr;</button>
          </div>
        </div>

        <!-- CATEGORIES -->
        <div class="section-header"><h2 class="section-title stagger-item" data-i18n="sec_categories">Travel <span class="gradient-text">Categories</span></h2></div>
        <div class="categories-row stagger-item">
          <div class="cat-btn active ripple"><div class="cat-icon skeleton"><img data-wiki="History_of_Jordan" alt="History" loading="lazy"></div><div class="cat-label" data-i18n="cat_history">History</div></div>
          <div class="cat-btn ripple"><div class="cat-icon skeleton"><img data-wiki="Jordanian_cuisine" alt="Food" loading="lazy"></div><div class="cat-label" data-i18n="cat_food">Food</div></div>
          <div class="cat-btn ripple"><div class="cat-icon skeleton"><img data-wiki="Hotel" alt="Hotels" loading="lazy"></div><div class="cat-label" data-i18n="cat_hotels">Hotels</div></div>
          <div class="cat-btn ripple"><div class="cat-icon skeleton"><img data-wiki="Jordan_Trail" alt="Hiking" loading="lazy"></div><div class="cat-label" data-i18n="cat_hiking">Hiking</div></div>
          <div class="cat-btn ripple"><div class="cat-icon skeleton"><img data-wiki="Wadi_Rum" alt="Desert" loading="lazy"></div><div class="cat-label" data-i18n="cat_desert">Desert</div></div>
          <div class="cat-btn ripple"><div class="cat-icon skeleton"><img data-wiki="Gulf_of_Aqaba" alt="Water" loading="lazy"></div><div class="cat-label" data-i18n="cat_water">Water</div></div>
          <div class="cat-btn ripple"><div class="cat-icon skeleton"><img data-wiki="Agriculture_in_Jordan" alt="Farms" loading="lazy"></div><div class="cat-label" data-i18n="cat_farms">Farms</div></div>
          <div class="cat-btn ripple"><div class="cat-icon skeleton"><img data-wiki="Culture_of_Jordan" alt="Culture" loading="lazy"></div><div class="cat-label" data-i18n="cat_culture">Culture</div></div>
        </div>

        <!-- JORDANIAN FOOD -->
        <div class="section-header"><h2 class="section-title stagger-item" data-i18n="sec_flavors">Jordanian <span class="gradient-text">Flavors</span></h2></div>
        <div class="food-grid">
          <div class="food-card stagger-item">
            <div class="food-image skeleton"><img data-wiki="Mansaf" alt="Mansaf" loading="lazy"></div>
            <div class="food-body">
              <div class="food-name" data-i18n="food_mansaf">Mansaf</div>
              <div class="food-desc" data-i18n="food_mansaf_desc">Jordan's national dish — slow-cooked lamb in dried yogurt sauce, served on fragrant rice</div>
            </div>
          </div>
          <div class="food-card stagger-item">
            <div class="food-image skeleton"><img data-wiki="Falafel" alt="Falafel" loading="lazy"></div>
            <div class="food-body">
              <div class="food-name" data-i18n="food_falafel">Falafel</div>
              <div class="food-desc" data-i18n="food_falafel_desc">Crispy fried chickpea fritters, best enjoyed fresh from street vendors in Amman</div>
            </div>
          </div>
          <div class="food-card stagger-item">
            <div class="food-image skeleton"><img data-wiki="Knafeh" alt="Knafeh" loading="lazy"></div>
            <div class="food-body">
              <div class="food-name" data-i18n="food_knafeh">Knafeh</div>
              <div class="food-desc" data-i18n="food_knafeh_desc">Sweet shredded pastry soaked in sugar syrup with soft white cheese — a Levantine legend</div>
            </div>
          </div>
          <div class="food-card stagger-item">
            <div class="food-image skeleton"><img data-wiki="Arabic_coffee" alt="Arabic Coffee" loading="lazy"></div>
            <div class="food-body">
              <div class="food-name" data-i18n="food_coffee">Arabic Coffee</div>
              <div class="food-desc" data-i18n="food_coffee_desc">Cardamom-infused qahwa served in small cups — a gesture of Jordanian hospitality</div>
            </div>
          </div>
        </div>
      </article>
    </section>

    <!-- CITIES SECTION -->
    <section id="sec-cities" class="view-section">
      <div id="citiesMain">
        <article class="section">
          <div class="section-header">
            <h2 class="section-title stagger-item" data-i18n="sec_explore_cities">Explore <span class="gradient-text">Jordan's Cities</span></h2>
          </div>
          <script>
            window.appCities = @json(\App\Models\City::with('attractions')->get());
          </script>
          <div class="cities-grid" id="citiesGrid">
            @php $cities = \App\Models\City::with('attractions')->get(); @endphp
            @foreach($cities as $city)
              <div class="city-card stagger-item" data-id="{{ $city->id }}">
                <div class="city-img skeleton">
                  <img data-wiki="{{ $city->wiki_title }}" alt="{{ $city->name }}" loading="lazy">
                  <div class="city-img-overlay"></div>
                  <span class="city-badge" data-i18n-city-tag="{{ $city->id }}">City</span>
                </div>
                <div class="city-body">
                  <div class="city-name en-text">{{ $city->name }}</div>
                  <div class="city-name ar-text hidden-view">{{ $city->name_ar }}</div>
                  <div class="city-desc">{{ $city->description }}</div>
                  <div class="city-tags">
                    <span class="city-tag" data-i18n="tag_hist">History & Ruins</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </article>
      </div>
      <div id="cityDetail" class="hidden-view">
        <!-- Rendered by JS -->
      </div>
    </section>

    <!-- AI PLANNER SECTION -->
    <section id="sec-planner" class="view-section">
      <article class="section">
        <div class="ai-planner stagger-item">
          <div class="ai-header">
            <div class="ai-icon">🤖</div>
            <div>
              <h2 data-i18n="ai_planner_title">AI Smart Trip Planner</h2>
              <p data-i18n="ai_planner_desc">Generate a full personalized itinerary powered by AI intelligence</p>
            </div>
          </div>
          <div class="ai-body">
            <div class="planner-grid">
              <div class="planner-field">
                <label data-i18n="plan_dest">Destination</label>
                <select id="planCity" class="glass-input">
                  <option value="all" data-i18n="plan_dest_all">All Jordan</option>
                  @foreach($cities as $city)
                    <option value="{{ $city->id }}" class="en-text">{{ $city->name }}</option>
                    <option value="{{ $city->id }}" class="ar-text hidden-view">{{ $city->name_ar }}</option>
                  @endforeach
                </select>
              </div>
              <div class="planner-field">
                <label data-i18n="plan_dur">Duration</label>
                <select id="planDays" class="glass-input">
                  <option value="1" data-i18n="plan_dur_1">1 Day</option>
                  <option value="3" selected data-i18n="plan_dur_3">3 Days</option>
                  <option value="5" data-i18n="plan_dur_5">5 Days</option>
                  <option value="7" data-i18n="plan_dur_7">1 Week</option>
                  <option value="14" data-i18n="plan_dur_14">2 Weeks</option>
                </select>
              </div>
              <div class="planner-field">
                <label data-i18n="plan_budget">Budget (USD)</label>
                <select id="planBudget" class="glass-input">
                  <option value="budget" data-i18n="plan_bud_budget">Budget ($30-80/day)</option>
                  <option value="mid" selected data-i18n="plan_bud_mid">Mid-range ($80-200/day)</option>
                  <option value="luxury" data-i18n="plan_bud_lux">Luxury ($200+/day)</option>
                </select>
              </div>
              <div class="planner-field">
                <label data-i18n="plan_style">Travel Style</label>
                <select id="planStyle" class="glass-input">
                  <option value="solo" data-i18n="plan_style_solo">Solo Traveler</option>
                  <option value="couple" data-i18n="plan_style_couple">Couple</option>
                  <option value="family" selected data-i18n="plan_style_family">Family</option>
                  <option value="group" data-i18n="plan_style_group">Group</option>
                </select>
              </div>
            </div>
            <div class="tags-label" data-i18n="tags_label" style="margin-bottom: 15px; display: block; color: var(--text-secondary);">Your Interests</div>
            <div class="interest-tags" id="interestTags">
              <div class="tag selected ripple" data-i18n="tag_hist">History & Ruins</div>
              <div class="tag selected ripple" data-i18n="tag_food">Local Food</div>
              <div class="tag ripple" data-i18n="tag_adv">Adventure</div>
              <div class="tag ripple" data-i18n="tag_camp">Desert Camping</div>
              <div class="tag ripple" data-i18n="tag_water">Swimming & Water</div>
              <div class="tag ripple" data-i18n="tag_photo">Photography</div>
              <div class="tag ripple" data-i18n="tag_rel">Religious Sites</div>
              <div class="tag ripple" data-i18n="tag_hike">Hiking</div>
              <div class="tag ripple" data-i18n="tag_market">Local Markets</div>
              <div class="tag ripple" data-i18n="tag_art">Mosaics & Arts</div>
            </div>
            <button class="btn-primary ripple" style="width: 100%; margin-top: 1rem;" id="generateBtn" data-i18n="btn_gen_itinerary">✦ Generate My Itinerary</button>
            <div id="itineraryOutput" class="hidden-view itinerary-box stagger-item"></div>
          </div>
        </div>
      </article>
    </section>

    <!-- CURRENCY SECTION -->
    <section id="sec-currency" class="view-section">
      <article class="section">
        <div class="section-header"><h2 class="section-title stagger-item" data-i18n="sec_currency">Currency <span class="gradient-text">Converter</span></h2></div>
        
        <div class="currency-container">
          <div class="currency-card stagger-item">
            <div class="currency-grid">
              <div class="curr-input-wrap">
                <div class="curr-label" data-i18n="curr_from">From</div>
                <div class="curr-input glass-input-wrap">
                  <select id="currFrom" class="transparent-select">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="SAR">SAR</option>
                    <option value="AED">AED</option>
                    <option value="QAR">QAR</option>
                    <option value="KWD">KWD</option>
                    <option value="CAD">CAD</option>
                  </select>
                  <input type="number" id="currAmount" class="transparent-input" value="100" />
                </div>
              </div>
              <div class="curr-arrow">⇄</div>
              <div class="curr-input-wrap">
                <div class="curr-label" data-i18n="curr_to">To JOD</div>
                <div class="curr-input glass-input-wrap highlight-wrap">
                  <span class="curr-result-val" id="currResult">70.90</span>
                  <span class="curr-currency">JOD</span>
                </div>
              </div>
            </div>
            <div class="rate-info">
              <span id="rateLabel">1 USD = 0.709 JOD</span>
              <span class="rate-note" data-i18n="rate_note">Approx. rate &middot; Verify locally</span>
            </div>
            <div class="exchange-tips">
              <div class="tips-title" data-i18n="tips_title">💡 Exchange Tips for Jordan</div>
              <div class="tips-desc" data-i18n="tips_desc">Exchange at licensed money changers in downtown Amman for best rates. Avoid airport exchanges. JOD is pegged to USD. Keep small bills for local markets and taxis.</div>
            </div>
          </div>

          <div class="ai-advisor-wrapper stagger-item">
            <div class="advisor-box">
              <div class="ai-header" style="margin-bottom: 2rem;">
                <div class="ai-icon" style="width: 50px; height: 50px; font-size: 24px;">🤖</div>
                <h3 style="margin:0; font-family:var(--font-serif); font-size:24px;" data-i18n="ai_adv_title">AI Currency <span class="gradient-text">Advisor</span></h3>
              </div>
              <p class="advisor-prompt" data-i18n="ai_adv_prompt">Ask about exchange rates, safety tips, or best places to exchange money in Jordan:</p>
              <div class="advisor-input-group">
                <input id="currencyQ" class="glass-input" type="text" data-i18n-placeholder="placeholder_currency" placeholder="e.g. Where's the best place to exchange in Amman?" />
                <button id="askCurrencyBtn" class="btn-primary ripple" data-i18n="btn_ask_ai">Ask AI</button>
              </div>
              <div id="currencyAIResp" class="hidden-view response-box"></div>
            </div>
          </div>
        </div>
      </article>
    </section>

    <!-- ADMIN SECTION -->
    <section id="sec-admin" class="view-section">
      <article class="section">
        <div class="admin-panel stagger-item">
          <div class="admin-header-bar">
            <div class="admin-title" data-i18n="admin_title">Admin Dashboard — Wayn?</div>
            <div class="admin-badge" data-i18n="admin_badge">Admin</div>
          </div>
          <div class="admin-body">
            <div class="admin-grid">
              <div class="admin-card"><div class="admin-num">17</div><div class="admin-label" data-i18n="stat_cities_lbl">Cities</div></div>
              <div class="admin-card"><div class="admin-num">480</div><div class="admin-label" data-i18n="stat_attr_lbl">Attractions</div></div>
              <div class="admin-card"><div class="admin-num">1,894</div><div class="admin-label" data-i18n="admin_users">Users</div></div>
              <div class="admin-card"><div class="admin-num">124</div><div class="admin-label" data-i18n="admin_active_trips">Active Trips</div></div>
              <div class="admin-card"><div class="admin-num">250</div><div class="admin-label" data-i18n="stat_rest_lbl">Restaurants</div></div>
              <div class="admin-card"><div class="admin-num">4.8★</div><div class="admin-label" data-i18n="admin_avg_rating">Avg Rating</div></div>
            </div>
            
            <div class="tabs">
              <button class="tab-btn active ripple" data-tab="content" data-i18n="tab_content">Content</button>
              <button class="tab-btn ripple" data-tab="users" data-i18n="tab_users">Users</button>
              <button class="tab-btn ripple" data-tab="analytics" data-i18n="tab_analytics">Analytics</button>
              <button class="tab-btn ripple" data-tab="ai" data-i18n="tab_ai">AI Insights</button>
            </div>
            
            <!-- ADMIN CONTENT -->
            <div id="admin-content" class="admin-tab-content">
              <div class="admin-content-grid">
                <button class="admin-action-btn ripple" data-action="cities">
                  <div class="action-icon">🏙️</div>
                  <div class="action-title" data-i18n="act_cities">Manage Cities</div>
                  <div class="action-desc" data-i18n="act_cities_desc">Add, edit, delete city content</div>
                </button>
                <button class="admin-action-btn ripple" data-action="restaurants">
                  <div class="action-icon">🍽️</div>
                  <div class="action-title" data-i18n="act_rest">Manage Restaurants</div>
                  <div class="action-desc" data-i18n="act_rest_desc">250 restaurants listed</div>
                </button>
                <button class="admin-action-btn ripple" data-action="hotels">
                  <div class="action-icon">🏨</div>
                  <div class="action-title" data-i18n="act_hot">Manage Hotels</div>
                  <div class="action-desc" data-i18n="act_hot_desc">156 hotels & guesthouses</div>
                </button>
                <button class="admin-action-btn ripple" data-action="experiences">
                  <div class="action-icon">🎭</div>
                  <div class="action-title" data-i18n="act_exp">Experiences</div>
                  <div class="action-desc" data-i18n="act_exp_desc">Local & cultural activities</div>
                </button>
              </div>
            </div>

            <!-- ADMIN USERS -->
            <div id="admin-users" class="admin-tab-content hidden-view">
              <div class="table-wrapper">
                <table class="users-table">
                  <thead>
                    <tr>
                      <th data-i18n="th_user">User</th>
                      <th data-i18n="th_mode">Mode</th>
                      <th data-i18n="th_trips">Trips</th>
                      <th data-i18n="th_status">Status</th>
                    </tr>
                  </thead>
                  <tbody id="usersTable">
                    <!-- Rendered by JS -->
                  </tbody>
                </table>
              </div>
            </div>

            <!-- ADMIN ANALYTICS -->
            <div id="admin-analytics" class="admin-tab-content hidden-view">
              <div class="analytics-grid">
                <div class="analytics-card">
                  <div class="analytics-title" data-i18n="top_dest">Top Destinations</div>
                  <div id="analyticsDestinations">
                    <!-- Rendered by JS -->
                  </div>
                </div>
                <div class="analytics-card">
                  <div class="analytics-title" data-i18n="user_breakdown">User Breakdown</div>
                  <div class="analytics-row">
                    <div class="analytics-color intl-color"></div>
                    <div class="analytics-label" data-i18n="lbl_intl">International</div>
                    <div class="analytics-val">65%</div>
                  </div>
                  <div class="analytics-row">
                    <div class="analytics-color local-color"></div>
                    <div class="analytics-label" data-i18n="lbl_local">Local Jordanian</div>
                    <div class="analytics-val">35%</div>
                  </div>
                  <div class="analytics-note" data-i18n="peak_month" style="margin-top: 1rem; color: var(--text-secondary); font-size: 13px;">Peak month: March–April</div>
                </div>
              </div>
            </div>

            <!-- ADMIN AI -->
            <div id="admin-ai" class="admin-tab-content hidden-view">
              <div class="advisor-box">
                <p class="advisor-prompt" data-i18n="ai_admin_prompt">Ask the AI admin assistant for insights on tourism trends, content gaps, or recommendations:</p>
                <div class="advisor-input-group">
                  <input id="adminAIQ" class="glass-input" type="text" data-i18n-placeholder="placeholder_admin" placeholder="e.g. What content should we add for summer 2026?" />
                  <button id="askAdminBtn" class="btn-primary ripple" data-i18n="btn_analyze">Analyze</button>
                </div>
                <div id="adminAIResp" class="hidden-view response-box"></div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div data-i18n="footer_text">Wayn? | وين؟ — Authentic Tourism Platform for Jordan</div>
    <div class="footer-sub" data-i18n="footer_sub">Powered by AI &middot; Built with &hearts; for Jordan</div>
  </footer>
</body>
</html>
