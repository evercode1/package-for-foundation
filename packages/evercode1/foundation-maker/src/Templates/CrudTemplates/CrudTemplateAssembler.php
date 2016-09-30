<?php

namespace Evercode1\FoundationMaker\Templates\CrudTemplates;


use Evercode1\FoundationMaker\Builders\ContentFormatters\ContentTraits\ReplacesTokens;

class CrudTemplateAssembler
{
    use ReplacesTokens;

    public $tokens = [];

    public function __construct(array $tokens)
    {

        $this->tokens = $tokens;


    }

    public function assembleTemplate($template)
    {

        $file = __DIR__ . '/templates/' . $template . '.txt';

        $content = file_get_contents($file);


        return $this->insertTokensIntoContent($content, $this->tokens);


    }

}


