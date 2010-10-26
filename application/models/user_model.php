<?php
require_once('base_model.php');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class User_Model extends Base_Model
{

    public $user_collection;
    public $rtp_collection;

    public function  __construct()
    {
        parent::__construct();

        $this->user_collection = 'users';
        $this->rtp_collection = 'rtps';
    }

    public function get_all_users()
    {
        // WHAT THE FUCK PHP?!?!?!?!?!?!
        $collection = $this->mongo->db->{$this->user_collection};

        $results = $collection->find()->sort(array('uid' => 1));

        return $results;
    }

    public function get_sorted_users($index, $query, $is_regex = false)
    {
        $collection = $this->mongo->db->{$this->user_collection};

        if($is_regex)
        {
            $query = new MongoRegex($query);
        }

        $results = $collection->find(array($index => $query))->sort(array($index => 1));

        return $results;
    }

    public function user_query($index, $query, $is_regex, $get_one = false)
    {
        $collection = $this->mongo->db->{$this->user_collection};

        if($is_regex)
        {
            $query = new MongoRegex($query);
        }

        if($get_one)
        {
            return $collection->findOne(array($index => $query));
        }
        else
        {
            return $collection->find(array($index => $query));
        }
    }

    public function search($query)
    {
        $collection = $this->mongo->db->{$this->user_collection};
        $query = new MongoRegex("/^".$query."/i");
        $uid_result = $collection->find(array('$or' => array(array('uid' => $query), array('cn' => $query))))->sort(array('sn' => 1));
        $cn_result = $collection->find(array('cn' => $query));

        $processed_result = array();
        
        foreach($uid_result as $res)
        {
            $processed_result[] = $res;
        }

        return $processed_result;
    }

    public function get_rtps()
    {
        $collection = $this->mongo->db->{$this->rtp_collection};

        $rtp_uids = $collection->find()->sort(array('uid' => 1));

        $rtp_profiles = array();
        foreach($rtp_uids as $rtps)
        {
            $tmp_collection = $this->mongo->db->{$this->user_collection};

            $rtp_profiles[] = $tmp_collection->findOne(array('uid' => $rtps['uid']));
        }

        //Util::printr($rtp_profiles);
        return $rtp_profiles;
    }
}
?>
