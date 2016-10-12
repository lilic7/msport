<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PromoTypeSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(PlayblockTypesSeeder::class);
        $this->call(PromoSeeder::class);

    }
}
