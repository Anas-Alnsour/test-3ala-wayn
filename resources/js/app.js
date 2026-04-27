// ==========================================
// WAYN? - Authentic Tourism Platform for Jordan
// Core Logic, i18n & Interactions
// ==========================================

// --- Translations Dictionary (100% Coverage, Authentic Dialect) ---
const translations = {
  en: {
    page_title: "Wayn? | Authentic Jordan",
    logo_text: "Wayn?",
    logo_sub: "Authentic Travel · Jordan",
    nav_explore: "Explore",
    nav_cities: "Cities",
    nav_planner: "AI Planner",
    nav_currency: "Currency",
    nav_admin: "Admin",
    hero_badge: "✦ Authentic Jordanian Experience",
    hero_title: "Discover <span class='gradient-text'>Jordan</span>,<br>Your Way",
    hero_desc: "From the ancient streets of Petra to the crystal waters of Aqaba — plan your perfect Jordanian journey.",
    btn_plan_hero: "✦ Plan My Trip",
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
    mode_local_title: "وين طشّتنا اليوم؟",
    mode_local_sub: "للمواطن الأردني",
    mode_local_f1: "أماكن قريبة منك هسّا",
    mode_local_f2: "طشّات بتجنن على قد الجيبة",
    mode_local_f3: "مناطق مخفية ما بتعرفها",
    mode_local_f4: "مطاعم شعبية بتفتح النفس",
    btn_mode_local: "يلّا نبلّش &rarr;",
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
    food_mansaf_desc: "Jordan's national dish — slow-cooked lamb in dried yogurt sauce, served on fragrant rice",
    food_falafel: "Falafel",
    food_falafel_desc: "Crispy fried chickpea fritters, best enjoyed fresh from street vendors in Amman",
    food_knafeh: "Knafeh",
    food_knafeh_desc: "Sweet shredded pastry soaked in sugar syrup with soft white cheese — a Levantine legend",
    food_coffee: "Arabic Coffee",
    food_coffee_desc: "Cardamom-infused qahwa served in small cups — a gesture of Jordanian hospitality",
    sec_explore_cities: "Explore <span class='gradient-text'>Jordan's Cities</span>",
    btn_back_cities: "&larr; Back to Cities",
    plan_trip_to: "✦ Plan Trip to ",
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
    btn_gen_itinerary: "✦ Generate My Itinerary",
    sec_currency: "Currency <span class='gradient-text'>Converter</span>",
    curr_from: "From",
    curr_to: "To JOD",
    rate_note: "Approx. rate · Verify locally",
    tips_title: "💡 Exchange Tips for Jordan",
    tips_desc: "Exchange at licensed money changers in downtown Amman for best rates. Avoid airport exchanges. JOD is pegged to USD. Keep small bills for local markets and taxis.",
    ai_adv_title: "AI Currency <span class='gradient-text'>Advisor</span>",
    ai_adv_prompt: "Ask about exchange rates, safety tips, or best places to exchange money in Jordan:",
    placeholder_currency: "e.g. Where's the best place to exchange in Amman?",
    btn_ask_ai: "Ask AI",
    admin_title: "Admin Dashboard — Wayn?",
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
    peak_month: "Peak month: March–April",
    ai_admin_prompt: "Ask the AI admin assistant for insights on tourism trends, content gaps, or recommendations:",
    placeholder_admin: "e.g. What content should we add for summer 2026?",
    btn_analyze: "Analyze",
    footer_text: "Wayn? | وين؟ — Authentic Tourism Platform for Jordan",
    footer_sub: "Powered by AI · Built with ♥ for Jordan",
    mode_local_badge: "Local 🇯🇴",
    mode_tourist_badge: "Tourist 🌍",
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
    page_title: "وين؟ | الأردن الأصيل",
    logo_text: "وين؟",
    logo_sub: "سياحة أصيلة · الأردن",
    nav_explore: "ديرتنا",
    nav_cities: "محافظاتنا",
    nav_planner: "مخطط الطشّات",
    nav_currency: "العملات",
    nav_admin: "الإدارة",
    hero_badge: "يا هلا بالضيف",
    hero_title: "اكتشف <span class='gradient-text'>الأردن</span>،<br>على كيفك",
    hero_desc: "من جبال البترا العظيمة لمية العقبة الصافية — خطط لرحلتك الأردنية الصح وتعرّف على ديرتك.",
    btn_plan_hero: "✦ خطط طشّتي",
    btn_explore_hero: "لفّ المدن &larr;",
    stat_cities_val: "+17",
    stat_cities_lbl: "مدينة ومحافظة",
    stat_attr_val: "+480",
    stat_attr_lbl: "مكان سياحي",
    stat_rest_val: "+250",
    stat_rest_lbl: "مطعم وقعدة",
    stat_ai_val: "AI",
    stat_ai_lbl: "مدعوم بـ",
    stat_247_val: "24/7",
    stat_247_lbl: "دليل ذكي",
    sec_choose_exp: "اختار <span class='gradient-text'>جوّك</span>",
    mode_local_title: "وين طشّتنا اليوم؟",
    mode_local_sub: "للمواطن الأردني",
    mode_local_f1: "أماكن قريبة منك هسّا",
    mode_local_f2: "طشّات بتجنن على قد الجيبة",
    mode_local_f3: "مناطق مخفية ما بتعرفها",
    mode_local_f4: "مطاعم شعبية بتفتح النفس",
    btn_mode_local: "يلّا نبلّش &larr;",
    mode_tourist_title: "إلى أين أيها المسافر؟",
    mode_tourist_sub: "للزوار الدوليين",
    mode_tourist_f1: "مسارات موجهة بالكامل",
    mode_tourist_f2: "سياق ثقافي ونصائح",
    mode_tourist_f3: "تجارب منتقاة",
    mode_tourist_f4: "معلومات السلامة واللوجستيات",
    btn_mode_tourist: "ابدأ التخطيط &larr;",
    sec_categories: "ويـن <span class='gradient-text'>حابين؟</span>",
    cat_history: "تاريخنا",
    cat_food: "أكلنا",
    cat_hotels: "فنادق",
    cat_hiking: "مسير وهايكنج",
    cat_desert: "صحراء",
    cat_water: "مية وسباحة",
    cat_farms: "مزارعنا",
    cat_culture: "ثقافتنا",
    sec_flavors: "أكلنا <span class='gradient-text'>الزاكي</span>",
    food_mansaf: "المنسف",
    food_mansaf_desc: "منسفنا دحّيجة، ما يحلى إلا بالجميد الكركي، أصول الكرم الأردني والضيافة الصح.",
    food_falafel: "الفلافل",
    food_falafel_desc: "حبات فلافل مقرمشة بتشهي من قاع المدينة، أطيب إفطار على الماشي مع كاسة شاي.",
    food_knafeh: "الكنافة",
    food_knafeh_desc: "كنافة نابلسية بتمط، غرقانة بالقطر، أحلى تحلاية بعد المنسف أو بأي احتفال.",
    food_coffee: "القهوة السادة",
    food_coffee_desc: "قهوة سادة مهيّلة بتعدّل المزاج، يا هلا بالضيف، رمز الكرم وحسن الاستقبال.",
    sec_explore_cities: "لفّ <span class='gradient-text'>محافظاتنا</span>",
    btn_back_cities: "&rarr; ارجع للمدن",
    plan_trip_to: "✦ خطط طشّة لـ ",
    ai_planner_title: "مخطط الطشّات الذكي",
    ai_planner_desc: "خلي الذكاء الاصطناعي يزبطلك أحلى برنامج للرحلة",
    plan_dest: "وين النية؟",
    plan_dest_all: "كل الأردن",
    plan_dur: "كم يوم؟",
    plan_dur_1: "يوم واحد",
    plan_dur_3: "3 أيام",
    plan_dur_5: "5 أيام",
    plan_dur_7: "أسبوع",
    plan_dur_14: "أسبوعين",
    plan_budget: "الميزانية",
    plan_bud_budget: "ميزانية محدودة",
    plan_bud_mid: "متوسطة",
    plan_bud_lux: "فاخرة ومدلعة",
    plan_style: "الصحبة",
    plan_style_solo: "لحالي",
    plan_style_couple: "أنا والحب",
    plan_style_family: "مع العيلة",
    plan_style_group: "أنا والشلة",
    tags_label: "شو جوّك؟",
    tag_hist: "تاريخ وآثار",
    tag_food: "أكل وتذوق",
    tag_adv: "مغامرات",
    tag_camp: "تخييم بالصحرا",
    tag_water: "مسابح ومية",
    tag_photo: "تصوير طبيعة",
    tag_rel: "مقامات وأديرة",
    tag_hike: "هايكنج",
    tag_market: "أسواق شعبية",
    tag_art: "فنون وتراث",
    btn_gen_itinerary: "✦ زبّطلي البرنامج",
    sec_currency: "حاسبة <span class='gradient-text'>العملات</span>",
    curr_from: "من",
    curr_to: "إلى الدينار",
    rate_note: "سعر تقريبي · تأكد من الصراف",
    tips_title: "💡 نصائح للصرافة ببلدنا",
    tips_desc: "روح على محلات الصرافة بوسط البلد عشان أحسن سعر. بلاش صرافة المطار. دينارنا مربوط بالدولار ووضعه تمام. خلي معك فراطة وفئات صغيرة للتكاسي والمحلات الصغيرة.",
    ai_adv_title: "مستشار <span class='gradient-text'>العملات الذكي</span>",
    ai_adv_prompt: "اسأل عن أسعار الصرف، أو أحسن مكان تصرف فيه مصاريك:",
    placeholder_currency: "مثال: وين أحسن صراف بعمان؟",
    btn_ask_ai: "اسأل الذكي",
    admin_title: "لوحة تحكم الإدارة — وين؟",
    admin_badge: "إدارة",
    admin_active_trips: "الرحلات الشغالة",
    admin_users: "المستخدمين",
    admin_avg_rating: "معدل التقييم",
    tab_content: "المحتوى",
    tab_users: "المستخدمين",
    tab_analytics: "التحليلات",
    tab_ai: "رؤى الذكي",
    act_cities: "إدارة المحافظات",
    act_cities_desc: "ضيف وعدّل معلومات المحافظات",
    act_rest: "إدارة المطاعم",
    act_rest_desc: "250 مطعم نازل على المنصة",
    act_hot: "إدارة الفنادق",
    act_hot_desc: "156 فندق وشاليه",
    act_exp: "التجارب",
    act_exp_desc: "تجارب ومغامرات محلية",
    th_user: "المستخدم",
    th_mode: "الجو",
    th_trips: "عدد الرحلات",
    th_status: "الحالة",
    top_dest: "أكثر المحافظات طلب",
    user_breakdown: "توزيع الزوار",
    lbl_intl: "سياح أجانب",
    lbl_local: "ولاد البلد",
    peak_month: "أكثر شهر عليه حركة: شهر 3 و 4",
    ai_admin_prompt: "اسأل المساعد الذكي عن وضع السياحة وايش ناقصنا محتوى:",
    placeholder_admin: "مثال: شو نزيد أماكن لصيف 2026؟",
    btn_analyze: "حلّل",
    footer_text: "وين؟ | Wayn? — منصة السياحة الأردنية الأصيلة",
    footer_sub: "مدعوم بالذكاء الاصطناعي · انعمل بحب عشان الأردن",
    mode_local_badge: "ابن البلد 🇯🇴",
    mode_tourist_badge: "سائح 🌍",
    status_active: "شغال",
    status_inactive: "موقف",
    ai_mock_loading_itinerary: "عم بجهّزلك أحلى برنامج وبزبطلك الطشّة...",
    ai_mock_pre_itinerary: "هاد برنامج رحلتك لـ",
    ai_mock_post_itinerary: "انشالله تنبسطوا بالطشّة! (وين؟) دايماً معك لأي فزعة.",
    ai_mock_loading_curr: "عم بحسبلك الأسعار...",
    ai_mock_curr_resp: "حسب الوضع الحالي بالسوق:\n\nعشان تاخد أحسن سعر، روح على وسط البلد بعمان، محلات الصرافة هناك بتعطيك سعر ممتاز وعمولتها خفيفة. دايماً خلي معك فراطة (دنانير وخمسات) عشان التكاسي ودكاكين الحارة ما بتلاقي معهم فكة بسهولة.",
    ai_mock_loading_admin: "عم بحلل بيانات المنصة...",
    ai_mock_admin_resp: "**تقرير ذكاء اصطناعي:**\n\nبناءً على طلبك، حللت تفضيلات 1,894 مستخدم. في زيادة 45٪ على طلبات (السياحة البيئية) و(الاستجمام).\n\n**اقتراحي:** \nركزوا تنزلوا أماكن أكتر عن الشاليهات الريفية بعجلون والمخيمات البيئية بمحمية ضانا قبل ما تبلّش عجقة الصيف."
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
const cities = [
  { 
    id: 'amman', 
    name: { en: 'Amman', ar: 'عمّان' }, 
    wikiTitle: 'Amman',
    desc: { en: 'The bustling capital — ancient citadels meet modern cafés in a city of seven hills.', ar: 'العاصمة النابضة بالحياة — قلاع قديمة بتلتقي بمقاهي حديثة بمدينة الجبال السبعة.' },
    tags: { en: ['Capital', 'Culture', 'Nightlife', 'Food'], ar: ['العاصمة', 'ثقافة', 'حياة ليلية', 'أكل زاكي'] },
    intro: { en: 'Jordan\'s vibrant capital blends ancient Roman ruins with trendy neighborhoods. The Citadel offers panoramic views while Rainbow Street buzzes with local life.', ar: 'عمان بتجمع بين الآثار الرومانية العظيمة والأحياء العصرية. جبل القلعة بيعطيك أحلى إطلالة على البلد، وشارع الرينبو مليان حيوية وشباب.' },
    attractions: [
      { wikiTitle: 'Amman_Citadel', name: { en: 'The Citadel', ar: 'جبل القلعة' }, meta: { en: 'Ancient hilltop ruins', ar: 'آثار تاريخية وإطلالة بتجنن' } },
      { wikiTitle: 'Roman_Theater_(Amman)', name: { en: 'Roman Theatre', ar: 'المدرج الروماني' }, meta: { en: '2,000-year-old amphitheater', ar: 'مدرج من أيام الرومان بوسط البلد' } },
      { wikiTitle: 'King_Abdullah_I_Mosque', name: { en: 'King Abdullah I Mosque', ar: 'مسجد الملك عبدالله الأول' }, meta: { en: 'Beautiful blue-domed mosque', ar: 'المسجد العظيم بقبته الزرقا' } },
      { wikiTitle: 'The_Jordan_Museum', name: { en: 'Jordan Museum', ar: 'متحف الأردن' }, meta: { en: 'Best museum in Jordan', ar: 'تاريخ البلد كله هون' } },
      { wikiTitle: 'Rainbow_Street', name: { en: 'Rainbow Street', ar: 'شارع الرينبو' }, meta: { en: 'Vibrant cafés & shops', ar: 'قعدات رايقة ومقاهي' } },
      { wikiTitle: 'Al_Abdali', name: { en: 'Abdali Boulevard', ar: 'بوليفارد العبدلي' }, meta: { en: 'Modern shopping district', ar: 'تسوق ومطاعم حديثة' } }
    ]
  },
  { 
    id: 'petra', 
    name: { en: 'Petra', ar: 'البترا' }, 
    wikiTitle: 'Petra',
    desc: { en: 'The Rose-Red City — a UNESCO World Heritage wonder carved into ancient sandstone cliffs.', ar: 'المدينة الوردية — أعجوبة الدنيا اللي نحتوها الأنباط بالصخر الأحمر.' },
    tags: { en: ['UNESCO', 'Ancient', 'Wonder', 'Iconic'], ar: ['تراث عالمي', 'تاريخي', 'أعجوبة', 'فخرنا'] },
    intro: { en: 'One of the Seven Wonders of the World. The Nabataean rock-carved city is Jordan\'s crown jewel, best experienced at sunrise through the Siq gorge.', ar: 'من عجائب الدنيا السبع وجوهرة الأردن. أحلى إشي تمشي بالسيق وقت الشروق وتشوف الخزنة لأول مرة.' },
    attractions: [
      { wikiTitle: 'Al-Khazneh', name: { en: 'The Treasury (Al-Khazneh)', ar: 'الخزنة' }, meta: { en: 'Iconic carved facade', ar: 'واجهة البترا العظيمة' } },
      { wikiTitle: 'Siq', name: { en: 'The Siq', ar: 'السيق' }, meta: { en: '1.2km natural gorge', ar: 'الشق الصخري المهيب' } },
      { wikiTitle: 'Ad_Deir', name: { en: 'The Monastery (Ad-Deir)', ar: 'الدير' }, meta: { en: '800-step climb', ar: 'مشوار طويل بس بيستاهل' } },
      { wikiTitle: 'High_Place_of_Sacrifice', name: { en: 'High Place of Sacrifice', ar: 'المذبح' }, meta: { en: 'Panoramic views', ar: 'أعلى إطلالة بالمنطقة' } },
      { wikiTitle: 'Nabataeans', name: { en: 'Petra by Night', ar: 'البترا بالليل' }, meta: { en: 'Candlelit experience', ar: 'أجواء خرافية على ضو الشموع' } },
      { wikiTitle: 'Little_Petra', name: { en: 'Little Petra', ar: 'البترا الصغيرة' }, meta: { en: 'Free Nabataean site nearby', ar: 'منطقة أثرية قريبة وهادية' } }
    ]
  },
  { 
    id: 'aqaba', 
    name: { en: 'Aqaba', ar: 'العقبة' }, 
    wikiTitle: 'Aqaba',
    desc: { en: 'Jordan\'s only coastal city — crystal-clear Red Sea waters, coral reefs, and year-round sunshine.', ar: 'ثغر الأردن الباسم — مية البحر الأحمر الصافية وشمس بتدفي القلب طول السنة.' },
    tags: { en: ['Beaches', 'Diving', 'Relaxation', 'Seafood'], ar: ['شطوط', 'غوص', 'رواق', 'سمك زاكي'] },
    intro: { en: 'Jordan\'s window to the Red Sea. World-class diving and snorkeling, fresh seafood, and a relaxed coastal atmosphere.', ar: 'متنفسنا الوحيد على البحر. غوص بين المرجان، سمك طازج، وقعدة رايقة على الشط.' },
    attractions: [
      { wikiTitle: 'Gulf_of_Aqaba', name: { en: 'South Beach Dive Sites', ar: 'الشط الجنوبي' }, meta: { en: 'Top-rated coral reefs', ar: 'أحلى شعب مرجانية للغوص' } },
      { wikiTitle: 'Aqaba_Fort', name: { en: 'Aqaba Fort', ar: 'قلعة العقبة' }, meta: { en: '16th-century castle', ar: 'قلعة تاريخية عالبحر' } },
      { wikiTitle: 'Coral_reef', name: { en: 'Glass-Bottom Boat', ar: 'قوارب القاع الزجاجي' }, meta: { en: 'Guided reef tours', ar: 'رحلة بالقارب لتشوف السمك' } },
      { wikiTitle: 'Seafood', name: { en: 'Aqaba Fish Market', ar: 'حسبة السمك' }, meta: { en: 'Fresh seafood', ar: 'أطيب صيادية بتوكلها بحياتك' } },
      { wikiTitle: 'Beach_club', name: { en: 'Berenice Beach', ar: 'شط برنيس' }, meta: { en: 'Private beach club', ar: 'نادي شاطئي مرتب' } },
      { wikiTitle: 'Red_Sea', name: { en: 'Sunset Boat Cruise', ar: 'رحلة قارب وقت الغروب' }, meta: { en: 'Evening tours with dinner', ar: 'قعدة حلوة بالبحر مع العشا' } }
    ]
  },
  { 
    id: 'jerash', 
    name: { en: 'Jerash', ar: 'جرش' }, 
    wikiTitle: 'Jerash',
    desc: { en: 'The Pompeii of the Middle East — one of the best-preserved Roman provincial cities in the world.', ar: 'بومبي الشرق — من أفضل المدن الرومانية المحافظ عليها بالعالم كله.' },
    tags: { en: ['Roman', 'History', 'Ruins', 'Day Trip'], ar: ['روماني', 'تاريخ', 'آثار', 'طشّة سريعة'] },
    intro: { en: 'Just 48km from Amman, Jerash hosts remarkably intact Roman colonnaded streets, temples, and amphitheaters.', ar: 'قريبة من عمان ومناسبة لطشّة خفيفة. شارع الأعمدة والمدرجات رح ترجعك بالزمن لورا.' },
    attractions: [
      { wikiTitle: 'Forum_(Roman)', name: { en: 'Oval Plaza', ar: 'الساحة البيضاوية' }, meta: { en: 'Unique Roman forum', ar: 'ساحة الندوة العظيمة' } },
      { wikiTitle: 'Roman_theatre_(structure)', name: { en: 'South Theatre', ar: 'المدرج الجنوبي' }, meta: { en: 'Still used for performances', ar: 'مكان حفلات مهرجان جرش' } },
      { wikiTitle: 'Temple_of_Artemis_(Jerash)', name: { en: 'Temple of Artemis', ar: 'معبد أرتميس' }, meta: { en: 'Towering columns', ar: 'أعمدة شاهقة بتجنن' } },
      { wikiTitle: 'Cardo_maximus', name: { en: 'Cardo Maximus', ar: 'شارع الأعمدة' }, meta: { en: 'Main colonnaded street', ar: 'الشارع الروماني الرئيسي' } },
      { wikiTitle: 'Arch_of_Hadrian_(Jerash)', name: { en: 'Hadrian\'s Arch', ar: 'قوس هادريان' }, meta: { en: 'Triumphal entry gate', ar: 'بوابة النصر الضخمة' } },
      { wikiTitle: 'Jerash_Festival', name: { en: 'Jerash Festival', ar: 'مهرجان جرش' }, meta: { en: 'Annual arts event', ar: 'فعاليات وفنون ومسرح' } }
    ]
  },
  {
    id: 'wadi-rum',
    name: { en: 'Wadi Rum', ar: 'وادي رم' },
    wikiTitle: 'Wadi_Rum',
    desc: { en: 'The Valley of the Moon — vast red desert landscapes, Martian terrain, and Bedouin camps.', ar: 'وادي القمر — صحراء حمرا شاسعة وكأنك على كوكب المريخ، وقعدات بدوية أصيلة.' },
    tags: { en: ['Desert', 'Adventure', 'Camping', 'Nature'], ar: ['صحرا', 'مغامرة', 'مخيمات', 'طبيعة'] },
    intro: { en: 'A breathtaking desert wilderness. Experience Bedouin hospitality, jeep tours, and sleeping under a canopy of stars.', ar: 'برية صحراوية بتوخد العقل. جرب كرم البدو، جولات سيارات الدفع الرباعي، والنومة تحت النجوم.' },
    attractions: [
      { wikiTitle: 'Off-roading', name: { en: '4x4 Jeep Tours', ar: 'جولات سيارات 4x4' }, meta: { en: 'Explore the desert', ar: 'لف الصحرا وعيش المغامرة' } },
      { wikiTitle: 'Glamping', name: { en: 'Martian Domes', ar: 'القباب المريخية' }, meta: { en: 'Luxury glamping', ar: 'تخييم فاخر بخيم قزاز' } },
      { wikiTitle: 'Camel', name: { en: 'Camel Riding', ar: 'ركوب الجمال' }, meta: { en: 'Traditional transport', ar: 'جرب حياة البدو عالأصول' } },
      { wikiTitle: 'Natural_arch', name: { en: 'Burdah Rock Bridge', ar: 'جسر جبل بردة' }, meta: { en: 'Spectacular rock arch', ar: 'قوس صخري طبيعي رهيب' } },
      { wikiTitle: 'Earth_oven', name: { en: 'Zarb Dinner', ar: 'عشا زرب' }, meta: { en: 'Bedouin BBQ', ar: 'أطيب لحمة مدفونة تحت الرمل' } },
      { wikiTitle: 'T._E._Lawrence', name: { en: 'Lawrence\'s Spring', ar: 'نبع لورنس' }, meta: { en: 'Historical water source', ar: 'عين مية تاريخية بالصحرا' } }
    ]
  },
  {
    id: 'dead-sea',
    name: { en: 'Dead Sea', ar: 'البحر الميت' },
    wikiTitle: 'Dead_Sea',
    desc: { en: 'The lowest point on Earth — float effortlessly in hyper-saline waters and enjoy mineral-rich mud.', ar: 'أخفض بقعة بالأرض — مية مالحة بتخليك تطوف براحتك وطينة كلها فوائد.' },
    tags: { en: ['Wellness', 'Relaxation', 'Unique', 'Nature'], ar: ['علاج طبيعي', 'رواق', 'فريد من نوعه', 'طبيعة'] },
    intro: { en: 'At 430m below sea level, the Dead Sea offers a unique floating experience and therapeutic mineral mud.', ar: 'تجربة طفو ما بتنساها تحت مستوى سطح البحر بـ 430 متر. طينة معدنية بتجدد البشرة ومنتجعات ولا أروع.' },
    attractions: [
      { wikiTitle: 'Hypersaline_lake', name: { en: 'Floating Experience', ar: 'تجربة الطفو' }, meta: { en: 'Impossible to sink', ar: 'مستحيل تغرق من الملوحة' } },
      { wikiTitle: 'Mud_bath', name: { en: 'Mud Bathing', ar: 'حمامات الطينة' }, meta: { en: 'Therapeutic mud', ar: 'طينة سودة علاجية للبشرة' } },
      { wikiTitle: 'Resort', name: { en: 'Resort Day Passes', ar: 'دخوليات المنتجعات' }, meta: { en: 'Access to private beaches', ar: 'مسابح وشطوط خاصة مرتبة' } },
      { wikiTitle: 'Sunset', name: { en: 'Sunset Views', ar: 'إطلالة الغروب' }, meta: { en: 'Spectacular colors', ar: 'منظر الغروب عالبركة خيالي' } },
      { wikiTitle: 'Halite', name: { en: 'Salt Formations', ar: 'تشكيلات الملح' }, meta: { en: 'Crystal structures', ar: 'ملح متصلب عأطراف البحر' } },
      { wikiTitle: 'Mujib_Nature_Reserve', name: { en: 'Mujib Reserve', ar: 'محمية الموجب' }, meta: { en: 'River canyoning', ar: 'مغامرة بالوديان والمية' } }
    ]
  },
  {
    id: 'madaba',
    name: { en: 'Madaba', ar: 'مأدبا' },
    wikiTitle: 'Madaba',
    desc: { en: 'The City of Mosaics — home to the famous 6th-century mosaic map of the Holy Land.', ar: 'مدينة الفسيفساء — فيها أشهر خريطة فسيفسائية للأراضي المقدسة.' },
    tags: { en: ['History', 'Art', 'Religion', 'Culture'], ar: ['تاريخ', 'فن', 'أديان', 'ثقافة'] },
    intro: { en: 'Renowned for its spectacular Byzantine and Umayyad mosaics. A peaceful city with deep historical significance.', ar: 'معروفة عالمياً بفسيفسائها البيزنطية والأموية. مدينة هادية وأهلها طيبين وتاريخها عريق.' },
    attractions: [
      { wikiTitle: 'Madaba_Map', name: { en: 'Madaba Map', ar: 'خريطة مأدبا' }, meta: { en: 'Famous mosaic map', ar: 'خريطة فسيفساء قديمة' } },
      { wikiTitle: 'Mosaic', name: { en: 'Church of the Apostles', ar: 'كنيسة الرسل' }, meta: { en: 'Stunning mosaic floors', ar: 'أرضيات فسيفساء بتجنن' } },
      { wikiTitle: 'Byzantine_Empire', name: { en: 'Archaeological Park', ar: 'المنتزه الأثري' }, meta: { en: 'Open-air museum', ar: 'متحف مفتوح للآثار' } },
      { wikiTitle: 'Mount_Nebo', name: { en: 'Mount Nebo', ar: 'جبل نيبو' }, meta: { en: 'Historical viewpoint', ar: 'مطل تاريخي عظيم' } },
      { wikiTitle: 'Handicraft', name: { en: 'Handicraft Shops', ar: 'محلات الحرف' }, meta: { en: 'Traditional weaving', ar: 'شغل يدوي ونسيج أردني' } },
      { wikiTitle: 'Levantine_cuisine', name: { en: 'Haret Jdoudna', ar: 'حارة جدودنا' }, meta: { en: 'Famous restaurant', ar: 'مطعم تراثي قعدته حلوة' } }
    ]
  },
  {
    id: 'as-salt',
    name: { en: 'As-Salt', ar: 'السلط' },
    wikiTitle: 'Al-Salt',
    desc: { en: 'The Place of Tolerance and Urban Hospitality — a UNESCO World Heritage city.', ar: 'مدينة التسامح والكرم الأصيل — حاراتها القديمة دخلت التراث العالمي لليونسكو.' },
    tags: { en: ['UNESCO', 'Architecture', 'Culture', 'Local'], ar: ['تراث عالمي', 'عمارة', 'ثقافة', 'ولاد البلد'] },
    intro: { en: 'Famous for its stunning yellow-limestone architecture, vibrant local market, and deep-rooted traditions of interfaith harmony.', ar: 'معروفة ببيوتها الصفرا وحجارتها القديمة وسوقها الشعبي النابض بالحياة، وأهلها رمز للتعايش.' },
    attractions: [
      { wikiTitle: 'Al-Salt', name: { en: 'Harmony Trail', ar: 'مسار الوئام' }, meta: { en: 'Guided walking tour', ar: 'جولة مشي بين الحارات' } },
      { wikiTitle: 'Ottoman_architecture', name: { en: 'Abu Jaber Museum', ar: 'متحف أبو جابر' }, meta: { en: 'Ottoman mansion', ar: 'قصر عثماني صار متحف' } },
      { wikiTitle: 'Souq', name: { en: 'Hammam Street', ar: 'شارع الحمام' }, meta: { en: 'Bustling traditional souk', ar: 'أقدم وأحلى سوق شعبي' } },
      { wikiTitle: 'Mosque', name: { en: 'Great Mosque', ar: 'مسجد السلط الكبير' }, meta: { en: 'Center of the old city', ar: 'قلب المدينة القديمة' } },
      { wikiTitle: 'Saint_George', name: { en: 'Al-Khader Church', ar: 'كنيسة الخضر' }, meta: { en: 'Revered by all faiths', ar: 'مزار لكل أهل البلد' } },
      { wikiTitle: 'Coffeehouse', name: { en: 'Al-Eskafyeh Café', ar: 'مقهى الإسكافية' }, meta: { en: 'Historic café', ar: 'قعدة ومقهى تاريخي' } }
    ]
  },
  {
    id: 'al-karak',
    name: { en: 'Al Karak', ar: 'الكرك' },
    wikiTitle: 'Al-Karak',
    desc: { en: 'Home to one of the largest Crusader castles in the Levant, steeped in dramatic history.', ar: 'فيها أكبر قلاع الصليبيين ببلاد الشام، تاريخها عريق وأهلها أصحاب كرم.' },
    tags: { en: ['Castles', 'History', 'Views', 'Food'], ar: ['قلاع', 'تاريخ', 'مطلات', 'أكل'] },
    intro: { en: 'Dominated by its massive 12th-century Crusader castle. The city is also famous across Jordan for cooking the best Mansaf.', ar: 'قلعتها الضخمة بتطل على كل المنطقة. والكرك هي أصل الجميد وأطيب منسف ممكن تذوقه بحياتك.' },
    attractions: [
      { wikiTitle: 'Kerak_Castle', name: { en: 'Karak Castle', ar: 'قلعة الكرك' }, meta: { en: 'Massive fortress', ar: 'حصن صليبي عظيم' } },
      { wikiTitle: 'Crusader_states', name: { en: 'Archaeological Museum', ar: 'متحف الآثار' }, meta: { en: 'Inside the castle', ar: 'متحف جوا القلعة' } },
      { wikiTitle: 'Rift_Valley', name: { en: 'Dead Sea Viewpoint', ar: 'مطل البحر الميت' }, meta: { en: 'Panoramic views', ar: 'مطل بكشف البحر الميت' } },
      { wikiTitle: 'Mansaf', name: { en: 'Authentic Mansaf', ar: 'منسف كركي' }, meta: { en: 'The best Jameed', ar: 'منسف عالأصول بالجميد الكركي' } },
      { wikiTitle: 'Noah', name: { en: 'Prophet Nuh Shrine', ar: 'مقام النبي نوح' }, meta: { en: 'Religious site', ar: 'مقام ديني مهم' } },
      { wikiTitle: 'Wadi_bin_Hammad', name: { en: 'Wadi Bin Hammad', ar: 'وادي بن حماد' }, meta: { en: 'Hidden canyon with hot springs', ar: 'وادي مخفي ومية سخنة' } }
    ]
  }
];

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
  // Global things
  updateLanguage();
  initImageLoading();
  
  if (document.getElementById('mainContainer')) {
    initNavigation();
    initInteractions();
    initCurrencyConverter();
    initAdminPanel();
    initParallax();
    renderCities();
    convertCurrency();

    // FIX FOR INITIAL RENDER BUG & WIKI FETCH
    state.currentSection = null;
    switchSection('home');
    processWikiImages();
  }
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
  document.getElementById('modeEn')?.classList.toggle('active', mode === 'en');
  document.getElementById('modeAr')?.classList.toggle('active', mode === 'ar');
  document.getElementById('modeEnMobile')?.classList.toggle('active', mode === 'en');
  document.getElementById('modeArMobile')?.classList.toggle('active', mode === 'ar');

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
  
  if (state.currentSection === 'cities' && document.getElementById('cityDetail') && !document.getElementById('cityDetail').classList.contains('hidden-view')) {
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

  document.getElementById('modeEn')?.addEventListener('click', () => setLanguageMode('en'));
  document.getElementById('modeAr')?.addEventListener('click', () => setLanguageMode('ar'));
  document.getElementById('modeEnMobile')?.addEventListener('click', () => setLanguageMode('en'));
  document.getElementById('modeArMobile')?.addEventListener('click', () => setLanguageMode('ar'));

  document.getElementById('btnPlanHero')?.addEventListener('click', () => switchSection('planner'));
  document.getElementById('btnExploreHero')?.addEventListener('click', () => switchSection('cities'));
  
  document.getElementById('btnModeArAction')?.addEventListener('click', () => { setLanguageMode('ar'); switchSection('cities'); });
  document.getElementById('btnModeEnAction')?.addEventListener('click', () => { setLanguageMode('en'); switchSection('planner'); });
}

function switchSection(id) {
  if (state.currentSection === id && id !== 'cities') {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    return;
  }
  
  if (state.isAnimating) return;
  state.isAnimating = true;

  const currentSec = state.currentSection ? document.getElementById(`sec-${state.currentSection}`) : null;
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
    document.getElementById('citiesMain')?.classList.remove('hidden-view');
    document.getElementById('cityDetail')?.classList.add('hidden-view');
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
      switchSection('cities');
      setTimeout(() => {
        const grid = document.getElementById('citiesMain');
        if (grid) grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 500);
    });
  });

  document.querySelectorAll('.tag').forEach(tag => {
    tag.addEventListener('click', () => tag.classList.toggle('selected'));
  });

  document.getElementById('generateBtn')?.addEventListener('click', handleGenerateItinerary);
  document.getElementById('askCurrencyBtn')?.addEventListener('click', handleAskCurrencyAI);
  document.getElementById('askAdminBtn')?.addEventListener('click', handleAskAdminAI);
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
  const grid = document.getElementById('citiesGrid');
  const mode = state.currentMode;
  
  grid.innerHTML = cities.map((c, index) => `
    <div class="city-card stagger-item" data-id="${c.id}">
      <div class="city-img skeleton">
        <img data-wiki="${c.wikiTitle}" alt="${c.name[mode]}" loading="lazy">
        <div class="city-img-overlay"></div>
        <span class="city-badge">${c.tags[mode][0]}</span>
      </div>
      <div class="city-body">
        <div class="city-name">${c.name[mode]}</div>
        <div class="city-desc">${c.desc[mode]}</div>
        <div class="city-tags">${c.tags[mode].map(t => `<span class="city-tag">${t}</span>`).join('')}</div>
      </div>
    </div>
  `).join('');

  document.querySelectorAll('.city-card').forEach(card => {
    card.addEventListener('click', () => showCityDetail(card.getAttribute('data-id')));
  });
  
  processWikiImages(grid);
  initImageLoading(); // Re-bind lazy loads
}

