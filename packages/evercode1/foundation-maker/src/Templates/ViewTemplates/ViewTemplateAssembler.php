<?php

namespace Evercode1\FoundationMaker\Templates\ViewTemplates;

use Evercode1\FoundationMaker\Builders\ContentRouters\ContentTraits\ReplacesTokens;

class ViewTemplateAssembler
{
    use ReplacesTokens;

    public $tokens = [];
    public $model;
    public $modelPath;

    public function __construct($tokens)
    {

        $this->setTokens($tokens);
        $this->model = $tokens['model'];
        $this->modelPath = $tokens['modelPath'];


    }

    private function setTokens($tokens)
    {

        $this->tokens = $tokens;


    }

    public function assembleTemplate($template)
    {

        if (file_exists(base_path(). '/app/Templates')){

            $this->addCustomTokens();

            $file = base_path(). '/app/Templates/ViewTemplates/templates/' . $template . '.txt';

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

        $this->tokens = $this->mergeTokens($this->tokens, $addTokens->customTokens);


    }

}


