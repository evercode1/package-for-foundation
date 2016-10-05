<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubcategoryTest extends TestCase
{
    public function testCreateNewSubcategory()
    {

        $randomString = str_random(10);

        $this->visit('/subcategory/create')
             ->type($randomString, 'name')
             ->select(1, 'category_id')
             ->press('Create')
             ->seePageIs('/subcategory');
    }

}