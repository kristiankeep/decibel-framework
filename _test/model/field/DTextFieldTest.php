<?php
namespace tests\app\decibel\model\field;

use app\decibel\model\field\DFieldSearch;
use app\decibel\model\field\DStringField;
use app\decibel\model\field\DTextField;
use app\decibel\test\DTestCase;
use app\decibel\validator\DEmailValidator;

/**
 * Test class for DTextField.
 * Generated by Decibel on 2012-04-12 at 09:08:41.
 */
class DTextFieldTest extends DTestCase
{
    /**
     * @covers app\decibel\model\field\DTextField::getInternalDataType
     */
    public function testGetInternalDataType()
    {
        $field = new DTextField('test', 'Test');
        $this->assertSame('string', $field->getInternalDataType());
    }

    /**
     * @covers app\decibel\model\field\DTextField::getStandardDefaultValue
     */
    public function testGetStandardDefaultValue()
    {
        $field = new DTextField('test', 'Test');
        $this->assertSame('', $field->getStandardDefaultValue());
        $field->setNullOption('Null');
        $this->assertNull($field->getStandardDefaultValue());
    }

    /**
     * @covers app\decibel\model\field\DTextField::isEmpty
     */
    public function testIsEmpty()
    {
        $field = new DTextField('test', 'Test');
        $this->assertTrue($field->isEmpty(''));
        $this->assertTrue($field->isEmpty(' '));
        $this->assertTrue($field->isEmpty(' '));
        $this->assertTrue($field->isEmpty("\n"));
        $this->assertTrue($field->isEmpty("\n<p>   </p>	"));
        $this->assertFalse($field->isEmpty('a'));
        $this->assertFalse($field->isEmpty(' a'));
        $this->assertFalse($field->isEmpty('a '));
        $field->setAllowHtml(true);
        $this->assertFalse($field->isEmpty("\n<p>   </p>	"));
    }

    /**
     * @covers app\decibel\model\field\DTextField::isNativeField
     */
    public function testIsNativeField()
    {
        $field = new DTextField('test', 'Test');
        $this->assertTrue($field->isNativeField());
    }

    /**
     * @covers app\decibel\model\field\DTextField::isOrderable
     */
    public function testIsOrderable()
    {
        $field = new DTextField('test', 'Test');
        $this->assertTrue($field->isOrderable());
    }

    /**
     * @covers app\decibel\model\field\DTextField::setAllowHtml
     */
    public function testSetAllowHtml()
    {
        $field = new DTextField('test', 'Test');
        $this->assertSame($field, $field->setAllowHtml(true));
        $this->assertTrue($field->allowHtml);
    }

    /**
     * @covers app\decibel\model\field\DTextField::setAllowHtml
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetAllowHtmlInvalid()
    {
        $field = new DTextField('test', 'Test');
        $field->setAllowHtml(10);
    }

    /**
     * @covers app\decibel\model\field\DTextField::setCharLimit
     */
    public function testSetCharLimit()
    {
        $field = new DTextField('test', 'Test');
        $this->assertSame($field, $field->setCharLimit('abcdefg12345&*()'));
        $this->assertSame('abcdefg12345&*()', $field->charLimit);
    }

    /**
     * @covers app\decibel\model\field\DTextField::setCharLimit
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetCharLimitInvalid()
    {
        $field = new DTextField('test', 'Test');
        $field->setCharLimit(10);
    }

    /**
     * @covers app\decibel\model\field\DTextField::setMaxLength
     */
    public function testSetMaxLength()
    {
        $field = new DTextField('test', 'Test');
        $this->assertSame($field, $field->setMaxLength(500));
        $this->assertSame(500, $field->maxLength);
        $this->assertSame($field, $field->setMaxLength(DStringField::LENGTH_64K + 1));
        $this->assertSame(DStringField::LENGTH_64K + 1, $field->maxLength);
    }

    /**
     * @covers app\decibel\model\field\DTextField::setMaxLength
     * @expectedException app\decibel\debug\DInvalidParameterValueException
     */
    public function testSetMaxLengthInvalid()
    {
        $field = new DTextField('test', 'Test');
        $field->setMaxLength(array(1));
    }

    //	/**
    //	 * @covers app\decibel\model\field\DTextField::setAncestors
    //	 */
    //	public function testSetAncestorsArray() {
    //		$field = new DTextField('test', 'Test');
    //		$field->setAncestors(array(
    //			'app\\decibel\\utility\\DUtilityData',
    //			DField::class,
    //		));
    //		$this->assertSame(array(
    //			'app\\decibel\\utility\\DUtilityData',
    //			DField::class,
    //		), $field->ancestor);
    //	}
    //
    //	/**
    //	 * @covers app\decibel\model\field\DTextField::setAncestors
    //	 * @expectedException app\decibel\debug\DInvalidParameterValueException
    //	 */
    //	public function testSetAncestorsArrayInvalid() {
    //		$field = new DTextField('test', 'Test');
    //		$field->setAncestors(array(
    //			'app\\decibel\\utility\\DUtilityData',
    //			10,
    //		));
    //	}
    //
    //	/**
    //	 * @covers app\decibel\model\field\DTextField::setAncestors
    //	 * @expectedException app\decibel\debug\DInvalidParameterValueException
    //	 */
    //	public function testSetAncestorsArrayInvalidClass() {
    //		$field = new DTextField('test', 'Test');
    //		$field->setAncestors(array(
    //			'app\\decibel\\utility\\DUtilityData',
    //			'app\\decibel\\DInvalidClassName',
    //		));
    //	}
    //
    //	/**
    //	 * @covers app\decibel\model\field\DTextField::setDefaultOptions
    //	 */
    //	public function testSetDefaultOptions() {
    //		$field = new DTextField('test', 'Test');
    //		$this->assertFalse($field->iExportable());
    //		$this->assertFalse($field->randomisable);
    //		$this->assertSame(100, $field->maxLength);
    //	}
    //
    //	/**
    //	 * @covers app\decibel\model\field\DTextField::setMaxLength
    //	 * @expectedException app\decibel\debug\DReadOnlyParameterException
    //	 */
    //	public function testSetMaxLength() {
    //		$field = new DTextField('test', 'Test');
    //		$field->setMaxLength(10);
    //	}
    //
    //	/**
    //	 * @covers app\decibel\model\field\DTextField::setRandomisable
    //	 * @expectedException app\decibel\debug\DReadOnlyParameterException
    //	 */
    //	public function testSetRandomisable() {
    //		$field = new DTextField('test', 'Test');
    //		$field->setRandomisable(true);
    //	}
    //
    //	/**
    //	 * @covers app\decibel\model\field\DTextField::toString
    //	 */
    //	public function testToString() {
    //		$field = new DTextField('test', 'Test');
    //		$this->assertSame('test', $field->toString('test'));
    //		$this->assertSame('10', $field->toString(10));
    //		$this->assertSame('', $field->toString(null));
    //	}
}