<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\ElixirAssets\AssetsBuilder;

class MakeAssets extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:assets';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'create initial assets';


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
    public function handle(AssetsBuilder $builder)
    {

        $builder->setFileNamesAndPaths();


        if ( $builder->makeAssetFiles() ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Initial Assets successfully created');

    }





}
