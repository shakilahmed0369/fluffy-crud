<?php

namespace App\Xcore;

use Illuminate\Support\Str;

class RequestGenerator
{
    private $coreArray;
    private $moduleName;
    private $requestPath;
    private $modelName;

    public function __construct(array $coreArray)
    {
        $this->coreArray = $coreArray;
        $this->moduleName = $coreArray['module'];
        $this->requestPath = module_path($this->moduleName, 'app/Http/Requests');
        $this->modelName = $coreArray['model'];
    }

    public function generate()
    {
        $this->generateRequest('Create');
        $this->generateRequest('Update');
    }

private function generateRequest($type)
{
    $template = file_get_contents(app_path('Xcore/src/app/Request.stub'));

    $rules = [];
    foreach ($this->coreArray['fields'] as $field) {
        foreach ($field['validation'] as $validation) {
            $rules[$field['name']][] = "'" . $validation . "'";
        }
    }

    $code = "return [\n\t\t";
    foreach ($rules as $fieldName => $fieldRules) {
        $code .= "'{$fieldName}' => [" . implode(', ', $fieldRules) . "],\n\t\t";
    }
    $code .= "];";

    $template = str_replace('$MODULE_NAME$', $this->moduleName, $template);
    $template = str_replace('$CLASS_NAME$', "{$this->modelName}{$type}Request", $template);
    $template = str_replace('$RULES$', $code, $template);

    file_put_contents("{$this->requestPath}/{$this->modelName}{$type}Request.php", $template);
}

}
