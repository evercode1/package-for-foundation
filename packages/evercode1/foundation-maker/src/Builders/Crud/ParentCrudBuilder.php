<?php

namespace Evercode1\FoundationMaker\Builders\Crud;

use Evercode1\FoundationMaker\Tokens\Tokens;
use Evercode1\FoundationMaker\Builders\Writers\ParentCrudFileWriter;

class ParentCrudBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $tokens = [];


    public function makeCrudFiles($input)
    {
        $this->setConfig($input);

        $this->writeCrudFiles();

        return true;


    }

    private function writeCrudFiles()
    {

        $writer = new ParentCrudFileWriter($this->fileWritePaths,
                                           $this->fileAppendPaths,
                                           $this->tokens);

        $writer->writeAllCrudFiles();


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setTokens();

        $this->setFilePaths();

    }

    private function setFilePaths()
    {

        $this->fileWritePaths['model'] = base_path() . '/app/' . $this->tokens['upperCaseModelName'] . '.php';
        $this->fileWritePaths['controller'] = base_path() . '/app/Http/Controllers/' . $this->tokens['controllerName'] . '.php';
        $this->fileWritePaths['apiController'] = base_path() . '/app/Http/Controllers/ApiController.php';
        $this->fileAppendPaths['routes'] = base_path() . '/routes/web.php';
        $this->fileWritePaths['migration'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_' .$this->tokens['tableName'] . '_table'. '.php';
        $this->fileAppendPaths['factory'] = base_path() . '/database/factories/ModelFactory.php';
        $this->fileWritePaths['test'] = base_path() . '/tests/' .  $this->tokens['upperCaseModelName'] .  'Test.php';
        $this->fileWritePaths['dataQuery'] = base_path() . '/app/Queries/GridQueries/Contracts/' . 'DataQuery.php';
        $this->fileWritePaths['gridQuery'] = base_path() . '/app/Queries/GridQueries/' . 'GridQuery.php';
        $this->fileWritePaths['modelQuery'] = base_path() . '/app/Queries/GridQueries/' . $this->tokens['upperCaseModelName'] . 'Query.php';

    }

    private function setTokens()
    {

        $tokenBuilder = new Tokens($this->initialValues);

        $this->tokens = $tokenBuilder->tokens;

    }

    /**
     * @param $input
     */

    private function setInput($input)
    {
        $this->initialValues['model'] = $input['ModelName'];

        $this->initialValues['slug'] = strtolower($input['Slug']);

        $this->initialValues['parent'] = $input['ParentName'];

        $this->initialValues['child'] = $input['ChildName'];
    }


}