<?php
class Main extends Controller
{
    
    public $page;
    public $ldap;
    public $mongo;

    public function  __construct()
    {
        parent::__construct();

        $this->page = new Page_Framework();
        $this->load->model('ldap_model');
        //Mongo connection
        //$this->mongo = new MongoDB_Inst();
        $this->load->model('user_model');
        //$this->mongo = new Mongo_db();
    }

    public function index()
    {
        $this->page->render('mainIndex_view', '', null);

    }

    public function sort_members($letter)
    {
        $users = $this->user_model->get_all_users();
        foreach($users as $user)
        {
            Util::printr($user);
        }
    }

    public function ldap_to_db()
    {
        $results = $this->ldap_model->get_all_users();

        $this->mongo->insert_users('users', $results);
        //$this->mongo->insert('users', $results);
        
    }

    /*
    public function drop()
    {
        $this->mongo->remove('users');
        //$this->mongo->delete('users');
    }

    public function query()
    {
        $this->mongo->query('users', array('uid' => 'mcg1sean'));
    }

    public function update()
    {
        $this->mongo->update('users');
    }
    */
}
?>
