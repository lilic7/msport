<?php


use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Playblock;
use App\PlayblockType;
use App\Video;
use App\Promo;
use App\PromoType;
use App\Category;

class PlayblockTest extends TestCase{

    use DatabaseTransactions;

    /** @test */
    function  playblock_of_type_promos_can_add_promo(){

        $genericCategory = factory(Category::class)->create([
            'title' => 'Generic'
        ]);
        $promoCategory = factory(Category::class)->create([
            'title' => 'Promo'
        ]);

        $promoType = factory(PromoType::class)->create();

        $generic = factory(Video::class)->create([
            'title' => 'Generic Promo',
            'length' => 10,
            'frames' => 0,
            'category_id' => $genericCategory->id
        ]);

        $promo1_video = factory(Video::class)->create([
            'title' => 'Moldova Sport General',
            'length' => 35,
            'frames' => 10,
            'category_id' => $promoCategory->id,
            'onair' => true
        ]);

        $promo1 = factory(Promo::class)->create([
            'video_id' => $promo1_video->id,
            'promo_type_id' => $promoType->id
        ]);

        $playblockType = factory(PlayblockType::class)->create();


        // create a promo block
        $playblock = factory(Playblock::class)->create([
            'playblock_type_id' => $playblockType->id
        ]);

        $playblock->videos()->save($promo1_video);

        $this->assertCount(1, $playblock->videos()->get());
    }

    /** @test */
    function  playblock_of_type_promos_must_start_with_generic(){

        $genericCategory = factory(Category::class)->create([
            'title' => 'Generic'
        ]);
        $promoCategory = factory(Category::class)->create([
            'title' => 'Promo'
        ]);

        $promoType = factory(PromoType::class)->create();

        $generic = factory(Video::class)->create([
            'title' => 'Generic Promo',
            'length' => 10,
            'frames' => 0,
            'category_id' => $genericCategory->id
        ]);

        // insert 2 promo with promotype and video
        $promo1_video = factory(Video::class)->create([
            'title' => 'Moldova Sport General',
            'length' => 35,
            'frames' => 10,
            'category_id' => $promoCategory->id,
            'onair' => true
        ]);

        $promo1 = factory(Promo::class)->create([
            'video_id' => $promo1_video->id,
            'promo_type_id' => $promoType->id
        ]);

        $promo2_video = factory(Video::class)->create([
            'title' => 'Moldova Sport Tenis',
            'length' => 40,
            'frames' => 0,
            'category_id' => $promoCategory->id,
            'onair' => true
        ]);

        $promo2 = factory(Promo::class)->create([
            'video_id' => $promo2_video->id,
            'promo_type_id' => $promoType->id
        ]);

        $playblockType = factory(PlayblockType::class)->create();

        // add promo to block
        
//        Playblock::addVideo();
        
        // assert the playblok starts with generic
        // assert the playblok ends with generic
    }
}
