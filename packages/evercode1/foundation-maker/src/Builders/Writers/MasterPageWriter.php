<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentFormatters\MasterPageContentRouter;

class MasterPageWriter
{

    public $builder;

    public function __construct()
    {

        $this->builder = new MasterPageContentRouter();

    }


    Public function writeEachMasterFile($masterPageName, $appName, array $files)
    {


        foreach ($files as $fileName => $filePath) {

            $txt = $this->builder->getContentFromTemplate($masterPageName, $appName, $fileName);

            $handle = fopen($filePath, "w");

            fwrite($handle, $txt);

            fclose($handle);


        }
    }





}