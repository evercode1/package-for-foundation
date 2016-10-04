<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use Evercode1\FoundationMaker\Templates\ViewTemplates\ViewTemplateAssembler;

class ParentViewsContentRouter
{
    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName, $tokens)
    {

        switch($fileName){

            case 'index' :

                return $this->routeTemplate($tokens, 'index');

                break;

            case 'create' :

                return $this->routeTemplate($tokens, 'create');

                break;

            case 'edit' :

                return $this->routeTemplate($tokens, 'edit');

                break;

            case 'show' :

                return $this->routeTemplate($tokens, 'show');

                break;

            case 'component' :

                if ( $this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'component-slug');

                    break;

                }

                return $this->routeTemplate($tokens, 'component');

                break;


            case 'components' :

                return $this->routeTemplate($tokens, 'components');

                break;


            default:

                return 'Filename not recognized';



        }

    }

    private function routeTemplate($tokens, $templateName)
    {


        $builder = new ViewTemplateAssembler($tokens);

        return $builder->assembleTemplate($templateName);


    }


}