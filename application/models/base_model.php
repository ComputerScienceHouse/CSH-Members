<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Base_Model extends CI_Model
{
    public $mongo;

    public function  __construct()
    {
        parent::CI_Model();
        $this->mongo = new MongoDB_Inst();
    }
}
?>
