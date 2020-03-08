<?php declare(strict_types=1);

namespace Bone\Db;

use Barnacle\Container;
use Barnacle\RegistrationInterface;
use Barnacle\Exception\NotFoundException;
use PDO;

class DbPackage implements RegistrationInterface
{
    /**
     * @param Container $c
     */
    public function addToContainer(Container $c)
    {
        if ($c->has('db')) {
            $c[PDO::class] = $c->factory(function (Container $c): PDO {
                $credentials = $c->get('db');
                $host = $credentials['host'];
                $db = $credentials['database'];
                $user = $credentials['user'];
                $pass = $credentials['pass'];

                $dbConnection = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass, [
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]);

                return $dbConnection;
            });
        } else {
            throw new NotFoundException('DbPackage is registered but there is no db config. See the 
            delboy1978uk/bone-db README.', 418);
        }
    }
}
