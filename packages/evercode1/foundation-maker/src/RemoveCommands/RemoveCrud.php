<?php

namespace Evercode1\FoundationMaker\RemoveCommands;

use Evercode1\FoundationMaker\Templates\Boom;
use Illuminate\Console\Command;
use Carbon\Carbon;

class RemoveCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:crud
                           {ModelName}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Crud';





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
    public function handle(Boom $pow)
    {


        dd($pow->pulse());

    }




}
