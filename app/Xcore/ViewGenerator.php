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
        $this->indexView();
    }

    function indexView()
    {
        $template = file_get_contents(app_path('Xcore/src/views/index.stub'));

        // Replace placeholders with dynamic values
        $modelName = $this->coreArray['model'];
        $routeName = $this->coreArray['route'];

        // Retrieve fields from coreArray
        $fields = $this->coreArray['fields'];

        // Replace $TABLE$ placeholder with dynamic table structure
        $template = str_replace('$TABLE$', "
        <thead>
            <tr>
                <th>#</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach (\$data as \$item)
                <tr>
                    <td>{{ \$loop->iteration }}</td>
                    <td>
                        <a href=\"{{ route('$routeName.edit', \$item->id) }}\" class=\"btn btn-sm btn-primary\">Edit</a>
                        <form action=\"{{ route('$routeName.destroy', \$item->id) }}\" method=\"POST\" style=\"display: inline-block;\">
                            @csrf
                            @method('DELETE')
                            <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    ", $template);

        $template = str_replace('$MODEL$', $this->coreArray['model'], $template);
        $template = str_replace('$ROUTE$', $routeName, $template);

        $modelFilePath = $this->coreArray['sub_folder'] ? $this->viewPath . '/' . $routeName . '/index.blade.php' : $this->viewPath . '/index.blade.php';
        if (!file_exists(dirname($modelFilePath))) {
            mkdir(dirname($modelFilePath), 0777, true);
        }
        file_put_contents($modelFilePath, $template);
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

        $routeName = Str::snake($this->coreArray['route']);
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
        // $variableName = Str::snake($this->coreArray['model']);
        $variableName = 'data';
        $fieldsHtml = "";

        foreach ($this->coreArray['fields'] as $entity) {
            switch ($entity['type']) {
                case 'text_field':
                case 'textarea_field':
                    $label = str_replace('_', ' ', $entity['name']);
                    $componentStub = file_get_contents(app_path('Xcore/src/views/components/' . $entity['type'] . '.stub'));
                    $componentStub = str_replace('$LABEL$', $label, $componentStub);
                    $componentStub = str_replace('$NAME$', $entity['name'], $componentStub);
                    $componentStub = str_replace('$VALUE$', '$' . $variableName . '->' . $entity['name'], $componentStub);
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

        $routeName = Str::snake($this->coreArray['route']);
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
