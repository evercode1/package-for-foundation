<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BoomletTest extends TestCase
{
    public function testCreateNewBoomlet()
    {

        $randomString = str_random(10);

        $this->visit('/boomlet/create')
             ->type($randomString, 'name')
             ->select(1, 'boom_id')
             ->press('Create')
             ->seePageIs('/boomlet');
    }

}