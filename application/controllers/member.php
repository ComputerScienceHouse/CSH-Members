<?php
/**
 * Member controller
 */
require_once('base_controller.php');
class Member extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();
    }

    /**
     * because index cant technically have arguments in the URL,
     * we need to remap it
     */
    public function _remap()
    {
        $this->index($this->uri->segment(2));
    }

    public function index($uid)
    {
        if($uid == $_SERVER['WEBAUTH_USER'])
        {
            redirect(site_url('me'));
        }
        $data['unwanted_fields'] = $this->unwanted_fields;

        $data['field_order'] = $this->field_order;

        $data['non_edit_fields'] = $this->non_edit_fields;
        $data['user'] = $this->user_model->user_query('uid', $uid, false, true);
        $data['display_fields'] = array('aolscreenname' => 'AOL Screen Name',
                                        'twittername' => 'Twitter',
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
}
?>