<?php
require_once('base_model.php');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class User_Model extends Base_Model
{

    public $user_collection;

    public function  __construct()
    {
        parent::__construct();

        $this->user_collection = 'users';
    }

    public function get_all_users()
    {
        // WHAT THE FUCK PHP?!?!?!?!?!?!
        $collection = $this->mongo->db->{$this->user_collection};

        $results = $collection->find()->sort(array('uid' => 1));

        return $results;


    }
}
?>
