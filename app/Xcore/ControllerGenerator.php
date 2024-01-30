<?php

namespace App\Xcore;

use Str;

class ControllerGenerator
{

    public $coreArray;
    public $moduleName;
    public $controllerPath;
    public $controllerName;

    function __construct($coreArray)
    {
        $this->coreArray = $coreArray;
        $this->moduleName = $this->coreArray['module'];
        $this->controllerPath = module_path($this->moduleName, 'app/Http/Controllers');
        $this->controllerName = $this->coreArray['model'] . 'Controller';
    }

    function generate()
    {
        // $this->validator();
        // $this->createModel();
        $this->basicSetup();
    }

    function basicSetup()
    {
        $template = file_get_contents(app_path('Xcore/src/app/Controller.stub'));

        $template = str_replace('$MODULE_NAME$', $this->moduleName, $template);
        $template = str_replace('$CONTROLLER_NAME$', $this->controllerName, $template);
        $template = str_replace('$MODEL_NAME$', $this->coreArray['model'], $template);
        $template = $this->generateIndex($template);
        $template = $this->generateCreate($template);
        $template = $this->generateStore($template);
        $controllerFilePath = $this->controllerPath . '/' . $this->controllerName . '.php';
        file_put_contents($controllerFilePath, $template);
    }

    function generateIndex($template)
    {
        if ($this->coreArray['sub_folder']) {
            $code = "
        \$data = {$this->coreArray['model']}::all();
        return view('" . Str::kebab($this->moduleName) . ":" . Str::kebab($this->coreArray['model']) . ".index', compact('data'));";
            $template = str_replace('$INDEX$', $code, $template);
        } else {

            $code = "
        \$data = {$this->coreArray['model']}::all();
        return view('" . Str::kebab($this->moduleName) . ":index', compact('data'));";
            $template = str_replace('$INDEX$', $code, $template);
        }

        return $template;
    }

    function generateCreate($template)
    {
        if ($this->coreArray['sub_folder']) {
            $code = "
        return view('" . Str::kebab($this->moduleName) . ":" . Str::kebab($this->coreArray['model']) . ".create');";
            $template = str_replace('$CREATE$', $code, $template);
        } else {
            $code = "
        return view('" . Str::kebab($this->moduleName) . ":create');";
            $template = str_replace('$CREATE$', $code, $template);
        }

        return $template;
    }

function generateStore($template)
{
    $routeKey = $this->coreArray['route'];
    $modelName = $this->coreArray['model'];

        $code = "";
        $code .= "\$data = new {$modelName}();\n\t\t";
        foreach($this->coreArray['fields'] as $field) {
            if($field['type'] != 'column') {
                $code .= "\$data->{$field['name']} = \$request->{$field['name']};\n\t\t";
            }
        }
        $code .= "\$data->save();\n\n\t\t";
        $code .= "return redirect()->route('{$this->coreArray['route']}.index');\n\t\t";

        $template = str_replace('$STORE$', $code, $template);

    return $template;
}
}
