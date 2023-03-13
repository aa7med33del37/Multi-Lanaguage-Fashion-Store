<?php

namespace Database\Seeders;

use App\Models\Frontend\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        $cities = [
            ['governorate_id' => 1, 'city_ar' => '15 مايو', 'city_en' => '15 May'],
            ['governorate_id' => 1, 'city_ar' => 'الازبكية', 'city_en' => 'Al Azbakeyah'],
            ['governorate_id' => 1, 'city_ar' => 'البساتين', 'city_en' => 'Al Basatin'],
            ['governorate_id' => 1, 'city_ar' => 'التبين', 'city_en' => 'Tebin'],
            ['governorate_id' => 1, 'city_ar' => 'الخليفة', 'city_en' => 'El-Khalifa'],
            ['governorate_id' => 1, 'city_ar' => 'الدراسة', 'city_en' => 'El darrasa'],
            ['governorate_id' => 1, 'city_ar' => 'الدرب الاحمر', 'city_en' => 'Aldarb Alahmar'],
            ['governorate_id' => 1, 'city_ar' => 'الزاوية الحمراء', 'city_en' => 'Zawya al-Hamra'],
            ['governorate_id' => 1, 'city_ar' => 'الزيتون', 'city_en' => 'El-Zaytoun'],
            ['governorate_id' => 1, 'city_ar' => 'الساحل', 'city_en' => 'Sahel'],
            ['governorate_id' => 1, 'city_ar' => 'السلام', 'city_en' => 'El Salam'],
            ['governorate_id' => 1, 'city_ar' => 'السيدة زينب', 'city_en' => 'Sayeda Zeinab'],
            ['governorate_id' => 1, 'city_ar' => 'الشرابية', 'city_en' => 'El Sharabeya'],
            ['governorate_id' => 1, 'city_ar' => 'مدينة الشروق', 'city_en' => 'Shorouk'],
            ['governorate_id' => 1, 'city_ar' => 'الظاهر', 'city_en' => 'El Daher'],
            ['governorate_id' => 1, 'city_ar' => 'العتبة', 'city_en' => 'Ataba'],
            ['governorate_id' => 1, 'city_ar' => 'القاهرة الجديدة', 'city_en' => 'New Cairo'],
            ['governorate_id' => 1, 'city_ar' => 'المرج', 'city_en' => 'El Marg'],
            ['governorate_id' => 1, 'city_ar' => 'عزبة النخل', 'city_en' => 'Ezbet el Nakhl'],
            ['governorate_id' => 1, 'city_ar' => 'المطرية', 'city_en' => 'Matareya'],
            ['governorate_id' => 1, 'city_ar' => 'المعادى', 'city_en' => 'Maadi'],
            ['governorate_id' => 1, 'city_ar' => 'المعصرة', 'city_en' => 'Maasara'],
            ['governorate_id' => 1, 'city_ar' => 'المقطم', 'city_en' => 'Mokattam'],
            ['governorate_id' => 1, 'city_ar' => 'المنيل', 'city_en' => 'Manyal'],
            ['governorate_id' => 1, 'city_ar' => 'الموسكى', 'city_en' => 'Mosky'],
            ['governorate_id' => 1, 'city_ar' => 'النزهة', 'city_en' => 'Nozha'],
            ['governorate_id' => 1, 'city_ar' => 'الوايلى', 'city_en' => 'Waily'],
            ['governorate_id' => 1, 'city_ar' => 'باب الشعرية', 'city_en' => 'Bab al-Shereia'],
            ['governorate_id' => 1, 'city_ar' => 'بولاق', 'city_en' => 'Bolaq'],
            ['governorate_id' => 1, 'city_ar' => 'جاردن سيتى', 'city_en' => 'Garden City'],
            ['governorate_id' => 1, 'city_ar' => 'حدائق القبة', 'city_en' => 'Hadayek El-Kobba'],
            ['governorate_id' => 1, 'city_ar' => 'حلوان', 'city_en' => 'Helwan'],
            ['governorate_id' => 1, 'city_ar' => 'دار السلام', 'city_en' => 'Dar Al Salam'],
            ['governorate_id' => 1, 'city_ar' => 'شبرا', 'city_en' => 'Shubra'],
            ['governorate_id' => 1, 'city_ar' => 'طره', 'city_en' => 'Tura'],
            ['governorate_id' => 1, 'city_ar' => 'عابدين', 'city_en' => 'Abdeen'],
            ['governorate_id' => 1, 'city_ar' => 'عباسية', 'city_en' => 'Abaseya'],
            ['governorate_id' => 1, 'city_ar' => 'عين شمس', 'city_en' => 'Ain Shams'],
            ['governorate_id' => 1, 'city_ar' => 'مدينة نصر', 'city_en' => 'Nasr City'],
            ['governorate_id' => 1, 'city_ar' => 'مصر الجديدة', 'city_en' => 'New Heliopolis'],
            ['governorate_id' => 1, 'city_ar' => 'مصر القديمة', 'city_en' => 'Masr Al Qadima'],
            ['governorate_id' => 1, 'city_ar' => 'منشية ناصر', 'city_en' => 'Mansheya Nasir'],
            ['governorate_id' => 1, 'city_ar' => 'مدينة بدر', 'city_en' => 'Badr City'],
            ['governorate_id' => 1, 'city_ar' => 'مدينة العبور', 'city_en' => 'Obour City'],
            ['governorate_id' => 1, 'city_ar' => 'وسط البلد', 'city_en' => 'Cairo Downtown'],
            ['governorate_id' => 1, 'city_ar' => 'الزمالك', 'city_en' => 'Zamalek'],
            ['governorate_id' => 1, 'city_ar' => 'قصر النيل', 'city_en' => 'Kasr El Nile'],
            ['governorate_id' => 1, 'city_ar' => 'الرحاب', 'city_en' => 'Rehab'],
            ['governorate_id' => 1, 'city_ar' => 'القطامية', 'city_en' => 'Katameya'],
            ['governorate_id' => 1, 'city_ar' => 'مدينتي', 'city_en' => 'Madinty'],
            ['governorate_id' => 1, 'city_ar' => 'روض الفرج', 'city_en' => 'Rod Alfarag'],
            ['governorate_id' => 1, 'city_ar' => 'شيراتون', 'city_en' => 'Sheraton'],
            ['governorate_id' => 1, 'city_ar' => 'الجمالية', 'city_en' => 'El-Gamaleya'],
            ['governorate_id' => 1, 'city_ar' => 'العاشر من رمضان', 'city_en' => '10th of Ramadan City'],
            ['governorate_id' => 1, 'city_ar' => 'الحلمية', 'city_en' => 'Helmeyat Alzaytoun'],
            ['governorate_id' => 1, 'city_ar' => 'النزهة الجديدة', 'city_en' => 'New Nozha'],
            ['governorate_id' => 1, 'city_ar' => 'العاصمة الإدارية', 'city_en' => 'Capital New'],
            /* End Cairo ID:1 */

            /* Start Giza ID:2 */
            ['governorate_id' => 2, 'city_ar' => 'الجيزة', 'city_en' => 'Giza'],
            ['governorate_id' => 2, 'city_ar' => 'السادس من أكتوبر', 'city_en' => 'Sixth of October'],
            ['governorate_id' => 2, 'city_ar' => 'الشيخ زايد', 'city_en' => 'Cheikh Zayed'],
            ['governorate_id' => 2, 'city_ar' => 'الحوامدية', 'city_en' => 'Hawamdiyah'],
            ['governorate_id' => 2, 'city_ar' => 'البدرشين', 'city_en' => 'Al Badrasheen'],
            ['governorate_id' => 2, 'city_ar' => 'الصف', 'city_en' => 'Saf'],
            ['governorate_id' => 2, 'city_ar' => 'أطفيح', 'city_en' => 'Atfih'],
            ['governorate_id' => 2, 'city_ar' => 'العياط', 'city_en' => 'Al Ayat'],
            ['governorate_id' => 2, 'city_ar' => 'الباويطي', 'city_en' => 'Al-Bawaiti'],
            ['governorate_id' => 2, 'city_ar' => 'منشأة القناطر', 'city_en' => 'ManshiyetAl Qanater'],
            ['governorate_id' => 2, 'city_ar' => 'أوسيم', 'city_en' => 'Oaseem'],
            ['governorate_id' => 2, 'city_ar' => 'كرداسة', 'city_en' => 'Kerdasa'],
            ['governorate_id' => 2, 'city_ar' => 'أبو النمرس', 'city_en' => 'Abu Nomros'],
            ['governorate_id' => 2, 'city_ar' => 'كفر غطاطي', 'city_en' => 'Kafr Ghati'],
            ['governorate_id' => 2, 'city_ar' => 'منشأة البكاري', 'city_en' => 'Manshiyet Al Bakari'],
            ['governorate_id' => 2, 'city_ar' => 'الدقى', 'city_en' => 'Dokki'],
            ['governorate_id' => 2, 'city_ar' => 'العجوزة', 'city_en' => 'Agouza'],
            ['governorate_id' => 2, 'city_ar' => 'الهرم', 'city_en' => 'Haram'],
            ['governorate_id' => 2, 'city_ar' => 'الوراق', 'city_en' => 'Warraq'],
            ['governorate_id' => 2, 'city_ar' => 'امبابة', 'city_en' => 'Imbaba'],
            ['governorate_id' => 2, 'city_ar' => 'بولاق الدكرور', 'city_en' => 'Boulaq Dakrour'],
            ['governorate_id' => 2, 'city_ar' => 'الواحات البحرية', 'city_en' => 'Al Wahat Al Baharia'],
            ['governorate_id' => 2, 'city_ar' => 'العمرانية', 'city_en' => 'Omraneya'],
            ['governorate_id' => 2, 'city_ar' => 'المنيب', 'city_en' => 'Moneeb'],
            ['governorate_id' => 2, 'city_ar' => 'بين السرايات', 'city_en' => 'Bin Alsarayat'],
            ['governorate_id' => 2, 'city_ar' => 'الكيت كات', 'city_en' => 'Kit Kat'],
            ['governorate_id' => 2, 'city_ar' => 'المهندسين', 'city_en' => 'Mohandessin'],
            ['governorate_id' => 2, 'city_ar' => 'فيصل', 'city_en' => 'Faisal'],
            ['governorate_id' => 2, 'city_ar' => 'أبو رواش', 'city_en' => 'Abu Rawash'],
            ['governorate_id' => 2, 'city_ar' => 'حدائق الأهرام', 'city_en' => 'Hadayek Alahram'],
            ['governorate_id' => 2, 'city_ar' => 'الحرانية', 'city_en' => 'Haraneya'],
            ['governorate_id' => 2, 'city_ar' => 'حدائق اكتوبر', 'city_en' => 'Hadayek October'],
            ['governorate_id' => 2, 'city_ar' => 'صفط اللبن', 'city_en' => 'Saft Allaban'],
            ['governorate_id' => 2, 'city_ar' => 'القرية الذكية', 'city_en' => 'Smart Village'],
            ['governorate_id' => 2, 'city_ar' => 'ارض اللواء', 'city_en' => 'Ard Ellwaa'],
            /* End Giza ID:2 */

            /* Start Alexandria ID:3 */
            ['governorate_id' => 3, 'city_ar' => 'ابو قير', 'city_en' => 'Abu Qir'],
            ['governorate_id' => 3, 'city_ar' => 'الابراهيمية', 'city_en' => 'Al Ibrahimeyah'],
            ['governorate_id' => 3, 'city_ar' => 'الأزاريطة', 'city_en' => 'Azarita'],
            ['governorate_id' => 3, 'city_ar' => 'الانفوشى', 'city_en' => 'Anfoushi'],
            ['governorate_id' => 3, 'city_ar' => 'الدخيلة', 'city_en' => 'Dekheila'],
            ['governorate_id' => 3, 'city_ar' => 'السيوف', 'city_en' => 'El Soyof'],
            ['governorate_id' => 3, 'city_ar' => 'العامرية', 'city_en' => 'Ameria'],
            ['governorate_id' => 3, 'city_ar' => 'اللبان', 'city_en' => 'El Labban'],
            ['governorate_id' => 3, 'city_ar' => 'المفروزة', 'city_en' => 'Al Mafrouza'],
            ['governorate_id' => 3, 'city_ar' => 'المنتزه', 'city_en' => 'El Montaza'],
            ['governorate_id' => 3, 'city_ar' => 'المنشية', 'city_en' => 'Mansheya'],
            ['governorate_id' => 3, 'city_ar' => 'الناصرية', 'city_en' => 'Naseria'],
            ['governorate_id' => 3, 'city_ar' => 'امبروزو', 'city_en' => 'Ambrozo'],
            ['governorate_id' => 3, 'city_ar' => 'باب شرق', 'city_en' => 'Bab Sharq'],
            ['governorate_id' => 3, 'city_ar' => 'برج العرب', 'city_en' => 'Bourj Alarab'],
            ['governorate_id' => 3, 'city_ar' => 'ستانلى', 'city_en' => 'Stanley'],
            ['governorate_id' => 3, 'city_ar' => 'سموحة', 'city_en' => 'Smouha'],
            ['governorate_id' => 3, 'city_ar' => 'سيدى بشر', 'city_en' => 'Sidi Bishr'],
            ['governorate_id' => 3, 'city_ar' => 'شدس', 'city_en' => 'Shads'],
            ['governorate_id' => 3, 'city_ar' => 'غيط العنب', 'city_en' => 'Gheet Alenab'],
            ['governorate_id' => 3, 'city_ar' => 'فلمينج', 'city_en' => 'Fleming'],
            ['governorate_id' => 3, 'city_ar' => 'فيكتوريا', 'city_en' => 'Victoria'],
            ['governorate_id' => 3, 'city_ar' => 'كامب شيزار', 'city_en' => 'Camp Shizar'],
            ['governorate_id' => 3, 'city_ar' => 'كرموز', 'city_en' => 'Karmooz'],
            ['governorate_id' => 3, 'city_ar' => 'محطة الرمل', 'city_en' => 'Mahta Alraml'],
            ['governorate_id' => 3, 'city_ar' => 'مينا البصل', 'city_en' => 'Mina El-Basal'],
            ['governorate_id' => 3, 'city_ar' => 'العصافرة', 'city_en' => 'Asafra'],
            ['governorate_id' => 3, 'city_ar' => 'العجمي', 'city_en' => 'Agamy'],
            ['governorate_id' => 3, 'city_ar' => 'بكوس', 'city_en' => 'Bakos'],
            ['governorate_id' => 3, 'city_ar' => 'بولكلي', 'city_en' => 'Boulkly'],
            ['governorate_id' => 3, 'city_ar' => 'كليوباترا', 'city_en' => 'Cleopatra'],
            ['governorate_id' => 3, 'city_ar' => 'جليم', 'city_en' => 'Glim'],
            ['governorate_id' => 3, 'city_ar' => 'المعمورة', 'city_en' => 'Al Mamurah'],
            ['governorate_id' => 3, 'city_ar' => 'المندرة', 'city_en' => 'Al Mandara'],
            ['governorate_id' => 3, 'city_ar' => 'محرم بك', 'city_en' => 'Moharam Bek'],
            ['governorate_id' => 3, 'city_ar' => 'الشاطبي', 'city_en' => 'Elshatby'],
            ['governorate_id' => 3, 'city_ar' => 'سيدي جابر', 'city_en' => 'Sidi Gaber'],
            ['governorate_id' => 3, 'city_ar' => 'الساحل الشمالي', 'city_en' => 'North Coast/sahel'],
            ['governorate_id' => 3, 'city_ar' => 'الحضرة', 'city_en' => 'Alhadra'],
            ['governorate_id' => 3, 'city_ar' => 'العطارين', 'city_en' => 'Alattarin'],
            ['governorate_id' => 3, 'city_ar' => 'سيدي كرير', 'city_en' => 'Sidi Kerir'],
            ['governorate_id' => 3, 'city_ar' => 'الجمرك', 'city_en' => 'Elgomrok'],
            ['governorate_id' => 3, 'city_ar' => 'المكس', 'city_en' => 'Al Max'],
            ['governorate_id' => 3, 'city_ar' => 'مارينا', 'city_en' => 'Marina'],
            /* End Alexandria ID:3 */

            /* Start Dakahlia ID:4 */
            ['governorate_id' => 4, 'city_ar' => 'المنصورة', 'city_en' => 'Mansoura'],
            ['governorate_id' => 4, 'city_ar' => 'طلخا', 'city_en' => 'Talkha'],
            ['governorate_id' => 4, 'city_ar' => 'ميت غمر', 'city_en' => 'Mitt Ghamr'],
            ['governorate_id' => 4, 'city_ar' => 'دكرنس', 'city_en' => 'Dekernes'],
            ['governorate_id' => 4, 'city_ar' => 'أجا', 'city_en' => 'Aga'],
            ['governorate_id' => 4, 'city_ar' => 'منية النصر', 'city_en' => 'Menia El Nasr'],
            ['governorate_id' => 4, 'city_ar' => 'السنبلاوين', 'city_en' => 'Sinbillawin'],
            ['governorate_id' => 4, 'city_ar' => 'الكردي', 'city_en' => 'El Kurdi'],
            ['governorate_id' => 4, 'city_ar' => 'بني عبيد', 'city_en' => 'Bani Ubaid'],
            ['governorate_id' => 4, 'city_ar' => 'المنزلة', 'city_en' => 'Al Manzala'],
            ['governorate_id' => 4, 'city_ar' => 'تمي الأمديد', 'city_en' => 'tami al\'amdid'],
            ['governorate_id' => 4, 'city_ar' => 'الجمالية', 'city_en' => 'aljamalia'],
            ['governorate_id' => 4, 'city_ar' => 'شربين', 'city_en' => 'Sherbin'],
            ['governorate_id' => 4, 'city_ar' => 'المطرية', 'city_en' => 'Mataria'],
            ['governorate_id' => 4, 'city_ar' => 'بلقاس', 'city_en' => 'Belqas'],
            ['governorate_id' => 4, 'city_ar' => 'ميت سلسيل', 'city_en' => 'Meet Salsil'],
            ['governorate_id' => 4, 'city_ar' => 'جمصة', 'city_en' => 'Gamasa'],
            ['governorate_id' => 4, 'city_ar' => 'محلة دمنة', 'city_en' => 'Mahalat Damana'],
            ['governorate_id' => 4, 'city_ar' => 'نبروه', 'city_en' => 'Nabroh'],
            /* End Dakahlia ID:4 */

            /* Start Red Sea ID:5 */
            ['governorate_id' => 5, 'city_ar' => 'الغردقة', 'city_en' => 'Hurghada'],
            ['governorate_id' => 5, 'city_ar' => 'رأس غارب', 'city_en' => 'Ras Ghareb'],
            ['governorate_id' => 5, 'city_ar' => 'سفاجا', 'city_en' => 'Safaga'],
            ['governorate_id' => 5, 'city_ar' => 'القصير', 'city_en' => 'El Qusiar'],
            ['governorate_id' => 5, 'city_ar' => 'مرسى علم', 'city_en' => 'Marsa Alam'],
            ['governorate_id' => 5, 'city_ar' => 'الشلاتين', 'city_en' => 'Shalatin'],
            ['governorate_id' => 5, 'city_ar' => 'حلايب', 'city_en' => 'Halaib'],
            ['governorate_id' => 5, 'city_ar' => 'الدهار', 'city_en' => 'Aldahar'],
            /* End Red Sea ID:5 */

            /* Start Beheira ID:6 */
            ['governorate_id' => 6, 'city_ar' => 'دمنهور', 'city_en' => 'Damanhour'],
            ['governorate_id' => 6, 'city_ar' => 'كفر الدوار', 'city_en' => 'Kafr El Dawar'],
            ['governorate_id' => 6, 'city_ar' => 'رشيد', 'city_en' => 'Rashid'],
            ['governorate_id' => 6, 'city_ar' => 'إدكو', 'city_en' => 'Edco'],
            ['governorate_id' => 6, 'city_ar' => 'أبو المطامير', 'city_en' => 'Abu al-Matamir'],
            ['governorate_id' => 6, 'city_ar' => 'أبو حمص', 'city_en' => 'Abu Homs'],
            ['governorate_id' => 6, 'city_ar' => 'الدلنجات', 'city_en' => 'Delengat'],
            ['governorate_id' => 6, 'city_ar' => 'المحمودية', 'city_en' => 'Mahmoudiyah'],
            ['governorate_id' => 6, 'city_ar' => 'الرحمانية', 'city_en' => 'Rahmaniyah'],
            ['governorate_id' => 6, 'city_ar' => 'إيتاي البارود', 'city_en' => 'Itai Baroud'],
            ['governorate_id' => 6, 'city_ar' => 'حوش عيسى', 'city_en' => 'Housh Eissa'],
            ['governorate_id' => 6, 'city_ar' => 'شبراخيت', 'city_en' => 'Shubrakhit'],
            ['governorate_id' => 6, 'city_ar' => 'كوم حمادة', 'city_en' => 'Kom Hamada'],
            ['governorate_id' => 6, 'city_ar' => 'بدر', 'city_en' => 'Badr'],
            ['governorate_id' => 6, 'city_ar' => 'وادي النطرون', 'city_en' => 'Wadi Natrun'],
            ['governorate_id' => 6, 'city_ar' => 'النوبارية الجديدة', 'city_en' => 'New Nubaria'],
            ['governorate_id' => 6, 'city_ar' => 'النوبارية', 'city_en' => 'Alnoubareya'],
            /* End Beheira ID:6 */

            /* Start Fayoum ID:7 */
            ['governorate_id' => 7, 'city_ar' => 'الفيوم', 'city_en' => 'Fayoum'],
            ['governorate_id' => 7, 'city_ar' => 'الفيوم الجديدة', 'city_en' => 'Fayoum El Gedida'],
            ['governorate_id' => 7, 'city_ar' => 'طامية', 'city_en' => 'Tamiya'],
            ['governorate_id' => 7, 'city_ar' => 'سنورس', 'city_en' => 'Snores'],
            ['governorate_id' => 7, 'city_ar' => 'إطسا', 'city_en' => 'Etsa'],
            ['governorate_id' => 7, 'city_ar' => 'إبشواي', 'city_en' => 'Epschway'],
            ['governorate_id' => 7, 'city_ar' => 'يوسف الصديق', 'city_en' => 'Yusuf El Sediaq'],
            ['governorate_id' => 7, 'city_ar' => 'الحادقة', 'city_en' => 'Hadqa'],
            ['governorate_id' => 7, 'city_ar' => 'اطسا', 'city_en' => 'Atsa'],
            ['governorate_id' => 7, 'city_ar' => 'الجامعة', 'city_en' => 'Algamaa'],
            ['governorate_id' => 7, 'city_ar' => 'السيالة', 'city_en' => 'Sayala'],
            /* End Fayoum ID:7 */

            /* Start Gharbia ID:8 */
            ['governorate_id' => 8, 'city_ar' => 'طنطا', 'city_en' => 'Tanta'],
            ['governorate_id' => 8, 'city_ar' => 'المحلة الكبرى', 'city_en' => 'Al Mahalla Al Kobra'],
            ['governorate_id' => 8, 'city_ar' => 'كفر الزيات', 'city_en' => 'Kafr El Zayat'],
            ['governorate_id' => 8, 'city_ar' => 'زفتى', 'city_en' => 'Zefta'],
            ['governorate_id' => 8, 'city_ar' => 'السنطة', 'city_en' => 'El Santa'],
            ['governorate_id' => 8, 'city_ar' => 'قطور', 'city_en' => 'Qutour'],
            ['governorate_id' => 8, 'city_ar' => 'بسيون', 'city_en' => 'Basion'],
            ['governorate_id' => 8, 'city_ar' => 'سمنود', 'city_en' => 'Samannoud'],
            /* End Gharbia ID:8 */

            /* Start Ismailia ID:9 */
            ['governorate_id' => 9, 'city_ar' => 'الإسماعيلية', 'city_en' => 'Ismailia'],
            ['governorate_id' => 9, 'city_ar' => 'فايد', 'city_en' => 'Fayed'],
            ['governorate_id' => 9, 'city_ar' => 'القنطرة شرق', 'city_en' => 'Qantara Sharq'],
            ['governorate_id' => 9, 'city_ar' => 'القنطرة غرب', 'city_en' => 'Qantara Gharb'],
            ['governorate_id' => 9, 'city_ar' => 'التل الكبير', 'city_en' => 'El Tal El Kabier'],
            ['governorate_id' => 9, 'city_ar' => 'أبو صوير', 'city_en' => 'Abu Sawir'],
            ['governorate_id' => 9, 'city_ar' => 'القصاصين الجديدة', 'city_en' => 'Kasasien El Gedida'],
            ['governorate_id' => 9, 'city_ar' => 'نفيشة', 'city_en' => 'Nefesha'],
            ['governorate_id' => 9, 'city_ar' => 'الشيخ زايد', 'city_en' => 'Sheikh Zayed'],
            /* End Ismailia ID:9 */

            /* Start Monufya ID:10 */
            ['governorate_id' => 10, 'city_ar' => 'شبين الكوم', 'city_en' => 'Shbeen El Koom'],
            ['governorate_id' => 10, 'city_ar' => 'مدينة السادات', 'city_en' => 'Sadat City'],
            ['governorate_id' => 10, 'city_ar' => 'منوف', 'city_en' => 'Menouf'],
            ['governorate_id' => 10, 'city_ar' => 'سرس الليان', 'city_en' => 'Sars El-Layan'],
            ['governorate_id' => 10, 'city_ar' => 'أشمون', 'city_en' => 'Ashmon'],
            ['governorate_id' => 10, 'city_ar' => 'الباجور', 'city_en' => 'Al Bagor'],
            ['governorate_id' => 10, 'city_ar' => 'قويسنا', 'city_en' => 'Quesna'],
            ['governorate_id' => 10, 'city_ar' => 'بركة السبع', 'city_en' => 'Berkat El Saba'],
            ['governorate_id' => 10, 'city_ar' => 'تلا', 'city_en' => 'Tala'],
            ['governorate_id' => 10, 'city_ar' => 'الشهداء', 'city_en' => 'Al Shohada'],
            /* Start Monufya ID:10 */

            /* Start Minya ID:11 */
            ['governorate_id' => 11, 'city_ar' => 'المنيا', 'city_en' => 'Minya'],
            ['governorate_id' => 11, 'city_ar' => 'المنيا الجديدة', 'city_en' => 'Minya El Gedida'],
            ['governorate_id' => 11, 'city_ar' => 'العدوة', 'city_en' => 'El Adwa'],
            ['governorate_id' => 11, 'city_ar' => 'مغاغة', 'city_en' => 'Magagha'],
            ['governorate_id' => 11, 'city_ar' => 'بني مزار', 'city_en' => 'Bani Mazar'],
            ['governorate_id' => 11, 'city_ar' => 'مطاي', 'city_en' => 'Mattay'],
            ['governorate_id' => 11, 'city_ar' => 'سمالوط', 'city_en' => 'Samalut'],
            ['governorate_id' => 11, 'city_ar' => 'المدينة الفكرية', 'city_en' => 'Madinat El Fekria'],
            ['governorate_id' => 11, 'city_ar' => 'ملوي', 'city_en' => 'Meloy'],
            ['governorate_id' => 11, 'city_ar' => 'دير مواس', 'city_en' => 'Deir Mawas'],
            ['governorate_id' => 11, 'city_ar' => 'ابو قرقاص', 'city_en' => 'Abu Qurqas'],
            ['governorate_id' => 11, 'city_ar' => 'ارض سلطان', 'city_en' => 'Ard Sultan'],
            /* End Minya ID:11 */

            /* Start Qalubia ID:12 */
            ['governorate_id' => 12, 'city_ar' => 'بنها', 'city_en' => 'Banha'],
            ['governorate_id' => 12, 'city_ar' => 'قليوب', 'city_en' => 'Qalyub'],
            ['governorate_id' => 12, 'city_ar' => 'شبرا الخيمة', 'city_en' => 'Shubra Al Khaimah'],
            ['governorate_id' => 12, 'city_ar' => 'القناطر الخيرية', 'city_en' => 'Al Qanater Charity'],
            ['governorate_id' => 12, 'city_ar' => 'الخانكة', 'city_en' => 'Khanka'],
            ['governorate_id' => 12, 'city_ar' => 'كفر شكر', 'city_en' => 'Kafr Shukr'],
            ['governorate_id' => 12, 'city_ar' => 'طوخ', 'city_en' => 'Tukh'],
            ['governorate_id' => 12, 'city_ar' => 'قها', 'city_en' => 'Qaha'],
            ['governorate_id' => 12, 'city_ar' => 'العبور', 'city_en' => 'Obour'],
            ['governorate_id' => 12, 'city_ar' => 'الخصوص', 'city_en' => 'Khosous'],
            ['governorate_id' => 12, 'city_ar' => 'شبين القناطر', 'city_en' => 'Shibin Al Qanater'],
            ['governorate_id' => 12, 'city_ar' => 'مسطرد', 'city_en' => 'Mostorod'],
            /* End Qalubia ID:12 */

            /* Start New Valley ID:13 */
            ['governorate_id' => 13, 'city_ar' => 'الخارجة', 'city_en' => 'El Kharga'],
            ['governorate_id' => 13, 'city_ar' => 'باريس', 'city_en' => 'Paris'],
            ['governorate_id' => 13, 'city_ar' => 'موط', 'city_en' => 'Mout'],
            ['governorate_id' => 13, 'city_ar' => 'الفرافرة', 'city_en' => 'Farafra'],
            ['governorate_id' => 13, 'city_ar' => 'بلاط', 'city_en' => 'Balat'],
            ['governorate_id' => 13, 'city_ar' => 'الداخلة', 'city_en' => 'Dakhla'],
            /* End New Valley ID:13 */

            /* Start South Sinai ID:14 */
            ['governorate_id' => 14, 'city_ar' => 'السويس', 'city_en' => 'Suez'],
            ['governorate_id' => 14, 'city_ar' => 'الجناين', 'city_en' => 'Alganayen'],
            ['governorate_id' => 14, 'city_ar' => 'عتاقة', 'city_en' => 'Ataqah'],
            ['governorate_id' => 14, 'city_ar' => 'العين السخنة', 'city_en' => 'Ain Sokhna'],
            ['governorate_id' => 14, 'city_ar' => 'فيصل', 'city_en' => 'Faysal'],
            /* End South Sinai ID:14 */

            /* Start Aswan ID:15 */
            ['governorate_id' => 15, 'city_ar' => 'أسوان', 'city_en' => 'Aswan'],
            ['governorate_id' => 15, 'city_ar' => 'أسوان الجديدة', 'city_en' => 'Aswan El Gedida'],
            ['governorate_id' => 15, 'city_ar' => 'دراو', 'city_en' => 'Drau'],
            ['governorate_id' => 15, 'city_ar' => 'كوم أمبو', 'city_en' => 'Kom Ombo'],
            ['governorate_id' => 15, 'city_ar' => 'نصر النوبة', 'city_en' => 'Nasr Al Nuba'],
            ['governorate_id' => 15, 'city_ar' => 'كلابشة', 'city_en' => 'Kalabsha'],
            ['governorate_id' => 15, 'city_ar' => 'إدفو', 'city_en' => 'Edfu'],
            ['governorate_id' => 15, 'city_ar' => 'الرديسية', 'city_en' => 'Al-Radisiyah'],
            ['governorate_id' => 15, 'city_ar' => 'البصيلية', 'city_en' => 'Al Basilia'],
            ['governorate_id' => 15, 'city_ar' => 'السباعية', 'city_en' => 'Al Sibaeia'],
            ['governorate_id' => 15, 'city_ar' => 'ابوسمبل السياحية', 'city_en' => 'Abo Simbl Al Siyahia'],
            ['governorate_id' => 15, 'city_ar' => 'مرسى علم', 'city_en' => 'Marsa Alam'],
            /* End Aswan ID:15 */

            /* Start Assiut ID:16 */
            ['governorate_id' => 16, 'city_ar' => 'أسيوط', 'city_en' => 'Assiut'],
            ['governorate_id' => 16, 'city_ar' => 'أسيوط الجديدة', 'city_en' => 'Assiut El Gedida'],
            ['governorate_id' => 16, 'city_ar' => 'ديروط', 'city_en' => 'Dayrout'],
            ['governorate_id' => 16, 'city_ar' => 'منفلوط', 'city_en' => 'Manfalut'],
            ['governorate_id' => 16, 'city_ar' => 'القوصية', 'city_en' => 'Qusiya'],
            ['governorate_id' => 16, 'city_ar' => 'أبنوب', 'city_en' => 'Abnoub'],
            ['governorate_id' => 16, 'city_ar' => 'أبو تيج', 'city_en' => 'Abu Tig'],
            ['governorate_id' => 16, 'city_ar' => 'الغنايم', 'city_en' => 'El Ghanaim'],
            ['governorate_id' => 16, 'city_ar' => 'ساحل سليم', 'city_en' => 'Sahel Selim'],
            ['governorate_id' => 16, 'city_ar' => 'البداري', 'city_en' => 'El Badari'],
            ['governorate_id' => 16, 'city_ar' => 'صدفا', 'city_en' => 'Sidfa'],
            /* End Assiut ID:16 */

            /* Start Bani Sweif ID:17 */
            ['governorate_id' => 17, 'city_ar' => 'بني سويف', 'city_en' => 'Bani Sweif'],
            ['governorate_id' => 17, 'city_ar' => 'بني سويف الجديدة', 'city_en' => 'Beni Suef El Gedida'],
            ['governorate_id' => 17, 'city_ar' => 'الواسطى', 'city_en' => 'Al Wasta'],
            ['governorate_id' => 17, 'city_ar' => 'ناصر', 'city_en' => 'Naser'],
            ['governorate_id' => 17, 'city_ar' => 'إهناسيا', 'city_en' => 'Ehnasia'],
            ['governorate_id' => 17, 'city_ar' => 'ببا', 'city_en' => 'beba'],
            ['governorate_id' => 17, 'city_ar' => 'الفشن', 'city_en' => 'Fashn'],
            ['governorate_id' => 17, 'city_ar' => 'سمسطا', 'city_en' => 'Somasta'],
            ['governorate_id' => 17, 'city_ar' => 'الاباصيرى', 'city_en' => 'Alabbaseri'],
            ['governorate_id' => 17, 'city_ar' => 'مقبل', 'city_en' => 'Mokbel'],
            /* End Bani Sweif ID:17 */

            /* Start PorSaid ID:18 */
            ['governorate_id' => 18, 'city_ar' => 'بورسعيد', 'city_en' => 'PorSaid'],
            ['governorate_id' => 18, 'city_ar' => 'بورفؤاد', 'city_en' => 'Port Fouad'],
            ['governorate_id' => 18, 'city_ar' => 'العرب', 'city_en' => 'Alarab'],
            ['governorate_id' => 18, 'city_ar' => 'حى الزهور', 'city_en' => 'Zohour'],
            ['governorate_id' => 18, 'city_ar' => 'حى الشرق', 'city_en' => 'Alsharq'],
            ['governorate_id' => 18, 'city_ar' => 'حى الضواحى', 'city_en' => 'Aldawahi'],
            ['governorate_id' => 18, 'city_ar' => 'حى المناخ', 'city_en' => 'Almanakh'],
            ['governorate_id' => 18, 'city_ar' => 'حى مبارك', 'city_en' => 'Mubarak'],
            /* End PorSaid ID:18 */

            /* Start Damietta ID:19 */
            ['governorate_id' => 19, 'city_ar' => 'دمياط', 'city_en' => 'Damietta'],
            ['governorate_id' => 19, 'city_ar' => 'دمياط الجديدة', 'city_en' => 'New Damietta'],
            ['governorate_id' => 19, 'city_ar' => 'رأس البر', 'city_en' => 'Ras El Bar'],
            ['governorate_id' => 19, 'city_ar' => 'فارسكور', 'city_en' => 'Faraskour'],
            ['governorate_id' => 19, 'city_ar' => 'الزرقا', 'city_en' => 'Zarqa'],
            ['governorate_id' => 19, 'city_ar' => 'السرو', 'city_en' => 'alsaru'],
            ['governorate_id' => 19, 'city_ar' => 'الروضة', 'city_en' => 'alruwda'],
            ['governorate_id' => 19, 'city_ar' => 'كفر البطيخ', 'city_en' => 'Kafr El-Batikh'],
            ['governorate_id' => 19, 'city_ar' => 'عزبة البرج', 'city_en' => 'Azbet Al Burg'],
            ['governorate_id' => 19, 'city_ar' => 'ميت أبو غالب', 'city_en' => 'Meet Abou Ghalib'],
            ['governorate_id' => 19, 'city_ar' => 'كفر سعد', 'city_en' => 'Kafr Saad'],
            /* End Damietta ID:19 */

            /* Start Sharqia ID:20 */
            ['governorate_id' => 20, 'city_ar' => 'الزقازيق', 'city_en' => 'Zagazig'],
            ['governorate_id' => 20, 'city_ar' => 'العاشر من رمضان', 'city_en' => 'Al Ashr Men Ramadan'],
            ['governorate_id' => 20, 'city_ar' => 'منيا القمح', 'city_en' => 'Minya Al Qamh'],
            ['governorate_id' => 20, 'city_ar' => 'بلبيس', 'city_en' => 'Belbeis'],
            ['governorate_id' => 20, 'city_ar' => 'مشتول السوق', 'city_en' => 'Mashtoul El Souq'],
            ['governorate_id' => 20, 'city_ar' => 'القنايات', 'city_en' => 'Qenaiat'],
            ['governorate_id' => 20, 'city_ar' => 'أبو حماد', 'city_en' => 'Abu Hammad'],
            ['governorate_id' => 20, 'city_ar' => 'القرين', 'city_en' => 'El Qurain'],
            ['governorate_id' => 20, 'city_ar' => 'ههيا', 'city_en' => 'Hehia'],
            ['governorate_id' => 20, 'city_ar' => 'أبو كبير', 'city_en' => 'Abu Kabir'],
            ['governorate_id' => 20, 'city_ar' => 'فاقوس', 'city_en' => 'Faccus'],
            ['governorate_id' => 20, 'city_ar' => 'الصالحية الجديدة', 'city_en' => 'El Salihia El Gedida'],
            ['governorate_id' => 20, 'city_ar' => 'الإبراهيمية', 'city_en' => 'Al Ibrahimiyah'],
            ['governorate_id' => 20, 'city_ar' => 'ديرب نجم', 'city_en' => 'Deirb Negm'],
            ['governorate_id' => 20, 'city_ar' => 'كفر صقر', 'city_en' => 'Kafr Saqr'],
            ['governorate_id' => 20, 'city_ar' => 'أولاد صقر', 'city_en' => 'Awlad Saqr'],
            ['governorate_id' => 20, 'city_ar' => 'الحسينية', 'city_en' => 'Husseiniya'],
            ['governorate_id' => 20, 'city_ar' => 'صان الحجر القبلية', 'city_en' => 'san alhajar alqablia'],
            ['governorate_id' => 20, 'city_ar' => 'منشأة أبو عمر', 'city_en' => 'Manshayat Abu Omar'],
            /* End Sharqia ID:20 */

            /* Start South Sinai ID:21 */
            ['governorate_id' => 21, 'city_ar' => 'الطور', 'city_en' => 'Al Toor'],
            ['governorate_id' => 21, 'city_ar' => 'شرم الشيخ', 'city_en' => 'Sharm El-Shaikh'],
            ['governorate_id' => 21, 'city_ar' => 'دهب', 'city_en' => 'Dahab'],
            ['governorate_id' => 21, 'city_ar' => 'نويبع', 'city_en' => 'Nuweiba'],
            ['governorate_id' => 21, 'city_ar' => 'طابا', 'city_en' => 'Taba'],
            ['governorate_id' => 21, 'city_ar' => 'سانت كاترين', 'city_en' => 'Saint Catherine'],
            ['governorate_id' => 21, 'city_ar' => 'أبو رديس', 'city_en' => 'Abu Redis'],
            ['governorate_id' => 21, 'city_ar' => 'أبو زنيمة', 'city_en' => 'Abu Zenaima'],
            ['governorate_id' => 21, 'city_ar' => 'رأس سدر', 'city_en' => 'Ras Sidr'],
            /* End South Sinai ID:21 */

            /* Start Kafr El Sheikh ID:22 */
            ['governorate_id' => 22, 'city_ar' => 'كفر الشيخ', 'city_en' => 'Kafr El Sheikh'],
            ['governorate_id' => 22, 'city_ar' => 'وسط البلد كفر الشيخ', 'city_en' => 'Kafr El Sheikh Downtown'],
            ['governorate_id' => 22, 'city_ar' => 'دسوق', 'city_en' => 'Desouq'],
            ['governorate_id' => 22, 'city_ar' => 'فوه', 'city_en' => 'Fooh'],
            ['governorate_id' => 22, 'city_ar' => 'مطوبس', 'city_en' => 'Metobas'],
            ['governorate_id' => 22, 'city_ar' => 'برج البرلس', 'city_en' => 'Burg Al Burullus'],
            ['governorate_id' => 22, 'city_ar' => 'بلطيم', 'city_en' => 'Baltim'],
            ['governorate_id' => 22, 'city_ar' => 'مصيف بلطيم', 'city_en' => 'Masief Baltim'],
            ['governorate_id' => 22, 'city_ar' => 'الحامول', 'city_en' => 'Hamol'],
            ['governorate_id' => 22, 'city_ar' => 'بيلا', 'city_en' => 'Bella'],
            ['governorate_id' => 22, 'city_ar' => 'الرياض', 'city_en' => 'Riyadh'],
            ['governorate_id' => 22, 'city_ar' => 'سيدي سالم', 'city_en' => 'Sidi Salm'],
            ['governorate_id' => 22, 'city_ar' => 'قلين', 'city_en' => 'Qellen'],
            ['governorate_id' => 22, 'city_ar' => 'سيدي غازي', 'city_en' => 'Sidi Ghazi'],
            /* End Kafr El Sheikh ID:22 */

            /* Start Matrouh ID:23 */
            ['governorate_id' => 23, 'city_ar' => 'مرسى مطروح', 'city_en' => 'Marsa Matrouh'],
            ['governorate_id' => 23, 'city_ar' => 'الحمام', 'city_en' => 'El Hamam'],
            ['governorate_id' => 23, 'city_ar' => 'العلمين', 'city_en' => 'Alamein'],
            ['governorate_id' => 23, 'city_ar' => 'الضبعة', 'city_en' => 'Dabaa'],
            ['governorate_id' => 23, 'city_ar' => 'النجيلة', 'city_en' => 'Al-Nagila'],
            ['governorate_id' => 23, 'city_ar' => 'سيدي براني', 'city_en' => 'Sidi Brani'],
            ['governorate_id' => 23, 'city_ar' => 'السلوم', 'city_en' => 'Salloum'],
            ['governorate_id' => 23, 'city_ar' => 'سيوة', 'city_en' => 'Siwa'],
            ['governorate_id' => 23, 'city_ar' => 'مارينا', 'city_en' => 'Marina'],
            ['governorate_id' => 23, 'city_ar' => 'الساحل الشمالى', 'city_en' => 'North Coast'],
            /* End Matrouh ID:23 */

            /* Start Luxor ID:24 */
            ['governorate_id' => 24, 'city_ar' => 'الأقصر', 'city_en' => 'Luxor'],
            ['governorate_id' => 24, 'city_ar' => 'الأقصر الجديدة', 'city_en' => 'New Luxor'],
            ['governorate_id' => 24, 'city_ar' => 'إسنا', 'city_en' => 'Esna'],
            ['governorate_id' => 24, 'city_ar' => 'طيبة الجديدة', 'city_en' => 'New Tiba'],
            ['governorate_id' => 24, 'city_ar' => 'الزينية', 'city_en' => 'Al ziynia'],
            ['governorate_id' => 24, 'city_ar' => 'البياضية', 'city_en' => 'Al Bayadieh'],
            ['governorate_id' => 24, 'city_ar' => 'القرنة', 'city_en' => 'Al Qarna'],
            ['governorate_id' => 24, 'city_ar' => 'أرمنت', 'city_en' => 'Armant'],
            ['governorate_id' => 24, 'city_ar' => 'الطود', 'city_en' => 'Al Tud'],
            /* End Luxor ID:24 */

            /* Start Qena ID:25 */
            ['governorate_id' => 25, 'city_ar' => 'قنا', 'city_en' => 'Qena'],
            ['governorate_id' => 25, 'city_ar' => 'قنا الجديدة', 'city_en' => 'New Qena'],
            ['governorate_id' => 25, 'city_ar' => 'ابو طشت', 'city_en' => 'Abu Tesht'],
            ['governorate_id' => 25, 'city_ar' => 'نجع حمادي', 'city_en' => 'Nag Hammadi'],
            ['governorate_id' => 25, 'city_ar' => 'دشنا', 'city_en' => 'Deshna'],
            ['governorate_id' => 25, 'city_ar' => 'الوقف', 'city_en' => 'Alwaqf'],
            ['governorate_id' => 25, 'city_ar' => 'قفط', 'city_en' => 'Qaft'],
            ['governorate_id' => 25, 'city_ar' => 'نقادة', 'city_en' => 'Naqada'],
            ['governorate_id' => 25, 'city_ar' => 'فرشوط', 'city_en' => 'Farshout'],
            ['governorate_id' => 25, 'city_ar' => 'قوص', 'city_en' => 'Quos'],
            /* End Qena ID:25 */

            /* Start North Sinai ID:26 */
            ['governorate_id' => 26, 'city_ar' => 'العريش', 'city_en' => 'Arish'],
            ['governorate_id' => 26, 'city_ar' => 'الشيخ زويد', 'city_en' => 'Sheikh Zowaid'],
            ['governorate_id' => 26, 'city_ar' => 'نخل', 'city_en' => 'Nakhl'],
            ['governorate_id' => 26, 'city_ar' => 'رفح', 'city_en' => 'Rafah'],
            ['governorate_id' => 26, 'city_ar' => 'بئر العبد', 'city_en' => 'Bir al-Abed'],
            ['governorate_id' => 26, 'city_ar' => 'الحسنة', 'city_en' => 'Al Hasana'],
            /* End North Sinai ID:26 */

            /* Start Sohag ID:27 */
            ['governorate_id' => 27, 'city_ar' => 'سوهاج', 'city_en' => 'Sohag'],
            ['governorate_id' => 27, 'city_ar' => 'سوهاج الجديدة', 'city_en' => 'Sohag El Gedida'],
            ['governorate_id' => 27, 'city_ar' => 'أخميم', 'city_en' => 'Akhmeem'],
            ['governorate_id' => 27, 'city_ar' => 'أخميم الجديدة', 'city_en' => 'Akhmim El Gedida'],
            ['governorate_id' => 27, 'city_ar' => 'البلينا', 'city_en' => 'Albalina'],
            ['governorate_id' => 27, 'city_ar' => 'المراغة', 'city_en' => 'El Maragha'],
            ['governorate_id' => 27, 'city_ar' => 'المنشأة', 'city_en' => 'almunsha\'a'],
            ['governorate_id' => 27, 'city_ar' => 'دار السلام', 'city_en' => 'Dar AISalaam'],
            ['governorate_id' => 27, 'city_ar' => 'جرجا', 'city_en' => 'Gerga'],
            ['governorate_id' => 27, 'city_ar' => 'جهينة الغربية', 'city_en' => 'Jahina Al Gharbia'],
            ['governorate_id' => 27, 'city_ar' => 'ساقلته', 'city_en' => 'Saqilatuh'],
            ['governorate_id' => 27, 'city_ar' => 'طما', 'city_en' => 'Tama'],
            ['governorate_id' => 27, 'city_ar' => 'طهطا', 'city_en' => 'Tahta'],
            ['governorate_id' => 27, 'city_ar' => 'الكوثر', 'city_en' => 'Alkawthar'],
        ];

        foreach ($cities as $key => $value) {
            City::create($value);
        }
    }
}
