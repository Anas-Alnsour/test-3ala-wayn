<?php

namespace Database\Seeders;

use App\Models\{User, City, Attraction, DailyOffer, GuestRequest};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ==========================================
        // 1. USERS SEEDER (المستخدمين الأساسيين)
        // ==========================================
        $users = [
            ['name' => 'Wayn Admin', 'email' => 'admin@wayn.com', 'role' => 'admin'],
            ['name' => 'Anas Alnsour', 'email' => 'local@wayn.com', 'role' => 'local'],
            ['name' => 'John Explorer', 'email' => 'tourist@wayn.com', 'role' => 'tourist'],
            ['name' => 'Hashem Resto', 'email' => 'restaurant@wayn.com', 'role' => 'restaurant'],
            ['name' => 'Dead Sea Resort', 'email' => 'hotel@wayn.com', 'role' => 'hotel'],
            ['name' => 'Captain Tariq', 'email' => 'assistant@wayn.com', 'role' => 'assistant'],
            // مستخدمين إضافيين لربط العمليات
            ['name' => 'Sarah M.', 'email' => 'sarah@example.com', 'role' => 'tourist'],
            ['name' => 'Ahmad R.', 'email' => 'ahmad@example.com', 'role' => 'local'],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                array_merge($userData, ['password' => Hash::make('password')])
            );
        }

        $localId = User::where('email', 'local@wayn.com')->first()->id;
        $restoId = User::where('email', 'restaurant@wayn.com')->first()->id;
        $touristId = User::where('email', 'tourist@wayn.com')->first()->id;

        // ==========================================
        // 2. CITIES SEEDER (المدن الأردنية مع صور حقيقية)
        // ==========================================
        $cities = [
            ['name' => 'Amman', 'name_ar' => 'عمان', 'wiki_title' => 'Amman', 'description' => 'The capital and largest city of Jordan.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Amman_Citadel_Panorama.jpg/1200px-Amman_Citadel_Panorama.jpg'],
            ['name' => 'Petra', 'name_ar' => 'البتراء', 'wiki_title' => 'Petra', 'description' => 'The Rose City, a famous archaeological site.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Al_Khazne_Petra_edit_2.jpg/800px-Al_Khazne_Petra_edit_2.jpg'],
            ['name' => 'Aqaba', 'name_ar' => 'العقبة', 'wiki_title' => 'Aqaba', 'description' => 'Jordan\'s only coastal city on the Red Sea.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Aqaba_Flag_pole.jpg/800px-Aqaba_Flag_pole.jpg'],
            ['name' => 'Jerash', 'name_ar' => 'جرش', 'wiki_title' => 'Jerash', 'description' => 'Home to preserved Greco-Roman ruins.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Jerash_-_Oval_Forum.jpg/800px-Jerash_-_Oval_Forum.jpg'],
            ['name' => 'Wadi Rum', 'name_ar' => 'وادي رم', 'wiki_title' => 'Wadi_Rum', 'description' => 'The Valley of the Moon, stunning red sands.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Wadi_Rum_Desert_Jordan.jpg/800px-Wadi_Rum_Desert_Jordan.jpg'],
            ['name' => 'Dead Sea', 'name_ar' => 'البحر الميت', 'wiki_title' => 'Dead_Sea', 'description' => 'The lowest point on Earth.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Dead_sea_jordan.jpg/800px-Dead_sea_jordan.jpg'],
            ['name' => 'Ajloun', 'name_ar' => 'عجلون', 'wiki_title' => 'Ajloun', 'description' => 'Hilly town with a Crusader castle.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Ajloun_Castle_2019.jpg/800px-Ajloun_Castle_2019.jpg'],
            ['name' => 'Madaba', 'name_ar' => 'مأدبا', 'wiki_title' => 'Madaba', 'description' => 'The City of Mosaics.', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Madaba_map_close_up.jpg/800px-Madaba_map_close_up.jpg'],
        ];

        foreach ($cities as $cityData) {
            City::firstOrCreate(['name' => $cityData['name']], $cityData);
        }

        // ==========================================
        // 3. ATTRACTIONS SEEDER (المعالم والمكتشفات المخفية)
        // ==========================================
        $ammanId = City::where('name', 'Amman')->first()->id;
        $petraId = City::where('name', 'Petra')->first()->id;
        $jerashId = City::where('name', 'Jerash')->first()->id;
        $ajlounId = City::where('name', 'Ajloun')->first()->id;

        $attractions = [
            // Approved
            ['city_id' => $ammanId, 'submitter_id' => $localId, 'name' => 'Amman Citadel', 'name_ar' => 'جبل القلعة', 'description' => 'Historic site at the center of downtown Amman.', 'type' => 'historical', 'status' => 'approved', 'wiki_title' => 'Amman_Citadel', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Amman_Citadel_Temple_of_Hercules.jpg/800px-Amman_Citadel_Temple_of_Hercules.jpg'],
            ['city_id' => $ammanId, 'submitter_id' => $localId, 'name' => 'Roman Theater', 'name_ar' => 'المدرج الروماني', 'description' => 'A 6,000-seat, 2nd-century Roman theater.', 'type' => 'historical', 'status' => 'approved', 'wiki_title' => 'Roman_Theater_(Amman)', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Roman_Theater_Amman_Jordan.jpg/800px-Roman_Theater_Amman_Jordan.jpg'],
            ['city_id' => $petraId, 'submitter_id' => $localId, 'name' => 'Al-Khazneh (The Treasury)', 'name_ar' => 'الخزنة', 'description' => 'One of the most elaborate temples in Petra.', 'type' => 'historical', 'status' => 'approved', 'wiki_title' => 'Al-Khazneh', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Al_Khazne_Petra_edit_2.jpg/800px-Al_Khazne_Petra_edit_2.jpg'],
            ['city_id' => $jerashId, 'submitter_id' => null, 'name' => 'Oval Plaza', 'name_ar' => 'الساحة البيضاوية', 'description' => 'A spacious plaza surrounded by a broad colonnade.', 'type' => 'historical', 'status' => 'approved', 'wiki_title' => 'Jerash', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Jerash_-_Oval_Forum.jpg/800px-Jerash_-_Oval_Forum.jpg'],

            // Pending (لتظهر في لوحة تحكم الأدمن)
            ['city_id' => $ajlounId, 'submitter_id' => $localId, 'name' => 'Ajloun Forest Reserve', 'name_ar' => 'محمية غابات عجلون', 'description' => 'A beautiful nature reserve perfect for hiking.', 'type' => 'nature', 'status' => 'pending', 'wiki_title' => 'Ajloun_Forest_Reserve', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Ajloun_Forest_Reserve_01.jpg/800px-Ajloun_Forest_Reserve_01.jpg'],
            ['city_id' => $ammanId, 'submitter_id' => $localId, 'name' => 'Rainbow Street', 'name_ar' => 'شارع الرينبو', 'description' => 'A vibrant street full of cafes and local culture.', 'type' => 'culture', 'status' => 'pending', 'wiki_title' => 'Rainbow_Street', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Rainbow_Street_Amman.jpg/800px-Rainbow_Street_Amman.jpg'],

            // Rejected
            ['city_id' => $ammanId, 'submitter_id' => $localId, 'name' => 'Unknown Cafe', 'name_ar' => 'مقهى غير معروف', 'description' => 'Just a normal cafe.', 'type' => 'culture', 'status' => 'rejected', 'wiki_title' => 'Amman', 'image_url' => null],
        ];

        foreach ($attractions as $attractionData) {
            Attraction::firstOrCreate(['name' => $attractionData['name']], $attractionData);
        }

        // ==========================================
        // 4. DAILY OFFERS SEEDER (عروض المطاعم بصور تفتح النفس)
        // ==========================================
        $offers = [
            ['user_id' => $restoId, 'name' => 'Traditional Mansaf Deal', 'name_ar' => 'عرض المنسف التراثي', 'original_price' => 10.00, 'discount_price' => 7.50, 'valid_until' => '2026-12-31', 'audience' => 'all', 'is_active' => true, 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Mansaf.jpg/800px-Mansaf.jpg'],
            ['user_id' => $restoId, 'name' => 'Jordanian Breakfast (Falafel)', 'name_ar' => 'فطور أردني (فلافل)', 'original_price' => 5.00, 'discount_price' => 3.50, 'valid_until' => '2026-12-31', 'audience' => 'locals', 'is_active' => true, 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Falafel_02.jpg/800px-Falafel_02.jpg'],
            ['user_id' => $restoId, 'name' => 'Knafeh Dessert', 'name_ar' => 'كنافة نابلسية للتحلاية', 'original_price' => 4.00, 'discount_price' => 3.00, 'valid_until' => '2026-12-31', 'audience' => 'tourists', 'is_active' => true, 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Kanafeh.jpg/800px-Kanafeh.jpg'],
            ['user_id' => $restoId, 'name' => 'Chicken Shawarma', 'name_ar' => 'شاورما دجاج', 'original_price' => 3.50, 'discount_price' => 2.50, 'valid_until' => '2026-05-01', 'audience' => 'all', 'is_active' => false, 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Chicken_shawarma_with_toum_and_fries.jpg/800px-Chicken_shawarma_with_toum_and_fries.jpg'],
        ];

        foreach ($offers as $offerData) {
            DailyOffer::firstOrCreate(['name' => $offerData['name']], $offerData);
        }

        // ==========================================
        // 5. GUEST REQUESTS SEEDER (طلبات الفنادق)
        // ==========================================
        $requests = [
            ['user_id' => $touristId, 'room' => '302', 'guest_name' => 'John Explorer', 'request_type' => 'Extra Towels & Pillows', 'status' => 'Pending'],
            ['user_id' => $touristId, 'room' => '105', 'guest_name' => 'Sarah M.', 'request_type' => 'Room Cleaning', 'status' => 'In Progress'],
            ['user_id' => $touristId, 'room' => '401', 'guest_name' => 'Elena Rossi', 'request_type' => 'Airport Taxi Booking', 'status' => 'Resolved'],
            ['user_id' => $touristId, 'room' => '210', 'guest_name' => 'Ahmad R.', 'request_type' => 'AC Maintenance', 'status' => 'Pending'],
        ];

        foreach ($requests as $requestData) {
            GuestRequest::firstOrCreate([
                'room' => $requestData['room'],
                'request_type' => $requestData['request_type']
            ], $requestData);
        }
    }
}
