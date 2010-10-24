<?php
class Main extends Controller
{
    
    public $page;

    public function  __construct()
    {
        parent::__construct();

        $this->page = new Page_Framework();

    }

    public function index()
    {
        $this->page->render('mainIndex_view', '', null);

    }    
}
?>
