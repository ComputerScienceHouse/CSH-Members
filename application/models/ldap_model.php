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

        $this->attributes = array('uid', 'homedirectory', 'loginshell', 'nickname',
                                  'rityear', 'homephone', 'cellphone', 'mail', 'aolscreenname',
                                  'birthday', 'blogurl', 'cn', 'description', 'gecos', 'givenname',
                                  'sn', 'ritdn', 'onfloor', );

    }

    public function get_all_users()
    {
        $results = $this->ldap->get_all_users();
        $users = array();
        foreach($results as $res)
        {
            unset($res['objectclass']);
            unset($res[0]);
            $tmp_array = array();
            //Util::printr($res);
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
        }
        //Util::printr($users);
        return $users;
    }
}
?>
