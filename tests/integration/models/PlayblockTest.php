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

    protected $genericCategory;
    protected $promoCategory;
    protected $promoType;
    protected $generic;
    protected $promo1_video;
    protected $promo2_video;
    protected $promo1;
    protected $promo2;
    protected $playblockType;
    protected $playblock;

    /** @test */
    function  playblock_of_type_promos_can_add_one_video(){

        $this->init_world();
        $this->create_promo1();
        $this->initPlayblock();

        $this->playblock->addVideo($this->promo1_video);
        $playblockVideos = $this->playblock->videos()->get();
        $this->assertCount(3, $this->playblock->videos()->get());
        $this->assertEquals('Generic Promo', $playblockVideos[0]->title);
        $this->assertEquals('Generic Promo', $playblockVideos[2]->title);
    }

    /** @test */
    function playblock_can_delete_video(){
        $this->init_world();
        $this->create_promo1();
        $this->initPlayblock();
        $this->playblock->addVideo($this->promo1_video);

        $this->playblock->removeVideo($this->promo1_video);
        $this->assertEquals(0, $this->playblock->videos()->get());
    }

    /** @test */
//    function playblock_of_type_promos_add_more_videos(){
//
//        $this->init_world();
//        $this->create_promo1();
//        $this->create_promo2();
//        $this->initPlayblock();
//
//        $this->playblock->addVideo($this->promo1_video);
//        $this->playblock->addVideo($this->promo2_video);
//        $playblockVideos = $this->playblock->videos()->get();
////        foreach($playblockVideos as $video){
////            echo $video->title."\n";
////        }
//        $this->assertCount(4, $this->playblock->videos()->get());
//        $this->assertEquals('Generic Promo', $playblockVideos[0]->title);
//        $this->assertEquals('Generic Promo', $playblockVideos[3]->title);
//    }

    /** @test */
    function  playblock_of_type_promos_must_start_with_generic(){


//        Playblock::addVideo();
        
        // assert the playblok starts with generic
        // assert the playblok ends with generic
    }


    private function initPlayblock()
    {
        $this->playblock = factory(Playblock::class)->create([
            'playblock_type_id' => $this->playblockType->id
        ]);
    }

    private function init_world(){
        $this->genericCategory = factory(Category::class)->create([
            'title' => 'Generic'
        ]);
        $this->promoCategory = factory(Category::class)->create([
            'title' => 'Promo'
        ]);

        $this->promoType = factory(PromoType::class)->create();

        $this->generic = factory(Video::class)->create([
            'title' => 'Generic Promo',
            'length' => 10,
            'frames' => 0,
            'category_id' => $this->genericCategory->id
        ]);

        $this->playblockType = factory(PlayblockType::class)->create();
    }

    private function create_promo1(){
        $this->promo1_video = factory(Video::class)->create([
            'title' => 'Moldova Sport General',
            'length' => 35,
            'frames' => 10,
            'category_id' => $this->promoCategory->id,
            'onair' => true
        ]);

        $promo1 = factory(Promo::class)->create([
            'video_id' => $this->promo1_video->id,
            'promo_type_id' => $this->promoType->id
        ]);
    }

    private function create_promo2(){
        $this->promo2_video = factory(Video::class)->create([
            'title' => 'Moldova Sport Tenis',
            'length' => 40,
            'frames' => 5,
            'category_id' => $this->promoCategory->id,
            'onair' => true
        ]);

        $promo2 = factory(Promo::class)->create([
            'video_id' => $this->promo2_video->id,
            'promo_type_id' => $this->promoType->id
        ]);
    }
}
