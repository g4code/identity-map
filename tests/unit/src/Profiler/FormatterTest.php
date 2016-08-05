<?php

use G4\IdentityMap\Profiler\Formatter;

class FormatterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Formatter
     */
    private $formatter;

    protected function setUp()
    {
        $timerMock = $this->getMockBuilder('\G4\Profiler\Ticker\Timer')
            ->disableOriginalConstructor()
            ->setMethods(['getElapsed'])
            ->getMock();

        $timerMock
            ->expects($this->once())
            ->method('getElapsed')
            ->willReturn(123);

        $this->formatter = $this->getMockBuilder('\G4\IdentityMap\Profiler\Formatter')
            ->disableOriginalConstructor()
            ->setMethods(['getFormattedTime', 'getTimer'])
            ->getMock();

        $this->formatter
            ->expects($this->once())
            ->method('getFormattedTime')
            ->willReturn(123);

        $this->formatter
            ->expects($this->once())
            ->method('getTimer')
            ->willReturn($timerMock);
    }

    protected function tearDown()
    {
        $this->formatter = null;
    }

    public function testGetFormatted()
    {
        $this->formatter
            ->setMethod('get')
            ->setHit(true)
            ->setKey('some_key');

        $this->assertEquals([
                'elapsed_time'  => 123,
                'hit'           => true,
                'method'        => 'get',
                'key'           => 'some_key',
            ], $this->formatter->getFormatted());
    }
}