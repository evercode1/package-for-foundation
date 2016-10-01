<?php

namespace App\Templates;

class CustomTokens
{

    public $customTokens = [];
    public $model;
    public $modelPath;


    public function __construct($model, $modelPath)
    {

        $this->model = $model;
        $this->modelPath = $modelPath;

        $this->customTokens = $this->addCustomTokens($model, $modelPath);


    }

    private function addCustomTokens($model, $modelPath)
    {

        // define your custom tokens and use the following syntax
        // in the actual templates:  :::sampleToken:::
        // the token will be replaced with the values you define here.

        $sampleToken = $this->model . ' any-formatting';
        $getCreative = 'you can put anything you want here';
        $myToken = 'create custom formatting methods in the class, using ' . $this->model;


        // we will merge custom tokens into the existing tokens
        // after returning.

        return $customTokens = compact('sampleToken',
                                       'getCreative',
                                       'myToken');


    }


}