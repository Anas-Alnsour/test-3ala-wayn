// ==========================================
// WAYN? - Authentic Tourism Platform for Jordan
// Core Logic, i18n & Interactions
// ==========================================

// --- Translations Dictionary (100% Coverage, Authentic Dialect) ---
const translations = {
  en: {
    page_title: "Wayn? | Authentic Jordan",
    logo_text: "Wayn?",
    logo_sub: "Authentic Travel Â· Jordan",
    nav_explore: "Explore",
    nav_cities: "Cities",
    nav_planner: "AI Planner",
    nav_currency: "Currency",
    nav_admin: "Admin",
    hero_badge: "âœ¦ Authentic Jordanian Experience",
    hero_title: "Discover <span class='gradient-text'>Jordan</span>,<br>Your Way",
    hero_desc: "From the ancient streets of Petra to the crystal waters of Aqaba â€” plan your perfect Jordanian journey.",
    btn_plan_hero: "âœ¦ Plan My Trip",
    btn_explore_hero: "Explore Cities &rarr;",
    stat_cities_val: "17+",
    stat_cities_lbl: "Cities",
    stat_attr_val: "480+",
    stat_attr_lbl: "Attractions",
    stat_rest_val: "250+",
    stat_rest_lbl: "Restaurants",
    stat_ai_val: "AI",
    stat_ai_lbl: "Powered",
    stat_247_val: "24/7",
    stat_247_lbl: "Smart Guide",
    sec_choose_exp: "Choose Your <span class='gradient-text'>Experience</span>",
    mode_local_title: "ÙˆÙŠÙ† Ø·Ø´Ù‘ØªÙ†Ø§ Ø§Ù„ÙŠÙˆÙ…ØŸ",
    mode_local_sub: "Ù„Ù„Ù…ÙˆØ§Ø·Ù† Ø§Ù„Ø£Ø±Ø¯Ù†ÙŠ",
    mode_local_f1: "Ø£Ù…Ø§ÙƒÙ† Ù‚Ø±ÙŠØ¨Ø© Ù…Ù†Ùƒ Ù‡Ø³Ù‘Ø§",
    mode_local_f2: "Ø·Ø´Ù‘Ø§Øª Ø¨ØªØ¬Ù†Ù† Ø¹Ù„Ù‰ Ù‚Ø¯ Ø§Ù„Ø¬ÙŠØ¨Ø©",
    mode_local_f3: "Ù…Ù†Ø§Ø·Ù‚ Ù…Ø®ÙÙŠØ© Ù…Ø§ Ø¨ØªØ¹Ø±ÙÙ‡Ø§",
    mode_local_f4: "Ù…Ø·Ø§Ø¹Ù… Ø´Ø¹Ø¨ÙŠØ© Ø¨ØªÙØªØ­ Ø§Ù„Ù†ÙØ³",
    btn_mode_local: "ÙŠÙ„Ù‘Ø§ Ù†Ø¨Ù„Ù‘Ø´ &rarr;",
    mode_tourist_title: "Where To, Traveler?",
    mode_tourist_sub: "For International Visitors",
    mode_tourist_f1: "Full guided itineraries",
    mode_tourist_f2: "Cultural context & tips",
    mode_tourist_f3: "Curated experiences",
    mode_tourist_f4: "Safety & logistics info",
    btn_mode_tourist: "Start Planning &rarr;",
    sec_categories: "Travel <span class='gradient-text'>Categories</span>",
    cat_history: "History",
    cat_food: "Food",
    cat_hotels: "Hotels",
    cat_hiking: "Hiking",
    cat_desert: "Desert",
    cat_water: "Water",
    cat_farms: "Farms",
    cat_culture: "Culture",
    sec_flavors: "Jordanian <span class='gradient-text'>Flavors</span>",
    food_mansaf: "Mansaf",
    food_mansaf_desc: "Jordan's national dish â€” slow-cooked lamb in dried yogurt sauce, served on fragrant rice",
    food_falafel: "Falafel",
    food_falafel_desc: "Crispy fried chickpea fritters, best enjoyed fresh from street vendors in Amman",
    food_knafeh: "Knafeh",
    food_knafeh_desc: "Sweet shredded pastry soaked in sugar syrup with soft white cheese â€” a Levantine legend",
    food_coffee: "Arabic Coffee",
    food_coffee_desc: "Cardamom-infused qahwa served in small cups â€” a gesture of Jordanian hospitality",
    sec_explore_cities: "Explore <span class='gradient-text'>Jordan's Cities</span>",
    btn_back_cities: "&larr; Back to Cities",
    plan_trip_to: "âœ¦ Plan Trip to ",
    ai_planner_title: "AI Smart Trip Planner",
    ai_planner_desc: "Generate a full personalized itinerary powered by AI intelligence",
    plan_dest: "Destination",
    plan_dest_all: "All Jordan",
    plan_dur: "Duration",
    plan_dur_1: "1 Day",
    plan_dur_3: "3 Days",
    plan_dur_5: "5 Days",
    plan_dur_7: "1 Week",
    plan_dur_14: "2 Weeks",
    plan_budget: "Budget (USD)",
    plan_bud_budget: "Budget ($30-80/day)",
    plan_bud_mid: "Mid-range ($80-200/day)",
    plan_bud_lux: "Luxury ($200+/day)",
    plan_style: "Travel Style",
    plan_style_solo: "Solo Traveler",
    plan_style_couple: "Couple",
    plan_style_family: "Family",
    plan_style_group: "Group",
    tags_label: "Your Interests",
    tag_hist: "History & Ruins",
    tag_food: "Local Food",
    tag_adv: "Adventure",
    tag_camp: "Desert Camping",
    tag_water: "Swimming & Water",
    tag_photo: "Photography",
    tag_rel: "Religious Sites",
    tag_hike: "Hiking",
    tag_market: "Local Markets",
    tag_art: "Mosaics & Arts",
    btn_gen_itinerary: "âœ¦ Generate My Itinerary",
    sec_currency: "Currency <span class='gradient-text'>Converter</span>",
    curr_from: "From",
    curr_to: "To JOD",
    rate_note: "Approx. rate Â· Verify locally",
    tips_title: "ðŸ’¡ Exchange Tips for Jordan",
    tips_desc: "Exchange at licensed money changers in downtown Amman for best rates. Avoid airport exchanges. JOD is pegged to USD. Keep small bills for local markets and taxis.",
    ai_adv_title: "AI Currency <span class='gradient-text'>Advisor</span>",
    ai_adv_prompt: "Ask about exchange rates, safety tips, or best places to exchange money in Jordan:",
    placeholder_currency: "e.g. Where's the best place to exchange in Amman?",
    btn_ask_ai: "Ask AI",
    admin_title: "Admin Dashboard â€” Wayn?",
    admin_badge: "Admin",
    admin_active_trips: "Active Trips",
    admin_users: "Users",
    admin_avg_rating: "Avg Rating",
    tab_content: "Content",
    tab_users: "Users",
    tab_analytics: "Analytics",
    tab_ai: "AI Insights",
    act_cities: "Manage Cities",
    act_cities_desc: "Add, edit, delete city content",
    act_rest: "Manage Restaurants",
    act_rest_desc: "250 restaurants listed",
    act_hot: "Manage Hotels",
    act_hot_desc: "156 hotels & guesthouses",
    act_exp: "Experiences",
    act_exp_desc: "Local & cultural activities",
    th_user: "User",
    th_mode: "Mode",
    th_trips: "Trips",
    th_status: "Status",
    top_dest: "Top Destinations",
    user_breakdown: "User Breakdown",
    lbl_intl: "International",
    lbl_local: "Local Jordanian",
    peak_month: "Peak month: Marchâ€“April",
    ai_admin_prompt: "Ask the AI admin assistant for insights on tourism trends, content gaps, or recommendations:",
    placeholder_admin: "e.g. What content should we add for summer 2026?",
    btn_analyze: "Analyze",
    footer_text: "Wayn? | ÙˆÙŠÙ†ØŸ â€” Authentic Tourism Platform for Jordan",
    footer_sub: "Powered by AI Â· Built with â™¥ for Jordan",
    mode_local_badge: "Local ðŸ‡¯ðŸ‡´",
    mode_tourist_badge: "Tourist ðŸŒ",
    status_active: "Active",
    status_inactive: "Inactive",
    ai_mock_loading_itinerary: "Analyzing preferences and generating your personalized itinerary...",
    ai_mock_pre_itinerary: "Here is your personalized",
    ai_mock_post_itinerary: "Enjoy your trip to Jordan! Wayn? is here if you need more help.",
    ai_mock_loading_curr: "Gathering financial insights...",
    ai_mock_curr_resp: "Based on current local data for Jordan:\n\nFor the best rates, avoid airport kiosks. Head to Al-Balad (Downtown Amman) where money changers offer competitive, regulated rates with very low commission. Keep small denominations (1 and 5 JOD bills) for taxis and local shops, as large bills are hard to break.",
    ai_mock_loading_admin: "Analyzing platform telemetry...",
    ai_mock_admin_resp: "**AI Insight Report:**\n\nBased on your question, I analyzed the behavior of our 1,894 active users. We are seeing a 45% increase in searches for \"Wellness\" and \"Eco-tourism\". \n\n**Recommendation:** \nPrioritize adding new content for farm stays in Ajloun and eco-lodges in Dana Biosphere Reserve before the summer peak season."
  },
  ar: {
    page_title: "ÙˆÙŠÙ†ØŸ | Ø§Ù„Ø£Ø±Ø¯Ù† Ø§Ù„Ø£ØµÙŠÙ„",
    logo_text: "ÙˆÙŠÙ†ØŸ",
    logo_sub: "Ø³ÙŠØ§Ø­Ø© Ø£ØµÙŠÙ„Ø© Â· Ø§Ù„Ø£Ø±Ø¯Ù†",
    nav_explore: "Ø¯ÙŠØ±ØªÙ†Ø§",
    nav_cities: "Ù…Ø­Ø§ÙØ¸Ø§ØªÙ†Ø§",
    nav_planner: "Ù…Ø®Ø·Ø· Ø§Ù„Ø·Ø´Ù‘Ø§Øª",
    nav_currency: "Ø§Ù„Ø¹Ù…Ù„Ø§Øª",
    nav_admin: "Ø§Ù„Ø¥Ø¯Ø§Ø±Ø©",
    hero_badge: "ÙŠØ§ Ù‡Ù„Ø§ Ø¨Ø§Ù„Ø¶ÙŠÙ",
    hero_title: "Ø§ÙƒØªØ´Ù <span class='gradient-text'>Ø§Ù„Ø£Ø±Ø¯Ù†</span>ØŒ<br>Ø¹Ù„Ù‰ ÙƒÙŠÙÙƒ",
    hero_desc: "Ù…Ù† Ø¬Ø¨Ø§Ù„ Ø§Ù„Ø¨ØªØ±Ø§ Ø§Ù„Ø¹Ø¸ÙŠÙ…Ø© Ù„Ù…ÙŠØ© Ø§Ù„Ø¹Ù‚Ø¨Ø© Ø§Ù„ØµØ§ÙÙŠØ© â€” Ø®Ø·Ø· Ù„Ø±Ø­Ù„ØªÙƒ Ø§Ù„Ø£Ø±Ø¯Ù†ÙŠØ© Ø§Ù„ØµØ­ ÙˆØªØ¹Ø±Ù‘Ù Ø¹Ù„Ù‰ Ø¯ÙŠØ±ØªÙƒ.",
    btn_plan_hero: "âœ¦ Ø®Ø·Ø· Ø·Ø´Ù‘ØªÙŠ",
    btn_explore_hero: "Ù„ÙÙ‘ Ø§Ù„Ù…Ø¯Ù† &larr;",
    stat_cities_val: "+17",
    stat_cities_lbl: "Ù…Ø¯ÙŠÙ†Ø© ÙˆÙ…Ø­Ø§ÙØ¸Ø©",
    stat_attr_val: "+480",
    stat_attr_lbl: "Ù…ÙƒØ§Ù† Ø³ÙŠØ§Ø­ÙŠ",
    stat_rest_val: "+250",
    stat_rest_lbl: "Ù…Ø·Ø¹Ù… ÙˆÙ‚Ø¹Ø¯Ø©",
    stat_ai_val: "AI",
    stat_ai_lbl: "Ù…Ø¯Ø¹ÙˆÙ… Ø¨Ù€",
    stat_247_val: "24/7",
    stat_247_lbl: "Ø¯Ù„ÙŠÙ„ Ø°ÙƒÙŠ",
    sec_choose_exp: "Ø§Ø®ØªØ§Ø± <span class='gradient-text'>Ø¬ÙˆÙ‘Ùƒ</span>",
    mode_local_title: "ÙˆÙŠÙ† Ø·Ø´Ù‘ØªÙ†Ø§ Ø§Ù„ÙŠÙˆÙ…ØŸ",
    mode_local_sub: "Ù„Ù„Ù…ÙˆØ§Ø·Ù† Ø§Ù„Ø£Ø±Ø¯Ù†ÙŠ",
    mode_local_f1: "Ø£Ù…Ø§ÙƒÙ† Ù‚Ø±ÙŠØ¨Ø© Ù…Ù†Ùƒ Ù‡Ø³Ù‘Ø§",
    mode_local_f2: "Ø·Ø´Ù‘Ø§Øª Ø¨ØªØ¬Ù†Ù† Ø¹Ù„Ù‰ Ù‚Ø¯ Ø§Ù„Ø¬ÙŠØ¨Ø©",
    mode_local_f3: "Ù…Ù†Ø§Ø·Ù‚ Ù…Ø®ÙÙŠØ© Ù…Ø§ Ø¨ØªØ¹Ø±ÙÙ‡Ø§",
    mode_local_f4: "Ù…Ø·Ø§Ø¹Ù… Ø´Ø¹Ø¨ÙŠØ© Ø¨ØªÙØªØ­ Ø§Ù„Ù†ÙØ³",
    btn_mode_local: "ÙŠÙ„Ù‘Ø§ Ù†Ø¨Ù„Ù‘Ø´ &larr;",
    mode_tourist_title: "Ø¥Ù„Ù‰ Ø£ÙŠÙ† Ø£ÙŠÙ‡Ø§ Ø§Ù„Ù…Ø³Ø§ÙØ±ØŸ",
    mode_tourist_sub: "Ù„Ù„Ø²ÙˆØ§Ø± Ø§Ù„Ø¯ÙˆÙ„ÙŠÙŠÙ†",
    mode_tourist_f1: "Ù…Ø³Ø§Ø±Ø§Øª Ù…ÙˆØ¬Ù‡Ø© Ø¨Ø§Ù„ÙƒØ§Ù…Ù„",
    mode_tourist_f2: "Ø³ÙŠØ§Ù‚ Ø«Ù‚Ø§ÙÙŠ ÙˆÙ†ØµØ§Ø¦Ø­",
    mode_tourist_f3: "ØªØ¬Ø§Ø±Ø¨ Ù…Ù†ØªÙ‚Ø§Ø©",
    mode_tourist_f4: "Ù…Ø¹Ù„ÙˆÙ…Ø§Øª Ø§Ù„Ø³Ù„Ø§Ù…Ø© ÙˆØ§Ù„Ù„ÙˆØ¬Ø³ØªÙŠØ§Øª",
    btn_mode_tourist: "Ø§Ø¨Ø¯Ø£ Ø§Ù„ØªØ®Ø·ÙŠØ· &larr;",
    sec_categories: "ÙˆÙŠÙ€Ù† <span class='gradient-text'>Ø­Ø§Ø¨ÙŠÙ†ØŸ</span>",
    cat_history: "ØªØ§Ø±ÙŠØ®Ù†Ø§",
    cat_food: "Ø£ÙƒÙ„Ù†Ø§",
    cat_hotels: "ÙÙ†Ø§Ø¯Ù‚",
    cat_hiking: "Ù…Ø³ÙŠØ± ÙˆÙ‡Ø§ÙŠÙƒÙ†Ø¬",
    cat_desert: "ØµØ­Ø±Ø§Ø¡",
    cat_water: "Ù…ÙŠØ© ÙˆØ³Ø¨Ø§Ø­Ø©",
    cat_farms: "Ù…Ø²Ø§Ø±Ø¹Ù†Ø§",
    cat_culture: "Ø«Ù‚Ø§ÙØªÙ†Ø§",
    sec_flavors: "Ø£ÙƒÙ„Ù†Ø§ <span class='gradient-text'>Ø§Ù„Ø²Ø§ÙƒÙŠ</span>",
    food_mansaf: "Ø§Ù„Ù…Ù†Ø³Ù",
    food_mansaf_desc: "Ù…Ù†Ø³ÙÙ†Ø§ Ø¯Ø­Ù‘ÙŠØ¬Ø©ØŒ Ù…Ø§ ÙŠØ­Ù„Ù‰ Ø¥Ù„Ø§ Ø¨Ø§Ù„Ø¬Ù…ÙŠØ¯ Ø§Ù„ÙƒØ±ÙƒÙŠØŒ Ø£ØµÙˆÙ„ Ø§Ù„ÙƒØ±Ù… Ø§Ù„Ø£Ø±Ø¯Ù†ÙŠ ÙˆØ§Ù„Ø¶ÙŠØ§ÙØ© Ø§Ù„ØµØ­.",
    food_falafel: "Ø§Ù„ÙÙ„Ø§ÙÙ„",
    food_falafel_desc: "Ø­Ø¨Ø§Øª ÙÙ„Ø§ÙÙ„ Ù…Ù‚Ø±Ù…Ø´Ø© Ø¨ØªØ´Ù‡ÙŠ Ù…Ù† Ù‚Ø§Ø¹ Ø§Ù„Ù…Ø¯ÙŠÙ†Ø©ØŒ Ø£Ø·ÙŠØ¨ Ø¥ÙØ·Ø§Ø± Ø¹Ù„Ù‰ Ø§Ù„Ù…Ø§Ø´ÙŠ Ù…Ø¹ ÙƒØ§Ø³Ø© Ø´Ø§ÙŠ.",
    food_knafeh: "Ø§Ù„ÙƒÙ†Ø§ÙØ©",
    food_knafeh_desc: "ÙƒÙ†Ø§ÙØ© Ù†Ø§Ø¨Ù„Ø³ÙŠØ© Ø¨ØªÙ…Ø·ØŒ ØºØ±Ù‚Ø§Ù†Ø© Ø¨Ø§Ù„Ù‚Ø·Ø±ØŒ Ø£Ø­Ù„Ù‰ ØªØ­Ù„Ø§ÙŠØ© Ø¨Ø¹Ø¯ Ø§Ù„Ù…Ù†Ø³Ù Ø£Ùˆ Ø¨Ø£ÙŠ Ø§Ø­ØªÙØ§Ù„.",
    food_coffee: "Ø§Ù„Ù‚Ù‡ÙˆØ© Ø§Ù„Ø³Ø§Ø¯Ø©",
    food_coffee_desc: "Ù‚Ù‡ÙˆØ© Ø³Ø§Ø¯Ø© Ù…Ù‡ÙŠÙ‘Ù„Ø© Ø¨ØªØ¹Ø¯Ù‘Ù„ Ø§Ù„Ù…Ø²Ø§Ø¬ØŒ ÙŠØ§ Ù‡Ù„Ø§ Ø¨Ø§Ù„Ø¶ÙŠÙØŒ Ø±Ù…Ø² Ø§Ù„ÙƒØ±Ù… ÙˆØ­Ø³Ù† Ø§Ù„Ø§Ø³ØªÙ‚Ø¨Ø§Ù„.",
    sec_explore_cities: "Ù„ÙÙ‘ <span class='gradient-text'>Ù…Ø­Ø§ÙØ¸Ø§ØªÙ†Ø§</span>",
    btn_back_cities: "&rarr; Ø§Ø±Ø¬Ø¹ Ù„Ù„Ù…Ø¯Ù†",
    plan_trip_to: "âœ¦ Ø®Ø·Ø· Ø·Ø´Ù‘Ø© Ù„Ù€ ",
    ai_planner_title: "Ù…Ø®Ø·Ø· Ø§Ù„Ø·Ø´Ù‘Ø§Øª Ø§Ù„Ø°ÙƒÙŠ",
    ai_planner_desc: "Ø®Ù„ÙŠ Ø§Ù„Ø°ÙƒØ§Ø¡ Ø§Ù„Ø§ØµØ·Ù†Ø§Ø¹ÙŠ ÙŠØ²Ø¨Ø·Ù„Ùƒ Ø£Ø­Ù„Ù‰ Ø¨Ø±Ù†Ø§Ù…Ø¬ Ù„Ù„Ø±Ø­Ù„Ø©",
    plan_dest: "ÙˆÙŠÙ† Ø§Ù„Ù†ÙŠØ©ØŸ",
    plan_dest_all: "ÙƒÙ„ Ø§Ù„Ø£Ø±Ø¯Ù†",
    plan_dur: "ÙƒÙ… ÙŠÙˆÙ…ØŸ",
    plan_dur_1: "ÙŠÙˆÙ… ÙˆØ§Ø­Ø¯",
    plan_dur_3: "3 Ø£ÙŠØ§Ù…",
    plan_dur_5: "5 Ø£ÙŠØ§Ù…",
    plan_dur_7: "Ø£Ø³Ø¨ÙˆØ¹",
    plan_dur_14: "Ø£Ø³Ø¨ÙˆØ¹ÙŠÙ†",
    plan_budget: "Ø§Ù„Ù…ÙŠØ²Ø§Ù†ÙŠØ©",
    plan_bud_budget: "Ù…ÙŠØ²Ø§Ù†ÙŠØ© Ù…Ø­Ø¯ÙˆØ¯Ø©",
    plan_bud_mid: "Ù…ØªÙˆØ³Ø·Ø©",
    plan_bud_lux: "ÙØ§Ø®Ø±Ø© ÙˆÙ…Ø¯Ù„Ø¹Ø©",
    plan_style: "Ø§Ù„ØµØ­Ø¨Ø©",
    plan_style_solo: "Ù„Ø­Ø§Ù„ÙŠ",
    plan_style_couple: "Ø£Ù†Ø§ ÙˆØ§Ù„Ø­Ø¨",
    plan_style_family: "Ù…Ø¹ Ø§Ù„Ø¹ÙŠÙ„Ø©",
    plan_style_group: "Ø£Ù†Ø§ ÙˆØ§Ù„Ø´Ù„Ø©",
    tags_label: "Ø´Ùˆ Ø¬ÙˆÙ‘ÙƒØŸ",
    tag_hist: "ØªØ§Ø±ÙŠØ® ÙˆØ¢Ø«Ø§Ø±",
    tag_food: "Ø£ÙƒÙ„ ÙˆØªØ°ÙˆÙ‚",
    tag_adv: "Ù…ØºØ§Ù…Ø±Ø§Øª",
    tag_camp: "ØªØ®ÙŠÙŠÙ… Ø¨Ø§Ù„ØµØ­Ø±Ø§",
    tag_water: "Ù…Ø³Ø§Ø¨Ø­ ÙˆÙ…ÙŠØ©",
    tag_photo: "ØªØµÙˆÙŠØ± Ø·Ø¨ÙŠØ¹Ø©",
    tag_rel: "Ù…Ù‚Ø§Ù…Ø§Øª ÙˆØ£Ø¯ÙŠØ±Ø©",
    tag_hike: "Ù‡Ø§ÙŠÙƒÙ†Ø¬",
    tag_market: "Ø£Ø³ÙˆØ§Ù‚ Ø´Ø¹Ø¨ÙŠØ©",
    tag_art: "ÙÙ†ÙˆÙ† ÙˆØªØ±Ø§Ø«",
    btn_gen_itinerary: "âœ¦ Ø²Ø¨Ù‘Ø·Ù„ÙŠ Ø§Ù„Ø¨Ø±Ù†Ø§Ù…Ø¬",
    sec_currency: "Ø­Ø§Ø³Ø¨Ø© <span class='gradient-text'>Ø§Ù„Ø¹Ù…Ù„Ø§Øª</span>",
    curr_from: "Ù…Ù†",
    curr_to: "Ø¥Ù„Ù‰ Ø§Ù„Ø¯ÙŠÙ†Ø§Ø±",
    rate_note: "Ø³Ø¹Ø± ØªÙ‚Ø±ÙŠØ¨ÙŠ Â· ØªØ£ÙƒØ¯ Ù…Ù† Ø§Ù„ØµØ±Ø§Ù",
    tips_title: "ðŸ’¡ Ù†ØµØ§Ø¦Ø­ Ù„Ù„ØµØ±Ø§ÙØ© Ø¨Ø¨Ù„Ø¯Ù†Ø§",
    tips_desc: "Ø±ÙˆØ­ Ø¹Ù„Ù‰ Ù…Ø­Ù„Ø§Øª Ø§Ù„ØµØ±Ø§ÙØ© Ø¨ÙˆØ³Ø· Ø§Ù„Ø¨Ù„Ø¯ Ø¹Ø´Ø§Ù† Ø£Ø­Ø³Ù† Ø³Ø¹Ø±. Ø¨Ù„Ø§Ø´ ØµØ±Ø§ÙØ© Ø§Ù„Ù…Ø·Ø§Ø±. Ø¯ÙŠÙ†Ø§Ø±Ù†Ø§ Ù…Ø±Ø¨ÙˆØ· Ø¨Ø§Ù„Ø¯ÙˆÙ„Ø§Ø± ÙˆÙˆØ¶Ø¹Ù‡ ØªÙ…Ø§Ù…. Ø®Ù„ÙŠ Ù…Ø¹Ùƒ ÙØ±Ø§Ø·Ø© ÙˆÙØ¦Ø§Øª ØµØºÙŠØ±Ø© Ù„Ù„ØªÙƒØ§Ø³ÙŠ ÙˆØ§Ù„Ù…Ø­Ù„Ø§Øª Ø§Ù„ØµØºÙŠØ±Ø©.",
    ai_adv_title: "Ù…Ø³ØªØ´Ø§Ø± <span class='gradient-text'>Ø§Ù„Ø¹Ù…Ù„Ø§Øª Ø§Ù„Ø°ÙƒÙŠ</span>",
    ai_adv_prompt: "Ø§Ø³Ø£Ù„ Ø¹Ù† Ø£Ø³Ø¹Ø§Ø± Ø§Ù„ØµØ±ÙØŒ Ø£Ùˆ Ø£Ø­Ø³Ù† Ù…ÙƒØ§Ù† ØªØµØ±Ù ÙÙŠÙ‡ Ù…ØµØ§Ø±ÙŠÙƒ:",
    placeholder_currency: "Ù…Ø«Ø§Ù„: ÙˆÙŠÙ† Ø£Ø­Ø³Ù† ØµØ±Ø§Ù Ø¨Ø¹Ù…Ø§Ù†ØŸ",
    btn_ask_ai: "Ø§Ø³Ø£Ù„ Ø§Ù„Ø°ÙƒÙŠ",
    admin_title: "Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… Ø§Ù„Ø¥Ø¯Ø§Ø±Ø© â€” ÙˆÙŠÙ†ØŸ",
    admin_badge: "Ø¥Ø¯Ø§Ø±Ø©",
    admin_active_trips: "Ø§Ù„Ø±Ø­Ù„Ø§Øª Ø§Ù„Ø´ØºØ§Ù„Ø©",
    admin_users: "Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†",
    admin_avg_rating: "Ù…Ø¹Ø¯Ù„ Ø§Ù„ØªÙ‚ÙŠÙŠÙ…",
    tab_content: "Ø§Ù„Ù…Ø­ØªÙˆÙ‰",
    tab_users: "Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†",
    tab_analytics: "Ø§Ù„ØªØ­Ù„ÙŠÙ„Ø§Øª",
    tab_ai: "Ø±Ø¤Ù‰ Ø§Ù„Ø°ÙƒÙŠ",
    act_cities: "Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ø­Ø§ÙØ¸Ø§Øª",
    act_cities_desc: "Ø¶ÙŠÙ ÙˆØ¹Ø¯Ù‘Ù„ Ù…Ø¹Ù„ÙˆÙ…Ø§Øª Ø§Ù„Ù…Ø­Ø§ÙØ¸Ø§Øª",
    act_rest: "Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ø·Ø§Ø¹Ù…",
    act_rest_desc: "250 Ù…Ø·Ø¹Ù… Ù†Ø§Ø²Ù„ Ø¹Ù„Ù‰ Ø§Ù„Ù…Ù†ØµØ©",
    act_hot: "Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„ÙÙ†Ø§Ø¯Ù‚",
    act_hot_desc: "156 ÙÙ†Ø¯Ù‚ ÙˆØ´Ø§Ù„ÙŠÙ‡",
    act_exp: "Ø§Ù„ØªØ¬Ø§Ø±Ø¨",
    act_exp_desc: "ØªØ¬Ø§Ø±Ø¨ ÙˆÙ…ØºØ§Ù…Ø±Ø§Øª Ù…Ø­Ù„ÙŠØ©",
    th_user: "Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…",
    th_mode: "Ø§Ù„Ø¬Ùˆ",
    th_trips: "Ø¹Ø¯Ø¯ Ø§Ù„Ø±Ø­Ù„Ø§Øª",
    th_status: "Ø§Ù„Ø­Ø§Ù„Ø©",
    top_dest: "Ø£ÙƒØ«Ø± Ø§Ù„Ù…Ø­Ø§ÙØ¸Ø§Øª Ø·Ù„Ø¨",
    user_breakdown: "ØªÙˆØ²ÙŠØ¹ Ø§Ù„Ø²ÙˆØ§Ø±",
    lbl_intl: "Ø³ÙŠØ§Ø­ Ø£Ø¬Ø§Ù†Ø¨",
    lbl_local: "ÙˆÙ„Ø§Ø¯ Ø§Ù„Ø¨Ù„Ø¯",
    peak_month: "Ø£ÙƒØ«Ø± Ø´Ù‡Ø± Ø¹Ù„ÙŠÙ‡ Ø­Ø±ÙƒØ©: Ø´Ù‡Ø± 3 Ùˆ 4",
    ai_admin_prompt: "Ø§Ø³Ø£Ù„ Ø§Ù„Ù…Ø³Ø§Ø¹Ø¯ Ø§Ù„Ø°ÙƒÙŠ Ø¹Ù† ÙˆØ¶Ø¹ Ø§Ù„Ø³ÙŠØ§Ø­Ø© ÙˆØ§ÙŠØ´ Ù†Ø§Ù‚ØµÙ†Ø§ Ù…Ø­ØªÙˆÙ‰:",
    placeholder_admin: "Ù…Ø«Ø§Ù„: Ø´Ùˆ Ù†Ø²ÙŠØ¯ Ø£Ù…Ø§ÙƒÙ† Ù„ØµÙŠÙ 2026ØŸ",
    btn_analyze: "Ø­Ù„Ù‘Ù„",
    footer_text: "ÙˆÙŠÙ†ØŸ | Wayn? â€” Ù…Ù†ØµØ© Ø§Ù„Ø³ÙŠØ§Ø­Ø© Ø§Ù„Ø£Ø±Ø¯Ù†ÙŠØ© Ø§Ù„Ø£ØµÙŠÙ„Ø©",
    footer_sub: "Ù…Ø¯Ø¹ÙˆÙ… Ø¨Ø§Ù„Ø°ÙƒØ§Ø¡ Ø§Ù„Ø§ØµØ·Ù†Ø§Ø¹ÙŠ Â· Ø§Ù†Ø¹Ù…Ù„ Ø¨Ø­Ø¨ Ø¹Ø´Ø§Ù† Ø§Ù„Ø£Ø±Ø¯Ù†",
    mode_local_badge: "Ø§Ø¨Ù† Ø§Ù„Ø¨Ù„Ø¯ ðŸ‡¯ðŸ‡´",
    mode_tourist_badge: "Ø³Ø§Ø¦Ø­ ðŸŒ",
    status_active: "Ø´ØºØ§Ù„",
    status_inactive: "Ù…ÙˆÙ‚Ù",
    ai_mock_loading_itinerary: "Ø¹Ù… Ø¨Ø¬Ù‡Ù‘Ø²Ù„Ùƒ Ø£Ø­Ù„Ù‰ Ø¨Ø±Ù†Ø§Ù…Ø¬ ÙˆØ¨Ø²Ø¨Ø·Ù„Ùƒ Ø§Ù„Ø·Ø´Ù‘Ø©...",
    ai_mock_pre_itinerary: "Ù‡Ø§Ø¯ Ø¨Ø±Ù†Ø§Ù…Ø¬ Ø±Ø­Ù„ØªÙƒ Ù„Ù€",
    ai_mock_post_itinerary: "Ø§Ù†Ø´Ø§Ù„Ù„Ù‡ ØªÙ†Ø¨Ø³Ø·ÙˆØ§ Ø¨Ø§Ù„Ø·Ø´Ù‘Ø©! (ÙˆÙŠÙ†ØŸ) Ø¯Ø§ÙŠÙ…Ø§Ù‹ Ù…Ø¹Ùƒ Ù„Ø£ÙŠ ÙØ²Ø¹Ø©.",
    ai_mock_loading_curr: "Ø¹Ù… Ø¨Ø­Ø³Ø¨Ù„Ùƒ Ø§Ù„Ø£Ø³Ø¹Ø§Ø±...",
    ai_mock_curr_resp: "Ø­Ø³Ø¨ Ø§Ù„ÙˆØ¶Ø¹ Ø§Ù„Ø­Ø§Ù„ÙŠ Ø¨Ø§Ù„Ø³ÙˆÙ‚:\n\nØ¹Ø´Ø§Ù† ØªØ§Ø®Ø¯ Ø£Ø­Ø³Ù† Ø³Ø¹Ø±ØŒ Ø±ÙˆØ­ Ø¹Ù„Ù‰ ÙˆØ³Ø· Ø§Ù„Ø¨Ù„Ø¯ Ø¨Ø¹Ù…Ø§Ù†ØŒ Ù…Ø­Ù„Ø§Øª Ø§Ù„ØµØ±Ø§ÙØ© Ù‡Ù†Ø§Ùƒ Ø¨ØªØ¹Ø·ÙŠÙƒ Ø³Ø¹Ø± Ù…Ù…ØªØ§Ø² ÙˆØ¹Ù…ÙˆÙ„ØªÙ‡Ø§ Ø®ÙÙŠÙØ©. Ø¯Ø§ÙŠÙ…Ø§Ù‹ Ø®Ù„ÙŠ Ù…Ø¹Ùƒ ÙØ±Ø§Ø·Ø© (Ø¯Ù†Ø§Ù†ÙŠØ± ÙˆØ®Ù…Ø³Ø§Øª) Ø¹Ø´Ø§Ù† Ø§Ù„ØªÙƒØ§Ø³ÙŠ ÙˆØ¯ÙƒØ§ÙƒÙŠÙ† Ø§Ù„Ø­Ø§Ø±Ø© Ù…Ø§ Ø¨ØªÙ„Ø§Ù‚ÙŠ Ù…Ø¹Ù‡Ù… ÙÙƒØ© Ø¨Ø³Ù‡ÙˆÙ„Ø©.",
    ai_mock_loading_admin: "Ø¹Ù… Ø¨Ø­Ù„Ù„ Ø¨ÙŠØ§Ù†Ø§Øª Ø§Ù„Ù…Ù†ØµØ©...",
    ai_mock_admin_resp: "**ØªÙ‚Ø±ÙŠØ± Ø°ÙƒØ§Ø¡ Ø§ØµØ·Ù†Ø§Ø¹ÙŠ:**\n\nØ¨Ù†Ø§Ø¡Ù‹ Ø¹Ù„Ù‰ Ø·Ù„Ø¨ÙƒØŒ Ø­Ù„Ù„Øª ØªÙØ¶ÙŠÙ„Ø§Øª 1,894 Ù…Ø³ØªØ®Ø¯Ù…. ÙÙŠ Ø²ÙŠØ§Ø¯Ø© 45Ùª Ø¹Ù„Ù‰ Ø·Ù„Ø¨Ø§Øª (Ø§Ù„Ø³ÙŠØ§Ø­Ø© Ø§Ù„Ø¨ÙŠØ¦ÙŠØ©) Ùˆ(Ø§Ù„Ø§Ø³ØªØ¬Ù…Ø§Ù…).\n\n**Ø§Ù‚ØªØ±Ø§Ø­ÙŠ:** \nØ±ÙƒØ²ÙˆØ§ ØªÙ†Ø²Ù„ÙˆØ§ Ø£Ù…Ø§ÙƒÙ† Ø£ÙƒØªØ± Ø¹Ù† Ø§Ù„Ø´Ø§Ù„ÙŠÙ‡Ø§Øª Ø§Ù„Ø±ÙŠÙÙŠØ© Ø¨Ø¹Ø¬Ù„ÙˆÙ† ÙˆØ§Ù„Ù…Ø®ÙŠÙ…Ø§Øª Ø§Ù„Ø¨ÙŠØ¦ÙŠØ© Ø¨Ù…Ø­Ù…ÙŠØ© Ø¶Ø§Ù†Ø§ Ù‚Ø¨Ù„ Ù…Ø§ ØªØ¨Ù„Ù‘Ø´ Ø¹Ø¬Ù‚Ø© Ø§Ù„ØµÙŠÙ."
  }
};

