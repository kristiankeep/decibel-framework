<?php
namespace tests\app\decibel\cache;

use app\decibel\authorise\DGuestUser;
use app\decibel\authorise\DRootUser;
use app\decibel\authorise\DUser;
use app\decibel\authorise\DUserCapabilityCode;
use app\decibel\cache\DModelSearchCache;
use app\decibel\model\DModel;
use app\decibel\model\DTranslatableModel;
use app\decibel\model\permission\DPermissionTemplate;
use app\decibel\test\DTestCase;

/**
 * Test class for DModelSearchCache.
 * Generated by Decibel on 2011-10-31 at 14:07:14.
 */
class DModelSearchCacheTest extends DTestCase
{
    /** @var DModelSearchCache */
    private $cache;

    public function setUp()
    {
        $this->cache = DModelSearchCache::load();
    }

    /**
     * @covers app\decibel\cache\DModelSearchCache::load
     */
    public function testCacheLoadSuccessful()
    {
        $this->assertInstanceOf(DModelSearchCache::class, $this->cache);
    }

    /**
     * @covers app\decibel\cache\DModelSearchCache::set
     * @covers app\decibel\cache\DModelSearchCache::buildCacheKey
     */
    public function testSetCacheValue()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $result = $this->cache->set(DUser::class, 'criteria', 1);
        $this->assertTrue($result);
    }

    /**
     * @covers app\decibel\cache\DModelSearchCache::retrieve
     * @covers app\decibel\cache\DModelSearchCache::set
     */
    public function testRetrieveCacheValue()
    {
        $valueToStore = [ 'a', 'b' ];
        $qualifiedName = DUser::class;

        $cache = DModelSearchCache::load();
        $cache->set(DUser::class, 'criteriaHash', $valueToStore);

        $this->assertSame($valueToStore,
                          $cache->retrieve($qualifiedName, 'criteriaHash'));
    }

    /**
     * @covers app\decibel\cache\DModelSearchCache::clearCapabilities
     * @covers app\decibel\cache\DModelSearchCache::retrieve
     * @covers app\decibel\cache\DModelSearchCache::set
     */
    public function testclearCapabilities()
    {

        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $cache = DModelSearchCache::load();
        $guest = DGuestUser::create();
        $root = DRootUser::create();
        // Set up two values to cache. One is not permissible, so won't be
        // affected by a call to clearCapabilities, the other is.
        $qualifiedName1 = DUser::class;
        $qualifiedName2 = DPermissionTemplate::class;
        $criteriaHash1 = 'criteriaHash1';
        $criteriaHash2 = 'criteriaHash2';
        $output1 = array('a', 'b');
        $output2 = array('a', 'b', 'c');
        $this->assertTrue($cache->set($qualifiedName1, $criteriaHash1, $output1));
        $this->assertTrue($cache->set($qualifiedName2, $criteriaHash2, $output2));
        $this->assertSame($output1, $cache->retrieve($qualifiedName1, $criteriaHash1));
        $this->assertSame($output2, $cache->retrieve($qualifiedName2, $criteriaHash2));
        // We are logged in as root, so clearing the root capability code
        // shouldn't remove these two items.
        $guestCapabilityCode = DUserCapabilityCode::adapt($guest);
        $cache->clearCapabilities(array($guestCapabilityCode->getCapabilityCode()));
        $this->assertSame($output1, $cache->retrieve($qualifiedName1, $criteriaHash1));
        $this->assertSame($output2, $cache->retrieve($qualifiedName2, $criteriaHash2));
        // But this should clear the second cached value.
        $rootCapabilityCode = DUserCapabilityCode::adapt($root);
        $cache->clearCapabilities(array($rootCapabilityCode->getCapabilityCode()));
        $this->assertSame($output1, $cache->retrieve($qualifiedName1, $criteriaHash1));
        $this->assertNull($cache->retrieve($qualifiedName2, $criteriaHash2));
    }

    /**
     * @covers app\decibel\cache\DModelSearchCache::clearQualifiedName
     * @covers app\decibel\cache\DModelSearchCache::retrieve
     * @covers app\decibel\cache\DModelSearchCache::set
     */
    public function testclearQualifiedName()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $cache = DModelSearchCache::load();
        // We'll cache something for a child, it's parent
        // and it's grandparent to test the recursiveness
        $qualifiedName1 = DPermissionTemplate::class;
        $qualifiedName2 = DTranslatableModel::class;
        $qualifiedName3 = DModel::class;
        $criteriaHash1 = 'criteriaHash1';
        $criteriaHash2 = 'criteriaHash2';
        $criteriaHash3 = 'criteriaHash3';
        $output1 = array('a', 'b');
        $output2 = array('a', 'b', 'c');
        $output3 = array('a', 'b', 'c', 'd');
        $this->assertTrue($cache->set($qualifiedName1, $criteriaHash1, $output1));
        $this->assertTrue($cache->set($qualifiedName2, $criteriaHash2, $output2));
        $this->assertTrue($cache->set($qualifiedName3, $criteriaHash3, $output3));
        $this->assertSame($output1, $cache->retrieve($qualifiedName1, $criteriaHash1));
        $this->assertSame($output2, $cache->retrieve($qualifiedName2, $criteriaHash2));
        $this->assertSame($output3, $cache->retrieve($qualifiedName3, $criteriaHash3));
        // We should be able to clear all three by clearing the child class.
        $this->assertTrue($cache->clearQualifiedName($qualifiedName1));
        $this->assertNull($cache->retrieve($qualifiedName1, $criteriaHash1));
        $this->assertNull($cache->retrieve($qualifiedName2, $criteriaHash2));
        $this->assertNull($cache->retrieve($qualifiedName3, $criteriaHash3));
        // Shouldn't be able to clear these again...
        $this->assertFalse($cache->clearQualifiedName($qualifiedName1));
        $this->assertFalse($cache->clearQualifiedName($qualifiedName2));
        $this->assertFalse($cache->clearQualifiedName($qualifiedName3));
    }

    /**
     * @covers app\decibel\cache\DModelSearchCache::set
     */
    public function testset_expiry()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        //		$cache = DModelSearchCache::load();
        //		$qualifiedName = DPermissionTemplate::class;
        //		$criteriaHash = 'criteriaHash';
        //		$output = array('a', 'b');
        //		$this->assertTrue($cache->set($qualifiedName, $criteriaHash, $output, time() + 1));
        //		$this->assertSame($output, $cache->retrieve($qualifiedName, $criteriaHash));
        //		sleep(2);
        //		$this->assertNull($cache->retrieve($qualifiedName, $criteriaHash));
    }
}
