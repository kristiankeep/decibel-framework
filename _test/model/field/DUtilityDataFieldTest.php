<?php
namespace tests\app\decibel\model\field;

use app\decibel\asset\DColour;
use app\decibel\debug\DInvalidParameterValueException;
use app\decibel\model\field\DField;
use app\decibel\model\field\DIntegerField;
use app\decibel\model\field\DUtilityDataField;
use app\decibel\test\DTestCase;
use app\decibel\utility\DUtilityData;

class TestUtilityData extends DUtilityData
{
    public function define()
    {
        $field = new DIntegerField('test', 'Test');
        $this->addField($field);
    }
}

/**
 * Test class for DUtilityDataField.
 * Generated by Decibel on 2012-04-12 at 09:08:41.
 */
class DUtilityDataFieldTest extends DTestCase
{
    public function setUp()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     */
    public function testCastValueNull()
    {
        $field = new DUtilityDataField('test', 'Test');
        $field->setNullOption('Null');
        $this->assertNull($field->castValue(null));
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     */
    public function testCastValueNullInvalid()
    {
        $field = new DUtilityDataField('test', 'Test');
        $this->assertNull($field->castValue(null));
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     * @expectedException app\decibel\model\debug\DInvalidFieldValueException
     */
    public function testCastValueInvalid()
    {
        $field = new DUtilityDataField('test', 'Test');
        $field->castValue(100);
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     */
    public function testCastValue()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $field = new DUtilityDataField('test', 'Test');
        $utilityData = new TestUtilityData();
        $this->assertSame($utilityData, $field->castValue($utilityData));
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     */
    public function testCastValueArray()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $field = new DUtilityDataField('test', 'Test');
        $field->setLinkTo('app\\decibel\\asset\\DColour');
        $utilityData = $field->castValue(array('red' => 100));
        $this->assertInstanceOf('app\\decibel\\asset\\DColour', $utilityData);
        $this->assertSame(100, $utilityData->getFieldValue('red'));
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     * @expectedException app\decibel\model\debug\DInvalidFieldValueException
     */
    public function testCastValueArrayInvalidLinkTo()
    {
        $field = new DUtilityDataField('test', 'Test');
        $field->castValue(array('red' => 10));
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     * @expectedException app\decibel\model\debug\DInvalidFieldValueException
     */
    public function testcastValue_array_invalidParameter()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $field = new DUtilityDataField('test', 'Test');
        $field->setLinkTo('app\\decibel\\asset\\DColour');
        $field->castValue(array('test' => 'value'));
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::castValue
     * @expectedException app\decibel\model\debug\DInvalidFieldValueException
     */
    public function testCastValueArrayInvalidValue()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $field = new DUtilityDataField('test', 'Test');
        $field->setLinkTo('app\\decibel\\asset\\DColour');
        $field->castValue(array('red' => 'bright'));
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::getDataType
     */
    public function testGetDataType()
    {
        $field = new DUtilityDataField('test', 'Test');
        $this->assertSame(DField::DATA_TYPE_MEDIUMTEXT, $field->getDataType());
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::getInternalDataType
     */
    public function testGetInternalDataType()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $field = new DUtilityDataField('test', 'Test');
        $this->assertSame(DUtilityData::class, $field->getInternalDataType());
        $field->setLinkTo('app\\decibel\\utility\\DResult');
        $this->assertSame('app\\decibel\\utility\\DResult', $field->getInternalDataType());
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::getStandardDefaultValue
     */
    public function testGetStandardDefaultValue()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $field = new DUtilityDataField('test', 'Test');
        $this->assertNull($field->getStandardDefaultValue());
        $field->setLinkTo('app\\decibel\\asset\\DColour');
        $this->assertInstanceOf('app\\decibel\\asset\\DColour', $field->getStandardDefaultValue());
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::isOrderable
     */
    public function testIsOrderable()
    {
        $field = new DUtilityDataField('test', 'Test');
        $this->assertFalse($field->isOrderable());
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::setDefaultOptions
     */
    public function testSetDefaultOptions()
    {
        $field = new DUtilityDataField('test', 'Test');
        $this->assertSame(DUtilityData::class, $field->linkTo);
        $this->assertFalse($field->isExportable());
        $this->assertFalse($field->randomisable);
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::setLinkTo
     */
    public function testSetLinkTo()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $field = new DUtilityDataField('test', 'Test');
        $this->assertSame($field, $field->setLinkTo('app\\decibel\\utility\\DResult'));
        $this->assertSame('app\\decibel\\utility\\DResult', $field->linkTo);
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::setLinkTo
     */
    public function testSetLinkToInvalid()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $this->setExpectedException(DInvalidParameterValueException::class);
        $field = new DUtilityDataField('test', 'Test');
        $field->setLinkTo(10);
    }

    /**
     * @covers app\decibel\model\field\DUtilityDataField::setRandomisable
     */
    public function testSetRandomisable()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $this->setExpectedException(DInvalidParameterValueException::class);
        $field = new DUtilityDataField('test', 'Test');
        $field->setRandomisable(true);
    }
}
