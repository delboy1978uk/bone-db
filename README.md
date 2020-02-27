# db
PDO Connection package for Bone Framework
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
And add a `db.php` to your config. Here is the Bone Framework Docker development environment settings:
```php
<?php

return [
    'db' => [
        'driver' => 'pdo_mysql',
        'host' => 'mariadb',
        'database' => 'awesome',
        'dbname' => 'awesome',
        'user' => 'dbuser',
        'pass' => '[123456]',
        'password' => '[123456]',
    ],
];
```
The two databases and passwords are due to old legacy crap. Will be sorted soon! ;-)
## usage
You can inject your `PDO` connection into any of your classes via your Package registration class:
```php
$pdoConnection = $c->get(PDO::class); // add a use statement too! 
```
## reference
Official Manual https://www.php.net/manual/en/book.pdo.php

An awesome detailed book on PDO https://phpdelusions.net/pdo
