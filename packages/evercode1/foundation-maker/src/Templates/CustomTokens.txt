<?php

namespace App\Templates;

class CustomTokens
{

/*
    |--------------------------------------------------------------------------
    | Custom Tokens
    |--------------------------------------------------------------------------
    |
    | Use this class to create and inject your tokens into the templates.
    | Tokens you define here will overwrite tokens with the same name.
    | You can create methods to format the token, see samples below.
    | Embed the $token in the template using syntax:  :::token:::
    | The token will be replaced by the value you define here.
    | The $model and $modelPath are provided for you.
    |
    */

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


        $sampleToken = $this->sampleFormatMethod();
        $getCreative = 'you can put anything you want here';
        $myToken = 'create custom formatting methods in the class, using ' . $this->model;
        $copyright = $this->copyright();

        return $customTokens = compact('sampleToken',
                                       'getCreative',
                                       'myToken',
                                       'copyright');


    }

    private function sampleFormatMethod()
    {

        return $this->model . 'anything-you-want';


    }

    private function copyright()
    {

        return '&copy; 2015 - ' . date('Y');


    }


}