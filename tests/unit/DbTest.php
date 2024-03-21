<?php

namespace Barnacle\Tests;

use Barnacle\Container;
use Barnacle\Exception\NotFoundException;
use Bone\Db\DbPackage;
use Bone\Db\DbProviderInterface;
use Bone\Db\HasDbTrait;
use PDO;

class DbTest extends \Codeception\Test\Unit
{
    /** @var Container */
    protected $container;

    protected function _before()
    {
        $this->container = $c = new Container();

    }

    protected function _after()
    {
        unset($this->container);
    }


    public function testBlah()
    {
        $c = $this->container;
        $c['db'] = [
            'host' => '127.0.0.1',
            'dbname' => 'awesome',
            'user' => 'root',
            'password' => 'root'
        ];
        $dbPackage = new DbPackage();
        $dbPackage->addToContainer($c);
        $pdo = $c->get(PDO::class);
        $this->assertInstanceOf(PDO::class, $pdo);
    }


    public function testException()
    {
        $c = $this->container;
        $this->expectException(NotFoundException::class);
        $dbPackage = new DbPackage();
        $dbPackage->addToContainer($c);
        $pdo = $c->get(PDO::class);
    }

    public function testTrait()
    {
        $c = $this->container;
        $c['db'] = [
            'host' => '127.0.0.1',
            'dbname' => 'awesome',
            'user' => 'root',
            'password' => 'root'
        ];
        $dbPackage = new DbPackage();
        $dbPackage->addToContainer($c);
        $pdo = $c->get(PDO::class);

        $class = new class implements DbProviderInterface {
            use HasDbTrait;
        };

        $class->setDb($pdo);
        $this->assertInstanceOf(PDO::class, $class->getDb());
    }

}


