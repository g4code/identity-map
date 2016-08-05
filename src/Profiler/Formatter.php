<?php

namespace G4\IdentityMap\Profiler;

class Formatter extends \G4\Profiler\Ticker\Formatter
{

    /**
     * @var string
     */
    private $hit;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $method;


    /**
     * @return array
     */
    public function getFormatted()
    {
        return parent::getFormatted()
        + [
            'key'    => $this->key,
            'method' => $this->method,
            'hit'    => $this->hit,
        ];
    }

    /**
     * @param bool $hit
     * @return $this
     */
    public function setHit($hit)
    {
        $this->hit = $hit;
        return $this;
    }

    /**
     * @param string $key
     * @return \G4\IdentityMap\Profiler\Formatter
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @param string $method
     * @return \G4\IdentityMap\Profiler\Formatter
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
}