<?php

namespace MangoPostBackPack\PostBackPack\app\Http\Controllers\Admin;

use MangoPostBackPack\PostBackPack\app\Models\Tag;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use MangoPostBackPack\PostBackPack\app\Http\Requests\TagRequest;
use CRUD;

class TagCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;

    public function setup()
    {
        $this->crud->setModel(config('backpack.mangocaptainconfig.models.tag'));
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/tag');
        $this->crud->setEntityNameStrings('tag', 'tags');
        $this->setupListOperation();
    }
    protected function setupListOperation(){
        CRUD::addColumn([
            "name"=>"user_id",
            'type'=> 'select',
            "label"=>"Author",
            'entity' => "user",
            'attribute' => 'name',
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('user/'.$entry->user_id.'/show');
                },
            ],
            'model' => config('backpack.mangocaptainconfig.models.tag'),
        ]);
        CRUD::addColumn("name");
        CRUD::addColumn("slug");
        CRUD::addColumn('created_at');
        CRUD::addColumn('updated_at');
    }
    protected function setupShowOperation(){
        $this->setupListOperation();

    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TagRequest::class);
        CRUD::addField([
            "label"=>"User",
            "name"=>"user_id",
            "type"=>"hidden",
            "default"=>backpack_user()->id
        ]);
        CRUD::setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $tag = Tag::where("id",$this->crud->getCurrentEntryId())->first();
        $this->crud->setValidation(TagRequest::class);
    }
}
