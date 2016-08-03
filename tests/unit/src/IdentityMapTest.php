<?php

use G4\IdentityMap\IdentityMap;

class IdentityMapTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var IdentityMap
     */
    private $identityMap;

    protected function setUp()
    {
        $this->identityMap = new IdentityMap();
    }

    protected function tearDown()
    {
        $this->identityMap = null;
    }

    public function testClear()
    {
        $this->identityMap->set('key','value');
        $this->identityMap->clear();
        $this->assertFalse($this->identityMap->has('key'));
    }

    public function testDelete()
    {
        $this->identityMap->set('key','value');
        $this->identityMap->delete('key');
        $this->assertFalse($this->identityMap->has('key'));
    }

    public function testGet()
    {
        $this->assertNull($this->identityMap->get());
        $this->assertNull($this->identityMap->get(123));
        $this->identityMap->set('key', 12345);
        $this->assertEquals(12345, $this->identityMap->get('key'));
    }

    public function testHas()
    {
        $this->assertFalse($this->identityMap->has('key'));
        $this->identityMap->set('key', 12345);
        $this->assertTrue($this->identityMap->has('key'));
    }

    public function testSet()
    {
        $this->identityMap->set('key', 12345);
        $this->assertTrue($this->identityMap->has('key'));
        $this->assertEquals(12345, $this->identityMap->get('key'));
    }
}