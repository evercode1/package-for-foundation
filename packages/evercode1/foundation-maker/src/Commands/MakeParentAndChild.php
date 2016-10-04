<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Crud\ParentCrudBuilder;
use Evercode1\FoundationMaker\Builders\Views\ParentViewBuilder;
use Evercode1\FoundationMaker\Builders\Crud\ChildCrudBuilder;
use Evercode1\FoundationMaker\Builders\Views\ChildViewBuilder;

class MakeParentAndChild extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:parent-child
                           {ParentName}
                           {ChildName}
                           {MasterPage}
                           {Slug=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create model, 
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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ParentCrudBuilder $parentCrud,
                           ParentViewBuilder $parentView,
                           ChildCrudBuilder $childCrud,
                           ChildViewBuilder $childView)
    {


        if ( $parentCrud->makeCrudFiles($this->argument()) ) {

            $this->sendParentSuccessMessage();

        } else {

            $this->error('Oops, something went wrong!');

        }

        if ( $parentView->makeViewFiles($this->argument()) ) {

            $this->sendParentViewsSuccessMessage();


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

        $this->info('Parent Crud Files successfully created');

    }

    private function sendParentViewsSuccessMessage()
    {

        $this->info('Parent Views successfully created');

    }


    private function sendChildSuccessMessage()
    {

        $this->info('Parent Crud Files successfully created');

    }

    private function sendChildViewsSuccessMessage()
    {

        $this->info('Parent Views successfully created');

    }

}
