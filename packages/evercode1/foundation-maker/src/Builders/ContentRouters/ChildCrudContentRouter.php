<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use Evercode1\FoundationMaker\Templates\CrudTemplates\CrudTemplateAssembler;

class ChildCrudContentRouter
{

    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName,  array $tokens, $fileExists=false)
    {

        switch($fileName){

            case 'apiController' :

                if ($fileExists){


                    return $this->routeTemplate($tokens, 'appendApiControllerTemplate');
                    break;

                } else {


                    return $this->routeTemplate($tokens, 'apiControllerTemplate');
                    break;

                }

            case 'controller' :


                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'childControllerSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'childControllerTemplate');
                break;

            case 'dataQuery' :

                if ( ! $fileExists) {


                    return $this->routeTemplate($tokens, 'dataQueryTemplate');
                    break;

                }

                break;

            case 'factory' :


                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'childFactorySlugTemplate');
                    break;
                }

                return $this->routeTemplate($tokens, 'childFactoryTemplate');
                break;

            case 'gridQuery' :

                if ( ! $fileExists){


                    return $this->routeTemplate($tokens, 'gridQueryTemplate');
                    break;

                } else {


                    break;

                }

            case 'migration' :

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'childMigrationSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'childMigrationTemplate');
                break;

            case 'model' :

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'childModelSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'childModelTemplate');
                break;

            case 'modelQuery':

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'modelQueryChildSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'modelQueryChildTemplate');
                break;


            case 'routes' :

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'routeSlugTemplate');
                    break;
                }

                return $this->routeTemplate($tokens, 'routeTemplate');
                break;


            case 'test' :


                return $this->routeTemplate($tokens, 'childTestTemplate');
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