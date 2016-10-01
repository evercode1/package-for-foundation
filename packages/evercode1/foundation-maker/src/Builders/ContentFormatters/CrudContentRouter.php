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


                    return $this->buildTemplate($tokens, 'appendApiControllerTemplate');
                    break;

                } else {


                    return $this->buildTemplate($tokens, 'apiControllerTemplate');
                    break;

                }

            case 'controller' :

                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->buildTemplate($tokens, 'childControllerSlugTemplate');
                        break;
                    }

                    return $this->buildTemplate($tokens, 'childControllerTemplate');
                    break;


                }

                if ($this->hasSlug($tokens)){

                    return $this->buildTemplate($tokens, 'controllerSlugTemplate');
                    break;

                }

                return $this->buildTemplate($tokens, 'controllerTemplate');
                break;

            case 'dataQuery' :

                if ( ! $fileExists) {


                    return $this->buildTemplate($tokens, 'dataQueryTemplate');
                    break;

                }


                    break;



            case 'factory' :

                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->buildTemplate($tokens, 'childFactorySlugTemplate');
                        break;
                    }

                    return $this->buildTemplate($tokens, 'childFactoryTemplate');
                    break;
                }


                if ($this->hasSlug($tokens)){

                    return $this->buildTemplate($tokens, 'factorySlugTemplate');
                    break;
                }

                return $this->buildTemplate($tokens, 'factoryTemplate');
                break;

            case 'gridQuery' :

                if ( ! $fileExists){


                    return $this->buildTemplate($tokens, 'gridQueryTemplate');
                    break;

                } else {


                    break;

                }

            case 'migration' :

                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->buildTemplate($tokens, 'childMigrationSlugTemplate');
                        break;
                    }

                    return $this->buildTemplate($tokens, 'childMigrationTemplate');
                    break;


                }

                if ($this->hasSlug($tokens)){

                    return $this->buildTemplate($tokens, 'migrationSlugTemplate');
                    break;

                }

                return $this->buildTemplate($tokens, 'migrationTemplate');
                break;

            case 'model' :

                if ($this->hasParent($tokens) &&  $this->isParent($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->buildTemplate($tokens, 'parentModelSlugTemplate');
                        break;
                    }

                    return $this->buildTemplate($tokens, 'parentModelTemplate');
                    break;

                } else {

                    if ($this->isChild($tokens)) {

                        if ($this->hasSlug($tokens)){

                            return $this->buildTemplate($tokens, 'childModelSlugTemplate');
                            break;


                        }

                        return $this->buildTemplate($tokens, 'childModelTemplate');
                        break;
                    }

                }

                if ($this->hasSlug($tokens)){

                    return $this->buildTemplate($tokens, 'modelSlugTemplate');
                    break;

                }

                return $this->buildTemplate($tokens, 'modelTemplate');
                break;

            case 'modelQuery':


                if ($this->hasChild($tokens) && $this->isChild($tokens)){

                    if ($this->hasSlug($tokens)){

                        return $this->buildTemplate($tokens, 'modelQueryChildSlugTemplate');
                        break;


                    }

                        return $this->buildTemplate($tokens, 'modelQueryChildTemplate');
                        break;


                }

                if ($this->hasSlug($tokens)){

                    return $this->buildTemplate($tokens, 'modelQuerySlugTemplate');
                    break;

                }

                    return $this->buildTemplate($tokens, 'modelQueryTemplate');
                    break;


            case 'routes' :

                if ($this->hasSlug($tokens)){

                    return $this->buildTemplate($tokens, 'routeSlugTemplate');
                    break;
                }

                return $this->buildTemplate($tokens, 'routeTemplate');
                break;


            case 'test' :

                if ($this->hasChild($tokens)  && $this->isChild($tokens)){


                    return $this->buildTemplate($tokens, 'childTestTemplate');
                    break;


                }


                return $this->buildTemplate($tokens, 'testTemplate');
                break;


            default :

                return 'Something went wrong';



        }

    }

    private function buildTemplate($tokens, $templateName)
    {


        $crudTemplate = new CrudTemplateAssembler($tokens);

        return $crudTemplate->assembleTemplate($templateName);


    }


}