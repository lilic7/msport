<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\PromoPlayblock;
use App\PlayblockType;
use App\Video;
use App\Category;

class PromoPlayblockTest extends TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    public function extract_only_playblocks_of_type_promo()
    {
        $promoPlayblockTypeId = factory(PlayblockType::class)->create()->id;

        $playblock = factory(PromoPlayblock::class)->create([
            'playblock_type_id' => $promoPlayblockTypeId
        ]);
        
        $this->assertEquals('promo', $playblock->playblockType->title);
    }

    /** @test */
    function add_promo_to_playblock(){

        $promo_category_id = factory(Category::class)->create([
            'title' => 'promo'
        ])->id;

        factory(Video::class, 2)->create(['category_id'=>$promo_category_id]);

        factory(Video::class, 5)->create(['category_id'=>10]);

        $videos_to_add = Video::whereIn('id', [2, 3])->get();

        $promo_type_playblock_id = factory(PlayblockType::class)->create([
            'title' => 'promo'
        ])->id;

        $playblock = factory(PromoPlayblock::class)->create([
            'playblock_type_id' => $promo_type_playblock_id
        ]);

        $playblock->add($videos_to_add);

        $this->assertCount(1, $playblock->videos);
    }
}
