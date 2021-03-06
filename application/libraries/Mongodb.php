<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MongoDB_Inst
{
    public $connection;
    public $mdb;
    public $users;

    public function  __construct()
    {
        //"mongodb://memberprofiles.csh.rit.edu:27017"
        $this->connection = new Mongo('mongodb://mcg1sean:summertimerave@localhost:27017/csh_members');
        //$this->connection->authenticate("mcg1sean", "summertimerave");
        $this->mdb = $this->connection->selectDB('csh_members');
        //$this->connection->authenticate('mcg1sean', 'summertimerave');
        $this->users = 'users';

    }
    public function insert_users($collection, $users)
    {
        $users_collection = $this->mdb->{$collection};

        foreach($users as $user)
        {
            echo 'inserting: '.$user['uid'][0].'<br>';
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
        $db_collection = $this->mdb->{$collection};

        $db_collection->remove();
    }

    public function query($collection, $query_array)
    {
        $db_collection = $this->mdb->$collection;
        $regex = new MongoRegex("/^a/");
        $res = $db_collection->find($query_array)->sort(array('uid' => 1))->limit(10);
        foreach($res as $foo)
        {
            Util::printr($foo);
        }
    }

    public function update($collection)
    {
        $db_collection = $this->mdb->$collection;

        $db_collection->update(array('uid' => 'mcg1sean'), array('$set' => array('mail' => 'mcg1sean@csh.rit.edu')));
    }


}
?>
