<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Playblock;
use App\Video;

class PlayblockTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function playblock_can_add_array_of_videos(){

        $videos[] = factory(Video::class, 3)->create([
            'category_id'   => 2,]);

        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->addVideo($videos);

        $this->assertCount(3, $playblock->videos()->get());
    }

    /** @test */
    public function playblock_has_total_length_formed_from_sum_of_containing_videos()
    {
        $video = factory(Video::class)->create([
            'category_id'   => 2, 
            'length'        => 75,
            'frames' =>     30]);
        
        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);
        
        $playblock->videos()->attach($video);
        
        $this->assertEquals(75, $playblock->length);
    }
}