function showCityDetail(id) {
  const city = cities.find(c => c.id === id);
  if (!city) return;
  const mode = state.currentMode;
  state.currentCityId = id;

  document.getElementById('citiesMain')?.classList.add('hidden-view');
  const detailContainer = document.getElementById('cityDetail');
  if (!detailContainer) return;
  detailContainer.classList.remove('hidden-view');
  
  detailContainer.innerHTML = `
    <article class="section stagger-item" style="animation-delay: 0s; animation-fill-mode: forwards;">
      <button class="back-btn ripple" id="btnBackToCities" style="background:var(--bg-panel); color:var(--text-main); border:1px solid var(--glass-border); padding:10px 20px; border-radius:20px; cursor:pointer; margin-bottom:20px;">
        ${translations[mode].btn_back_cities}
      </button>
      
      <div class="detail-header">
        <div class="detail-icon skeleton"><img data-wiki="${city.wikiTitle}" alt="${city.name[mode]}" loading="lazy"></div>
        <div>
          <h2 class="detail-title">${city.name[mode]}</h2>
        </div>
      </div>
      
      <p class="detail-intro">${city.intro[mode]}</p>
      
      <h3 class="detail-title" style="font-size: 24px; margin-bottom: 24px;">${translations[mode].stat_attr_lbl}</h3>
      <div class="places-grid">
        ${city.attractions.map((a, i) => `
          <div class="place-card ripple stagger-item" style="animation-delay: ${i * 0.1}s">
            <div class="place-icon skeleton"><img data-wiki="${a.wikiTitle}" alt="${a.name[mode]}" loading="lazy"></div>
            <div>
              <div class="place-name">${a.name[mode]}</div>
              <div class="place-meta">${a.meta[mode]}</div>
            </div>
          </div>
        `).join('')}
      </div>
      
      <div style="margin-top:4rem;">
        <button class="btn-primary ripple" id="btnPlanForCity">${translations[mode].plan_trip_to} ${city.name[mode]}</button>
      </div>
    </article>
  `;

  document.getElementById('btnBackToCities')?.addEventListener('click', () => {
    switchSection('cities');
  });

  document.getElementById('btnPlanForCity')?.addEventListener('click', () => {
    switchSection('planner');
    const select = document.getElementById('planCity');
    if (!select) return;
    for (let i = 0; i < select.options.length; i++) {
      if (select.options[i].value === city.id) {
        select.selectedIndex = i;
        break;
      }
    }
  });
  
  processWikiImages(detailContainer);
  initImageLoading();
  window.scrollTo({ top: 0, behavior: 'smooth' });
}


