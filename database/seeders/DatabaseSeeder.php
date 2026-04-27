<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Users
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@wayn.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Local User',
            'email' => 'local@wayn.com',
            'password' => bcrypt('password'),
            'role' => 'local',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Tourist User',
            'email' => 'tourist@wayn.com',
            'password' => bcrypt('password'),
            'role' => 'tourist',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Restaurant Provider',
            'email' => 'restaurant@wayn.com',
            'password' => bcrypt('password'),
            'role' => 'restaurant',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Hotel Partner',
            'email' => 'hotel@wayn.com',
            'password' => bcrypt('password'),
            'role' => 'hotel',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Local Assistant',
            'email' => 'assistant@wayn.com',
            'password' => bcrypt('password'),
            'role' => 'assistant',
        ]);

        // Cities
        $cities = [
            ['name' => 'Amman', 'name_ar' => 'عمان', 'wiki_title' => 'Amman', 'description' => 'The capital and largest city of Jordan.'],
            ['name' => 'Irbid', 'name_ar' => 'إربد', 'wiki_title' => 'Irbid', 'description' => 'Known as the Bride of the North.'],
            ['name' => 'Zarqa', 'name_ar' => 'الزرقاء', 'wiki_title' => 'Zarqa', 'description' => 'The industrial center of Jordan.'],
            ['name' => 'Mafraq', 'name_ar' => 'المفرق', 'wiki_title' => 'Mafraq', 'description' => 'Located at the crossroads of Syria and Iraq.'],
            ['name' => 'Ajloun', 'name_ar' => 'عجلون', 'wiki_title' => 'Ajloun', 'description' => 'A hilly town in the north of Jordan.'],
            ['name' => 'Jerash', 'name_ar' => 'جرش', 'wiki_title' => 'Jerash', 'description' => 'Home to some of the best-preserved Greco-Roman ruins.'],
            ['name' => 'Madaba', 'name_ar' => 'مأدبا', 'wiki_title' => 'Madaba', 'description' => 'The City of Mosaics.'],
            ['name' => 'As-Salt', 'name_ar' => 'السلط', 'wiki_title' => 'Al-Salt', 'description' => 'An ancient agricultural town and administrative centre.'],
            ['name' => 'Al Karak', 'name_ar' => 'الكرك', 'wiki_title' => 'Al Karak', 'description' => 'Known for its famous Crusader castle.'],
        ];

        foreach ($cities as $cityData) {
            $city = \App\Models\City::create($cityData);

            // Attractions
            if ($city->name === 'Amman') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Amman Citadel', 'name_ar' => 'جبل القلعة', 'type' => 'historical', 'wiki_title' => 'Amman_Citadel']);
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Roman Theater', 'name_ar' => 'المدرج الروماني', 'type' => 'historical', 'wiki_title' => 'Roman_Theater_(Amman)']);
            } elseif ($city->name === 'Irbid') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Dar As-Saraya Museum', 'name_ar' => 'متحف دار السرايا', 'type' => 'historical', 'wiki_title' => 'Dar_As-Saraya_Museum']);
            } elseif ($city->name === 'Zarqa') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Qasr Amra', 'name_ar' => 'قصر عمرة', 'type' => 'historical', 'wiki_title' => 'Qasr_Amra']);
            } elseif ($city->name === 'Mafraq') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Umm el-Jimal', 'name_ar' => 'أم الجمال', 'type' => 'historical', 'wiki_title' => 'Umm_el-Jimal']);
            } elseif ($city->name === 'Ajloun') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Ajloun Castle', 'name_ar' => 'قلعة عجلون', 'type' => 'historical', 'wiki_title' => 'Ajloun_Castle']);
            } elseif ($city->name === 'Jerash') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Jerash Ruins', 'name_ar' => 'آثار جرش', 'type' => 'historical', 'wiki_title' => 'Jerash']);
            } elseif ($city->name === 'Madaba') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Mount Nebo', 'name_ar' => 'جبل نيبو', 'type' => 'historical', 'wiki_title' => 'Mount_Nebo']);
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Madaba Map', 'name_ar' => 'خريطة مأدبا', 'type' => 'historical', 'wiki_title' => 'Madaba_Map']);
            } elseif ($city->name === 'As-Salt') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Abu Jaber Museum', 'name_ar' => 'متحف أبو جابر', 'type' => 'culture', 'wiki_title' => 'Al-Salt']);
            } elseif ($city->name === 'Al Karak') {
                \App\Models\Attraction::create(['city_id' => $city->id, 'name' => 'Kerak Castle', 'name_ar' => 'قلعة الكرك', 'type' => 'historical', 'wiki_title' => 'Kerak_Castle']);
            }
        }
    }
}
