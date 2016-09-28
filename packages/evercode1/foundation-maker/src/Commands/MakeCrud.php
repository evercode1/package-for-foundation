<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Crud\CrudBuilder;

class MakeCrud extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud
                           {ModelName}
                           {Slug=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create model, migration, route, controller, factory, and test';





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
    public function handle(CrudBuilder $crud)
    {

        $input ['model'] = $this->argument('ModelName');

        $input ['slug'] = $this->argument('Slug');


        if ( $crud->makeCrudFiles($input) ) {

            dd($crud->crudTokens);

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');

    }

    private function sendSuccessMessage()
    {

        $this->info('Crud Files successfully created');

    }






}
