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

        $this->attributes = array('objectclass', 'uid', 'homedirectory', 'loginshell', 'nickname',
                                  'rityear', 'homephone', 'cellphone', 'mail', 'aolscreenname',
                                  'birthday', 'blogurl', 'cn', 'description', 'gecos', 'givenname',
                                  'sn', 'ritdn', 'onfloor', 'drinkAdmin', 'twittername');

        $this->attributes2 = array('objectclass', 'uid', 'homedirectory', 'loginshell', 'nickname',
                                  'rityear', 'homephone', 'cellphone', 'mail', 'aolscreenname',
                                  'birthday', 'blogurl', 'cn', 'description', 'gecos', 'givenname',
                                  'sn', 'ritdn', 'onfloor', 'drinkAdmin', 'twittername');

    }

    public function update_field($data)
    {
        $field[$data['field']][$data['field_index']] = $data['new_value'];

        $dn = 'uid='.$data['uid'].",ou=Users,dc=csh,dc=rit,dc=edu";

        $res = ldap_mod_replace($this->ldap->connection, $dn, $field);

        if($res)
        {
            return 'success';

        }
        else
        {
            return 'fail';
        }
    }

    public function update_address_field($data)
    {
        $field[$data['field_index']][0] = $data['new_value'];

        $dn = 'addressName='.$data['addressName'].',uid='.$data['uid'].",ou=Users,dc=csh,dc=rit,dc=edu";

        $res = ldap_mod_replace($this->ldap->connection, $dn, $field);

        if($res)
        {
            return 'success';

        }
        else
        {
            return 'fail';
        }
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

    public function get_all_users_test()
    {
        $results = $this->ldap->get_all_users();
        $users = array();
        foreach($results as $res)
        {
            //unset($res['objectclass']);
            //unset($res[0]);
            $tmp_array = array();
            //Util::printr($res);
            foreach($this->attributes2 as $attr)
            {
                unset($res[$attr]['count']);
                if (array_key_exists($attr, $res))
                {
                    if(is_array($res[$attr]))
                    {
                        $class_list = array();
                        foreach($res[$attr] as $elem)
                        {
                            $class_list[] = array('class' => $elem);
                        }

                        $tmp_array[$attr] = $class_list;
                    }
                    //$tmp_array[$attr] =
                }
                else
                {
                    $tmp_array[$attr] = array(array('class' => ''));
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
            $users[] = array('uid' => substr($user[1], 0, (strlen($user[1]) - 3)));
            //$users[] = array('uid' => rtrim($user[1], ',ou'));
        }
        return $users;
    }
    /**
     * Get a single user
     */
    public function get_users()
    {
        $users = $this->ldap->get_all_users();

        unset($users['count']);
        $all_users = array();
        foreach ($users as $user)
        {
            
            unset($user['dn']);
            unset($user['count']);
            $user_data = array();
            foreach ($user as $key => $value)
            {
                if (gettype($key) == 'string')
                {
                    if($key != 'jpegPhoto' && $key != 'jpegphoto')
                    {
                        $tmp = $user[$key];
                        if (array_key_exists('count', $tmp))
                        {
                            unset($tmp['count']);
                        }
                    }

                    //Util::printr($tmp);
                    $user_data[$key] = $tmp;
                }
            }
            //$user_data['addresses'] = $this->get_addresses($user_data['uid'][0]);
            //$user_data['addresses'] = $this->ldap->get_user_address($user_data['uid'][0]);
            $all_users[] = $user_data;
        }
        //Util::printr($all_users);
        foreach($all_users as &$u)
        {
            //echo $u['uid'][0].'<br>';
            if($u['uid'][0] != 'atlassian')
            {
                $u['address'] = $this->get_addresses($u['uid'][0]);
            }
            
        }

        return $all_users;
        
    }


    public function get_addresses($uid)
    {
        $addresses = $this->ldap->get_user_address($uid);
        unset($addresses['count']);
        $all_addresses = array();
        foreach($addresses as $address)
        {
            unset($address['count']);
            unset($address['dn']);
            $address_data = array();
            foreach($address as $key => $value)
            {
                //echo $key." => ".$value.'<br>';
                
                if(gettype($key) == 'string')
                {
                    $tmp = $address[$key];

                    $val = $value;
                    unset($val['count']);
                    //Util::printr($tmp);
                    $address_data[$key] = $val;
                }
            }

            $all_addresses[] = $address_data;

        }

        return $all_addresses;
    }

    public function get_single_user()
    {
        $user = $this->ldap->get_user();
        Util::printr($user);
        unset($user['count']);
        $all_users = array();
        //foreach ($users as $user)
        //{

            //unset($user['dn']);
            //unset($user['count']);
            $user_data = array();
            foreach ($user as $key => $value)
            {
                if (gettype($key) == 'string')
                {
                    if($key != 'jpegPhoto')
                    {
                        $tmp = $user[$key];
                        if (array_key_exists('count', $tmp))
                        {
                            unset($tmp['count']);
                        }
                    }

                    //Util::printr($tmp);
                    $user_data[$key] = $tmp;
                }
            }
            //$user_data['addresses'] = $this->get_addresses($user_data['uid'][0]);
            //$user_data['addresses'] = $this->ldap->get_user_address($user_data['uid'][0]);
            $all_users[] = $user_data;
        //}
        //Util::printr($all_users);
        foreach($all_users as &$u)
        {
            //echo $u['uid'][0].'<br>';
            if($u['uid'][0] != 'atlassian')
            {
                $u['address'] = $this->get_addresses($u['uid'][0]);
            }

        }

        return $all_users;

    }

    
    public function get_eboard()
    {
        $results = $this->ldap->get_group('eboard');
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
            $users[] = $res;
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
