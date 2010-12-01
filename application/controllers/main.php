<?php
require_once('base_controller.php');
class Main extends Base_Controller
{
    
    public function  __construct()
    {
        parent::__construct();
        //Util::printr($_SERVER);
        
    }

    public function index()
    {
        $this->page->load_javascript(site_url('js/sort_members.js'));
        $this->page->render('mainIndex_view', '', null);

    }

    public function sort_members($letter)
    {
        $users = $this->user_model->get_sorted_users('sn', "/^".strtolower($letter)."/i", true);
        $result_string = '<table class="table-style"><tr><th>Name</th><th>CSH Username</th></tr>';
        foreach($users as $user)
        {
            $result_string .= '<tr>';
            $result_string .= '<td><a class="foooooobar" href="'.site_url('member/'.$user['uid'][0]).'">'.$user['sn'][0].', '. @$user['givenname'][0].'</a></td>';
            $result_string .= '<td>'.$user['uid'][0].'</td>';
            $result_string .= '</tr>';
        }

        //echo json_encode($result_string);
        echo $result_string;
    }

    public function alt_mobile()
    {
        $this->load->view('mobile/altMobile_view');
    }

    public function mobile()
    {
        $this->load->view('mobile/mainMobile_view');
    }

    public function mobile_members()
    {
        $this->load->view('mobile/mainMobileMembers_view');
    }

    public function mobile_eboard()
    {
        $data['users'] = $this->user_model->get_eboard();

        $this->load->view('mobile/mainMobileMembersSorted_view', $data);
    }

    public function mobile_rtps()
    {
        $data['users'] = $this->user_model->get_rtps();

        $this->load->view('mobile/mainMobileMembersSorted_view', $data);
    }

    public function mobile_members_sorted($letter)
    {
        $data['users'] = $this->user_model->get_sorted_users('sn', "/^".strtolower($letter)."/i", true);

        $this->load->view('mobile/mainMobileMembersSorted_view', $data);

    }

    public function mobile_profile($uid)
    {
        
        $data['user'] = $this->user_model->user_query('uid', $uid, false, true);
        $data['display_fields'] = array('aolscreenname' => 'AOL Screen Name',
                                        'twittername' => 'Twitter',
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
}
?>