// --- State Management ---
const state = {
  currentMode: 'en',
  currentSection: 'home',
  currentCityId: null,
  isAnimating: false,
  rates: { USD: 0.709, EUR: 0.77, GBP: 0.90, SAR: 0.189, AED: 0.193, QAR: 0.194, KWD: 2.31, CAD: 0.52 },
};

// --- Data Models (Fully Bilingual, Expanded, 100% Unique Real Images) ---
const cities = window.appCities || [];

// Admin Users Dictionary Mock
const adminUsers = [
  { name: 'Sara Al-Ahmad', modeKey: 'mode_local_badge', trips: 7, statusKey: 'status_active' },
  { name: 'James Wilson', modeKey: 'mode_tourist_badge', trips: 1, statusKey: 'status_active' },
  { name: 'Lena Hoffman', modeKey: 'mode_tourist_badge', trips: 3, statusKey: 'status_active' },
  { name: 'Omar Khalil', modeKey: 'mode_local_badge', trips: 12, statusKey: 'status_active' },
  { name: 'Yuki Tanaka', modeKey: 'mode_tourist_badge', trips: 2, statusKey: 'status_inactive' },
  { name: 'Ahmad Al-Zoubi', modeKey: 'mode_local_badge', trips: 24, statusKey: 'status_active' },
  { name: 'Maria Garcia', modeKey: 'mode_tourist_badge', trips: 1, statusKey: 'status_inactive' },
  { name: 'David Smith', modeKey: 'mode_tourist_badge', trips: 5, statusKey: 'status_active' }
];


