<?php

namespace Backpack\NewsCRUD\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\NewsCRUD\app\Http\Requests\UserRequest;
use Backpack\NewsCRUD\app\Http\Controllers\Admin\Operations\ImpersonateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Illuminate\Support\Facades\Hash;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use ShowOperation;
    use ImpersonateOperation;

    public function setup()
    {
        $this->crud->setModel(config('backpack.mangocaptainconfig.models.user'));
        $this->crud->setEntityNameStrings("user", "users");
        $this->crud->setRoute(backpack_url('user'));
        if(!backpack_user()->hasRole("Admin")){
            $this->crud->denyAccess("create");
            $this->crud->denyAccess("delete");
        }
    }

    public function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name'  => 'name',
                'label' => "Name",
                'type'  => 'text',
            ],
            [
                'name'  => 'email',
                'label' => "Email",
                'type'  => 'email',
            ],
        ]);
    }
    public function setupShowOperation(){
        $this->setupListOperation();
    }
    public function setupCreateOperation()
    {
        $this->addUserFields();
        $this->crud->setValidation(UserRequest::class);
    }

    public function setupUpdateOperation()
    {
            $this->addUserFields();
            $this->crud->setValidation(UserRequest::class);
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitStore();
    }

    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }

    /**
     * Handle password input fields.
     */
    protected function handlePasswordInput($request)
    {
        // Remove fields not present on the user.
        $request->request->remove('password_confirmation');
        $request->request->remove('roles_show');
        $request->request->remove('permissions_show');

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }

    protected function addUserFields()
    {
        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => "Name",
                'type'  => 'text',
            ],
            [
                'name'  => 'email',
                'label' => "Email",
                'type'  => 'email',
            ],
            [
                'name'  => 'password',
                'label' => "Password",
                'type'  => 'password',
            ],
            [
                'name'  => 'password_confirmation',
                'label' => "Confirm Password",
                'type'  => 'password',
            ],
            ]);
    }
    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');

        return $this->crud->delete($id);
    }
}
