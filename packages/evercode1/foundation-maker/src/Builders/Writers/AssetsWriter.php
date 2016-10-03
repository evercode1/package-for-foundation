<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentFormatters\AssetsContentRouter;

class AssetsWriter
{

    public $builder;

    public function __construct()
    {

        $this->builder = new AssetsContentRouter();

    }


    Public function writeEachAssetFile(array $files)
    {


        foreach ($files as $fileName => $filePath) {

            $txt = $this->builder->getContentFromTemplate($fileName);

            $handle = fopen($filePath, "w");

            fwrite($handle, $txt);

            fclose($handle);


        }
    }





}