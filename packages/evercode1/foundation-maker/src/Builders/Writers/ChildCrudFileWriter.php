<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentRouters\ChildCrudContentRouter;

class ChildCrudFileWriter
{

    public $fileWritePaths;
    public $fileAppendPaths;
    public $tokens = [];
    public $content;

    public function __construct($fileWritePaths, $fileAppendPaths, Array $tokens)
    {

        $this->fileWritePaths = $fileWritePaths;
        $this->fileAppendPaths = $fileAppendPaths;
        $this->tokens = $tokens;
        $this->content = new ChildCrudContentRouter();


    }

    public function writeAllCrudFiles()
    {

        $this->writeEachFile($this->fileWritePaths, $this->content);

        $this->appendEachFile($this->fileAppendPaths, $this->content);

    }

    private function writeEachFile(array $fileWritePaths, ChildCrudContentRouter $content)
    {

        foreach ($fileWritePaths as $fileName => $filePath) {

            switch($fileName){

                case 'apiController' :

                    if(file_exists($this->fileWritePaths['apiController'])){

                        $fileExists = true;

                        $txt = $content->getContentFromTemplate('apiController', $this->tokens, $fileExists);

                        $contents = file_get_contents($this->fileWritePaths['apiController']);

                        $classParts = explode('{', $contents, 2);

                        $txt = $classParts[0]. "{\n\n" . $txt . "\n\n"  . $classParts[1];

                        $handle = fopen($filePath, "w");

                        fwrite($handle, $txt);

                        fclose($handle);

                        break;
                    }

                    $txt = $content->getContentFromTemplate('apiController', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;

                case 'dataQuery' :

                    if(file_exists($this->fileWritePaths['dataQuery'])){

                        break;
                    }

                    $queryDirectory = '/app/Queries';

                    if (! file_exists($queryDirectory)) {

                        mkdir(base_path($queryDirectory));

                    }

                    $gridQueriesDirectory = 'app/Queries/GridQueries';

                    if (! file_exists($gridQueriesDirectory)) {

                        mkdir(base_path($gridQueriesDirectory));

                    }

                    $contractsDirectory = 'app/Queries/GridQueries/Contracts';

                    if (! file_exists($contractsDirectory)) {

                        mkdir(base_path($contractsDirectory));

                    }


                    $txt = $content->getContentFromTemplate('dataQuery', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;

                case 'gridQuery' :

                    if(file_exists($this->fileWritePaths['gridQuery'])){

                        break;
                    }


                    $txt = $content->getContentFromTemplate('gridQuery', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;

                case 'modelQuery':

                    $txt = $content->getContentFromTemplate('modelQuery', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;

                case 'test':

                    $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);


                    break;

                default:

                    if ( ! is_array($fileName)) {

                        $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                        $handle = fopen($filePath, "w");

                        fwrite($handle, $txt);

                        fclose($handle);
                    }

            }



        }
    }

    private function appendEachFile(array $fileAppendPaths, ChildCrudContentRouter $content)
    {

        foreach ($fileAppendPaths as $fileName => $filePath) {

            if ( ! is_array($fileName)) {

                $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                $handle = fopen($filePath, "a");

                fwrite($handle, $txt);

                fclose($handle);
            }

        }
    }


}