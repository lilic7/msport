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
}
