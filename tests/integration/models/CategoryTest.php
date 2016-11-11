<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;
    /** @test  */
    public function add_new_category()
    {
        factory(App\Category::class)->create(['title'=> 'generic']);

        $this->assertCount(1, App\Category::all());
    }

    /** @test */
    public function unable_to_add_the_same_category_twice()
    {
        factory(App\Category::class)->create(['title'=> 'generic']);

        $this->expectException(\Illuminate\Database\QueryException::class);
        factory(App\Category::class)->create(['title'=> 'generic']);
    }
}
