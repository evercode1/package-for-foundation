<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

class CopyTemplates
{

    public function copyTemplates()
    {

        if (file_exists(base_path() . '/app/Templates')){

            return false;

        }

        $dst = base_path() . '/app/Templates';

        mkdir($dst);

        $src = '../../../Templates';


        $files = glob("../../../Templates/*.*");
        foreach($files as $file){
            $file_to_go = str_replace($src,$dst,$file);
            copy($file, $file_to_go);
        }

        return true;

        }




}
