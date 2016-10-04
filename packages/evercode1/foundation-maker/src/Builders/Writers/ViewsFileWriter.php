<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentFormatters\ViewsContentRouter;


class ViewsFileWriter
{

    public $fileWritePaths;
    public $tokens = [];
    public $content;

    public function __construct($fileWritePaths, Array $tokens)
    {

        $this->fileWritePaths = $fileWritePaths;
        $this->tokens = $tokens;
        $this->content = new ViewsContentRouter();


    }

    public function writeAllViewFiles()
    {

        $this->writeEachFile($this->fileWritePaths, $this->content);

    }

    private function writeEachFile(array $fileWritePaths, ViewsContentRouter $content)
    {

        foreach ($fileWritePaths as $fileName => $filePath) {

            switch($fileName){

                case 'index' :


                    $txt = $content->getContentFromTemplate('index', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;

                case 'create' :

                    $txt = $content->getContentFromTemplate('create', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;

                case 'edit' :


                    $txt = $content->getContentFromTemplate('edit', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;

                case 'show':

                    $txt = $content->getContentFromTemplate('show', $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);


                    break;

                case 'component':

                    if ($this->tokens['slug'] == 'slug'){

                        $txt = $content->getContentFromTemplate('component-slug', $this->tokens);


                        $handle = fopen($filePath, "w");

                        fwrite($handle, $txt);

                        fclose($handle);


                        break;

                    }

                    $txt = $content->getContentFromTemplate('component', $this->tokens);


                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);


                    break;

                case 'components':

                    $txt = $content->getContentFromTemplate('components', $this->tokens);

                    $handle = fopen($filePath, "a");

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


}