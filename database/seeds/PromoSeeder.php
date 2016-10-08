<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promos')->delete();

        $promoCategory = DB::table('categories')->select('id')->where('title', '=', 'Promo')->first();
        $promoTypeGeneral = DB::table('promo_types')->select('id')->where('type', '=', 'general')->first();
        $promoTypeTimed = DB::table('promo_types')->select('id')->where('type', '=', 'timed')->first();
        $promoTypeSocial = DB::table('promo_types')->select('id')->where('type', '=', 'social')->first();


        DB::table('promos')->insert([
            [
                'title' => 'CEC Spot Minoritati',
                'length' => 37,
                'frames' => 32,
                'promo_type_id' => $promoTypeTimed->id,
                'path' => 'CEC_Spot Minoritati.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'final_air' => '2016-10-30 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'CEC Depunerea declaratiei la locul de sedere',
                'length' => 40,
                'frames' => 28,
                'promo_type_id' => $promoTypeTimed->id,
                'path' => 'CEC_Depunerea declaratiei la locul de sedere.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 0,
                'final_air' => '2016-09-29 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'CEC Spot Motivational',
                'length' => 34,
                'frames' => 72,
                'promo_type_id' => $promoTypeTimed->id,
                'path' => 'CEC_Spot motivational.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'final_air' => '2016-10-30 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'CEC Studenti si elevi',
                'length' => 53,
                'frames' => 4,
                'promo_type_id' => $promoTypeTimed->id,
                'path' => 'CEC_Studenti si elevi.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'final_air' => '2016-10-30 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]]);
        DB::table('promos')->insert([
            [
                'title' => 'Moldova Sport Jeep Trial Cross',
                'length' => 42,
                'frames' => 96,
                'promo_type_id' => $promoTypeGeneral->id,
                'path' => 'PROMO Moldova Sport Jeep Trial Cross.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Moldova Sport General',
                'length' => 36,
                'frames' => 72,
                'promo_type_id' => $promoTypeGeneral->id,
                'path' => 'PROMO Moldova Sport General.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Moldova Sport Tenis',
                'length' => 31,
                'frames' => 84,
                'promo_type_id' => $promoTypeGeneral->id,
                'path' => 'PROMO Moldova Sport Tenis.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Protectia Consumatorului',
                'length' => 28,
                'frames' => 68,
                'promo_type_id' => $promoTypeGeneral->id,
                'path' => 'PROMO Protectia Consumatorului.mp4',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Social Apa',
                'length' => 10,
                'frames' => 4,
                'promo_type_id' => $promoTypeSocial->id,
                'path' => 'SOCIAL Apa.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Social Legume',
                'length' => 10,
                'frames' => 4,
                'promo_type_id' => $promoTypeSocial->id,
                'path' => 'SOCIAL Legume.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Social Miscare',
                'length' => 9,
                'frames' => 4,
                'promo_type_id' => $promoTypeSocial->id,
                'path' => 'SOCIAL Miscare.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
