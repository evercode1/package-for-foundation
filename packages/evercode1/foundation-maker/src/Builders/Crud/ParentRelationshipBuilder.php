<?php

namespace Evercode1\FoundationMaker\Builders\Crud;

use Evercode1\FoundationMaker\Tokens\Tokens;
use Evercode1\FoundationMaker\Builders\Writers\ParentRelationshipWriter;

class ParentRelationshipBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $tokens = [];


    public function makeParentRelation($input)
    {
        $this->setConfig($input);

        $this->writeModelFile();

        return true;


    }

    private function writeModelFile()
    {

        $writer = new ParentRelationshipWriter($this->fileWritePaths, $this->tokens);

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

        $this->fileWritePaths['parentModel'] = base_path() . '/app/' . $this->tokens['upperCaseModelName'] . '.php';


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
        $this->initialValues['model'] = $input['ParentName'];

        $this->initialValues['slug'] = strtolower($input['Slug']);

        $this->initialValues['parent'] = $input['ParentName'];

        $this->initialValues['child'] = $input['ChildName'];
    }


}