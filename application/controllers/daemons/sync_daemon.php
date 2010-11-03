<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('base_controller.php');
class Sync_Daemon extends Controller
{
    public $mongo;
    public function  __construct()
    {
        parent::Controller();
        $this->load->model('ldap_model');
        //Mongo connection
        //$this->mongo = new MongoDB_Inst();
        $this->load->model('user_model');

        $this->mongo = new MongoDB_Inst();
    }

    public function full_sync()
    {
        Util::log('Starting ldap sync');
        Util::log('Pulling users from ldap...');
        // get all the stuff from ldap
        $results = $this->ldap_model->get_all_users();
        $rtps = $this->ldap_model->get_group('rtp');
        $eboard = $this->ldap_model->get_group('eboard');

        Util::log('Purging current database contents');
        // purge the current database
        $this->mongo->remove('users');
        $this->mongo->remove('rtps');
        $this->mongo->remove('eboard');

        Util::log('Inserting updated data into database');
        // now insert everything back into the db
        $this->mongo->insert_users('users', $results);
        $this->mongo->insert_users('rtps', $rtps);
        $this->mongo->insert_users('eboard', $eboard);
        //$this->mongo->insert('users', $results);

        Util::log('Sync completed');

    }

    public function raw_ldap_dump()
    {
        $results = $this->ldap_model->get_all_users_raw();
        print_r($results);
    }

    public function view_ldap_result()
    {
        Util::printr($results = $this->ldap_model->get_all_users_test());
    }

    public function view_ldap_dump($group)
    {
        $results = $this->ldap_model->get_group($group);
        Util::printr($results);
    }


    public function drop()
    {
        $this->mongo->remove('users');
        $this->mongo->remove('rtps');
        $this->mongo->remove('eboard');
        //$this->mongo->delete('users');
    }

    public function query()
    {
        //$this->mongo->query('users', array('uid' => 'adinardi'));

        $this->mongo->query('rtps', array('uid' => 'adinardi'));
    }

    public function update()
    {
        $this->mongo->update('users');
    }

    
}
?>
