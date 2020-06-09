<?php
namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\Category\CategoryCreateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(Category::class);
        $this->crud->setRoute("admin/category");
        $this->crud->setEntityNameStrings('category', 'categories');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryCreateRequest::class);
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
