<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('base_controller.php');
class Members_Util extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();

    }

    public function test()
    {
        $users = $this->ldap_model->get_single_user();
        Util::printr($users);
    }

    public function seed()
    {
        $users = $this->ldap_model->get_users();

        Util::printr($users);

        $this->mongo->insert_users('users', $users);

        //$eboard = $this->ldap_model->get_eboard();
        //Util::printr($eboard);
        //$this->user_model->insert_eboard($eboard);

        //$rtps = $this->ldap_model->get_group('rtp');
        //Util::printr($rtps);
        //$this->user_model->insert_rtps($rtps);


    }

    public function delete_all()
    {
        $this->mongo->remove('users');
    }
}
?>
