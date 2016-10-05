<?php

namespace Evercode1\FoundationMaker\RemoveCommands;

use Evercode1\FoundationMaker\RemoveCommands\RemoveTraits\RemovesFiles;
use Evercode1\FoundationMaker\Tokens\TokenTraits\FormatsModel;
use Illuminate\Console\Command;

class RemoveParentAndChild extends Command
{
    use FormatsModel, RemovesFiles;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:parent-child
                           {ParentName}
                           {ChildName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove parent and child foundation files';

    public $folderName;


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

        $this->modelName = $this->formatModel($this->argument('ParentName'));

        $this->modelPath = $this->formatModelPath($this->argument('ParentName'));

        $this->setCommandType($this->argument('command'));

        $this->setCrudPaths();

        if ( $this->deleteFiles() ) {

            $this->sendParentSuccessMessage();


        } else {

            $this->error('Oops, something went wrong!');

        }

        $this->clearFilePaths();

        $this->folderName = $this->formatModelPath($this->argument('ParentName'));

        $this->modelName = $this->formatModel($this->argument('ParentName'));

        $this->setCommandType($this->argument('command'));

        $this->setViewPaths();


        $path = base_path('resources/views/'. $this->folderName);

        if ( $this->removeViewFolder($path) && $this->deleteFiles() ) {

            $this->sendParentViewsSuccessMessage();

        } else {

            $this->error('No Such Directory');


        }

        $this->clearFilePaths();

        $this->modelName = $this->formatModel($this->argument('ChildName'));

        $this->modelPath = $this->formatModelPath($this->argument('ChildName'));

        $this->setCommandType($this->argument('command'));

        $this->setCrudPaths();

        if ( $this->deleteFiles() ) {

            $this->sendChildSuccessMessage();


        } else {

            $this->error('Oops, something went wrong!');

        }

        $this->clearFilePaths();


        $this->folderName = $this->formatModelPath($this->argument('ChildName'));

        $this->modelName = $this->formatModel($this->argument('ChildName'));

        $this->setCommandType($this->argument('command'));

        $this->setViewPaths();

        $path = base_path('resources/views/'. $this->folderName);

        if ( $this->removeViewFolder($path) && $this->deleteFiles() ) {

            return $this->sendChildViewsSuccessMessage();

        }

            $this->error('No Such Directory');


    }

    private function sendParentSuccessMessage()
    {

        $this->info('Parent Crud Files successfully removed');

    }

    private function sendParentViewsSuccessMessage()
    {

        $this->info('Parent View Files successfully removed');

    }

    private function sendChildSuccessMessage()
    {

        $this->info('Child Crud Files successfully removed');

    }

    private function sendChildViewsSuccessMessage()
    {

        $this->info('Child View Files successfully removed');

    }



}

