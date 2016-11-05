<?php


use App\Video;
use App\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoTest extends TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    function video_length_is_converted_to_time_format(){
        $video = factory(Video::class)->create([
            'title' => 'Bila Promo',
            'length' => 75,
            'frames' => 0,
            'category_id' => factory(Category::class)->create([
                'title' => 'Generic'
            ])->id,
            'path' => 'generice'
        ]);

        $this->assertEquals("01:15", $video->length);
    }

    /** @test */
    function video_length_greater_than_an_hour_correctly_converts_to_time_format(){
        $video = factory(Video::class)->create([
            'title' => 'Bila Promo',
            'length' => 3640,
            'frames' => 0,
            'category_id' => factory(Category::class)->create([
                'title' => 'Generic'
            ])->id,
            'path' => 'generice'
        ]);
        $this->assertEquals("01:00:40", $video->length);
    }

    /** @test */
    function video_calculate_total_duration_from_length_and_frames(){
        $video = factory(Video::class)->create([
            'title' => 'Bila Promo',
            'length' => 3640,
            'frames' => 20,
            'category_id' => factory(Category::class)->create([
                'title' => 'Generic'
            ])->id,
            'path' => 'generice'
        ]);
        $this->assertEquals("01:00:40.20", $video->duration());
    }
}
