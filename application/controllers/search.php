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
        
        $results = $this->user_model->search($query, $this->query_indexes);

        $result_string = '<table class="table-style"><tr><th>Name</th><th>CSH Username</th></tr>';
        foreach($results as $user)
        {
            $result_string .= '<tr>';
            $result_string .= '<td><a href="'.site_url('member/'.$user['uid'][0]).'">'.$user['sn'][0].', '. $user['givenname'][0].'</a></td>';
            $result_string .= '<td>'.$user['uid'][0].'</td>';
            $result_string .= '</tr>';
        }

        echo json_encode($result_string);

    }
}
?>