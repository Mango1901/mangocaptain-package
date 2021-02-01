# Package Name : mangocmspostbackpacktest/postpackagetest

### This package is what i'm done with backpack tools in a month:
### - This has create a POST with full function and following by some add-ons tools to supports such as Permissionmanager, FileManager,BackUp,...
## Install

1) * In your composoer.json file,paste:
```
"repositories": [
        {
            "type": "git",
            "url": "git@github.com:Mango1901/mangocaptain-package.git"
        }
    ],
```
1) In your terminal, run:
``` bash
php artisan config:clear
 
composer require mangocmspostbackpacktest/postpackagetest:dev-master

php artisan backpack:install

php artisan backpack:filemanager:install
```

2) Publish the migration,seeder,views,config:

``` bash 
php artisan vendor:publish --provider="Backpack\NewsCRUD\NewsCRUDServiceProvider"
```

3) Run the migration to have the database table we need:

``` bash
php artisan migrate: (if fails please run php artisan route:clear and then run php artisan migrate:fresh)
php artisan db:seed --class="packageSeeder"
```
5) [optional] Add a menu item for it in resources/views/vendor/backpack/base/inc/sidebar.blade.php or menu.blade.php:
``` html
<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authorizations</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
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

```
7) Add to App\Models\User:
``` php
use \Backpack\CRUD\app\Models\Traits\CrudTrait;
```
8) Symlink from storage to public 

``` bash
php artisan storage:link

```
9) In Terminal ,Run:(If something went wrong)
``` bash
php artisan route:clear
php artisan config:clear

```


