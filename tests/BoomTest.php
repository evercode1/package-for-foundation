<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BoomTest extends TestCase
{
    public function testCreateNewBoom()
    {

        $randomString = str_random(10);

        $this->visit('/boom/create')
             ->type($randomString, 'name')
             ->press('Create')
             ->seePageIs('/boom');
    }

}