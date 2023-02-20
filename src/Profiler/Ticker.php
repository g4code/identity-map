<?php

namespace G4\IdentityMap\Profiler;

class Ticker extends \G4\Profiler\Ticker\TickerAbstract
{

    const NAME = 'identity-map';
    const TYPE = 'idmap';

    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }


    /**
     * @return \G4\Gateway\Profiler\Ticker
     */
    final public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * @return Formatter
     */
    public function getDataFormatterInstance()
    {
        return new Formatter();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    public function getType()
    {
        return self::TYPE;
    }

    /**
     * @param string $uniqueId
     * @param bool $hit
     * @return \G4\IdentityMap\Profiler\Ticker
     */
    public function setHit($uniqueId, $hit)
    {
        $this->getDataPart($uniqueId)->setHit($hit);
        return self::$instance;
    }

    /**
     * @param string $uniqueId
     * @param string $key
     * @return \G4\IdentityMap\Profiler\Ticker
     */
    public function setKey($uniqueId, $key)
    {
        $this->getDataPart($uniqueId)->setKey($key);
        return self::$instance;
    }

    /**
     * @param string $uniqueId
     * @param string $method
     * @return \G4\IdentityMap\Profiler\Ticker
     */
    public function setMethod($uniqueId, $method)
    {
        $this->getDataPart($uniqueId)->setMethod($method);
        return self::$instance;
    }
}
