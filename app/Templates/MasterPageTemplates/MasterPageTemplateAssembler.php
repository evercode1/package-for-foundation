<?php

namespace Evercode1\FoundationMaker\Templates\MasterPageTemplates;

use Evercode1\FoundationMaker\Builders\ContentFormatters\ContentTraits\ReplacesTokens;

class MasterPageTemplateAssembler
{
    use ReplacesTokens;

    public $masterPageName;
    public $appName;
    public $tokens = [];
    public $model;
    public $modelPath;

    public function __construct($masterPageName, $appName)
    {

        $this->masterPageName = $masterPageName;
        $this->appName = $appName;
        $this->setTokens();


    }

    private function setTokens()
    {

        $this->tokens['masterPageName'] = $this->masterPageName;
        $this->tokens['appName'] = $this->appName;


    }

    public function assembleTemplate($template)
    {

        if (file_exists(base_path(). '/app/Templates')){

            $this->addCustomTokens();

            $file = base_path(). '/app/Templates/MasterPageTemplates/templates/' . $template . '.txt';

            $content = file_get_contents($file);


            return $this->insertTokensIntoContent($content, $this->tokens);


        }


        $file = __DIR__ . '/templates/' . $template . '.txt';

        $content = file_get_contents($file);


        return $this->insertTokensIntoContent($content, $this->tokens);


    }

    private function addCustomTokens()
    {

        $addTokens = new \App\Templates\CustomTokens($this->model, $this->modelPath);

        $this->tokens = $this->mergeUniqueTokens($this->tokens, $addTokens->customTokens);


    }

}


