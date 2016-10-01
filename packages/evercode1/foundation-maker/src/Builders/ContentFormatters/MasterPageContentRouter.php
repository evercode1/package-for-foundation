<?php

namespace Evercode1\FoundationMaker\Builders\ContentFormatters;

use Evercode1\FoundationMaker\Templates\MasterPageTemplates\MasterPageTemplateAssembler;

class MasterPageContentRouter
{


    public function getContentFromTemplate($masterPageName,  $appName, $fileName)
    {

        switch($fileName){

            case $masterPageName :

                return $this->buildTemplate($masterPageName, $appName, 'master');

                break;

            case 'css' :

                return $this->buildTemplate($masterPageName, $appName, 'css');

                break;

            case 'nav' :

                return $this->buildTemplate($masterPageName, $appName, 'nav');

                break;

            case 'scripts' :

                return $this->buildTemplate($masterPageName, $appName, 'scripts');

                break;

            case 'bottom' :

                return $this->buildTemplate($masterPageName, $appName, 'bottom');

                break;

            case 'meta' :

                return $this->buildTemplate($masterPageName, $appName, 'meta');

                break;


            default:

                return 'Filename not recognized';



        }

    }

    private function buildTemplate($masterPageName, $appName, $templateName)
    {


        $builder = new MasterPageTemplateAssembler($masterPageName, $appName);

        return $builder->assembleTemplate($templateName);


    }


}