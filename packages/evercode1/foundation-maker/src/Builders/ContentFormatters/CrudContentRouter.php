<?php

namespace Evercode1\FoundationMaker\Builders\ContentFormatters;

use Evercode1\FoundationMaker\Builders\ContentFormatters\ContentTraits\HasParentAndChildAndSlug;
use Evercode1\FoundationMaker\Templates\CrudTemplates\CrudTemplateAssembler;

class CrudContentRouter
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

                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->routeTemplate($tokens, 'childControllerSlugTemplate');
                        break;
                    }

                    return $this->routeTemplate($tokens, 'childControllerTemplate');
                    break;


                }

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'controllerSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'controllerTemplate');
                break;

            case 'dataQuery' :

                if ( ! $fileExists) {


                    return $this->routeTemplate($tokens, 'dataQueryTemplate');
                    break;

                }


                    break;



            case 'factory' :

                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->routeTemplate($tokens, 'childFactorySlugTemplate');
                        break;
                    }

                    return $this->routeTemplate($tokens, 'childFactoryTemplate');
                    break;
                }


                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'factorySlugTemplate');
                    break;
                }

                return $this->routeTemplate($tokens, 'factoryTemplate');
                break;

            case 'gridQuery' :

                if ( ! $fileExists){


                    return $this->routeTemplate($tokens, 'gridQueryTemplate');
                    break;

                } else {


                    break;

                }

            case 'migration' :

                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->routeTemplate($tokens, 'childMigrationSlugTemplate');
                        break;
                    }

                    return $this->routeTemplate($tokens, 'childMigrationTemplate');
                    break;


                }

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'migrationSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'migrationTemplate');
                break;

            case 'model' :

                if ($this->hasParent($tokens) &&  $this->isParent($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->routeTemplate($tokens, 'parentModelSlugTemplate');
                        break;
                    }

                    return $this->routeTemplate($tokens, 'parentModelTemplate');
                    break;

                } else {

                    if ($this->isChild($tokens)) {

                        if ($this->hasSlug($tokens)){

                            return $this->routeTemplate($tokens, 'childModelSlugTemplate');
                            break;


                        }

                        return $this->routeTemplate($tokens, 'childModelTemplate');
                        break;
                    }

                }

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'modelSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'modelTemplate');
                break;

            case 'modelQuery':


                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->routeTemplate($tokens, 'modelQueryChildSlugTemplate');
                        break;


                    }

                        return $this->routeTemplate($tokens, 'modelQueryChildTemplate');
                        break;


                }

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'modelQuerySlugTemplate');
                    break;

                }

                    return $this->routeTemplate($tokens, 'modelQueryTemplate');
                    break;


            case 'routes' :

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'routeSlugTemplate');
                    break;
                }

                return $this->routeTemplate($tokens, 'routeTemplate');
                break;


            case 'test' :

                if ($this->hasChild($tokens)  && $this->isChild($tokens)){


                    return $this->routeTemplate($tokens, 'childTestTemplate');
                    break;


                }


                return $this->routeTemplate($tokens, 'testTemplate');
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