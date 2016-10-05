<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use Evercode1\FoundationMaker\Templates\CrudTemplates\CrudTemplateAssembler;

class ParentRelationshipContentRouter
{

    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName,  array $tokens)
    {

        switch($fileName){

            case 'parentModel' :


                    return $this->routeTemplate($tokens, 'ParentRelationshipTemplate');
                    break;


            default :

                return 'Something went wrong';


        }

    }

    private function routeTemplate($tokens, $templateName)
    {

        $crudTemplate = new CrudTemplateAssembler($tokens);

        return $crudTemplate->assembleTemplate($templateName);

    }


}