<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Crud\CrudBuilder;
use Evercode1\FoundationMaker\Builders\Views\ViewBuilder;

class MakeFoundation extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:foundation
                           {ModelName}
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
    public function handle(CrudBuilder $crud, ViewBuilder $view)
    {


        if ( $crud->makeCrudFiles($this->argument()) ) {

            $this->sendSuccessMessage();

        } else {

            $this->error('Oops, something went wrong!');

        }

        if ( $view->makeViewFiles($this->argument()) ) {

            $this->sendViewsSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');

    }

    private function sendSuccessMessage()
    {

        $this->info('Crud Files successfully created');

    }

    private function sendViewsSuccessMessage()
    {

        $this->info('Views successfully created');

    }


}
