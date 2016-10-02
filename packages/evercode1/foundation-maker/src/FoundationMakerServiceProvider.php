<?php

namespace Evercode1\FoundationMaker;

use Illuminate\Support\ServiceProvider;

class FoundationMakerServiceProvider extends ServiceProvider
{

    protected $commands = [

        'Evercode1\FoundationMaker\Commands\MakeCrud',
        'Evercode1\FoundationMaker\Commands\MakeMasterPage',
        'Evercode1\FoundationMaker\Commands\MakeTemplates',
        'Evercode1\FoundationMaker\Commands\MakeViews',
        'Evercode1\FoundationMaker\RemoveCommands\RemoveCrud',
        'Evercode1\FoundationMaker\RemoveCommands\RemoveMasterPage',
        'Evercode1\FoundationMaker\RemoveCommands\RemoveTemplates',
        'Evercode1\FoundationMaker\RemoveCommands\RemoveViews'

    ];
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}