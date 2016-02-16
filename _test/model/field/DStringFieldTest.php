<?php
namespace tests\app\decibel\model\field;

use app\decibel\database\schema\DColumnDefinition;
use app\decibel\model\field\DField;
use app\decibel\model\field\DStringField;
use app\decibel\test\DTestCase;

class TestStringField extends DStringField
{
    public function toString($data)
    {
        return (string)$data;
    }
}

/**
 * Test class for DStringField.
 * Generated by Decibel on 2012-04-12 at 09:08:41.
 */
class DStringFieldTest extends DTestCase
{
    public function setUp()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers app\decibel\model\field\DStringField::castValue
     */
    public function testCastValueNull()
    {
        $field = new TestStringField('test', 'Test');
        $field->setNullOption('Null');
        $this->assertNull($field->castValue(null));
    }

    /**
     * @covers app\decibel\model\field\DStringField::castValue
     */
    public function testCastValueNullInvalid()
    {
        $field = new TestStringField('test', 'Test');
        $this->assertNull($field->castValue(null));
    }

    /**
     * @covers app\decibel\model\field\DStringField::castValue
     * @expectedException app\decibel\model\debug\DInvalidFieldValueException
     */
    public function testCastValueInvalid()
    {
        $field = new TestStringField('test', 'Test');
        $field->castValue(100);
    }

    /**
     * @covers app\decibel\model\field\DStringField::castValue
     */
    public function testCastValue()
    {
        $field = new TestStringField('test', 'Test');
        $this->assertSame('test', $field->castValue('test'));
    }

    /**
     * @covers app\decibel\model\field\DStringField::getDataType
     */
    public function testGetDataType()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $field = new TestStringField('test', 'Test');
        $this->assertSame(DField::DATA_TYPE_TEXT, $field->getDataType());
        $field->setMaxLength(DStringField::LENGTH_64K + 1);
        $this->assertSame(DField::DATA_TYPE_MEDIUMTEXT, $field->getDataType());
        $field->setMaxLength(DStringField::LENGTH_256B + 1);
        $this->assertSame(DField::DATA_TYPE_TEXT, $field->getDataType());
        $field->setMaxLength(DStringField::LENGTH_256B);
        $this->assertSame(DField::DATA_TYPE_VARCHAR, $field->getDataType());
    }

    /**
     * @covers app\decibel\model\field\DStringField::getDefinition
     */
    public function testGetDefinition()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $field = new TestStringField('test', 'Test');
        $field->setMaxLength(100);
        $definition = $field->getDefinition();
        $this->assertInstanceOf(DColumnDefinition::class, $definition);
        $this->assertSame(100, $definition->size);
    }

    /**
     * @covers app\decibel\model\field\DStringField::getDefinition
     */
    public function testGetDefinitionNoSize()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $field = new TestStringField('test', 'Test');
        $definition = $field->getDefinition();
        $this->assertInstanceOf(DColumnDefinition::class, $definition);
        $this->assertNull($definition->size);
    }

    /**
     * @covers app\decibel\model\field\DStringField::getInternalDataType
     */
    public function testGetInternalDataType()
    {
        $field = new TestStringField('test', 'Test');
        $this->assertSame('string', $field->getInternalDataType());
    }

    /**
     * @covers app\decibel\model\field\DStringField::getMaxLength
     */
    public function testGetMaxLength()
    {
        $field = new TestStringField('test', 'Test');
        $field->setMaxLength(100);
        $this->assertSame(100, $field->getMaxLength());
    }

    /**
     * @covers app\decibel\model\field\DStringField::getStandardDefaultValue
     */
    public function testGetStandardDefaultValue()
    {
        $field = new TestStringField('test', 'Test');
        $this->assertSame('', $field->getDefaultValue());
    }

    /**
     * @covers app\decibel\model\field\DStringField::getStandardDefaultValue
     */
    public function testGetStandardDefaultValueNull()
    {
        $field = new TestStringField('test', 'Test');
        $field->setNullOption('Null');
        $this->assertNull($field->getDefaultValue());
    }

    /**
     * @covers app\decibel\model\field\DStringField::setDefaultOptions
     */
    public function testSetDefaultOptions()
    {
        $field = new TestStringField('test', 'Test');
        $this->assertSame(DStringField::LENGTH_64K, $field->getMaxLength());
    }

    /**
     * @covers app\decibel\model\field\DStringField::setMaxLength
     */
    public function testSetSize()
    {
        $field = new TestStringField('test', 'Test');
        $this->assertSame($field, $field->setMaxLength(100));
        $this->assertSame(100, $field->getMaxLength());
    }

    /**
     * @covers app\decibel\model\field\DStringField::setMaxLength
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetSizeInvalid()
    {
        $field = new TestStringField('test', 'Test');
        $field->setMaxLength('test');
    }

    /**
     * @covers app\decibel\model\field\DStringField::setMaxLength
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetSizeTooSmall()
    {
        $field = new TestStringField('test', 'Test');
        $field->setMaxLength(0);
    }

    /**
     * @covers app\decibel\model\field\DStringField::setMaxLength
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetSizeTooBig()
    {
        $field = new TestStringField('test', 'Test');
        $field->setMaxLength(DStringField::LENGTH_16M + 1);
    }
}