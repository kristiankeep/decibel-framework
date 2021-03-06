<?php
namespace tests\app\decibel\model\field;

use app\decibel\model\field\DField;
use app\decibel\model\field\DOneToManyRelationalField;
use app\decibel\test\DTestCase;

class TestOneToManyRelationalField extends DOneToManyRelationalField
{
}

/**
 * Test class for DOneToManyRelationalField.
 * Generated by Decibel on 2012-04-12 at 09:08:41.
 */
class DOneToManyRelationalFieldTest extends DTestCase
{
    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::getDataType
     */
    public function testGetDataType()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $this->assertSame(DField::DATA_TYPE_SPECIAL, $field->getDataType());
    }

    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::isOrderable
     */
    public function testIsOrderable()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $this->assertFalse($field->isOrderable());
    }

    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::setMaxLinks
     */
    public function testSetMaxLinks()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $this->assertSame($field, $field->setMaxLinks(10));
        $this->assertSame(10, $field->maxLinks);
        $this->assertSame($field, $field->setMaxLinks(null));
        $this->assertNull($field->maxLinks);
    }

    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::setMaxLinks
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetMaxLinksInvalid()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $field->setMaxLinks('test');
    }

    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::setMinLinks
     */
    public function testSetMinLinks()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $this->assertSame($field, $field->setMinLinks(10));
        $this->assertSame(10, $field->minLinks);
    }

    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::setMinLinks
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetMinLinksInvalid()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $field->setMinLinks('test');
    }

    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::setOrderable
     */
    public function testSetOrderable()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $this->assertSame($field, $field->setOrderable(true));
        $this->assertTrue($field->orderable);
    }

    /**
     * @covers app\decibel\model\field\DOneToManyRelationalField::setOrderable
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetOrderableInvalid()
    {
        $field = new TestOneToManyRelationalField('test', 'Test');
        $field->setOrderable(10);
    }
}
