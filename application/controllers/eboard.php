<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('base_controller.php');
class Eboard extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $rtps = $this->user_model->get_eboard();
        //Util::printr($rtps);

        $result_string = '<table class="table-style"><tr><th>Name</th><th>CSH Username</th></tr>';
        foreach($rtps as $user)
        {
            $result_string .= '<tr>';
            $result_string .= '<td><a href="'.site_url('main/member/'.$user['uid']).'">'.$user['sn'].', '. $user['givenname'].'</a></td>';
            $result_string .= '<td>'.$user['uid'].'</td>';
            $result_string .= '</tr>';
        }
        $result_string .= '</table>';
        $data['rtps'] = $result_string;

        $this->page->render('eboardIndex_view', $data, null);
    }
}
?>
