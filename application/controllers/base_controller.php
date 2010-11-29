<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Base_Controller extends Controller
{
    public $page;
    public $ldap;
    public $mongo;

    public function  __construct()
    {
        parent::Controller();

        $this->page = new Page_Framework();
        $this->page->load_javascript('https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js');
        $this->load->model('ldap_model');
        //Mongo connection
        $this->mongo = new MongoDB_Inst();
        $this->load->model('user_model');
        //$this->mongo = new Mongo_db();
    }
}
?>