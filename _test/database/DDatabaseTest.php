<?php
namespace tests\app\decibel\database;

use app\decibel\database\DDatabase;
use app\decibel\database\mysql\DMySQL;
use app\decibel\test\DTestCase;

/**
 * Test class for DDatabase.
 * Generated by Decibel on 2011-10-31 at 14:07:45.
 */
class DDatabaseTest extends DTestCase
{
    /**
     * @var DDatabase
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new DMySQL(
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE'),
            env('DB_HOSTNAME')
        );
        $this->object->connect();
    }

    /**
     * @covers app\decibel\database\DDatabase::connected
     */
    public function testclose()
    {
        $database = $this->object;
        $this->assertTrue($database->connected());
        $database->close();
        $this->assertFalse($database->connected());
    }

    /**
     * @covers app\decibel\database\DDatabase::__destruct
     */
    public function test__destruct()
    {
        $database = $this->object;
        $this->assertTrue($database->connected());
        $database->close();
        $this->assertFalse($database->connected());
    }

    /**
     * @covers app\decibel\database\DDatabase::connected
     */
    public function testConnected()
    {
        $result = $this->object->connected();
        $this->assertTrue($result);
    }

    /**
     * @covers app\decibel\database\DDatabase::getError
     */
    public function testGetError()
    {
        $result = $this->object->getError();
        $this->assertInternalType('null', $result);
        $this->assertNull($result);
    }

    /**
     * @covers app\decibel\database\DDatabase::getDatabase
     */
    public function testgetDatabase()
    {
        $database = $this->object->getDatabase();
        $this->assertInstanceOf(DMySQL::class, $database);
        $this->assertSame($this->object->getHostname(), env('DB_HOSTNAME'));
        $this->assertSame($this->object->getDatabaseName(), env('DB_DATABASE'));
        $this->assertSame($this->object->getUsername(), env('DB_USERNAME'));
    }
}
