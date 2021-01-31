# mangocaptaincmsbackpack/package
## Install

1) * In your composoer.json file,paste:

"repositories": [
        {
            "type": "git",
            "url": "git@github.com:Mango1901/mangocaptain-package.git"
        }
    ],
    
![Screenshot from 2021-01-31 23-11-50](https://user-images.githubusercontent.com/72479838/106390186-be9f4100-6419-11eb-884e-ebee9ff2e5ff.png)
1) In your terminal, run:
``` bash
php artisan config:cache
php artisan config:clear
composer require spatie/laravel-backup
 
composer require mangocaptaincmsbackpack/package:dev-master

php artisan backpack:install
```

2) Publish the migration,seeder,views,config:

```
php artisan vendor:publish --provider="Backpack\NewsCRUD\NewsCRUDServiceProvider"
```

3) Run the migration to have the database table we need:

```
php artisan migrate: (if fails please run php artisan route:clear,php artisan route:cache,php artisan route:cache and then run php artisan migrate:fresh)
php artisan db:seed --class="packageSeeder"
```
4) Make sure you create a route/backpack file permissionmanager.php,then paste this to this file:
 ![Screenshot from 2021-01-31 23-09-43](https://user-images.githubusercontent.com/72479838/106390149-8ef03900-6419-11eb-82fc-8c0b0b525eb7.png)
 
 
<?php

Route::group([
    'namespace'  => 'Backpack\PermissionManager\app\Http\Controllers',
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', backpack_middleware()],
], function () {
    //
});

5) [optional] Add a menu item for it in resources/views/vendor/backpack/base/inc/sidebar.blade.php or menu.blade.php:

<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authorizations</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        @if(backpack_user()->hasRole("Admin"))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        @endif
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i>Posts</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon la la-question'></i> Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-list"></i> Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"><i class="nav-icon la la-tag"></i> Tags</a></li>
    </ul>
</li>


{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}\"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>--}}

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i> Backups</a></li>

```html

```
6) Add stop impersonate item to topbar_left_content.blade.php:

```html
@if (backpack_user()->isImpersonating())
    <li><a href="{{ url('admin/stop-impersonating') }}">Stop Impersonating</a></li>
@endif
```html

7) Add to App\Models\User:
use \Backpack\CRUD\app\Models\Traits\CrudTrait;
use \Spatie\Permission\Traits\HasRoles;
use \Backpack\NewsCRUD\app\Http\Models\Traits\CanImpersonateTrait;

8) In Terminal ,Run:(If something went wrong)
php artisan route:clear
php artisan route:cache
php artisan config:cache
php artisan config:clear


