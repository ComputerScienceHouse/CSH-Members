<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('base_controller.php');
class Rtp extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->page->render('rtpIndex_view', '', null);
    }
}
?>
