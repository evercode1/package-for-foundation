<?php

namespace Evercode1\FoundationMaker\RemoveCommands;

use Evercode1\FoundationMaker\RemoveCommands\RemoveTraits\RemovesFiles;
use Evercode1\FoundationMaker\Tokens\TokenTraits\FormatsModel;
use Illuminate\Console\Command;

class RemoveCrud extends Command
{
    use FormatsModel, RemovesFiles;
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
    protected $description = 'remove crud files';


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
    public function handle()
    {

        $this->modelName = $this->formatModel($this->argument('ModelName'));

        $this->modelPath = $this->formatModelPath($this->argument('ModelName'));

        $this->setCommandType($this->argument('command'));

        $this->setCrudPaths();

        if ( $this->deleteFiles() ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Crud Files successfully removed');

    }



}

