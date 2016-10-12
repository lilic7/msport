<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PromoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGenericIsAddedToPromoBlock()
    {
        $this->visit('promo/3')
            ->see('CEC Spot Motivational')
            ->see('00:34.72');
    }
    
    
}
