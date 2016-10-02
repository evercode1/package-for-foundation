<?php

namespace Evercode1\FoundationMaker\Builders\ContentFormatters;

use Evercode1\FoundationMaker\Templates\ViewTemplates\ViewTemplateAssembler;

class ViewsContentRouter
{


    public function getContentFromTemplate($fileName, $tokens)
    {

        switch($fileName){

            case 'index' :

                return $this->buildTemplate($tokens, 'index');

                break;

            case 'create' :

                return $this->buildTemplate($tokens, 'create');

                break;

            case 'edit' :

                return $this->buildTemplate($tokens, 'edit');

                break;

            case 'show' :

                return $this->buildTemplate($tokens, 'show');

                break;

            case 'component' :

                return $this->buildTemplate($tokens, 'component');

                break;

            case 'appJs' :

                return $this->buildTemplate($tokens, 'appJs');

                break;




            default:

                return 'Filename not recognized';



        }

    }

    private function buildTemplate($tokens, $templateName)
    {


        $builder = new ViewTemplateAssembler($tokens);

        return $builder->assembleTemplate($templateName);


    }


}