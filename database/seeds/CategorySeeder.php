<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            ['title' => 'Promo', 'path'  => 'promo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'Generic', 'path'  => 'generice', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
