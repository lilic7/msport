<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\PlayblockType;
use App\PlayblockStructure;
use App\Playblock;
use App\Video;
use App\Category;

class PlayblockStructureTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function create_structure_with_one_video_of_type_promo()
    {
        $formData = [
            'title' => 'promo',
            'vars' => [
                ['::bila::' => 'generic.mpg']
            ],
            'structure' => '::bila::'
        ];

        $playblockType = factory(PlayblockType::class)->create([
            'title' => $formData['title'],
            'structure' => $formData['structure']
        ]);

        $playblockType->createElements($formData['vars']);

        $playblockStructure = PlayblockStructure::where('playblock_type_id', $playblockType->id)->first();

        $this->assertEquals('::bila::', $playblockStructure->var_name);
    }
}
