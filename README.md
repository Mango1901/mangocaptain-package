# mangocaptaincmsbackpack/package
## Install

1) * In your composoer.json file,paste:
"repositories": [{
        "type": "git",
        "url": "git@github.com:Mango1901/mangocaptain-package.git"
    }
    ],
1) In your terminal, run:
``` bash
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
4) Make sure you create a route file permissionmanager.php,then paste this to this file:
    <?php

    Route::group([
    'namespace'  => 'Backpack\PermissionManager\app\Http\Controllers',
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', backpack_middleware()],
    ], function () {
    //
    });

5) [optional] Add a menu item for it in resources/views/vendor/backpack/base/inc/sidebar.blade.php or menu.blade.php:

```html
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i>News</a>
    <ul class="nav-dropdown-items">
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('article') }}"><i class="nav-icon la la-newspaper-o"></i> Articles</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-list"></i> Categories</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"><i class="nav-icon la la-tag"></i> Tags</a></li>
    </ul>
</li>
```
6) Add m stop impersonate item to topbar_left_content.blade.php:
@if (backpack_user()->isImpersonating())
    <li><a href="{{ url('admin/stop-impersonating') }}">Stop Impersonating</a></li>
@endif



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Overwriting functionality

If you need to modify how this works in a project: 
- create a ```routes/backpack/mangocaptainroutes.php``` file; the package will see that, and load _your_ routes file, instead of the one in the package; 
- create controllers/models that extend the ones in the package, and use those in your new routes file;
- modify anything you'd like in the new controllers/models;

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@tabacitu.ro instead of using the issue tracker.

Please **[subscribe to the Backpack Newsletter](http://backpackforlaravel.com/newsletter)** so you can find out about any security updates, breaking changes or major features. We send an email every 1-2 months.

## Credits

- [Cristian Tabacitu][link-author]
- [All Contributors][link-contributors]

## License

Backpack is free for non-commercial use and 49 EUR/project for commercial use. Please see [License File](LICENSE.md) and [backpackforlaravel.com](https://backpackforlaravel.com/#pricing) for more information.

## Hire us

We've spend more than 10.000 hours creating, polishing and maintaining administration panels on Laravel. We've developed e-Commerce, e-Learning, ERPs, social networks, payment gateways and much more. We've worked on admin panels _so much_, that we've created one of the most popular software in its niche - just from making public what was repetitive in our projects.

If you are looking for a developer/team to help you build an admin panel on Laravel, look no further. You'll have a difficult time finding someone with more experience & enthusiasm for this. This is _what we do_. [Contact us - let's see if we can work together](https://backpackforlaravel.com/need-freelancer-or-development-team).


[ico-version]: https://img.shields.io/packagist/v/backpack/NewsCRUD.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Laravel-Backpack/NewsCRUD/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Laravel-Backpack/NewsCRUD.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Laravel-Backpack/NewsCRUD.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/NewsCRUD.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/NewsCRUD
[link-travis]: https://travis-ci.org/Laravel-Backpack/NewsCRUD
[link-scrutinizer]: https://scrutinizer-ci.com/g/Laravel-Backpack/NewsCRUD/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Laravel-Backpack/NewsCRUD
[link-downloads]: https://packagist.org/packages/backpack/NewsCRUD
[link-author]: https://github.com/tabacitu
[link-contributors]: ../../contributors
