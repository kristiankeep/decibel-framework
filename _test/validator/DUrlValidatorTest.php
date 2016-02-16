<?php
namespace tests\decibel\validator;

use app\decibel\test\DTestCase;
use app\decibel\validator\DUrlValidator;

/**
 * Test class for DUrlValidator.
 * Generated by Decibel on 2011-10-31 at 14:14:17.
 */
class DUrlValidatorTest extends DTestCase
{
    /**
     * @covers app\decibel\validator\DUrlValidator::setAllowFolders
     */
    public function testSetAllowFolders()
    {
        $validator = new DUrlValidator();
        $validator->setAllowFolders(false);
        $this->assertFalse($validator->getAllowFolders());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getAllowFolders
     */
    public function testGetAllowFolders()
    {
        $validator = new DUrlValidator();
        $this->assertTrue($validator->getAllowFolders());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::setAllowFile
     */
    public function testSetAllowFile()
    {
        $validator = new DUrlValidator();
        $validator->setAllowFile(false);
        $this->assertFalse($validator->getAllowFile());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getAllowFile
     */
    public function testGetAllowFile()
    {
        $validator = new DUrlValidator();
        $this->assertTrue($validator->getAllowFile());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::setAllowTrailingSlash
     */
    public function testSetAllowTrailingSlash()
    {
        $validator = new DUrlValidator();
        $validator->setAllowTrailingSlash(false);
        $this->assertFalse($validator->getAllowTrailingSlash());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getAllowTrailingSlash
     */
    public function testGetAllowTrailingSlash()
    {
        $validator = new DUrlValidator();
        $this->assertTrue($validator->getAllowTrailingSlash());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::setAllowQueryString
     */
    public function testSetAllowQueryString()
    {
        $validator = new DUrlValidator();
        $validator->setAllowQueryString(true);
        $this->assertTrue($validator->getAllowQueryString());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getAllowQueryString
     */
    public function testGetAllowQueryString()
    {
        $validator = new DUrlValidator();
        $this->assertFalse($validator->getAllowQueryString());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::setAllowBookmark
     */
    public function testSetAllowBookmark()
    {
        $validator = new DUrlValidator();
        $validator->setAllowBookmark(true);
        $this->assertTrue($validator->getAllowBookmark());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getAllowBookmark
     */
    public function testGetAllowBookmark()
    {
        $validator = new DUrlValidator();
        $this->assertFalse($validator->getAllowBookmark());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::setAllowedProtocols
     */
    public function testSetAllowedProtocols()
    {
        $validator = new DUrlValidator();
        $this->assertSame(2, count($validator->getAllowedProtocols()));
        $validator->setAllowedProtocols(array());
        $this->assertSame(0, count($validator->getAllowedProtocols()));
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getAllowedProtocols
     */
    public function testGetAllowedProtocols()
    {
        $validator = new DUrlValidator();
        $this->assertSame(2, count($validator->getAllowedProtocols()));
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::setRequireProtocol
     */
    public function testSetRequireProtocol()
    {
        $validator = new DUrlValidator();
        $validator->setRequireProtocol(false);
        $this->assertFalse($validator->getRequireProtocol());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getRequireProtocol
     */
    public function testGetRequireProtocol()
    {
        $validator = new DUrlValidator();
        $this->assertTrue($validator->getRequireProtocol());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::getRequireTrailingSlash
     */
    public function testGetRequireTrailingSlash()
    {
        $validator = new DUrlValidator();
        $this->assertFalse($validator->getRequireTrailingSlash());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::setRequireTrailingSlash
     */
    public function testSetRequireTrailingSlash()
    {
        $validator = new DUrlValidator();
        $validator->setRequireTrailingSlash(true);
        $this->assertTrue($validator->getRequireTrailingSlash());
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::validate
     */
    public function testValidate_default()
    {
        $validator = new DUrlValidator();
        $this->assertSame(array(), $validator->validate(''));
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::validate
     */
    public function testTrailingSlashInvalid()
    {
        $validator = new DUrlValidator();
        $validator->setAllowTrailingSlash(false);
        $validator->setRequireProtocol(false);
        // $this->assertCount(1, $validator->validate('www.test.com/test/'));
        // $this->assertCount(0, $validator->validate('www.test.com/test'));
    }

    /**
     * @covers app\decibel\validator\DUrlValidator::validate
     */
    public function testValidateProtocol()
    {
        $validator = new DUrlValidator();
        // $this->assertCount(0, $validator->validate('http://www.test.com/test/'));
        // $this->assertCount(1, $validator->validate('www.test.com/test'));
    }
}