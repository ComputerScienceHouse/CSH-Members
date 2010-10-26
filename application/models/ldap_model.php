<?php
ini_set("memory_limit","60M");
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Ldap_Model extends CI_Model
{
    public $ldap;
    public $attributes;
    
    public function  __construct()
    {
        parent::CI_Model();
        $this->ldap = new Ldap();
        $this->ldap->connect();

        $this->attributes = array('objectclass', 'uid', 'homedirectory', 'loginshell', 'nickname',
                                  'rityear', 'homephone', 'cellphone', 'mail', 'aolscreenname',
                                  'birthday', 'blogurl', 'cn', 'description', 'gecos', 'givenname',
                                  'sn', 'ritdn', 'onfloor', 'drinkAdmin');

    }

    public function get_all_users()
    {
        $results = $this->ldap->get_all_users();
        $users = array();
        foreach($results as $res)
        {
            //unset($res['objectclass']);
            //unset($res[0]);
            $tmp_array = array();
            //Util::printr($res);
            foreach($this->attributes as $attr)
            {
                if (array_key_exists($attr, $res))
                {
                    if ($attr == 'mail')
                    {
                        unset($res[$attr]['count']);
                        $email_list = array();
                        foreach($res[$attr] as $email)
                        {
                            $email_list[] = array('email' => $email);
                        }

                        $tmp_array[$attr] = $email_list;
                    }
                    elseif ($attr == 'objectclass')
                    {
                        unset($res[$attr]['count']);
                        $class_list = array();
                        foreach($res[$attr] as $class)
                        {
                            $class_list[] = array('class' => $class);
                        }

                        $tmp_array[$attr] = $class_list;
                    }
                    else
                    {
                        $tmp_array[$attr] = $res[$attr][0];
                    }
                }
                else
                {
                    $tmp_array[$attr] = "";
                }
            }
            $users[] = $tmp_array;
        }
        //Util::printr($users);
        return $users;
    }

    public function get_group($cn)
    {
        $results = $this->ldap->get_group($cn);
        $users = array();
        //Util::printr($results);
        unset($results[0]['member']['count']);
        foreach($results[0]['member'] as $res)
        {
            $user = explode("=", $res);
            $users[] = array('uid' => rtrim($user[1], ',ou'));
        }
        return $users;
    }

    public function get_eboard()
    {
        $results = $this->ldap->get_eboard();
        $users = array();
        //Util::printr($results);
        unset($results[0]['member']['count']);
        foreach($results[0]['member'] as $res)
        {
            $user = explode("=", $res);
            $users[] = array('uid' => rtrim($user[1], ',ou'));
        }
        return $users;
    }

    public function get_all_users_raw()
    {
        $results = $this->ldap->get_all_users();
        $users = array();
        foreach($results as $res)
        {
            //unset($res['objectclass']);
            //unset($res[0]);
            $tmp_array = array();
            //Util::printr($res);
            /*
            foreach($this->attributes as $attr)
            {
                if (array_key_exists($attr, $res))
                {
                    if ($attr == 'mail')
                    {
                        unset($res[$attr]['count']);
                        $tmp_array[$attr] = $res[$attr];
                    }
                    else
                    {
                        $tmp_array[$attr] = $res[$attr][0];
                    }
                }
                else
                {
                    $tmp_array[$attr] = "";
                }
            }
            $users[] = $tmp_array;
            */
        }
        //Util::printr($users);
        return $users;
    }
}
?>
