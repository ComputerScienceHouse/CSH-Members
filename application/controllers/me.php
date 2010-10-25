<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('base_controller.php');
class Me extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        // pull stuff out of the session here
        $uid = 'mcg1sean';
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
        $this->page->render('mainMember_view', $data, null);
    }
}
?>
