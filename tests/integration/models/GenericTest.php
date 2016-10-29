<?php

use App\Video;
use App\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class GenericTest extends TestCase
{

    use DatabaseTransactions;
    
    /** @test */
    function it_should_return_videos_of_type_generic(){

        factory(Video::class)->create([
            'title' => 'Bila Promo',
            'length' => 10,
            'frames' => 0,
            'category_id' => factory(Category::class)->create([
                'title' => 'Generic'
            ])->id,
            'path' => 'generice'
        ]);

        $generic = Video::generic()->first();

        $this->assertEquals('Generic', $generic->category->title);
    }
}
