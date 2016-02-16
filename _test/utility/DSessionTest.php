<?php
namespace tests\app\decibel\utility;

use app\decibel\authorise\DGuestUser;
use app\decibel\debug\DInvalidPropertyException;
use app\decibel\test\DTestCase;
use app\decibel\utility\DInvalidSessionDataException;
use app\decibel\utility\DSession;

/**
 * Test class for DSession.
 * Generated by Decibel on 2011-10-31 at 14:13:30.
 */
class DSessionTest extends DTestCase
{
    /**
     * @covers app\decibel\utility\DSession::get
     */
    public function testget()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $pointer1 =& $session->get('test1');
        $pointer2 =& $session->get('test1');
        $this->assertSame($pointer1, $pointer2);
        $pointer1 = 'value1';
        $this->assertSame($pointer1, $pointer2);
        unset($session['test1']);
    }

    /**
     * @covers app\decibel\utility\DSession::get
     * @covers app\decibel\utility\DSession::getDataLocation
     */
    public function testget_default()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $pointer1 =& $session->get('test1', 'value1');
        $pointer2 =& $session->get('test1');
        $this->assertSame('value1', $pointer1);
        $this->assertSame('value1', $pointer2);
        $this->assertSame($pointer1, $pointer2);
        unset($session['test1']);
    }

    /**
     * @covers app\decibel\utility\DSession::get
     * @expectedException app\decibel\utility\DInvalidSessionDataException
     */
    public function testget_defaultInvalid()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $guest = DGuestUser::create();
        $session->get('test1', $guest);
    }

    /**
     * @covers app\decibel\utility\DSession::set
     */
    public function testset()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $this->assertNull($session->get('test1'));
        $session->set('test1', 'value1');
        $this->assertSame('value1', $session->get('test1'));
        unset($session['test1']);
    }

    /**
     * @covers app\decibel\utility\DSession::set
     */
    public function testset_invalid()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $this->setExpectedException(DInvalidSessionDataException::class);
        $session = DSession::load();
        $guest = DGuestUser::create();
        $session->set('test1', $guest);
    }

    //	/**
    //	 * @covers app\decibel\utility\DSession::getId
    //	 */
    //	public function testgetId() {
    //		$session = DSession::load();
    //		debug($session->getId());
    //	}
    //
    //	/**
    //	 * @covers app\decibel\utility\DSession::getName
    //	 */
    //	public function testgetName() {
    //		$session = DSession::load();
    //		debug($session->getName());
    //	}
    /**
     * @covers app\decibel\utility\DSession::offsetGet
     * @covers app\decibel\utility\DSession::getDataLocation
     */
    public function testoffsetGet()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $session['test1'] = 'value1';
        $this->assertSame('value1', $session['test1']);
        $session['test2-part1'] = 'value2-1';
        $session['test2-part2'] = 'value2-2';
        $this->assertSame('value2-1', $session['test2-part1']);
        $this->assertSame('value2-2', $session['test2-part2']);
    }

    /**
     * @covers app\decibel\utility\DSession::offsetSet
     * @covers app\decibel\utility\DSession::getDataLocation
     */
    public function testoffsetSet()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $session['test1'] = 'value1';
        $this->assertSame('value1', $session['test1']);
        $session['test2-part1'] = 'value2-1';
        $session['test2-part2'] = 'value2-2';
        $this->assertSame('value2-1', $session['test2-part1']);
        $this->assertSame('value2-2', $session['test2-part2']);
        unset($session['test1']);
        unset($session['test2']);
    }

    /**
     * @covers app\decibel\utility\DSession::offsetExists
     * @covers app\decibel\utility\DSession::getDataLocation
     */
    public function testoffsetExists()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $session['test1'] = 'value1';
        $this->assertTrue(isset($session['test1']));
        $this->assertFalse(isset($session['test2']));
        $session['test2-part1'] = 'value2-1';
        $session['test2-part2'] = 'value2-2';
        $this->assertTrue(isset($session['test2-part1']));
        $this->assertTrue(isset($session['test2-part2']));
        $this->assertFalse(isset($session['test3-part1']));
        $this->assertFalse(isset($session['test2-part3']));
        unset($session['test1']);
        unset($session['test2']);
    }

    /**
     * @covers app\decibel\utility\DSession::offsetUnset
     * @covers app\decibel\utility\DSession::getDataLocation
     */
    public function testoffsetUnset()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $session['test1'] = 'value1';
        $this->assertTrue(isset($session['test1']));
        unset($session['test1']);
        $this->assertFalse(isset($session['test1']));
        $session['test2-part1'] = 'value2-1';
        $session['test2-part2'] = 'value2-2';
        $this->assertTrue(isset($session['test2']));
        $this->assertTrue(isset($session['test2-part1']));
        $this->assertTrue(isset($session['test2-part2']));
        unset($session['test2-part1']);
        unset($session['test2-part2']);
        $this->assertTrue(isset($session['test2']));
        $this->assertFalse(isset($session['test2-part1']));
        $this->assertFalse(isset($session['test2-part2']));
        $session['test3-part1'] = 'value3-1';
        $session['test3-part2'] = 'value3-2';
        $this->assertTrue(isset($session['test3']));
        $this->assertTrue(isset($session['test3-part1']));
        $this->assertTrue(isset($session['test3-part2']));
        unset($session['test3']);
        $this->assertFalse(isset($session['test3']));
        $this->assertFalse(isset($session['test3-part1']));
        $this->assertFalse(isset($session['test3-part2']));
    }

    /**
     * @covers app\decibel\utility\DSession::validateSessionData
     */
    public function testvalidateSessionData_valid()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $session->set('test1', 'test');
        $session->set('test1', 100);
        $session->set('test1', true);
        $session->set('test1', null);
        $session->set('test1', array(1, 2, 3));
    }

    /**
     * @covers app\decibel\utility\DSession::validateSessionData
     * @expectedException app\decibel\utility\DInvalidSessionDataException
     */
    public function testvalidateSessionData_invalidObject()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $session = DSession::load();
        $guest = DGuestUser::create();
        $session->set('test1', $guest);
    }

    /**
     * @covers app\decibel\utility\DSession::validateSessionData
     * @expectedException app\decibel\utility\DInvalidSessionDataException
     */
    public function testvalidateSessionData_invalidResource()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $fixture = $this->getFixturePath('txt', 'hello-world.txt');
        $resource = fopen($fixture, 'r');
        $session = DSession::load();
        try {
            $session->set('test1', $resource);
        } catch (Exception $e) {
            fclose($resource);
            throw $e;
        }
    }
}