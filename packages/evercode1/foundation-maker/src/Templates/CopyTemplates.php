<?php

namespace Evercode1\FoundationMaker\Templates;

class CopyTemplates
{

    public function copyTemplates()
    {

        $dst = base_path() . '/app/Templates';

        if ( ! file_exists($dst)) {

            mkdir($dst);

        }


        $src = dirname(__FILE__);

        $this->recurse_copy($src, $dst);

        $unwantedFiles [] = base_path() . '/app/Templates/CopyTemplates.php';
        $unwantedFiles [] = base_path() . '/app/Templates/CrudTemplates/CrudTemplateAssembler.php';

        foreach ($unwantedFiles as $file){

            unlink($file);

        }

        return true;

    }

    private function recurse_copy($src,$dst) {

        $dir = opendir($src);

        @mkdir($dst);

        while(false !== ( $file = readdir($dir)) ) {

            if (( $file != '.' ) && ( $file != '..' )) {

                if ( is_dir($src . '/' . $file) ) {

                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);

                } else {

                    copy($src . '/' . $file,$dst . '/' . $file);

                }
            }
        }

        closedir($dir);



    }





}
