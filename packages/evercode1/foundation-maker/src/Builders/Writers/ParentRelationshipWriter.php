<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentRouters\ParentRelationshipContentRouter;

class ParentRelationshipWriter
{

    public $fileWritePaths;
    public $tokens = [];
    public $content;

    public function __construct($fileWritePaths, Array $tokens)
    {

        $this->fileWritePaths = $fileWritePaths;
        $this->tokens = $tokens;
        $this->content = new ParentRelationshipContentRouter();


    }

    public function writeAllCrudFiles()
    {

        $this->writeEachFile($this->fileWritePaths, $this->content);



    }

    private function writeEachFile(array $fileWritePaths, ParentRelationshipContentRouter $content)
    {

        foreach ($fileWritePaths as $fileName => $filePath) {

            switch($fileName){

                case 'parentModel' :


                        $txt = $content->getContentFromTemplate('parentModel', $this->tokens);

                        $contents = file_get_contents($this->fileWritePaths['parentModel']);

                        $classParts = explode(';', $contents, 4);

                        $txt = $classParts[0]. ';' . $classParts[1]. ";" . $classParts[2] . ";\n\n" . $txt . $classParts[3];

                        $handle = fopen($filePath, "w");

                        fwrite($handle, $txt);

                        fclose($handle);

                        break;




                default:

                    return false;

            }



        }
    }




}