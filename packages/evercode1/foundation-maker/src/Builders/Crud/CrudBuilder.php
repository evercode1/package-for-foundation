<?php

namespace Evercode1\FoundationMaker\Builders\Crud;
use Evercode1\FoundationMaker\Tokens\Tokens;

class CrudBuilder
{

    public $initValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $crudTokens = [];


    public function makeCrudFiles($input)
    {
        $this->setInput($input);

        $this->setCrudTokens();

        $this->setFilePaths();

        return $this->crudTokens;

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

    }

    private function setCrudTokens()
    {

        $tokenBuilder = new Tokens($this->initValues);

        $this->crudTokens = $tokenBuilder->tokens;

    }

    /**
     * @param $input
     */
    private function setInput($input)
    {
        $this->initValues['model'] = $input['model'];

        $this->initValues['slug'] = $input['slug'];

        $this->initValues['parent'] = isset($input['parent']) ? $input['parent'] : false;

        $this->initValues['child'] = isset($input['child']) ? $input['child'] : false;
    }


}