// --- Initialization ---
document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initInteractions();
  initCurrencyConverter();
  initAdminPanel();
  initParallax();
  initImageLoading();
  
  // Set initial i18n
  updateLanguage();
  
  // Render dynamic data
  renderCities();
  convertCurrency();

  // FIX FOR INITIAL RENDER BUG & WIKI FETCH
  state.currentSection = null;
  switchSection('home');
  processWikiImages();
});

const wikiImageCache = {};

async function fetchWikiImage(articleTitle) {
  if (wikiImageCache[articleTitle]) return wikiImageCache[articleTitle];
  try {
    const res = await fetch(`https://en.wikipedia.org/api/rest_v1/page/summary/${encodeURIComponent(articleTitle)}`);
    if (!res.ok) throw new Error('Wiki fetch failed');
    const data = await res.json();
    let imgUrl = '';
    if (data.originalimage && data.originalimage.source) {
      imgUrl = data.originalimage.source;
    } else if (data.thumbnail && data.thumbnail.source) {
      imgUrl = data.thumbnail.source;
    } else {
      throw new Error('No image in wiki response');
    }
    wikiImageCache[articleTitle] = imgUrl;
    return imgUrl;
  } catch (error) {
    console.warn(`Failed to fetch image for ${articleTitle}`, error);
    return 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Jordan_collage.jpg/800px-Jordan_collage.jpg';
  }
}

