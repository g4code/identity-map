<?php

namespace G4\IdentityMap;

class IdentityMap
{
    /**
     * @var array
     */
    private $map;


    public function __construct()
    {
        $this->clear();
    }

    public function clear()
    {
        $this->map = [];
    }

    public function delete($key = null)
    {
        if ($key !== null && $this->has($key)) {
            unset($this->map[$key]);
        }
    }

    public function get($key = null)
    {
        return $key !== null && $this->has($key)
            ? $this->map[$key]
            : null;
    }

    public function has($key)
    {
        return isset($this->map[$key]);
    }

    public function set($key, $value)
    {
        if ($key !== null) {
            $this->map[$key] = $value;
        }
    }
}