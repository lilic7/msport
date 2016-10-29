<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\PromoType;
use App\Video;
use App\Promo;

class PromoTest extends TestCase{

    use DatabaseTransactions;
    
    /** @test */
    function promo_has_a_name(){
        $promo = factory(Promo::class)->create([
            'promo_type_id' => factory(PromoType::class)->create()->id,
            'video_id' => factory(Video::class)->create([
                'title' => 'Promo Moldova Sport',
                'category_id' => factory(\App\Category::class)->create()
            ])->id
        ]);

        $this->assertEquals('Promo Moldova Sport', $promo->video->title);
    }
}
