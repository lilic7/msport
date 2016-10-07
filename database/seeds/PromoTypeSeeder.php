<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PromoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promo_types')->truncate();

        DB::table('promo_types')->insert([
            ['type' => 'general', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'timed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'social', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);


    }
}
