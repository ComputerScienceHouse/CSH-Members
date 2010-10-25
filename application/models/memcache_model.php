<?php

class Memcache_Model extends CI_Model
{
    public $memcache;

    public function  __construct()
    {
        parent::CI_Model();
        $this->memcache = new Memcache();
        $this->memcache->connect('localhost', 11211);
    }

    public function get_user($csh_user)
    {

    }

}
?>
