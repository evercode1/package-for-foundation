<?php

namespace Evercode1\FoundationMaker\Builders\Views;

use Evercode1\FoundationMaker\Builders\Writers\ViewsFileWriter;
use Evercode1\FoundationMaker\Tokens\Tokens;

class ViewBuilder
{

    public $model;

    public $modelPath;

    public $masterPageName;

    public $slug;

    public $indexOnly;

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $crudTokens = [];

    public function makeViewDirectory()
    {

        if (file_exists(base_path('/resources/views/' . $this->modelPath))) {

            return false;

        }

        mkdir('/resources/views/' . $this->modelPath);


        return true;




    }


    public function makeViewFiles($input)
    {
        $this->setConfig($input);

        if ( ! $this->makeViewDirectory() ){

            return false;

        }

        if ( ! $this->writeViewFiles() ){

            return false;

        }



        return true;


    }

    private function writeViewFiles()
    {

        $writer = new ViewsFileWriter($this->fileWritePaths,
            $this->fileAppendPaths,
            $this->crudTokens);

        $writer->writeAllViewsFiles();

        return true;


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setCrudTokens();

        $this->setFilePaths();

    }

    private function setFilePaths()
    {

        $this->fileWritePaths['index'] = base_path() . '/resources/views/' . $this->crudTokens['upperCaseModelName'] . '.php';
        $this->fileWritePaths['create'] = base_path() . '/app/Http/Controllers/' . $this->crudTokens['controllerName'] . '.php';
        $this->fileWritePaths['edit'] = base_path() . '/app/Http/Controllers/ApiController.php';
        $this->fileWritePaths['show'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_' .$this->crudTokens['tableName'] . '_table'. '.php';
        $this->fileAppendPaths['factory'] = base_path() . '/database/factories/ModelFactory.php';


    }

    private function setCrudTokens()
    {

        $tokenBuilder = new Tokens($this->initialValues);

        $this->crudTokens = $tokenBuilder->tokens;

    }

    /**
     * @param $input
     */

    private function setInput($input)
    {
        $this->initialValues['model'] = $input['model'];

        $this->initialValues['slug'] = $input['slug'];

        $this->initialValues['parent'] = isset($input['parent']) ? $input['parent'] : false;

        $this->initialValues['child'] = isset($input['child']) ? $input['child'] : false;
    }








}