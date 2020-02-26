# db
Db package for Bone Mvc Framework
## installation
Use Composer
```
composer require delboy1978uk/bone-db
```
## usage
Simply add to the `config/packages.php`
```php
<?php

// use statements here
use Bone\Db\DbPackage;

return [
    'packages' => [
        // packages here...,
        DbPackage::class,
    ],
    // ...
];
```