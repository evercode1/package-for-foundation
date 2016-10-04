<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\MasterPageTemplates\MasterPageTemplateAssembler;

class MasterPageContentRouter
{


    public function getContentFromTemplate($masterPageName,  $appName, $fileName)
    {

        switch($fileName){

            case $masterPageName :

                return $this->routeTemplate($masterPageName, $appName, 'master');

                break;

            case 'css' :

                return $this->routeTemplate($masterPageName, $appName, 'css');

                break;

            case 'nav' :

                return $this->routeTemplate($masterPageName, $appName, 'nav');

                break;

            case 'scripts' :

                return $this->routeTemplate($masterPageName, $appName, 'scripts');

                break;

            case 'bottom' :

                return $this->routeTemplate($masterPageName, $appName, 'bottom');

                break;

            case 'meta' :

                return $this->routeTemplate($masterPageName, $appName, 'meta');

                break;


            default:

                return 'Filename not recognized';



        }

    }

    private function routeTemplate($masterPageName, $appName, $templateName)
    {


        $builder = new MasterPageTemplateAssembler($masterPageName, $appName);

        return $builder->assembleTemplate($templateName);


    }


}