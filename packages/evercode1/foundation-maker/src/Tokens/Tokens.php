<?php

namespace Evercode1\FoundationMaker\Tokens;

class Tokens
{

    public $model;
    public $masterPage;
    public $parent;
    public $child;
    public $slug;
    public $tokens = [];

    public function __construct(array $tokens)
    {
        $this->setTokens($tokens);
        $this->model = $this->formatModel($this->model);
        $this->tokens = $this->formatTokens();

    }


    public function formatTokens()
    {

        $apiControllerMethod = $this->formatApiControllerMethod();

        $chartApiRoute = 'api/' . $this->formatModelPath($this->model) . '-chart';

        $chartApiControllerMethod = $this->formatChartApiControllerMethod();

        $child = $this->child;

        $childsTableName = $this->childTableName();

        $childMigrationModel = $this->formatMigrationModel($this->child);

        $childRelation = $this->formatChildRelation($this->child);

        $controllerName = $this->model . 'Controller';

        $createdAt = $this->formatInstanceVariable() . '->created_at';

        $endGridName = '/' . $this->formatVueGridName() . '-grid';

        $field_name = 'name';

        $folderName = $this->formatFolderName();

        $gridName = $this->formatVueGridName() . '-grid';

        $masterPage = $this->masterPage;

        // need to account for compound model names
        $migrationModel = $this->formatMigrationModel($this->model);

        $model = $this->formatModel($this->model);

        $modelAttribute = $this->formatInstanceVariable() . '->' . $field_name;

        $modelId = $this->formatInstanceVariable() . '->id';

        $modelPath = $this->formatModelPath($this->model);

        $modelResults = $this->formatModelResults();

        $modelRoute = '/' . $this->formatFolderName();

        $modelsUpperCase = ucwords(str_plural($this->model));

        $parent = $this->parent;

        $parentFieldName = 'name';

        $parent_id = strtolower(snake_case($this->parent)) . '_id';

        $parentId = $this->formatParentInstanceVariable() . '->id';

        $parentInstance = $this->formatParentInstanceVariable();

        $parentInstances = $this->formatParents($this->parent);

        $parentsTableName = $this->formatParentsTableName($this->parent);

        $slug = $this->slug;

        $tableName = $this->tableName();

        $upperCaseModelName = ucfirst($this->model);

        $useModel = 'use App\\' . $upperCaseModelName;

        $useParent = 'use App\\' . $this->formatModel($this->parent);

        $vueApiRoute = 'api/' . $this->formatFolderName() . '-data';

        //create token array using compact

        $tokens = compact('apiControllerMethod',
                          'chartApiRoute',
                          'chartApiControllerMethod',
                          'child',
                          'childMigrationModel',
                          'childRelation',
                          'childsTableName',
                          'createdAt',
                          'controllerName',
                          'endGridName',
                          'field_name',
                          'folderName',
                          'gridName',
                          'masterPage',
                          'migrationModel',
                          'model',
                          'modelAttribute',
                          'modelId',
                          'modelPath',
                          'modelResults',
                          'modelRoute',
                          'modelsUpperCase',
                          'parent',
                          'parentFieldName',
                          'parentId',
                          'parent_id',
                          'parentInstance',
                          'parentInstances',
                          'parentsTableName',
                          'slug',
                          'tableName',
                          'upperCaseModelName',
                          'useModel',
                          'useParent',
                          'vueApiRoute');

        return $tokens;

    }

    private function setTokens(array $tokens)
    {
        foreach ($tokens as $propertyName => $propertyValue) {

            if (property_exists($this, $propertyName)) {

                $this->$propertyName = $propertyValue;

            }


        }
    }

    private function tableName()
    {
        $tableName = strtolower(snake_case($this->model));

        return str_plural($tableName);


    }

    private function childTableName()
    {
        $tableName = strtolower(snake_case($this->child));

        return str_plural($tableName);


    }



    private function formatInstanceVariable()
    {

        return camel_case($this->model);
    }

    private function formatModelResults()
    {

        $model = $this->formatInstanceVariable();

        return $model = str_plural($model);
    }

    private function formatParentInstanceVariable()
    {

        return camel_case($this->parent);
    }

    private function formatChartApiControllerMethod()
    {
        $modelMethod = $this->formatInstanceVariable();

        return $modelMethod . 'ChartData';

    }

    private function formatVueGridName()
    {
        $gridName = preg_split('/(?=[A-Z])/',$this->model);

        $gridName = implode('-', $gridName);

        $gridName = ltrim($gridName, '-');

        return $gridName = strtolower($gridName);

    }

    private function formatParents($parent)
    {

        $parent = strtolower($parent);

        return str_plural($parent);


    }

    private function formatModel($model)
    {
        $model = camel_case($model);
        $model = str_singular($model);
        return $model = ucwords($model);

    }

    private function formatModelPath($model)
    {
        $model = preg_split('/(?=[A-Z])/',$model);

        $model = implode('-', $model);

        $model = ltrim($model, '-');

        return $model = strtolower($model);

    }

    private function formatFolderName()
    {

        return $this->formatModelPath($this->model);

    }

    private function formatMigrationModel($model)
    {
        $model = $this->formatModel($model);

        return $model = str_plural($model);

    }

    private function formatParentsTableName($parent)
    {

        $parent = snake_case($parent);

        return str_plural($parent);



    }

    private function formatChildRelation($child)
    {

        $child = camel_case($child);

        return str_plural($child);


    }

    private function formatApiControllerMethod()
    {
        $modelMethod = $this->formatInstanceVariable();

        return $modelMethod . 'Data';

    }

}