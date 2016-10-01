<?php

namespace Evercode1\FoundationMaker\Builders\Master;

use Evercode1\FoundationMaker\Builders\Writers\MasterPageWriter;

class MasterBuilder
{
    public $masterPageName;
    public $appName;
    public $files = [];
    public $writer;

    public function __construct()
    {

        $this->writer = new MasterPageWriter();

    }


    public function makeMasterFiles()
    {

        $this->writer->writeEachMasterFile($this->masterPageName, $this->appName, $this->files);

        return true;

    }

    public function setFileNamesAndPaths($masterPageName, $appName)
    {

        $this->masterPageName = $masterPageName;
        $this->appName = $appName;

        $this->files[$this->masterPageName] = base_path('resources/views/layouts/'. $this->masterPageName . '.blade.php');
        $this->files['css'] = base_path('resources/views/layouts/css.blade.php');
        $this->files['scripts'] = base_path('resources/views/layouts/scripts.blade.php');
        $this->files['nav'] = base_path('resources/views/layouts/nav.blade.php');
        $this->files['bottom'] = base_path('resources/views/layouts/bottom.blade.php');
        $this->files['meta'] = base_path('resources/views/layouts/meta.blade.php');

    }




}