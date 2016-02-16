<?php
namespace tests\app\decibel\auditing;

use app\decibel\application\DApp;
use app\decibel\auditing\DCleanAuditRecords;
use app\decibel\configuration\DApplicationMode;
use app\decibel\test\DTestCase;

/**
 * Test class for DCleanAuditRecords.
 * Generated by Decibel on 2012-04-12 at 09:53:58.
 */
class DCleanAuditRecordsTest extends DTestCase
{
    /**
     * @covers app\decibel\auditing\DCleanAuditRecords::canRunInMode
     */
    public function testCanRunInDebugMode()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $task = new DCleanAuditRecords();
        $this->assertTrue($task->canRunInMode(DApplicationMode::MODE_DEBUG));
    }

    /**
     * @covers app\decibel\auditing\DCleanAuditRecords::canRunInMode
     */
    public function testCanRunInTestMode()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $task = new DCleanAuditRecords();
        $this->assertTrue($task->canRunInMode(DApplicationMode::MODE_TEST));
    }
}