<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generics')->delete();

        $genericCategory = DB::table('categories')->select('id')->where('title', '=', 'Generic')->first();

        DB::table('generics')->insert([
            [
                'title' => 'Bila MS Promo',
                'length' => 10,
                'frames' => 0,
                'category_id' => $genericCategory->id,
                'path' => '__Bila MS.mpg',
                'onair' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Bila MS Publicitate',
                'length' => 10,
                'frames' => 20,
                'category_id' => $genericCategory->id,
                'path' => '__Bila MS Publicitate.mpg',
                'onair' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Generic Baku 2015 1',
                'length' => 29,
                'frames' => 0,
                'category_id' => $genericCategory->id,
                'path' => 'Baku-2015_GENERIC_1.avi',
                'onair' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Generic Baku 2015 2',
                'length' => 15,
                'frames' => 12,
                'category_id' => $genericCategory->id,
                'path' => 'Baku-2015_GENERIC_2.avi',
                'onair' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
