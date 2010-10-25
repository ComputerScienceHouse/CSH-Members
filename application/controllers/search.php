<?php
require_once('base_controller.php');
class Search extends Base_Controller
{

    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->page->load_javascript(site_url('js/search.js'));
        $this->page->render('searchIndex_view', '', null);

    }

    public function search_members()
    {
        //Util::printr($_POST);
        $query = $this->input->post('search_text');

        $results = $this->user_model->search($query);

        $result_string = '<table class="table-style"><tr><th>Name</th><th>CSH Username</th></tr>';
        foreach($results as $user)
        {
            $result_string .= '<tr>';
            $result_string .= '<td><a href="'.site_url('main/member/'.$user['uid']).'">'.$user['sn'].', '. $user['givenname'].'</a></td>';
            $result_string .= '<td>'.$user['uid'].'</td>';
            $result_string .= '</tr>';
        }

        echo json_encode($result_string);

    }
}
?>