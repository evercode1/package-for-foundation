<?php

namespace Evercode1\FoundationMaker\Templates\AssetTemplates;


class AssetTemplateAssembler
{



    public function assembleTemplate($template)
    {

        if (file_exists(base_path(). '/app/Templates')){


            $file = base_path(). '/app/Templates/AssetTemplates/templates/' . $template . '.txt';

            $content = file_get_contents($file);


            return $content;


        }


        $file = __DIR__ . '/templates/' . $template . '.txt';

        $content = file_get_contents($file);


        return $content;


    }



}


