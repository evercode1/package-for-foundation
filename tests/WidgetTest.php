<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WidgetTest extends TestCase
{
    public function testCreateNewWidget()
    {

        $randomString = str_random(10);

        $this->visit('/widget/create')
             ->type($randomString, 'name')
             ->press('Create')
             ->seePageIs('/widget');
    }

}