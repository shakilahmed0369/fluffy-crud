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
        foreach($this->coreArray['fields'] as $entity) {

            switch ($entity['type']) {
                case 'text_field':
                    $label = str_replace('_', ' ', $entity['name']);

                    $textTemplate = file_get_contents(app_path('Xcore/src/views/components/text_field.stub'));
                    $textTemplate = str_replace('$LABEL$', $label, $textTemplate);
                    $textTemplate = str_replace('$NAME$', $entity['name'], $textTemplate);
                    if(in_array('required', $entity['validation'])) {
                        $textTemplate = str_replace('$REQUIRED$', '*', $textTemplate);
                    }else {
                        $textTemplate = str_replace('$REQUIRED$', '', $textTemplate);
                    }
                    $fieldsHtml .= $textTemplate."\n";

                    break;

                default:
                    # code...
                    break;
            }
        }
        $routeName = str_replace('_', '-', Str::snake($this->coreArray['model']));
        $template = str_replace('$MODEL$', $this->coreArray['model'], $template);
        $template = str_replace('$ROUTE$', $routeName, $template);
        $template = str_replace('$FIELDS$', $fieldsHtml, $template);

        if($this->coreArray['sub_folder'] == true) {
            $modelFilePath = $this->viewPath. '/'. $routeName .  'create.blade.php';
        }else {
            $modelFilePath = $this->viewPath. '/' . 'create.blade.php';
        }

        file_put_contents($modelFilePath, $template);

        // echo "Model Generated Successfully: $modelFilePath" . "\n";
    }


    function getFiles()
    {
    }

    function validator()
    {
    }
}
