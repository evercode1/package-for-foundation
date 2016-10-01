<?php

namespace Evercode1\FoundationMaker\RemoveCommands;

use Evercode1\FoundationMaker\RemoveCommands\RemoveTraits\RemovesFiles;
use Illuminate\Console\Command;

class RemoveMasterPage extends Command
{
    use RemovesFiles;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:master';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove layouts folder and master page files from app';


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

        $path = base_path('/resources/views/layouts');

        if ( $this->deleteDirectoryAndFiles($path) ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('layouts folder and master page files successfully removed');

    }



}

