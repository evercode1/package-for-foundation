<?php

namespace Evercode1\FoundationMaker\Builders\Crud;

use Evercode1\FoundationMaker\Tokens\Tokens;
use Evercode1\FoundationMaker\Builders\Writers\CrudFileWriter;

class CrudBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $crudTokens = [];


    public function makeCrudFiles($input)
    {
        $this->setConfig($input);

        $this->writeCrudFiles();

        return true;


    }

    private function writeCrudFiles()
    {

        $writer = new CrudFileWriter($this->fileWritePaths,
                                     $this->fileAppendPaths,
                                     $this->crudTokens);

        $writer->writeAllCrudFiles();


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setCrudTokens();

        $this->setFilePaths();

    }

    private function setFilePaths()
    {

        $this->fileWritePaths['model'] = base_path() . '/app/' . $this->crudTokens['upperCaseModelName'] . '.php';
        $this->fileWritePaths['controller'] = base_path() . '/app/Http/Controllers/' . $this->crudTokens['controllerName'] . '.php';
        $this->fileWritePaths['apiController'] = base_path() . '/app/Http/Controllers/ApiController.php';
        $this->fileAppendPaths['routes'] = base_path() . '/routes/web.php';
        $this->fileWritePaths['migration'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_' .$this->crudTokens['tableName'] . '_table'. '.php';
        $this->fileAppendPaths['factory'] = base_path() . '/database/factories/ModelFactory.php';
        $this->fileWritePaths['test'] = base_path() . '/tests/' .  $this->crudTokens['upperCaseModelName'] .  'Test.php';
        $this->fileWritePaths['dataQuery'] = base_path() . '/app/Queries/GridQueries/Contracts/' . 'DataQuery.php';
        $this->fileWritePaths['gridQuery'] = base_path() . '/app/Queries/GridQueries/' . 'GridQuery.php';
        $this->fileWritePaths['modelQuery'] = base_path() . '/app/Queries/GridQueries/' . $this->crudTokens['upperCaseModelName'] . 'Query.php';

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