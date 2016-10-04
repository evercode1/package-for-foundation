<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters\ContentTraits;

trait ReplacesTokens
{


    public function insertTokensIntoContent($content, Array $tokens)
    {

        foreach ($tokens as $string => $variable) {

            $content = str_replace(':::' . $string . ':::', $variable, $content);
        }

        return $content;
    }

    public function mergeUniqueTokens($tokens, $customTokens)
    {


        return $tokens = array_unique (array_merge ($tokens, $customTokens));


    }



}