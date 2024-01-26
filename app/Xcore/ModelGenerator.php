<?php

namespace App\Xcore;

class ModelGenerator
{

    public $coreArray;
    public $moduleName;
    public $modelName;
    public $modelPath;

    function __construct($coreArray)
    {
        $this->coreArray = $coreArray;
        $this->moduleName = $this->coreArray['module'];
        $this->modelPath = module_path($this->moduleName, 'app/Models');
        $this->modelName = $this->coreArray['model'];
    }

    function generate()
    {
        $this->validator();
        $this->createModel();
    }

    function createModel()
    {
        $template = file_get_contents(app_path('Xcore/src/app/Model.stub'));

        $template = str_replace('$MODULE_NAME$', $this->moduleName, $template);
        $template = str_replace('$MODEL$', $this->modelName, $template);
        $template = str_replace('$FILLABLE$', $this->getFiles(), $template);

        $modelFilePath = $this->modelPath . '/' . $this->modelName . '.php';

        file_put_contents($modelFilePath, $template);

        echo "Model Generated Successfully: $modelFilePath"."\n";
    }


    function getFiles()
    {
        $files = "";
        foreach ($this->coreArray['fields'] as $field) {
            $fieldName = $field['name'];
            $files .= "'$fieldName', ";
        }

        return $files;
    }

    function validator()
    {
        // check is model already exist
        $modelFilePath = $this->modelPath . '/' . $this->modelName . '.php';

        if (file_exists($modelFilePath)) {
            throw new \Exception("'{$this->modelName}' Model is already exist.");
        }
    }
}
