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

    /**
     * @param null $key
     */
    public function delete($key = null)
    {
        if ($key !== null && $this->has($key)) {
            unset($this->map[$key]);
        }
    }

    /**
     * @param null $key
     * @return mixed
     */
    public function get($key = null)
    {
        return $key !== null && $this->has($key)
            ? $this->map[$key]
            : null;
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
        if ($key !== null) {
            $this->map[$key] = $value;
        }
    }
}