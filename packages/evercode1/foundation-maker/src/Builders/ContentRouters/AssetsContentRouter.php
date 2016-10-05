<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\AssetTemplates\AssetTemplateAssembler;

class AssetsContentRouter
{


    public function getContentFromTemplate($fileName)
    {

        switch($fileName){

            case 'appjs' :

                return $this->routeTemplate('appjsTemplate');

                break;

            case 'appscss' :

                return $this->routeTemplate('appscssTemplate');

                break;

            case 'bootstrap' :

                return $this->routeTemplate('bootstrapTemplate');

                break;

            case 'components' :

                return $this->routeTemplate('componentsTemplate');

                break;

            case 'gulpfile' :

                return $this->routeTemplate('gulpfileTemplate');

                break;

            case 'main' :

                return $this->routeTemplate('mainTemplate');

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