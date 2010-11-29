<?php

class Ldap
{

    public $connection;
    public $bind;

    public function __construct()
    {
        //Util::printr($GLOBALS);
        $krb_index = '';
        if(array_key_exists('KRB5CCNAME', $_SERVER))
        {
            $krb_index = 'KRB5CCNAME';
        }
        else if(array_key_exists('REDIRECT_KRB5CCNAME', $_SERVER))
        {
            $krb_index = 'REDIRECT_KRB5CCNAME';
        }
        else
        {

        }

        ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        $this->connection = ldap_connect('ldap://ldap.csh.rit.edu');

        ldap_bind($this->connection) or die("Could not bind to LDAP 1: " . error());
        if (isset($_SERVER[$krb_index]))
        {
            putenv("KRB5CCNAME=" . $_SERVER[$krb_index]);
            ldap_sasl_bind($this->connection, "", "", "GSSAPI") or die("Could not bind to LDAP 2: ");
        }
        else
        {
            echo "FATAL ERROR: WEBAUTH inproperly configured (missing KRB5CCNAME).";
            die(0);
        }

        return $this->connection;
    }

    public function __destruct()
    {

    }

    public function get_all_users()
    {

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

    public function get_group($cn)
    {

        //echo "bound";
        $basedn = "ou=Groups,dc=csh,dc=rit,dc=edu";
        $filter = "(|(cn=" . $cn . "))";

        $result = ldap_search($this->connection, $basedn, $filter) or die("Search error.");
        $entries = ldap_get_entries($this->connection, $result);

        $binddn = $entries[0]["dn"];
        return $entries;
    }

}

?>