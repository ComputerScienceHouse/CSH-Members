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
    public $eboard_collection;

    public function  __construct()
    {
        parent::__construct();

        $this->user_collection = 'users';
        $this->rtp_collection = 'rtps';
        $this->eboard_collection = 'eboard';
    }

    public function insert_eboard($eboard)
    {
        $collection = $this->mongo->mdb->{$this->eboard_collection};
        foreach($eboard as $e)
        {
            $collection->insert($e, true);
        }
        
    }
    
    public function insert_rtps($rtps)
    {
        $collection = $this->mongo->mdb->{$this->rtp_collection};
        foreach($rtps as $rtp)
        {
            $collection->insert($rtp, true);
        }
        
    }

    public function update_user($data)
    {
        $user = $this->user_query('uid', $data['uid'], false, true);

        //Util::printr($user);

        $old_data = $user[$data['field']];

        $old_data[$data['field_index']] = $data['new_value'];

        $collection = $this->mongo->mdb->{$this->user_collection};

        $collection->update(array('uid' => $data['uid']), array('$set' => array($data['field'] => $old_data)));
    }

    public function update_user_address($data)
    {
        $user = $this->user_query('uid', $data['uid'], false, true);

        //Util::printr($user);

        $old_data = $user[$data['field']];
        //Util::printr($old_data);
        $old_data[$data['address_index']][$data['field_index']][0] = $data['new_value'];
        //Util::printr($old_data);

        $collection = $this->mongo->mdb->{$this->user_collection};

        $collection->update(array('uid' => $data['uid']), array('$set' => array($data['field'] => $old_data)));
    }



    

    public function get_all_users()
    {
        // WHAT THE FUCK PHP?!?!?!?!?!?!
        $collection = $this->mongo->mdb->{$this->user_collection};

        $results = $collection->find()->sort(array('uid' => 1));

        return $results;
    }

    public function get_all_users_shit()
    {
        // WHAT THE FUCK PHP?!?!?!?!?!?!
        $collection = $this->mongo->mdb->{$this->user_collection};

        $results = $collection->find(array('rityear' => array('$lte' => '3')))->sort(array('uid' => 1));

        return $results;
    }

    public function get_sorted_users($index, $query, $is_regex = false)
    {
        $collection = $this->mongo->mdb->{$this->user_collection};

        if($is_regex)
        {
            $query = new MongoRegex($query);
        }

        $results = $collection->find(array($index => $query))->sort(array($index => 1));

        return $results;
    }

    public function user_query($index, $query, $is_regex, $get_one = false)
    {
        $collection = $this->mongo->mdb->{$this->user_collection};

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

    public function search($query, $indexes)
    {
        $collection = $this->mongo->mdb->{$this->user_collection};
        $query = new MongoRegex("/^".$query."/i");

        $index_array = array();
        foreach($indexes as $index)
        {
            $index_array[] = array($index => $query);
        }

        $uid_result = $collection->find(array('$or' => $index_array))->sort(array('sn' => 1));
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
        $collection = $this->mongo->mdb->{$this->rtp_collection};

        $rtp_uids = $collection->find()->sort(array('uid' => 1));

        $rtp_profiles = array();
        foreach($rtp_uids as $rtps)
        {
            $tmp_collection = $this->mongo->mdb->{$this->user_collection};

            $rtp_profiles[] = $tmp_collection->findOne(array('uid' => $rtps['uid']));
        }

        //Util::printr($rtp_profiles);
        return $rtp_profiles;
    }

    public function get_eboard()
    {
        $collection = $this->mongo->mdb->{$this->eboard_collection};

        $eboard_uids = $collection->find()->sort(array('uid' => 1));

        $eboard_profiles = array();
        foreach($eboard_uids as $eboard)
        {
            $tmp_collection = $this->mongo->mdb->{$this->user_collection};

            $eboard_profiles[] = $tmp_collection->findOne(array('uid' => $eboard['uid']));
        }

        //Util::printr($rtp_profiles);
        return $eboard_profiles;
    }

    public function get_drinkadmins()
    {
        $collection = $this->mongo->mdb->{$this->user_collection};

        $results = $collection->find()->sort(array('uid' => 1));


        //Util::printr($rtp_profiles);
        return $results;
    }
}

?>
