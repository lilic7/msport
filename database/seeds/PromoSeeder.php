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

        $promoTypeGeneral = DB::table('promo_types')->select('id')->where('type', '=', 'general')->first();
        $promoTypeTimed = DB::table('promo_types')->select('id')->where('type', '=', 'timed')->first();
        $promoTypeSocial = DB::table('promo_types')->select('id')->where('type', '=', 'social')->first();


        DB::table('promos')->insert([
            [
                'video_id'      => $this->getVideoID('CEC Spot Minoritati'),
                'promo_type_id' => $promoTypeTimed->id,
                'final_air'     => '2016-10-30 12:00:00',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('CEC Depunerea declaratiei la locul de sedere'),
                'promo_type_id' => $promoTypeTimed->id,
                'final_air' => '2016-09-29 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('CEC Spot Motivational'),
                'promo_type_id' => $promoTypeTimed->id,
                'final_air' => '2016-10-30 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('CEC Studenti si elevi Rom'),
                'promo_type_id' => $promoTypeTimed->id,
                'final_air' => '2016-10-30 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('CEC Studenti si elevi Rus'),
                'promo_type_id' => $promoTypeTimed->id,
                'final_air' => '2016-10-30 12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('promos')->insert([
            [
                'video_id'      => $this->getVideoID('Moldova Sport Jeep Trial Cross'),
                'promo_type_id' => $promoTypeGeneral->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('Moldova Sport General'),
                'promo_type_id' => $promoTypeGeneral->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('Moldova Sport Tenis'),
                'promo_type_id' => $promoTypeGeneral->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('Protectia Consumatorului'),
                'promo_type_id' => $promoTypeGeneral->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('Social Apa'),
                'promo_type_id' => $promoTypeSocial->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('Social Legume'),
                'promo_type_id' => $promoTypeSocial->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'video_id'      => $this->getVideoID('Social Miscare'),
                'promo_type_id' => $promoTypeSocial->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
    public function getVideoID($title){
        $promo = DB::table('videos')->select('id')->where('title', '=', $title)->first();
        return $promo->id;
    }


}