// --- AI API Integrations ---

async function handleGenerateItinerary() {
  const cityEl = document.getElementById('planCity');
  const daysEl = document.getElementById('planDays');
  const out = document.getElementById('itineraryOutput');
  const btn = document.getElementById('generateBtn');
  
  if (!cityEl || !daysEl || !out || !btn) return;
  
  const city = cityEl.value;
  const days = daysEl.value;
  const mode = state.currentMode;
  
  out.classList.remove('hidden-view');
  out.innerHTML = `
    <div style="text-align:center; padding: 20px;">
      <div style="width:30px; height:30px; border:3px solid var(--primary-accent); border-top-color:transparent; border-radius:50%; animation:spin 1s linear infinite; margin: 0 auto 15px;"></div>
      ${translations[mode].ai_mock_loading_itinerary}
    </div>
  `;
  btn.disabled = true;

  const cityNameEl = document.querySelector(`#planCity option[value="${city}"]`);
  const cityName = city === 'all' ? translations[mode].plan_dest_all : (cityNameEl ? cityNameEl.textContent : city);

  setTimeout(() => {
    const mockEn = `${translations.en.ai_mock_pre_itinerary} ${days}-day itinerary for ${cityName}:

Day 1 — Arrival & Exploration
• Morning: Arrive and settle in. Grab a traditional breakfast of hummus and falafel.
• Afternoon: Explore the local historical sites and walk through the old markets.
• Evening: Enjoy a welcome dinner. Try Mansaf, Jordan's national dish.
• Local Secret: Ask your hotel for the nearest cab queue rather than hailing from tourist spots.

Day 2 — Deep Dive into Culture
• Morning: Guided tour of the main attractions. Arrive early!
• Afternoon: Stop for a refreshing mint lemonade and explore the artisan shops.
• Evening: Head to a scenic viewpoint to watch the sunset over the landscape.
• Local Secret: Bargaining is expected in the markets; start at 50% of the asking price with a smile.

${translations.en.ai_mock_post_itinerary}`;

    const mockAr = `${translations.ar.ai_mock_pre_itinerary} لـ ${cityName} لمدة ${days} أيام:

اليوم الأول — الوصول والاستكشاف
• الصبح: بتوصل وبترتاح شوي. بتفطر حمص وفلافل من مطعم شعبي.
• الظهر: بتمشي بين الأماكن الأثرية وبتلف بالأسواق القديمة.
• المسا: بتتعشى منسف كركي صح وبتحلي بكنافة نابلسية.
• سر مخفي: اسأل أهل المنطقة عن أحسن مكان للتكاسي أو استعمل تطبيقات التوصيل.

اليوم الثاني — اندماج بالثقافة
• الصبح: جولة سياحية بالأماكن المشهورة. خليك مبكر أحسن عشان العجقة.
• الظهر: بتشرب ليمون ونعنع بقهوة قديمة وبتتفرج على محلات التحف.
• المسا: بتطلع على مطل حلو لتشوف غروب الشمس وتوخد صور بتجنن.
• سر مخفي: كاسر بالسعر بالأسواق الشعبية، دايماً بلش بنص السعر وانت بتضحك.

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
  const qEl = document.getElementById('currencyQ');
  const out = document.getElementById('currencyAIResp');
  const btn = document.getElementById('askCurrencyBtn');
  
  if (!qEl || !out || !btn) return;
  
  const query = qEl.value.trim();
  if(!query) return;
  
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
  const qEl = document.getElementById('adminAIQ');
  const out = document.getElementById('adminAIResp');
  const btn = document.getElementById('askAdminBtn');
  
  if (!qEl || !out || !btn) return;
  
  const query = qEl.value.trim();
  if(!query) return;
  
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
  document.getElementById('currFrom')?.addEventListener('change', convertCurrency);
  document.getElementById('currAmount')?.addEventListener('input', convertCurrency);
}

function convertCurrency() {
  const currFrom = document.getElementById('currFrom');
  const currAmount = document.getElementById('currAmount');
  if (!currFrom || !currAmount) return;

  const from = currFrom.value;
  const amount = parseFloat(currAmount.value) || 0;
  
  const rate = state.rates[from];
  const result = (amount * rate).toFixed(2);
  
  const currResult = document.getElementById('currResult');
  const rateLabel = document.getElementById('rateLabel');
  if (currResult) currResult.textContent = result;
  if (rateLabel) rateLabel.textContent = `1 ${from} = ${rate} JOD`;
}


// --- Admin Panel Logic ---

function initAdminPanel() {
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      e.target.classList.add('active');
      
      const tabId = e.target.getAttribute('data-tab');
      document.querySelectorAll('.admin-tab-content').forEach(c => c.classList.add('hidden-view'));
      document.getElementById(`admin-${tabId}`)?.classList.remove('hidden-view');
      
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

