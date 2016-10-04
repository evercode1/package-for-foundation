<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\AssetTemplates\AssetTemplateAssembler;

class AssetsContentRouter
{


    public function getContentFromTemplate($fileName)
    {

        switch($fileName){

            case 'appjs' :

                return $this->routeTemplate('appjs');

                break;

            case 'appscss' :

                return $this->routeTemplate('appscss');

                break;

            case 'bootstrap' :

                return $this->routeTemplate('bootstrap');

                break;

            case 'components' :

                return $this->routeTemplate('components');

                break;

            case 'gulpfile' :

                return $this->routeTemplate('gulpfile');

                break;

            case 'main' :

                return $this->routeTemplate('main');

                break;


            default:

                return 'Filename not recognized';



        }

    }

    private function routeTemplate($templateName)
    {


        $builder = new AssetTemplateAssembler();

        return $builder->assembleTemplate($templateName);


    }


}