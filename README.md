# bone-db
PDO Connection package for Bone Framework
## installation
bone-db comes pre-installed as part of the core Bone Framework packages. Install the skeleton project 
https://github.com/delboy1978uk/bonemvc
## usage
You should already have a `bone-db.php` config in your . Here is the Bone Framework Docker development environment settings:
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
