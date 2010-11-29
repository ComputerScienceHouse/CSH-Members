<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MongoDB_Inst
{
    public $connection;
    public $db;

    public function  __construct()
    {
        $this->connection = new Mongo("mongodb://memberprofiles.csh.rit.edu:27017");
        
        $this->db = $this->connection->selectDB('csh_members');

    }
    public function insert_users($collection, $users)
    {
        $users_collection = $this->db->$collection;

        foreach($users as $user)
        {
            try
            {
                $users_collection->insert($user, true);
            }
            catch(MongoCursorException $e)
            {
                echo "that already exists: ".json_encode($user);
            }

        }
    }

    public function remove($collection)
    {
        $db_collection = $this->db->$collection;

        $db_collection->remove();
    }

    public function query($collection, $query_array)
    {
        $db_collection = $this->db->$collection;
        $regex = new MongoRegex("/^a/");
        $res = $db_collection->find($query_array)->sort(array('uid' => 1))->limit(10);
        foreach($res as $foo)
        {
            Util::printr($foo);
        }
    }

    public function update($collection)
    {
        $db_collection = $this->db->$collection;

        $db_collection->update(array('uid' => 'mcg1sean'), array('$set' => array('mail' => 'mcg1sean@csh.rit.edu')));
    }


}
?>