function processWikiImages(container = document) {
  const images = container.querySelectorAll('img[data-wiki]');
  images.forEach(async (img) => {
    const title = img.getAttribute('data-wiki');
    if (!title) return;
    const url = await fetchWikiImage(title);
    img.src = url;
    img.removeAttribute('data-wiki');
  });
}

function initImageLoading() {
  document.addEventListener('load', (e) => {
    if (e.target.tagName && e.target.tagName.toLowerCase() === 'img') {
      e.target.classList.add('loaded');
      if (e.target.parentElement && e.target.parentElement.classList.contains('skeleton')) {
        e.target.parentElement.classList.remove('skeleton');
      }
    }
  }, true);
  
  // Fallback for already cached images
  document.querySelectorAll('img').forEach(img => {
    if (img.complete && img.src && !img.hasAttribute('data-wiki')) {
      img.classList.add('loaded');
      if (img.parentElement && img.parentElement.classList.contains('skeleton')) {
        img.parentElement.classList.remove('skeleton');
      }
    }
    img.addEventListener('load', () => {
      img.classList.add('loaded');
      if (img.parentElement && img.parentElement.classList.contains('skeleton')) {
        img.parentElement.classList.remove('skeleton');
      }
    });
  });
}

// --- Core i18n Logic ---

function setLanguageMode(mode) {
  if (state.currentMode === mode) return;
  
  document.body.classList.add('lang-switching');
  
  setTimeout(() => {
    state.currentMode = mode;
    updateLanguage();
    document.body.classList.remove('lang-switching');
  }, 400); 
}

