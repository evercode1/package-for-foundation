<?php

namespace Evercode1\FoundationMaker\Tokens\TokenTraits;

trait FormatsModel
{


    private function formatModel($model)
    {
        $model = camel_case($model);
        $model = str_singular($model);
        return $model = ucwords($model);

    }

    private function formatModelPath($model)
    {
        $model = preg_split('/(?=[A-Z])/',$model);

        $model = implode('-', $model);

        $model = ltrim($model, '-');

        return $model = strtolower($model);

    }


}