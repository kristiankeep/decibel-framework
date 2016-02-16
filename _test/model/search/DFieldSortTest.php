<?php
namespace tests\app\decibel\model\search;

use app\decibel\model\field\DLinkedObjectsField;
use app\decibel\model\field\DTextField;
use app\decibel\model\search\DFieldSort;
use app\decibel\test\DTestCase;

/**
 * Test class for DFieldSort.
 * Generated by Decibel on 2012-04-12 at 09:08:49.
 */
class DFieldSortTest extends DTestCase
{
    /**
     * @covers app\decibel\model\search\DFieldSort::__construct
     * @covers app\decibel\model\search\DFieldSort::getField
     */
    public function test__construct()
    {
        $field = new DTextField('test', 'Test');
        $sort = new DFieldSort($field);
        $this->assertInstanceOf('app\\decibel\\model\\search\\DFieldSort', $sort);
        $this->assertSame($field, $sort->getField());
    }

    /**
     * @covers app\decibel\model\search\DFieldSort::__construct
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function test__construct_invalidField()
    {
        $field = new DLinkedObjectsField('test', 'Test');
        new DFieldSort($field);
    }
}