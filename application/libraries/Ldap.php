<?php
class Ldap
{

    public $connection;
    public $bind;

    public function  __construct()
    {

    }

    public function  __destruct()
    {

    }

    public function connect()
    {
        $ldap_address = "ldap.csh.rit.edu";

        $this->connection = ldap_connect($ldap_address) or die("Could not connect to {$ldaphost}");

        $dn = "uid=mcg1sean,ou=Users,dc=csh,dc=rit,dc=edu";
        $pass = "summertimerave";
        
        if($this->connection)
        {
            $this->bind = ldap_bind($this->connection, $dn, $pass);
            return $this->connection;
        }
        else
        {
            return false;
        }
    }

    public function get_all_users()
    {
        if($this->bind)
            {
                //echo "bound";
                $basedn = "ou=Users,dc=csh,dc=rit,dc=edu";
                $filter = "(|(uid=*))";

                $result = ldap_search($this->connection, $basedn, $filter) or die("Search error.");
                $entries = ldap_get_entries($this->connection, $result);
                $binddn = $entries[0]["dn"];
                
                //echo "<p>Bind DN found: " . $binddn . "</p>";
                //echo "<hr />";
                //Util::printr($entries);
                //return array('cn' => $this->connection, 'bn' => $bind);
                unset($entries['count']);
                return $entries;
            }
            else
            {
                //echo "not bound";
                return false;
            }
    }

    public function get_group($cn)
    {
        if($this->bind)
            {
                //echo "bound";
                $basedn = "ou=Groups,dc=csh,dc=rit,dc=edu";
                $filter = "(|(cn=".$cn."))";

                $result = ldap_search($this->connection, $basedn, $filter) or die("Search error.");
                $entries = ldap_get_entries($this->connection, $result);

                $binddn = $entries[0]["dn"];
                Util::printr($binddn);
                //echo "<p>Bind DN found: " . $binddn . "</p>";
                //echo "<hr />";
                //Util::printr($entries);
                //return array('cn' => $this->connection, 'bn' => $bind);
                //unset($entries['count']);
                return $entries;
            }
            else
            {
                //echo "not bound";
                return false;
            }
    }


}
?>
