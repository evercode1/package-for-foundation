<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\MasterPageTemplates\MasterPageTemplateAssembler;

class MasterPageContentRouter
{


    public function getContentFromTemplate($masterPageName,  $appName, $fileName)
    {

        switch($fileName){

            case $masterPageName :

                return $this->routeTemplate($masterPageName, $appName, 'masterTemplate');

                break;

            case 'css' :

                return $this->routeTemplate($masterPageName, $appName, 'cssTemplate');

                break;

            case 'nav' :

                return $this->routeTemplate($masterPageName, $appName, 'navTemplate');

                break;

            case 'scripts' :

                return $this->routeTemplate($masterPageName, $appName, 'scriptsTemplate');

                break;

            case 'bottom' :

                return $this->routeTemplate($masterPageName, $appName, 'bottomTemplate');

                break;

            case 'meta' :

                return $this->routeTemplate($masterPageName, $appName, 'metaTemplate');

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