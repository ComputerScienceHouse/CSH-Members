<?php
require_once('base_controller.php');
class Main extends Base_Controller
{
    
    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->page->load_javascript(site_url('js/sort_members.js'));
        $this->page->render('mainIndex_view', '', null);

    }

    public function mobile()
    {
        $this->load->view('mobile/test_view');
    }

    public function mobile_members($letter)
    {
        $data['users'] = $this->user_model->get_sorted_users('sn', "/^".strtolower($letter)."/i", true);

        $this->load->view('mobile/mainMobileMembers_view', $data);

    }

    public function mobile_profile($uid)
    {
        $data['user'] = $this->user_model->user_query('uid', $uid, false, true);
        $data['display_fields'] = array('aolscreenname' => 'AOL Screen Name',
                                        'birthday' => 'Birthday',
                                        'cn' => 'Common Name',
                                        'nickname' => 'Nickname',
                                        'cellphone' => 'Cell Phone',
                                        'homephone' => 'Home Phone',
                                        'mail' => 'Email Addresses',
                                        'blogurl' => 'Website'
                                       );
        $this->load->view('mobile/mainMobileProfile_view', $data);
    }

    public function sort_members($letter)
    {
        $users = $this->user_model->get_sorted_users('sn', "/^".strtolower($letter)."/i", true);
        $result_string = '<table class="table-style"><tr><th>Name</th><th>CSH Username</th></tr>';
        foreach($users as $user)
        {
            $result_string .= '<tr>';
            $result_string .= '<td><a href="'.site_url('main/member/'.$user['uid']).'">'.$user['sn'].', '. $user['givenname'].'</a></td>';
            $result_string .= '<td>'.$user['uid'].'</td>';
            $result_string .= '</tr>';
        }
        
        echo json_encode($result_string);
    }



    public function member($uid)
    {
        $data['user'] = $this->user_model->user_query('uid', $uid, false, true);
        $data['display_fields'] = array('aolscreenname' => 'AOL Screen Name',
                                        'birthday' => 'Birthday',
                                        'cn' => 'Common Name',
                                        'nickname' => 'Nickname',
                                        'cellphone' => 'Cell Phone',
                                        'homephone' => 'Home Phone',
                                        'mail' => 'Email Addresses',
                                        'blogurl' => 'Website',
                                        'drinkAdmin' => 'Drink Admin'
                                       );
        $this->page->render('mainMember_view', $data, null);
    }

    public function ldap_to_db()
    {
        $results = $this->ldap_model->get_all_users();
        $rtps = $this->ldap_model->get_rtps();
        $this->mongo->insert_users('users', $results);
        $this->mongo->insert_users('rtps', $rtps);
        //$this->mongo->insert('users', $results);
        
    }

    public function view_ldap_dump()
    {
        $results = $this->ldap_model->get_all_users();
        Util::printr($results);
    }

    
    public function drop()
    {
        $this->mongo->remove('users');
        $this->mongo->remove('rtps');
        //$this->mongo->delete('users');
    }
    
    public function query()
    {
        //$this->mongo->query('users', array('uid' => 'adinardi'));

        $this->mongo->query('rtps', array('uid' => 'adinardi'));
    }
    
    public function update()
    {
        $this->mongo->update('users');
    }
    
}
?>
