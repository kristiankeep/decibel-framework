<?php
namespace tests\app\decibel\event;

use app\decibel\event\DEvent;
use app\decibel\model\field\DTextField;
use app\decibel\test\DTestCase;

class TestEvent extends DEvent
{
    public static function getDescription()
    {
        return null;
    }

    public static function getDisplayName()
    {
        return null;
    }

    public function testaddField($field)
    {
        parent::addField($field);
    }

    public function clearFields()
    {
        $this->fields = array();
    }
}

/**
 * Test class for DEvent.
 * Generated by Decibel on 2011-10-31 at 14:08:29.
 */
class DEventTest extends DTestCase
{
    /**
     * @covers app\decibel\event\DEvent::__construct
     */
    public function test__construct()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $event = new TestEvent();
        $this->assertInstanceOf(TestEvent::class, $event);
    }

    /**
     * @covers app\decibel\event\DEvent::addField
     */
    public function testaddField()
    {
        $event = new TestEvent();
        $event->clearFields();
        $field = new DTextField('test', 'Test');
        $event->testaddField($field);
        $this->assertSame(
            array(
                'test' => $field,
            ),
            $event->getFields()
        );
    }

    /**
     * @covers app\decibel\event\DEvent::getReflection
     */
    public function testgetReflection()
    {
        $reflection = TestEvent::getReflection();
        $this->assertInstanceOf('app\\decibel\\event\\DEventReflection', $reflection);
        $this->assertSame('tests\\app\\decibel\\event\\TestEvent', $reflection->getName());
    }

    /**
     * @covers app\decibel\event\DEvent::isPropagationStopped
     */
    public function testisPropagationStopped()
    {
        $event = new TestEvent();
        $this->assertFalse($event->isPropagationStopped());
    }

    /**
     * @covers app\decibel\event\DEvent::stopPropagation
     */
    public function teststopPropagation()
    {
        $event = new TestEvent();
        $this->assertFalse($event->isPropagationStopped());
        $this->assertSame($event, $event->stopPropagation());
        $this->assertTrue($event->isPropagationStopped());
    }
}