<?php

namespace Evercode1\FoundationMaker\Builders\ContentFormatters\ContentTraits;

trait ReplacesTokens
{


    public function insertTokensIntoContent($content, Array $tokens)
    {

        foreach ($tokens as $string => $variable) {

            $content = str_replace(':::' . $string . ':::', $variable, $content);
        }

        return $content;
    }



}