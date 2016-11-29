<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Playblock;
use App\Video;
use App\Category;
use App\PlayblockStructure;
use App\PlayblockType;

class PlayblockTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function add_video_to_playblock(){

        factory(Video::class, 5)->create(['category_id'=>1]);

        $videos_to_add = Video::whereIn('id', [2, 3])->get();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos_to_add);

        $this->assertCount(2, $playblock->videos);
    }

    /** @test */
    function add_playblock_videos_into_another_playblock(){

        factory(Video::class)->create([
            'duration'      => 105,
            'frames'        => 70,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 80,
            'frames'        => 70,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 50,
            'frames'        => 10,
            'category_id'   => 1
        ]);

        factory(Playblock::class)->create([
            'playblock_type_id'     => 1,
            'duration'              => 90,
            'frames'                => 10
        ]);

        $videos = Video::whereIn('id', [2, 3])->get();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock_to_add = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock_to_add->add($videos);

        $playblock->add(Video::where('id', 1)->get());

        $playblock->add($playblock_to_add->videos()->get());

        $this->assertCount(3, $playblock->videos);
        $this->assertEquals(236, $playblock->duration);
    }

    /** @test */
    function only_videos_could_be_added_to_playblock(){

        factory(Category::class, 5)->create();

        $notVideos = Category::whereIn('id', [2, 3])->get();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $this->expectException(TypeError::class);

        $playblock->add($notVideos);
    }


    /** @test */
    function calculate_playblock_frames_according_to_sum_of_videos_frames(){

        factory(Video::class)->create([
            'frames'        => 8,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'frames'        => 80,
            'category_id'   => 1
        ]);


        $videos = Video::all();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos);

        $this->assertEquals(88, $playblock->frames);
    }

    /** @test */
    function sum_of_frames_greater_than_100_is_correctly_transformed(){

        factory(Video::class)->create([
            'frames'        => 28,
            'category_id'   => 1
        ]);
        factory(App\Video::class)->create([
            'frames'        => 180,
            'category_id'   => 1
        ]);


        $videos = Video::all();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos);

        $this->assertEquals(8, $playblock->frames);
    }

    /** @test */
    function calculate_playblock_duration_according_to_sum_of_videos_durations(){

        factory(Video::class)->create([
            'duration'      => 8,
            'frames'        => 0,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 80,
            'frames'        => 0,
            'category_id'   => 1
        ]);


        $videos = Video::all();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos);

        $this->assertEquals(88, $playblock->duration);
    }

    /** @test */
    function calculate_playblock_duration_and_frames_from_sum_of_duration_and_frames_of_videos(){

        factory(Video::class)->create([
            'duration'      => 105,
            'frames'        => 70,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 80,
            'frames'        => 70,
            'category_id'   => 1
        ]);


        $videos = Video::all();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos);

        $this->assertEquals(186, $playblock->duration);
        $this->assertEquals(40, $playblock->frames);
    }



    /** @test */
    function remove_video_from_playblock(){

        $videos = factory(Video::class, 5)->create(['category_id'=>1]);

        $videos_to_remove = Video::whereIn('id', [2, 3])->get();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos);

        $playblock->remove($videos_to_remove);

        $this->assertCount(3, $playblock->videos);
    }

    /** @test */
    function calculate_playblock_duration_and_frames_at_video_remove_from_playblock(){

        factory(Video::class)->create([
            'duration'      => 105,
            'frames'        => 70,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 80,
            'frames'        => 70,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 50,
            'frames'        => 10,
            'category_id'   => 1
        ]);


        $videos = Video::all();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos);

        $video_to_remove = Video::where('id', 1)->get();

        $playblock->remove($video_to_remove);

        $this->assertEquals(130, $playblock->duration);

        $this->assertEquals(80, $playblock->frames);
    }

    /** @test */
    function add_video_to_playblock_with_maxDuration(){

        factory(Video::class)->create([
            'duration'      => 105,
            'frames'        => 70,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 80,
            'frames'        => 70,
            'category_id'   => 1
        ]);
        factory(Video::class)->create([
            'duration'      => 50,
            'frames'        => 10,
            'category_id'   => 1
        ]);

        $videos_to_add = Video::all();

        $playblock = factory(Playblock::class)->create(['playblock_type_id'=>1]);

        $playblock->add($videos_to_add, 120);

        $this->assertCount(1, $playblock->videos);
    }

    /** @test */
    function should_add_videos_to_playblock_to_appropiate_to_maxDuration()
    {

        factory(Video::class)->create([
            'duration' => 90,
            'frames' => 70,
            'category_id' => 1
        ]);
        factory(Video::class)->create([
            'duration' => 80,
            'frames' => 70,
            'category_id' => 1
        ]);
        factory(Video::class)->create([
            'duration' => 25,
            'frames' => 40,
            'category_id' => 1
        ]);

        $videos_to_add = Video::all();

        $playblock = factory(Playblock::class)->create(['playblock_type_id' => 1]);

        $playblock->add($videos_to_add, 120);

        $this->assertCount(2, $playblock->videos);
        $this->assertEquals(116, $playblock->duration);
        $this->assertEquals(10, $playblock->frames);
    }

    /** @test */
//    function create_playblock_according_to_its_type_structure(){
//
//        //create video to insert into playblock
//        $video_id = factory(Video::class)->create([
//            'title' => 'Bila Promo',
//            'category_id' => 1
//        ]);
//        factory(Video::class, 3)->create([ 'category_id' => 1 ]);
//
//        // create playblock_type
//        $promo_type_id = factory(PlayblockType::class)->create()->id;
//
//        $video = Video::where('id', $video_id)->get();
//
//        // create structure for this type
//        $structure_params = factory(PlayblockStructure::class)->create([
//            'playblock_type_id' => $promo_type_id,
//            'var_value' => $video_id
//        ]);
//
//        // generate playblock of type above
//        $playblock = factory(Playblock::class)->create([
//            'playblock_type_id' => $promo_type_id
//        ]);
//
//        // check if it conforms to structure
//        $this->assertCount(1, $playblock->videos);
//
//
//    }
}