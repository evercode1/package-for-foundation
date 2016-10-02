<?php

namespace Evercode1\FoundationMaker\RemoveCommands;

use Evercode1\FoundationMaker\Tokens\TokenTraits\FormatsModel;
use Illuminate\Console\Command;
use Evercode1\FoundationMaker\RemoveCommands\RemoveTraits\RemovesFiles;

class RemoveViews extends Command
{
    use FormatsModel, RemovesFiles;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'remove:views
                           {ModelName}';


    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'remove view files';

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

        $this->folderName = $this->formatModelPath($this->argument('ModelName'));


        $path = base_path('resources/views/'. $this->folderName);

        if ( $this->removeViewFiles($path) ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('No Such Directory');


    }

    private function sendSuccessMessage()
    {

        $this->info('Folder and View Files for ' . $this->folderName . ' successfully removed.');

    }


    private function removeViewFiles($path)
    {

        return $this->deleteDirectoryAndFiles($path);


    }


}
