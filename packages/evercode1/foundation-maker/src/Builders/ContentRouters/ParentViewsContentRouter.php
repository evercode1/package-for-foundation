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

                return $this->routeTemplate($tokens, 'indexTemplate');

                break;

            case 'create' :

                return $this->routeTemplate($tokens, 'createTemplate');

                break;

            case 'edit' :

                return $this->routeTemplate($tokens, 'editTemplate');

                break;

            case 'show' :

                return $this->routeTemplate($tokens, 'showTemplate');

                break;

            case 'component' :

                if ( $this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'componentSlugTemplate');

                    break;

                }

                return $this->routeTemplate($tokens, 'componentTemplate');

                break;


            case 'components' :

                return $this->routeTemplate($tokens, 'componentsTemplate');

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