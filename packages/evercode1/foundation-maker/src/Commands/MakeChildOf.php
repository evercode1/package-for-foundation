<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Crud\ParentRelationshipBuilder;
use Evercode1\FoundationMaker\Builders\Crud\ChildCrudBuilder;
use Evercode1\FoundationMaker\Builders\Views\ChildViewBuilder;

class MakeChildOf extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:child-of
                           {ParentName}
                           {ChildName}
                           {MasterPage}
                           {Slug=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create child model, 
                              migration, 
                              route, 
                              controller, 
                              factory, 
                              test, 
                              component, 
                              and views';



    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }


    public function handle(ParentRelationshipBuilder $parentCrud,
                           ChildCrudBuilder $childCrud,
                           ChildViewBuilder $childView)
    {


        if ( $parentCrud->makeParentRelation($this->argument()) ) {

            $this->sendParentSuccessMessage();

        } else {

            $this->error('Oops, something went wrong!');

        }


        if ( $childCrud->makeCrudFiles($this->argument()) ) {

            $this->sendChildSuccessMessage();

        } else {

            $this->error('Oops, something went wrong!');

        }

        if ( $childView->makeViewFiles($this->argument()) ) {

            $this->sendChildViewsSuccessMessage();


        } else {

            $this->error('Oops, something went wrong!');

        }


    }

    private function sendParentSuccessMessage()
    {

        $this->info('Parent Relationship successfully created');

    }



    private function sendChildSuccessMessage()
    {

        $this->info('Child Crud Files successfully created');

    }

    private function sendChildViewsSuccessMessage()
    {

        $this->info('Child Views successfully created');

    }

}