function updateLanguage() {
  const mode = state.currentMode;
  document.documentElement.dir = mode === 'ar' ? 'rtl' : 'ltr';
  document.documentElement.lang = mode;

  // Toggle Nav Buttons
  document.getElementById('modeEn').classList.toggle('active', mode === 'en');
  document.getElementById('modeAr').classList.toggle('active', mode === 'ar');
  document.getElementById('modeEnMobile').classList.toggle('active', mode === 'en');
  document.getElementById('modeArMobile').classList.toggle('active', mode === 'ar');

  // Static Text
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (translations[mode][key]) {
      el.innerHTML = translations[mode][key];
    }
  });

  // Placeholders
  document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
    const key = el.getAttribute('data-i18n-placeholder');
    if (translations[mode][key]) {
      el.setAttribute('placeholder', translations[mode][key]);
    }
  });

  rebuildCitySelect();
  renderCities();
  renderAdminUsers();
  
  if (state.currentSection === 'cities' && !document.getElementById('cityDetail').classList.contains('hidden-view')) {
    if(state.currentCityId) showCityDetail(state.currentCityId);
  }
}

function rebuildCitySelect() {
  const citySelect = document.getElementById('planCity');
  if (!citySelect) return;
  const currentVal = citySelect.value;
  const mode = state.currentMode;
  
  let optionsHTML = `<option value="all">${translations[mode].plan_dest_all}</option>`;
  cities.forEach(c => {
    optionsHTML += `<option value="${c.id}">${c.name[mode]}</option>`;
  });
  
  citySelect.innerHTML = optionsHTML;
  citySelect.value = currentVal || 'all';
}

