<?php

namespace App\Xcore;

use Illuminate\Support\Str;

class ControllerGenerator
{
    public $coreArray;
    public $moduleName;
    public $controllerPath;
    public $controllerName;

    public function __construct($coreArray)
    {
        $this->coreArray = $coreArray;
        $this->moduleName = $coreArray['module'];
        $this->controllerPath = module_path($this->moduleName, 'app/Http/Controllers');
        $this->controllerName = $coreArray['model'] . 'Controller';
    }

    public function generate()
    {

        $template = file_get_contents(app_path('Xcore/src/app/Controller.stub'));

        $template = str_replace(['$MODULE_NAME$', '$CONTROLLER_NAME$', '$MODEL_NAME$'],
                                [$this->moduleName, $this->controllerName, $this->coreArray['model']], $template);

        $template = $this->generateAction($template, 'index');
        $template = $this->generateAction($template, 'create');
        $template = $this->generateAction($template, 'store');
        $template = $this->generateAction($template, 'edit');
        $template = $this->generateAction($template, 'update');
        $template = $this->generateAction($template, 'delete');

        file_put_contents("{$this->controllerPath}/{$this->controllerName}.php", $template);
    }

    private function generateAction($template, $action)
    {
        $viewPath = $this->getViewPath($action);
        $modelName = $this->coreArray['model'];
        $view = Str::lower($this->moduleName) . '::' . $viewPath;

        $code = '';
        if ($action === 'index') {
            $code = "\$data = {$modelName}::all();\n\t\treturn view('$view', compact('data'));";
        } elseif ($action === 'create') {
            $code = "return view('$view');";
        } elseif ($action === 'store' || $action === 'update') {
            $code = $this->generateSaveCode($modelName, $action);
        } elseif ($action === 'edit') {
            $code = "\$data = {$modelName}::findOrFail(\$id);\n\t\treturn view('$view', compact('data'));";
        } elseif ($action === 'delete') {
            $code = "\$data = {$modelName}::findOrFail(\$id);\n\t\t\$data->delete();\n\t\treturn redirect()->route('{$this->coreArray['route']}.index');";
        }

        $template = str_replace('$' . strtoupper($action) . '$', $code, $template);

        return $template;
    }

    private function generateSaveCode($modelName, $action)
    {
        $createRequest = $modelName.'CreateRequest';
        $updateRequest = $modelName.'UpdateRequest';

        $code = $action === 'store' ?
            "public function store($createRequest \$request): RedirectResponse\n\t{\n\t\t\$data = new {$modelName}();\n\t\t" :

            "public function update($updateRequest \$request, \$id): RedirectResponse\n\t{\n\t\t\$data = {$modelName}::findOrFail(\$id);\n\t\t";

        foreach ($this->coreArray['fields'] as $field) {
            if ($field['type'] !== 'column') {
                $code .= "\$data->{$field['name']} = \$request->{$field['name']};\n\t\t";
            }
        }
        $code .= "\$data->save();\n\t\treturn redirect()->route('{$this->coreArray['route']}.index');\n\t}";
        return $code;
    }

    private function getViewPath($action)
    {
        $viewPath = $action;
        if ($this->coreArray['sub_folder']) {
            $viewPath = $this->coreArray['model'] . '.' . $action;
        }
        return $viewPath;
    }
}
