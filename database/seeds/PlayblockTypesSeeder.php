<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlayblockTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playblock_types')->delete();

        DB::table('playblock_types')->insert([
            ['title'=>'general', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title'=>'promo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title'=>'baku', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