// --- Navigation & Advanced Routing ---

function initNavigation() {
  const navBtns = document.querySelectorAll('.nav-btn');
  
  navBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      const targetId = e.currentTarget.getAttribute('data-target');
      switchSection(targetId);
    });
  });

  const logoBtn = document.getElementById('logoBtn');
  if(logoBtn) {
    logoBtn.addEventListener('click', () => switchSection('home'));
  }

  document.getElementById('modeEn').addEventListener('click', () => setLanguageMode('en'));
  document.getElementById('modeAr').addEventListener('click', () => setLanguageMode('ar'));
  document.getElementById('modeEnMobile').addEventListener('click', () => setLanguageMode('en'));
  document.getElementById('modeArMobile').addEventListener('click', () => setLanguageMode('ar'));

  document.getElementById('btnPlanHero').addEventListener('click', () => switchSection('planner'));
  document.getElementById('btnExploreHero').addEventListener('click', () => switchSection('cities'));
  
  document.getElementById('btnModeArAction').addEventListener('click', () => { setLanguageMode('ar'); switchSection('cities'); });
  document.getElementById('btnModeEnAction').addEventListener('click', () => { setLanguageMode('en'); switchSection('planner'); });
}

function switchSection(id) {
  if (state.currentSection === id && id !== 'cities') {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    return;
  }
  
  if (state.isAnimating) return;
  state.isAnimating = true;

  const currentSec = document.getElementById(`sec-${state.currentSection}`);
  const targetSec = document.getElementById(`sec-${id}`);
  
  state.currentSection = id;

  if (currentSec) {
    currentSec.classList.remove('active');
    currentSec.classList.add('exit');
  }

  // Buttery-smooth SPA wait transition
  setTimeout(() => {
    if (currentSec) {
      currentSec.classList.remove('exit');
    }
    
    if (targetSec) {
      targetSec.classList.add('active');
      
      // Force reflow for staggered animation re-trigger
      const staggerItems = targetSec.querySelectorAll('.stagger-item');
      staggerItems.forEach((item, index) => {
        item.style.animation = 'none';
        void item.offsetWidth; // trigger reflow
        item.style.animationDelay = `${index * 0.1}s`;
        item.style.animation = 'slideUpFadeIn 0.5s ease forwards';
      });
    }
    state.isAnimating = false;
  }, 400); // Wait for exit to complete

  document.querySelectorAll('.nav-btn').forEach(btn => {
    btn.classList.toggle('active', btn.getAttribute('data-target') === id);
  });

  if (id === 'cities') {
    document.getElementById('citiesMain').classList.remove('hidden-view');
    document.getElementById('cityDetail').classList.add('hidden-view');
    state.currentCityId = null;
    renderCities(); // re-render to ensure elements are ready for stagger
  }

  window.scrollTo({ top: 0, behavior: 'smooth' });
}


// --- Interactions, Parallax ---

function initInteractions() {
  document.querySelectorAll('.cat-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  document.querySelectorAll('.tag').forEach(tag => {
    tag.addEventListener('click', () => tag.classList.toggle('selected'));
  });

  document.getElementById('generateBtn').addEventListener('click', handleGenerateItinerary);
  document.getElementById('askCurrencyBtn').addEventListener('click', handleAskCurrencyAI);
  document.getElementById('askAdminBtn').addEventListener('click', handleAskAdminAI);
}

