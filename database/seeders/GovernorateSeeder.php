<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Frontend\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Governorate::truncate();

        $governorates = [
            ['gov_ar' => 'القاهرة', 'gov_en' => 'Cairo'],
            ['gov_ar' => 'الجيزة', 'gov_en' => 'Giza'],
            ['gov_ar' => 'الأسكندرية', 'gov_en' => 'Alexandria'],
            ['gov_ar' => 'الدقهلية', 'gov_en' => 'Dakahlia'],
            ['gov_ar' => 'البحر الأحمر', 'gov_en' => 'Red Sea'],
            ['gov_ar' => 'البحيرة', 'gov_en' => 'Beheira'],
            ['gov_ar' => 'الفيوم', 'gov_en' => 'Fayoum'],
            ['gov_ar' => 'الغربية', 'gov_en' => 'Gharbiya'],
            ['gov_ar' => 'الإسماعلية', 'gov_en' => 'Ismailia'],
            ['gov_ar' => 'المنوفية', 'gov_en' => 'Menofia'],
            ['gov_ar' => 'المنيا', 'gov_en' => 'Minya'],
            ['gov_ar' => 'القليوبية', 'gov_en' => 'Qaliubiya'],
            ['gov_ar' => 'الوادي الجديد', 'gov_en' => 'New Valley'],
            ['gov_ar' => 'السويس', 'gov_en' => 'Suez'],
            ['gov_ar' => 'اسوان', 'gov_en' => 'Aswan'],
            ['gov_ar' => 'اسيوط', 'gov_en' => 'Assiut'],
            ['gov_ar' => 'بني سويف', 'gov_en' => 'Beni Suef'],
            ['gov_ar' => 'بورسعيد', 'gov_en' => 'Port Said'],
            ['gov_ar' => 'دمياط', 'gov_en' => 'Damietta'],
            ['gov_ar' => 'الشرقية', 'gov_en' => 'Sharkia'],
            ['gov_ar' => 'جنوب سيناء', 'gov_en' => 'South Sinai'],
            ['gov_ar' => 'كفر الشيخ', 'gov_en' => 'Kafr Al sheikh'],
            ['gov_ar' => 'مطروح', 'gov_en' => 'Matrouh'],
            ['gov_ar' => 'الأقصر', 'gov_en' => 'Luxor'],
            ['gov_ar' => 'قنا', 'gov_en' => 'Qena'],
            ['gov_ar' => 'شمال سيناء', 'gov_en' => 'North Sinai'],
            ['gov_ar' => 'سوهاج', 'gov_en' => 'Sohag'],
        ];

        foreach ($governorates as $key => $value) {
            Governorate::create($value);
        }
    }
}
