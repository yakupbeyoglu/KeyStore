<?php

namespace MultiTypeStore;

interface Store
{
    /*
        Get Value from store
    */
    public function get($key);

    /*
       Set Value to store or set existing values
    */
    public function set($key, $value);

    /*
        Add value and key if key is not exists
    */
    public function add($key, $value);

    /*
        Check key is exists
    */
    public function is_exist($key);

    /*
        Delete key & value from store
    */
    public function delete($key); 

    /*
        Remove all elements on the store
    */
    public function clear();
    /*
        Rename key
    */
    public function rename($key, $new_key);

    /*
        Return type of the value
    */
    public function get_type($key);


}
