<?php

use G4\IdentityMap\Profiler\Ticker;

class TickerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Ticker
     */
    private $ticker;

    protected function setUp()
    {
        $this->ticker = Ticker::getInstance();
    }

    protected function tearDown()
    {
        $this->ticker = null;
    }

    public function testGetDataFormatterInstance()
    {
        $this->assertInstanceOf('\G4\IdentityMap\Profiler\Formatter', $this->ticker->getDataFormatterInstance());
    }

    public function testGetName()
    {
        $this->assertEquals('identity-map', $this->ticker->getName());
    }

    public function testSetMethod()
    {
        $uniqueId       = md5(time());
        $methodValue    = 'get';

        $this->assertInstanceOf(
            '\G4\IdentityMap\Profiler\Ticker',
            $this->tickerMockFactory($uniqueId, 'setMethod', $methodValue)->setMethod($uniqueId, $methodValue)
        );
    }

    public function testSetKey()
    {
        $uniqueId   = md5(time());
        $keyValue   = 'some_key';

        $this->assertInstanceOf(
            '\G4\IdentityMap\Profiler\Ticker',
            $this->tickerMockFactory($uniqueId, 'setKey', $keyValue)->setKey($uniqueId, $keyValue)
        );
    }

    public function testSetHit()
    {
        $uniqueId   = md5(time());
        $hitValue   = true;

        $this->assertInstanceOf(
            '\G4\IdentityMap\Profiler\Ticker',
            $this->tickerMockFactory($uniqueId, 'setHit', $hitValue)->setHit($uniqueId, $hitValue)
        );
    }

    private function tickerMockFactory($uniqueId, $formatterMethodName, $methodValue)
    {
        $formatterMock = $this->getMockBuilder('\G4\IdentityMap\Profiler\Formatter')
            ->disableOriginalConstructor()
            ->setMethods([$formatterMethodName])
            ->getMock();

        $formatterMock
            ->expects($this->once())
            ->method($formatterMethodName)
            ->with($methodValue);

        $tickerMock = $this->getMockBuilder('\G4\IdentityMap\Profiler\Ticker')
            ->disableOriginalConstructor()
            ->setMethods(['getDataPart'])
            ->getMock();

        $tickerMock
            ->expects($this->once())
            ->method('getDataPart')
            ->with($uniqueId)
            ->willReturn($formatterMock);

        return $tickerMock;
    }
}