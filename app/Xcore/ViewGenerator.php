<?php

namespace App\Xcore;

use Illuminate\Support\Str;

class ViewGenerator
{
    public $coreArray;
    public $moduleName;
    public $viewPath;

    public function __construct($coreArray)
    {
        $this->coreArray = $coreArray;
        $this->moduleName = $this->coreArray['module'];
        $this->viewPath = module_path($this->moduleName, 'resources/views');
    }

    public function generate()
    {
        $this->createView();
        $this->editView();
    }

    public function createView()
    {
        $template = file_get_contents(app_path('Xcore/src/views/create.stub'));
        $fieldsHtml = "";

        foreach ($this->coreArray['fields'] as $entity) {
            switch ($entity['type']) {
                case 'text_field':
                case 'textarea_field':
                    $label = str_replace('_', ' ', $entity['name']);
                    $componentStub = file_get_contents(app_path('Xcore/src/views/components/' . $entity['type'] . '.stub'));
                    $componentStub = str_replace('$LABEL$', $label, $componentStub);
                    $componentStub = str_replace('$NAME$', $entity['name'], $componentStub);
                    $componentStub = str_replace('$VALUE$', $entity['default'] ?? '', $componentStub);
                    $componentStub = str_replace('$REQUIRED$', in_array('required', $entity['validation']) ? '*' : '', $componentStub);
                    $fieldsHtml .= $componentStub . "\n";
                    break;

                case 'select_field':
                    $label = str_replace('_', ' ', $entity['name']);
                    $options = "";

                    foreach ($entity['default'] as $option) {
                        $options .= '<option value="' . $option['value'] . '" >' . $option['name'] . '</option>' . "\n";
                    }

                    $componentStub = file_get_contents(app_path('Xcore/src/views/components/select_field.stub'));
                    $componentStub = str_replace('$LABEL$', $label, $componentStub);
                    $componentStub = str_replace('$NAME$', $entity['name'], $componentStub);
                    $componentStub = str_replace('$OPTIONS$', $options, $componentStub);
                    $componentStub = str_replace('$REQUIRED$', in_array('required', $entity['validation']) ? '*' : '', $componentStub);
                    $fieldsHtml .= $componentStub . "\n";
                    break;
            }
        }

        $routeName = str_replace('_', '-', Str::snake($this->coreArray['model']));
        $template = str_replace('$MODEL$', $this->coreArray['model'], $template);
        $template = str_replace('$ROUTE$', $routeName, $template);
        $template = str_replace('$FIELDS$', $fieldsHtml, $template);

        $modelFilePath = $this->coreArray['sub_folder'] ? $this->viewPath . '/' . $routeName . '/create.blade.php' : $this->viewPath . '/create.blade.php';
        if (!file_exists(dirname($modelFilePath))) {
            mkdir(dirname($modelFilePath), 0777, true);
        }
        file_put_contents($modelFilePath, $template);
    }

    public function editView()
    {
        $template = file_get_contents(app_path('Xcore/src/views/edit.blade.stub'));
        $variableName = Str::snake($this->coreArray['model']);
        $fieldsHtml = "";

        foreach ($this->coreArray['fields'] as $entity) {
            switch ($entity['type']) {
                case 'text_field':
                case 'textarea_field':
                    $label = str_replace('_', ' ', $entity['name']);
                    $componentStub = file_get_contents(app_path('Xcore/src/views/components/' . $entity['type'] . '.stub'));
                    $componentStub = str_replace('$LABEL$', $label, $componentStub);
                    $componentStub = str_replace('$NAME$', $entity['name'], $componentStub);
                    $componentStub = str_replace('$VALUE$', '{{ $' . $variableName . '->' . $entity['name'] . ' }}', $componentStub);
                    $componentStub = str_replace('$REQUIRED$', in_array('required', $entity['validation']) ? '*' : '', $componentStub);
                    $fieldsHtml .= $componentStub . "\n";
                    break;

                case 'select_field':
                    $label = str_replace('_', ' ', $entity['name']);
                    $options = "";

                    foreach ($entity['default'] as $option) {
                        $value = is_int($option['value']) ? $option['value'] : '"' . $option['value'] . '"';
                        $options .= '<option @selected($' . $variableName . '->' . $entity['name'] . ' == ' . $value . ') value="' . $option['value'] . '" >' . $option['name'] . '</option>' . "\n";
                    }

                    $componentStub = file_get_contents(app_path('Xcore/src/views/components/select_field.stub'));
                    $componentStub = str_replace('$LABEL$', $label, $componentStub);
                    $componentStub = str_replace('$NAME$', $entity['name'], $componentStub);
                    $componentStub = str_replace('$OPTIONS$', $options, $componentStub);
                    $componentStub = str_replace('$REQUIRED$', in_array('required', $entity['validation']) ? '*' : '', $componentStub);
                    $fieldsHtml .= $componentStub . "\n";
                    break;
            }
        }

        $routeName = str_replace('_', '-', Str::snake($this->coreArray['model']));
        $template = str_replace('$MODEL$', $this->coreArray['model'], $template);
        $template = str_replace('$ROUTE$', $routeName, $template);
        $template = str_replace('$FIELDS$', $fieldsHtml, $template);
        $template = str_replace('$ID$', '$' . $variableName . '->id', $template);

        $modelFilePath = $this->coreArray['sub_folder'] ? $this->viewPath . '/' . $routeName . '/edit.blade.php' : $this->viewPath . '/edit.blade.php';
        if (!file_exists(dirname($modelFilePath))) {
            mkdir(dirname($modelFilePath), 0777, true);
        }
        file_put_contents($modelFilePath, $template);
    }
}
