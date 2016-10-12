<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->delete();

        $promoCategory = DB::table('categories')->select('id')->where('title', '=', 'Promo')->first();
        $genericCategory = DB::table('categories')->select('id')->where('title', '=', 'Generic')->first();

        DB::table('videos')->insert([
            [
                'title' => 'CEC Spot Minoritati',
                'length' => 37,
                'frames' => 32,
                'path' => 'CEC_Spot Minoritati.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'CEC Depunerea declaratiei la locul de sedere',
                'length' => 40,
                'frames' => 28,
                'path' => 'CEC_Depunerea declaratiei la locul de sedere.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'CEC Spot Motivational',
                'length' => 34,
                'frames' => 72,
                'path' => 'CEC_Spot motivational.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'CEC Studenti si elevi Rom',
                'length' => 46,
                'frames' => 24,
                'path' => 'CEC_Studenti elevi RO.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'CEC Studenti si elevi Rus',
                'length' => 46,
                'frames' => 68,
                'path' => 'CEC_Studenti elevi RUS.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Moldova Sport Jeep Trial Cross',
                'length' => 42,
                'frames' => 96,
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
                'path' => 'SOCIAL Miscare.mpg',
                'category_id' => $promoCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Bila Promo',
                'length' => 10,
                'frames' => 0,
                'path' => '__Bila MS.mpg',
                'category_id' => $genericCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Bila Publicitate',
                'length' => 10,
                'frames' => 20,
                'path' => '__Bila MS Publicitate.mpg',
                'category_id' => $genericCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Generic Baku 1',
                'length' => 29,
                'frames' => 0,
                'path' => 'Baku-2015_GENERIC_1.avi',
                'category_id' => $genericCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Generic Baku 2',
                'length' => 15,
                'frames' => 12,
                'path' => 'Baku-2015_GENERIC_2.avi',
                'category_id' => $genericCategory->id,
                'onair' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ]);
    }
}
