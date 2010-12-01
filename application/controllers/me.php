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
        //$uid = 'mcg1sean';
        //Util::printr($_SERVER);
        $uid = $_SERVER['WEBAUTH_USER'];
        $data['user'] = $this->user_model->user_query('uid', $uid, false, true);
        $this->page->load_javascript(site_url('js/edit.js'));
        $data['unwanted_fields'] = $this->unwanted_fields;

        $data['field_order'] = $this->field_order;

        $data['non_edit_fields'] = $this->non_edit_fields;
        /*
        $data['display_fields'] = array('aolscreenname' => 'AOL Screen Name',
                                        'birthday' => 'Birthday',
                                        'cn' => 'Common Name',
                                        'nickname' => 'Nickname',
                                        'cellphone' => 'Cell Phone',
                                        'homephone' => 'Home Phone',
                                        'mail' => 'Email Addresses',
                                        'blogurl' => 'Website'
                                       );
         *
         */
        $this->page->render('mainMember_view', $data, null);
    }

    public function submit_change()
    {
        $post_list = array('uid', 'field', 'new_value');

        $post = array();

        foreach($post_list as $item)
        {
            $post[$item] = $this->input->post($item);
        }
        $result = '';
        switch($post['field'])
        {
            case 'mail':
                break;
            case 'cellphone':
                break;
            case 'uid':
                break;
            default:
                $result = $this->ldap_model->update_field($post);
                break;
        }

        //set it in mongodb too until we sync
        $this->user_model->update_user($post['uid'], $post['field'], $post['new_value']);

        echo json_encode($result);
    }

    public function foo()
    {
        $ldap = new Ldap();
        Util::printr($ldap->get_all_users());
    }
}
?>
