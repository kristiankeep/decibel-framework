<?php
namespace tests\app\decibel\database\maintenance;

use app\decibel\configuration\DApplicationMode;
use app\decibel\database\maintenance\DOptimiseDatabase;
use app\decibel\test\DTestCase;

/**
 * Test class for DOptimiseDatabase.
 * Generated by Decibel on 2011-10-31 at 14:08:24.
 */
class DOptimiseDatabaseTest extends DTestCase
{
    /**
     * @var DOptimiseDatabase
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->markTestSkipped(
            'This test has not been implemented yet.'
        );
        $this->object = new DOptimiseDatabase;
    }

    /**
     * @covers app\decibel\database\maintenance\DOptimiseDatabase::canRunInMode
     */
    public function testCanRunInDebugMode()
    {
        $result = $this->object->canRunInMode(DApplicationMode::MODE_DEBUG);
        $this->assertInternalType('boolean', $result);
        $this->assertTrue($result);
    }
}