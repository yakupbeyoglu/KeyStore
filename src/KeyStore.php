<?php

namespace MultiTypeStore;

use Exception;

class KeyStore implements Store
{
    public function __construct()
    {
        $this->store = array();
    }

    public function get($key)
    {
        if (!$this->is_exist($key))
            throw new Exception($key . " is not exist !");

        return $this->store[$key];
    }

    public function set($key, $value)
    {
        $this->store[$key] = $value;
    }

    public function add($key, $value)
    {
        if ($this->is_exist($key))
            return false;
        $this->store[$key] = $value;
        return true;
    }

    public function is_exist($key)
    {
        return array_key_exists($key, $this->store);
    }

    public function delete($key)
    {
        if (!$this->is_exist($key))
            throw new Exception($key . " is not exist !");
        unset($this->store[$key]);
    }

    public function clear()
    {
        unset($this->store);
        $this->store = array();
    }

    public function rename($key, $new_name)
    {
        if (!$this->is_exist($key))
            throw new Exception($key . " is not exist !");
        if ($this->is_exist($new_name))
            throw new Exception($new_name . " is already exist !");
        $this->store[$new_name] = $this->store[$key];
        unset($this->store[$key]);
    }

    public function get_type($key)
    {
        if (!$this->is_exist($key))
            throw new Exception($key . " is not exist !");
        return gettype($this->store[$key]);
    }

    private $store = array();
}
