<?php
namespace tests\app\decibel\model\index;

use app\decibel\model\field\DIntegerField;
use app\decibel\model\field\DTextField;
use app\decibel\model\index\DFulltextIndex;
use app\decibel\test\DTestCase;

/**
 * Test class for DFulltextIndex.
 * Generated by Decibel on 2012-04-12 at 09:08:49.
 */
class DFulltextIndexTest extends DTestCase
{
    /**
     * @covers app\decibel\model\index\DFulltextIndex::__construct
     */
    public function test__construct()
    {
        $index = new DFulltextIndex('fulltext', 'Fulltext');
        $this->assertInstanceOf('app\\decibel\\model\\index\\DFulltextIndex', $index);
        $this->assertSame('fulltext', $index->getName());
        $this->assertSame('Fulltext', $index->getDisplayName());
    }

    /**
     * @covers app\decibel\model\index\DFulltextIndex::addField
     */
    public function testaddField()
    {
        $index = new DFulltextIndex('fulltext', 'Fulltext');
        $field = new DTextField('test', 'Test');
        $this->assertSame($index, $index->addField($field));
    }

    /**
     * @covers app\decibel\model\index\DFulltextIndex::addField
     * @expectedException app\decibel\model\index\DInvalidIndexFieldException
     */
    public function testaddField_invalid()
    {
        $index = new DFulltextIndex('fulltext', 'Fulltext');
        $field = new DIntegerField('test', 'Test');
        $index->addField($field);
    }

    /**
     * @covers app\decibel\model\index\DFulltextIndex::getDatabaseIdentifier
     */
    public function testgetDatabaseIdentifier()
    {
        $index = new DFulltextIndex('fulltext', 'Fulltext');
        $this->assertSame('FULLTEXT', $index->getDatabaseIdentifier());
    }
}