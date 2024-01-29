<?php

namespace App\Xcore;

use Str;

class ViewGenerator
{
    public $coreArray;
    public $moduleName;
    public $viewPath;

    function __construct($coreArray)
    {
        $this->coreArray = $coreArray;
        $this->moduleName = $this->coreArray['module'];
        $this->viewPath = module_path($this->moduleName, 'resources/views');
    }

    function generate()
    {
        $this->createView();
    }

    function createView()
    {

        $template = file_get_contents(app_path('Xcore/src/views/create.stub'));

        $fieldsHtml = "";
        foreach ($this->coreArray['fields'] as $entity) {

            switch ($entity['type']) {
                case 'text_field':
                    $label = str_replace('_', ' ', $entity['name']);

                    $textTemplate = file_get_contents(app_path('Xcore/src/views/components/text_field.stub'));
                    $textTemplate = str_replace('$LABEL$', $label, $textTemplate);
                    $textTemplate = str_replace('$NAME$', $entity['name'], $textTemplate);
                    if (in_array('required', $entity['validation'])) {
                        $textTemplate = str_replace('$REQUIRED$', '*', $textTemplate);
                    } else {
                        $textTemplate = str_replace('$REQUIRED$', '', $textTemplate);
                    }
                    $fieldsHtml .= $textTemplate . "\n";

                    break;

                case 'textarea_field':
                    $label = str_replace('_', ' ', $entity['name']);

                    $textTemplate = file_get_contents(app_path('Xcore/src/views/components/textarea_field.stub'));
                    $textTemplate = str_replace('$LABEL$', $label, $textTemplate);
                    $textTemplate = str_replace('$NAME$', $entity['name'], $textTemplate);
                    if (in_array('required', $entity['validation'])) {
                        $textTemplate = str_replace('$REQUIRED$', '*', $textTemplate);
                    } else {
                        $textTemplate = str_replace('$REQUIRED$', '', $textTemplate);
                    }

                    if (!empty($entity['default'])) {
                        $textTemplate = str_replace('$DEFAULT$', $entity['default'], $textTemplate);
                    } else {
                        $textTemplate = str_replace('$DEFAULT$', '', $textTemplate);
                    }

                    $fieldsHtml .= $textTemplate . "\n";

                    break;

                case 'select_field':
                    $label = str_replace('_', ' ', $entity['name']);
                    $options = "";

                    // handle options
                    foreach ($entity['default'] as $option) {
                        $options  .= '<option value="' . $option['value'] . '" >' . $option['name'] . '</option>' . "\n";
                    }

                    $textTemplate = file_get_contents(app_path('Xcore/src/views/components/select_field.stub'));
                    $textTemplate = str_replace('$LABEL$', $label, $textTemplate);
                    $textTemplate = str_replace('$NAME$', $entity['name'], $textTemplate);
                    $textTemplate = str_replace('$OPTIONS$', $options, $textTemplate);

                    if (in_array('required', $entity['validation'])) {
                        $textTemplate = str_replace('$REQUIRED$', '*', $textTemplate);
                    } else {
                        $textTemplate = str_replace('$REQUIRED$', '', $textTemplate);
                    }

                    $fieldsHtml .= $textTemplate . "\n";

                    break;
            }
        }
        $routeName = str_replace('_', '-', Str::snake($this->coreArray['model']));
        $template = str_replace('$MODEL$', $this->coreArray['model'], $template);
        $template = str_replace('$ROUTE$', $routeName, $template);
        $template = str_replace('$FIELDS$', $fieldsHtml, $template);

        if ($this->coreArray['sub_folder'] == true) {
            $subFolderPath = $this->viewPath . '/' . $routeName;

            // Check if the sub-folder exists, if not, create it
            if (!file_exists($subFolderPath)) {
                mkdir($subFolderPath, 0777, true); // Create the sub-folder recursively
            }

            $modelFilePath = $subFolderPath . '/create.blade.php';
        } else {
            $modelFilePath = $this->viewPath . '/create.blade.php';
        }

        file_put_contents($modelFilePath, $template);

        // echo "Model Generated Successfully: $modelFilePath" . "\n";
    }
}
