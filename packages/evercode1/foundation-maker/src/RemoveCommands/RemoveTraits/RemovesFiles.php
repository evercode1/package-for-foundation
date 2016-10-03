<?php

namespace Evercode1\FoundationMaker\RemoveCommands\RemoveTraits;


trait RemovesFiles
{

    private $commandType;

    private $unlinkFiles = [];

    private $extractFromFiles = [];

    private $modelName;

    private $modelPath;

    private $parentName;

    private $childName;

    public function deleteDirectoryAndFiles($path)
    {
        if (empty($path) || ! $this->folderExists($path)){

            return false;

        }
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileInfo) {
            $todo = ($fileInfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileInfo->getRealPath());
        }

        return rmdir($path);



    }

    public function setCommandType($commandType)
    {

        $this->commandType = $commandType;


    }

    private function folderExists($path)
    {

        return file_exists($path);


    }

    private function setCrudPaths()
    {

        $this->unlinkFiles['model'] = base_path('app/' . $this->modelName .'.php');
        $this->unlinkFiles['modelQuery'] = base_path('app/Queries/GridQueries/' . $this->modelName .'Query.php');
        $this->unlinkFiles['controller'] = base_path('app/Http/Controllers/' . $this->modelName) . 'Controller.php';
        $this->unlinkFiles['test'] =  base_path('tests/' . $this->modelName . 'Test.php');
        $this->unlinkFiles['migration'] = $this->getMigrationFilePath($this->modelName);
        $this->extractFromFiles['Factory'] = base_path('database/factories/ModelFactory.php');
        $this->extractFromFiles['Routes'] = base_path('routes/web.php');
        $this->extractFromFiles['Api Data Grid Method'] = base_path('app/Http/Controllers/ApiController.php');
    }

    private function setViewPaths(){

        $this->unlinkFiles['component'] = base_path('resources/assets/js/components/' . $this->modelName .'Grid.vue');
        $this->extractFromFiles['Grid Component Call'] = base_path('resources/assets/js/components.js');
    }


    private function getMigrationFilePath($model)
    {

        $migrationModelName = str_plural(snake_case($model));

        $file = 'create_' .$migrationModelName . '_table';

        $migrations = scandir(base_path('database/migrations')) ;

        foreach ($migrations as $migration){

            if( str_contains($migration, $file)){

                $file = $migration;
            }

        }

        return base_path('database/migrations/') . $file;

    }



    private function deleteFiles()
    {



        foreach ($this->unlinkFiles as $file){

            unlink($file);
        }

        $this->extractMethodsFromFiles();

        //call delete each crud from trait

        return $this;


    }

    private function extractMethodsFromFiles()
    {

        foreach($this->extractFromFiles as $type => $file){


            if ( str_contains($file, '.js')){

                $start = '/** Begin ' . $this->modelName . ' ' .  $type . ' */';

                $end = '/** End ' . $this->modelName . ' ' . $type . ' */';


            } else {

                $start = '// Begin ' . $this->modelName . ' ' .  $type ;

                $end = '// End ' . $this->modelName . ' ' . $type;


            }



            $replaceWith = "";

            //read the entire string from file

            $content = file_get_contents($file);

            // define pattern

            $stringToDelete = $this->patternMatch($start, $end, $content);

            //replace the file string

            $updatedContent = str_replace("$stringToDelete", "$replaceWith", $content);

            //writes the entire file with updated content

            file_put_contents($file, $updatedContent);

        }

        $this->cleanUp();


    }

    private function cleanUp()
    {

        switch ($this->commandType){

            case 'remove:crud' :

                $this->removeApiControllerIfEmpty();
                break;

            case 'remove:foundation' :

                $this->removeApiControllerIfEmpty();
                break;

            default :

                return true;



        }



    }

    private function removeApiControllerIfEmpty()
    {

        if (isset($this->extractFromFiles['Api Data Grid Method'])){

            $file =  $this->extractFromFiles['Api Data Grid Method'];


        } else {

            return true;
        }


        $content = file_get_contents($file);

        if( ! str_contains($content, '// Begin')){

            unlink($file);
        }


    }

    /**
     * @param $start
     * @param $end
     * @param $str
     * @param $matches
     * @return null
     */
    private function patternMatch($start, $end, $str)
    {
        $pattern = sprintf(
            '/%s(.+?)%s/ims',
            preg_quote($start, '/'), preg_quote($end, '/')
        );

        // set existing to matches[0] because it'a an array

        if (preg_match($pattern, $str, $matches)) {

            $existing = ($matches[0]);

            return $existing;

        } else {

            $existing = null;

            return $existing;
        }
    }

    private function removeViewFolder($path)
    {

        return $this->deleteDirectoryAndFiles($path);


    }

    private function clearFilePaths()
    {


        $this->unlinkFiles = [];

        $this->extractFromFiles = [];


    }





}