<?php

namespace Evercode1\FoundationMaker\Templates;

class CopyTemplates
{
    public function copyTemplates()
    {
        $dst = base_path() . '/app/Templates';

        if (file_exists($dst)) {

            return false;

        }

        mkdir($dst);

        $src = dirname(__FILE__);

        $this->recursive_copy($src, $dst);

        $this->cleanUp();

        return true;

    }

    private function recursive_copy($src,$dst) {

        $dir = opendir($src);

        @mkdir($dst);

        while(false !== ( $file = readdir($dir)) ) {

            if (( $file != '.' ) && ( $file != '..' )) {

                if ( is_dir($src . '/' . $file) ) {

                    $this->recursive_copy($src . '/' . $file, $dst . '/' . $file);

                } else {

                    copy($src . '/' . $file,$dst . '/' . $file);

                }

            }

        }

        closedir($dir);
    }

    /**
     * @param $unwantedFiles
     */

    private function cleanUp()
    {
        $unwantedFiles [] = base_path() . '/app/Templates/CopyTemplates.php';
        $unwantedFiles [] = base_path() . '/app/Templates/CrudTemplates/CrudTemplateAssembler.php';
        $unwantedFiles [] = base_path() . '/app/Templates/MasterPageTemplates/MasterPageTemplateAssembler.php';
        $unwantedFiles [] = base_path() . '/app/Templates/ViewTemplates/ViewTemplateAssembler.php';

        foreach ($unwantedFiles as $file) {

            unlink($file);

        }

        $oldFile = base_path() . '/app/Templates/CustomTokens.txt';
        $newFile = base_path() . '/app/Templates/CustomTokens.php';

        rename($oldFile, $newFile);

    }
}