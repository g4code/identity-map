<?php

namespace G4\IdentityMap;

use G4\IdentityMap\Profiler\Ticker;

class IdentityMap
{
    /**
     * @var array
     */
    private $map;

    /**
     * @var Ticker
     */
    private $profiler;

    /**
     * @var string
     */
    private $uniqueId;


    public function __construct()
    {
        $this->clear();
        $this->profiler = Ticker::getInstance();
    }

    public function clear()
    {
        $this->map = [];
    }

    /**
     * @param null $key
     */
    public function delete($key = null)
    {
        $uniqueId = $this->profiler->start();
        $hit = false;
        if ($key !== null && $this->has($key)) {
            unset($this->map[$key]);
            $hit = true;
        }
        $this->profilerEnd($uniqueId, $key, 'DELETE', $hit);
    }

    /**
     * @param null $key
     * @return mixed
     */
    public function get($key = null)
    {
        $uniqueId   = $this->profiler->start();
        $resource   = null;
        $hit        = false;
        if ($key !== null && $this->has($key)) {
            $resource = $this->map[$key];
            $hit = true;
        }
        $this->profilerEnd($uniqueId, $key, 'GET', $hit);
        return $resource;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->map[$key]);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $uniqueId   = $this->profiler->start();
        $resource   = null;
        $hit        = false;
        if ($key !== null) {
            $this->map[$key] = $value;
            $hit = true;
        }
        $this->profilerEnd($uniqueId, $key, 'SET', $hit);
    }

    private function profilerEnd($uniqueId, $key, $method, $hit)
    {
        $this->profiler
            ->setKey($uniqueId, $key)
            ->setMethod($uniqueId, $method)
            ->setHit($uniqueId, $hit)
            ->end($uniqueId);
    }
}