function initParallax() {
  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    requestAnimationFrame(() => {
      document.querySelectorAll('.parallax-element').forEach(el => {
        const speed = el.getAttribute('data-speed') || 0.1;
        el.style.transform = `translate3d(0, ${scrollY * speed}px, 0)`;
      });
      
      const glow = document.querySelector('.parallax-bg');
      if (glow) {
        glow.style.transform = `translateY(${scrollY * 0.3}px)`;
      }
    });
  }, { passive: true });
}

// --- Cities Rendering Logic (Using Unique Unsplash Images) ---

function renderCities() {
  const mode = state.currentMode;
  
  document.querySelectorAll('.city-card').forEach(card => {
    const enText = card.querySelector('.en-text');
    const arText = card.querySelector('.ar-text');
    if (enText && arText) {
      if (mode === 'ar') {
        enText.classList.add('hidden-view');
        arText.classList.remove('hidden-view');
      } else {
        enText.classList.remove('hidden-view');
        arText.classList.add('hidden-view');
      }
    }
    if (!card.dataset.listenerAdded) {
      card.addEventListener('click', () => showCityDetail(card.getAttribute('data-id')));
      card.dataset.listenerAdded = 'true';
    }
  });
  
  const grid = document.getElementById('citiesGrid');
  if (grid) {
    processWikiImages(grid);
  }
  initImageLoading();
}

function showCityDetail(id) {
  const city = cities.find(c => c.id == id);
  if (!city) return;
  const mode = state.currentMode;
  state.currentCityId = id;

  document.getElementById('citiesMain').classList.add('hidden-view');
  const detailContainer = document.getElementById('cityDetail');
  detailContainer.classList.remove('hidden-view');
  
  const cityName = mode === 'ar' ? city.name_ar : city.name;
  const cityDesc = city.description;
  const tags = mode === 'ar' ? ['مدينة', 'تاريخ', 'سياحة'] : ['City', 'History', 'Tourism'];
  
  const attractionsHTML = (city.attractions || []).map((attr, i) => {
    const attrName = mode === 'ar' ? attr.name_ar : attr.name;
    const attrMeta = mode === 'ar' ? attr.type : attr.type;
    return `
      <div class="place-card ripple stagger-item" style="animation-delay: ${i * 0.1}s">
        <div class="place-icon skeleton">
          <img data-wiki="${attr.wiki_title || ''}" alt="${attrName}" loading="lazy">
        </div>
        <div>
          <div class="place-name">${attrName}</div>
          <div class="place-meta">${attrMeta}</div>
        </div>
      </div>
    `;
  }).join('');

  detailContainer.innerHTML = `
    <article class="section stagger-item" style="animation-delay: 0s; animation-fill-mode: forwards;">
      <button class="back-btn ripple" id="btnBackToCities" style="background:var(--bg-panel); color:var(--text-main); border:1px solid var(--glass-border); padding:10px 20px; border-radius:20px; cursor:pointer; margin-bottom:20px;">
        ${translations[mode].btn_back_cities}
      </button>
      
      <div class="detail-header">
        <div class="detail-icon skeleton"><img data-wiki="${city.wiki_title}" alt="${cityName}" loading="lazy"></div>
        <div>
          <h2 class="detail-title">${cityName}</h2>
          <div class="city-tags" style="margin-top:10px;">
            ${tags.map(t => `<span class="city-tag">${t}</span>`).join('')}
          </div>
        </div>
      </div>
      
      <p class="detail-intro">${cityDesc}</p>
      
      <h3 class="detail-title" style="font-size: 24px; margin-bottom: 24px;">${translations[mode].stat_attr_lbl}</h3>
      <div class="places-grid" id="cityAttractions">
        ${attractionsHTML}
      </div>
      
      <div style="margin-top:4rem;">
        <button class="btn-primary ripple" id="btnPlanForCity">${translations[mode].plan_trip_to} ${cityName}</button>
      </div>
    </article>
  `;

  document.getElementById('btnBackToCities').addEventListener('click', () => {
    switchSection('cities');
  });

  document.getElementById('btnPlanForCity').addEventListener('click', () => {
    switchSection('planner');
    const select = document.getElementById('planCity');
    if (select) {
      for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].value == city.id) {
          select.selectedIndex = i;
          break;
        }
      }
    }
  });
  
  processWikiImages(detailContainer);
  initImageLoading();
  window.scrollTo({ top: 0, behavior: 'smooth' });
}


// --- AI API Integrations ---

async function handleGenerateItinerary() {
  const city = document.getElementById('planCity').value;
  const days = document.getElementById('planDays').value;
  const out = document.getElementById('itineraryOutput');
  const btn = document.getElementById('generateBtn');
  const mode = state.currentMode;
  
  out.classList.remove('hidden-view');
  out.innerHTML = `
    <div style="text-align:center; padding: 20px;">
      <div style="width:30px; height:30px; border:3px solid var(--primary-accent); border-top-color:transparent; border-radius:50%; animation:spin 1s linear infinite; margin: 0 auto 15px;"></div>
      ${translations[mode].ai_mock_loading_itinerary}
    </div>
  `;
  btn.disabled = true;

  const cityName = city === 'all' ? translations[mode].plan_dest_all : document.querySelector(`#planCity option[value="${city}"]`).textContent;

  setTimeout(() => {
    const mockEn = `${translations.en.ai_mock_pre_itinerary} ${days}-day itinerary for ${cityName}:

Day 1 â€” Arrival & Exploration
â€¢ Morning: Arrive and settle in. Grab a traditional breakfast of hummus and falafel.
â€¢ Afternoon: Explore the local historical sites and walk through the old markets.
â€¢ Evening: Enjoy a welcome dinner. Try Mansaf, Jordan's national dish.
â€¢ Local Secret: Ask your hotel for the nearest cab queue rather than hailing from tourist spots.

Day 2 â€” Deep Dive into Culture
â€¢ Morning: Guided tour of the main attractions. Arrive early!
â€¢ Afternoon: Stop for a refreshing mint lemonade and explore the artisan shops.
â€¢ Evening: Head to a scenic viewpoint to watch the sunset over the landscape.
â€¢ Local Secret: Bargaining is expected in the markets; start at 50% of the asking price with a smile.

${translations.en.ai_mock_post_itinerary}`;

    const mockAr = `${translations.ar.ai_mock_pre_itinerary} Ù„Ù€ ${cityName} Ù„Ù…Ø¯Ø© ${days} Ø£ÙŠØ§Ù…:

Ø§Ù„ÙŠÙˆÙ… Ø§Ù„Ø£ÙˆÙ„ â€” Ø§Ù„ÙˆØµÙˆÙ„ ÙˆØ§Ù„Ø§Ø³ØªÙƒØ´Ø§Ù
â€¢ Ø§Ù„ØµØ¨Ø­: Ø¨ØªÙˆØµÙ„ ÙˆØ¨ØªØ±ØªØ§Ø­ Ø´ÙˆÙŠ. Ø¨ØªÙØ·Ø± Ø­Ù…Øµ ÙˆÙÙ„Ø§ÙÙ„ Ù…Ù† Ù…Ø·Ø¹Ù… Ø´Ø¹Ø¨ÙŠ.
â€¢ Ø§Ù„Ø¸Ù‡Ø±: Ø¨ØªÙ…Ø´ÙŠ Ø¨ÙŠÙ† Ø§Ù„Ø£Ù…Ø§ÙƒÙ† Ø§Ù„Ø£Ø«Ø±ÙŠØ© ÙˆØ¨ØªÙ„Ù Ø¨Ø§Ù„Ø£Ø³ÙˆØ§Ù‚ Ø§Ù„Ù‚Ø¯ÙŠÙ…Ø©.
â€¢ Ø§Ù„Ù…Ø³Ø§: Ø¨ØªØªØ¹Ø´Ù‰ Ù…Ù†Ø³Ù ÙƒØ±ÙƒÙŠ ØµØ­ ÙˆØ¨ØªØ­Ù„ÙŠ Ø¨ÙƒÙ†Ø§ÙØ© Ù†Ø§Ø¨Ù„Ø³ÙŠØ©.
â€¢ Ø³Ø± Ù…Ø®ÙÙŠ: Ø§Ø³Ø£Ù„ Ø£Ù‡Ù„ Ø§Ù„Ù…Ù†Ø·Ù‚Ø© Ø¹Ù† Ø£Ø­Ø³Ù† Ù…ÙƒØ§Ù† Ù„Ù„ØªÙƒØ§Ø³ÙŠ Ø£Ùˆ Ø§Ø³ØªØ¹Ù…Ù„ ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ø§Ù„ØªÙˆØµÙŠÙ„.

Ø§Ù„ÙŠÙˆÙ… Ø§Ù„Ø«Ø§Ù†ÙŠ â€” Ø§Ù†Ø¯Ù…Ø§Ø¬ Ø¨Ø§Ù„Ø«Ù‚Ø§ÙØ©
â€¢ Ø§Ù„ØµØ¨Ø­: Ø¬ÙˆÙ„Ø© Ø³ÙŠØ§Ø­ÙŠØ© Ø¨Ø§Ù„Ø£Ù…Ø§ÙƒÙ† Ø§Ù„Ù…Ø´Ù‡ÙˆØ±Ø©. Ø®Ù„ÙŠÙƒ Ù…Ø¨ÙƒØ± Ø£Ø­Ø³Ù† Ø¹Ø´Ø§Ù† Ø§Ù„Ø¹Ø¬Ù‚Ø©.
â€¢ Ø§Ù„Ø¸Ù‡Ø±: Ø¨ØªØ´Ø±Ø¨ Ù„ÙŠÙ…ÙˆÙ† ÙˆÙ†Ø¹Ù†Ø¹ Ø¨Ù‚Ù‡ÙˆØ© Ù‚Ø¯ÙŠÙ…Ø© ÙˆØ¨ØªØªÙØ±Ø¬ Ø¹Ù„Ù‰ Ù…Ø­Ù„Ø§Øª Ø§Ù„ØªØ­Ù.
â€¢ Ø§Ù„Ù…Ø³Ø§: Ø¨ØªØ·Ù„Ø¹ Ø¹Ù„Ù‰ Ù…Ø·Ù„ Ø­Ù„Ùˆ Ù„ØªØ´ÙˆÙ ØºØ±ÙˆØ¨ Ø§Ù„Ø´Ù…Ø³ ÙˆØªÙˆØ®Ø¯ ØµÙˆØ± Ø¨ØªØ¬Ù†Ù†.
â€¢ Ø³Ø± Ù…Ø®ÙÙŠ: ÙƒØ§Ø³Ø± Ø¨Ø§Ù„Ø³Ø¹Ø± Ø¨Ø§Ù„Ø£Ø³ÙˆØ§Ù‚ Ø§Ù„Ø´Ø¹Ø¨ÙŠØ©ØŒ Ø¯Ø§ÙŠÙ…Ø§Ù‹ Ø¨Ù„Ø´ Ø¨Ù†Øµ Ø§Ù„Ø³Ø¹Ø± ÙˆØ§Ù†Øª Ø¨ØªØ¶Ø­Ùƒ.

${translations.ar.ai_mock_post_itinerary}`;
      
    out.innerHTML = mode === 'ar' ? mockAr : mockEn;
    btn.disabled = false;
  }, 2000);
}

