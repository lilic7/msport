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

        $videos[] = factory(Video::class)->create([
            'category_id'   => 2]);

        $videos[] = factory(Video::class)->create([
            'category_id'   => 2]);

        $videos[] = factory(Video::class)->create([
            'category_id'   => 2]);

        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->addVideos($videos);

        $this->assertCount(3, $playblock->videos()->get());
    }
    /** @test */
    public function playblock_has_total_duration_formed_from_duration_of_containing_video()
    {
        $videos[] = factory(Video::class)->create([
            'category_id'   => 2,
            'duration'      => 75,
            'frames'        => 30]);

        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->addVideos($videos);

        $this->assertEquals(75, $playblock->duration);
    }

    /** @test */
    public function playblock_has_total_duration_formed_from_sum_of_containing_videos()
    {
        $videos[] = factory(Video::class)->create([
                    'category_id'   => 2,
                    'duration'      => 75,
                    'frames'        => 30]);
        $videos[] = factory(Video::class)->create([
                    'category_id'   => 2,
                    'duration'      => 30,
                    'frames'        => 10]);

        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->addVideos($videos);

        $this->assertEquals(105, $playblock->duration);
        $this->assertEquals(40, $playblock->frames);
    }

    /** @test */
    function playblock_fames_greater_than_100_transforms_to_secconds(){

        $videos[] = factory(Video::class)->create([
            'duration'      => 10,
            'frames'        => 80,
            'category_id'   => 1
        ]);

        $videos[] = factory(Video::class)->create([
            'duration'      => 30,
            'frames'        => 40,
            'category_id'   => 1
        ]);

        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->addVideos($videos);

        $this->assertEquals(20, $playblock->frames); // 120 frames => 1 second and 20 frames
        $this->assertEquals(41, $playblock->duration); // 40 seconds + 1 second from frames sum
        $this->assertEquals("41.20", $playblock->totalDuration());
    }

    /** @test */
    function generate_a_playblock_of_maximum_duration(){
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);
        $videos[] = factory(Video::class)->create(['category_id' => 2]);


        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->addVideos($videos, 120);

        $this->assertLessThanOrEqual(120, $playblock->duration);
    }

    /** @test */
    function playblock_dont_change_frames_if_video_diration_exceeds_maximum_duration(){

        $videos[] = factory(Video::class)->create([
            'duration'      => 50,
            'frames'        => 10,
            'category_id'   => 1
        ]);

        $videos[] = factory(Video::class)->create([
            'duration'      => 30,
            'frames'        => 10,
            'category_id'   => 1
        ]);

        $videos[] = factory(Video::class)->create([
            'duration'      => 30,
            'frames'        => 40,
            'category_id'   => 1
        ]);

        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->addVideos($videos, 85);

        $this->assertEquals(20, $playblock->frames); // 120 frames => 1 second and 20 frames
        $this->assertEquals(80, $playblock->duration); // 40 seconds + 1 second from frames sum
        $this->assertEquals("80.20", $playblock->totalDuration());
    }
}
