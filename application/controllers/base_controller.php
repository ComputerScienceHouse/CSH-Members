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

    public $unwanted_fields;
    public $field_order;
    public $non_edit_fields;

    public function  __construct()
    {
        parent::Controller();
        //Util::printr($GLOBALS);
        $this->page = new Page_Framework();
        $this->page->load_javascript('https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js');
        $this->load->model('ldap_model');
        //Mongo connection
        $this->mongo = new MongoDB_Inst();
        $this->load->model('user_model');
        //$this->mongo = new Mongo_db();

        $this->unwanted_fields = array('_id', 'objectclass', 'uidnumber', 'gidnumber', 'ou',
                                         'givenname', 'sn', 'gecos', 'description', 'displayname',
                                         'diskquotasoft', 'diskquotahard', 'ibutton', 'ritdn', 'drinkbalance');

        $this->field_order = array('cn' => 'Common Name', 'birthday' => 'Birthday', 'mail' => 'Email', 'blogurl' => 'Blog URL',
                                     'cellphone' => 'Cellphone', 'homephone' => 'Home Phone', 'aolscreenname' => 'AOL Screen Name',
                                     'twittername' => 'Twitter', 'loginshell' => 'Login Shell', 'nickname' => 'Nickname(s)',
                                     'active' => 'Active Member', 'onfloor' => 'On Floor', 'roomnumber' => 'Room #',
                                     'alumni' => 'Alumni', 'drinkadmin' => 'Drink Admin', 'address' => 'Address');

        $this->non_edit_fields = array('loginshell', 'active', 'onfloor', 'alumni', 'drinkadmin');


    }
}
?>