// (Spinner animation dynamic style injection)
const style = document.createElement('style');
style.innerHTML = `@keyframes spin { to { transform: rotate(360deg); } }`;
document.head.appendChild(style);

async function handleAskCurrencyAI() {
  const query = document.getElementById('currencyQ').value.trim();
  if(!query) return;
  
  const out = document.getElementById('currencyAIResp');
  const btn = document.getElementById('askCurrencyBtn');
  const mode = state.currentMode;
  
  out.classList.remove('hidden-view');
  out.innerHTML = `<div style="text-align:center;"><div style="width:20px; height:20px; border:2px solid var(--highlight); border-top-color:transparent; border-radius:50%; animation:spin 1s linear infinite; margin: 0 auto 10px;"></div>${translations[mode].ai_mock_loading_curr}</div>`;
  btn.disabled = true;

  setTimeout(() => {
    out.innerHTML = translations[mode].ai_mock_curr_resp.replace(/\n/g, '<br>');
    btn.disabled = false;
  }, 1800);
}

async function handleAskAdminAI() {
  const query = document.getElementById('adminAIQ').value.trim();
  if(!query) return;
  
  const out = document.getElementById('adminAIResp');
  const btn = document.getElementById('askAdminBtn');
  const mode = state.currentMode;
  
  out.classList.remove('hidden-view');
  out.innerHTML = `<div style="text-align:center;"><div style="width:20px; height:20px; border:2px solid var(--secondary-accent); border-top-color:transparent; border-radius:50%; animation:spin 1s linear infinite; margin: 0 auto 10px;"></div>${translations[mode].ai_mock_loading_admin}</div>`;
  btn.disabled = true;

  setTimeout(() => {
    out.innerHTML = translations[mode].ai_mock_admin_resp.replace(/\n/g, '<br>');
    btn.disabled = false;
  }, 2200);
}


// --- Currency Conversion ---

function initCurrencyConverter() {
  document.getElementById('currFrom').addEventListener('change', convertCurrency);
  document.getElementById('currAmount').addEventListener('input', convertCurrency);
}

function convertCurrency() {
  const from = document.getElementById('currFrom').value;
  const amount = parseFloat(document.getElementById('currAmount').value) || 0;
  
  const rate = state.rates[from];
  const result = (amount * rate).toFixed(2);
  
  document.getElementById('currResult').textContent = result;
  document.getElementById('rateLabel').textContent = `1 ${from} = ${rate} JOD`;
}


// --- Admin Panel Logic ---

function initAdminPanel() {
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      e.target.classList.add('active');
      
      const tabId = e.target.getAttribute('data-tab');
      document.querySelectorAll('.admin-tab-content').forEach(c => c.classList.add('hidden-view'));
      document.getElementById(`admin-${tabId}`).classList.remove('hidden-view');
      
      if(tabId === 'analytics') renderAnalytics();
    });
  });
}

function renderAdminUsers() {
  const tbody = document.getElementById('usersTable');
  if(!tbody) return;
  const mode = state.currentMode;
  
  tbody.innerHTML = adminUsers.map((u, index) => {
    const statusClass = u.statusKey === 'status_active' ? 'status-active' : 'status-inactive';
    return `
      <tr class="stagger-item" style="animation-delay: ${index * 0.05}s">
        <td style="font-weight:bold;">${u.name}</td>
        <td><span class="status-badge" style="background:var(--bg-card); border:1px solid var(--glass-border);">${translations[mode][u.modeKey]}</span></td>
        <td>${u.trips}</td>
        <td><span class="status-badge ${statusClass}">${translations[mode][u.statusKey]}</span></td>
      </tr>
    `;
  }).join('');
}

function renderAnalytics() {
  const destContainer = document.getElementById('analyticsDestinations');
  if(!destContainer) return;
  const mode = state.currentMode;
  
  const mockData = [
    { id: 'petra', value: 85 },
    { id: 'amman', value: 70 },
    { id: 'dead-sea', value: 65 },
    { id: 'wadi-rum', value: 60 }
  ];
  
  destContainer.innerHTML = mockData.map(d => {
    const city = cities.find(c => c.id === d.id);
    return `
      <div class="dest-bar-wrap stagger-item">
        <div class="dest-bar-label">
          <span>${city.name[mode]}</span>
          <span>${d.value}%</span>
        </div>
        <div class="dest-bar-bg">
          <div class="dest-bar-fill" style="width: ${d.value}%;"></div>
        </div>
      </div>
    `;
  }).join('');
}

