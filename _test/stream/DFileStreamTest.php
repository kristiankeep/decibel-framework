<?php
namespace tests\app\decibel\stream;

use app\decibel\stream\DFileStream;
use app\decibel\stream\DStreamException;
use app\decibel\test\DTestCase;

/**
 * Test class for DFileStream.
 * Generated by Decibel on 2011-10-31 at 14:12:32.
 */
class DFileStreamTest extends DTestCase
{
    /** @var string */
    private $fixtureDir;

    public function setUp()
    {
        $this->fixtureDir = __DIR__ . '/../_fixtures/';
    }

    /**
     * @covers app\decibel\stream\DFileStream::__construct
     * @covers app\decibel\stream\DFileStream::getFilename
     */
    public function test__construct()
    {
        $stream = new DFileStream('myfile');
        $this->assertInstanceOf('app\\decibel\\stream\\DFileStream', $stream);
        $this->assertSame('myfile', $stream->getFilename());
    }

    /**
     * @covers app\decibel\stream\DFileStream::__toString
     */
    public function test__toString()
    {
        $stream = new DFileStream('myfile');
        $this->assertSame('app\\decibel\\stream\\DFileStream (myfile)', (string)$stream);
    }

    /**
     * @covers app\decibel\stream\DFileStream::read
     * @covers app\decibel\stream\DFileStream::getReadHandle
     */
    public function testread()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $stream = new DFileStream($this->fixtureDir . 'csv/test.csv');
        $this->assertSame("1A,1B,1C,1D\r\n2A,2B,2C,2D\r\n3A,3B,3C,3D\r\n4A,4B,4C,4D\r\n5A,5B,5C,5D",
                          $stream->read());
        $this->assertNull($stream->read());
        $this->assertNull($stream->read());
    }

    /**
     * @covers app\decibel\stream\DFileStream::read
     */
    public function testread_length()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $stream = new DFileStream($this->fixtureDir . 'csv/test.csv');

        $this->assertSame("1A,1B,1C,1D\r\n2A,2B,2", $stream->read(20));
        $this->assertSame("C,2D\r\n3A,3B,3C,3D\r\n4", $stream->read(20));
        $this->assertSame("A,4B,4C,4D\r\n5A,5B,5C", $stream->read(20));
        $this->assertSame(",5D\r\n", $stream->read(20));
        $this->assertNull($stream->read(20));
        $this->assertNull($stream->read(20));
    }

    /**
     * @covers app\decibel\stream\DFileStream::readLine
     */
    public function testreadLine()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $stream = new DFileStream($this->fixtureDir . 'csv/test.csv');
        $this->assertSame("1A,1B,1C,1D\r\n", $stream->readLine());
        $this->assertSame("2A,2B,2C,2D\r\n", $stream->readLine());
        $this->assertSame("3A,3B,3C,3D\r\n", $stream->readLine());
        $this->assertSame("4A,4B,4C,4D\r\n", $stream->readLine());
        $this->assertSame("5A,5B,5C,5D\r\n", $stream->readLine());
        $this->assertNull($stream->readLine());
        $this->assertNull($stream->readLine());
    }

    /**
     * @covers app\decibel\stream\DFileStream::readCsvLine
     */
    public function testreadCsvLine()
    {
        $stream = new DFileStream($this->fixtureDir . 'csv/test.csv');
        $this->assertSame(array('1A', '1B', '1C', '1D'), $stream->readCsvLine());
        $this->assertSame(array('2A', '2B', '2C', '2D'), $stream->readCsvLine());
        $this->assertSame(array('3A', '3B', '3C', '3D'), $stream->readCsvLine());
        $this->assertSame(array('4A', '4B', '4C', '4D'), $stream->readCsvLine());
        $this->assertSame(array('5A', '5B', '5C', '5D'), $stream->readCsvLine());
        $this->assertNull($stream->readCsvLine());
        $this->assertNull($stream->readCsvLine());
    }

    /**
     * @covers app\decibel\stream\DFileStream::readCsvLine
     */
    public function testreadCsvLine_delimiter()
    {
        $stream = new DFileStream($this->fixtureDir . 'csv/delimiter.csv');
        $this->assertSame(array('1A', '1B', '1C', '1D'), $stream->readCsvLine(';'));
        $this->assertSame(array('2A', '2B', '2C', '2D'), $stream->readCsvLine(';'));
        $this->assertSame(array('3A', '3B', '3C', '3D'), $stream->readCsvLine(';'));
        $this->assertSame(array('4A', '4B', '4C', '4D'), $stream->readCsvLine(';'));
        $this->assertSame(array('5A', '5B', '5C', '5D'), $stream->readCsvLine(';'));
        $this->assertNull($stream->readCsvLine(';'));
        $this->assertNull($stream->readCsvLine(';'));
    }

    /**
     * @covers app\decibel\stream\DFileStream::readCsvLine
     */
    public function testreadCsvLine_enclosure()
    {
        $stream = new DFileStream($this->fixtureDir . 'csv/enclosure.csv');
        $this->assertSame(array('1A', '#1B#', '1C', '1D'), $stream->readCsvLine(',', '#'));
        $this->assertSame(array('2A', '#2B#', '2C', '2D'), $stream->readCsvLine(',', '#'));
        $this->assertSame(array('3A', '#3B#', '3C', '3D'), $stream->readCsvLine(',', '#'));
        $this->assertSame(array('4A', '#4B#', '4C', '4D'), $stream->readCsvLine(',', '#'));
        $this->assertSame(array('5A', '#5B#', '5C', '5D'), $stream->readCsvLine(',', '#'));
        $this->assertNull($stream->readCsvLine(',', '#'));
        $this->assertNull($stream->readCsvLine(',', '#'));
    }

    /**
     * @covers app\decibel\stream\DFileStream::readCsvLine
     */
    public function testreadCsvLine_blankLine()
    {
        $stream = new DFileStream($this->fixtureDir . 'csv/blankline.csv');
        $this->assertSame(array('1A', '1B', '1C', '1D'), $stream->readCsvLine());
        $this->assertSame(array('2A', '2B', '2C', '2D'), $stream->readCsvLine());
        $this->assertSame(array('3A', '3B', '3C', '3D'), $stream->readCsvLine());
        $this->assertSame(array('4A', '4B', '4C', '4D'), $stream->readCsvLine());
        $this->assertSame(array('5A', '5B', '5C', '5D'), $stream->readCsvLine());
        $this->assertNull($stream->readCsvLine());
        $this->assertNull($stream->readCsvLine());
    }

    /**
     * @covers app\decibel\stream\DFileStream::removeBom
     */
    public function testremoveBom()
    {
        $bomUtf8 = "\xef\xbb\xbftest";
        $bomUtf16be = "\xfe\xfftest";
        $bomUtf16le = "\xff\xfetest";
        $bomUtf32be = "\x00\x00\xfe\xfftest";
        $bomUtf32le = "\xff\xfe\x00\x00test";
        $noBom = 'test';
        $invalidBom = "\xeftest";
        $this->assertSame('test', DFileStream::removeBom($bomUtf8));
        $this->assertSame('test', DFileStream::removeBom($bomUtf16be));
        $this->assertSame('test', DFileStream::removeBom($bomUtf16le));
        $this->assertSame('test', DFileStream::removeBom($bomUtf32be));
        $this->assertSame('test', DFileStream::removeBom($bomUtf32le));
        $this->assertSame('test', DFileStream::removeBom($noBom));
        $this->assertSame($invalidBom, DFileStream::removeBom($invalidBom));
    }
}
