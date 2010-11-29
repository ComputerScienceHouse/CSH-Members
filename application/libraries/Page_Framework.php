<?php
/**
 * Page_Framework.php
 *
 * Class used for loading and displaying pages from the default template.
 *
 * @author Sean McGary <sean.mcgary@gmail.com>
 */
class Page_Framework
{

    public $CI;
    public $javascript = array();
    public $css = array();
    public $header_data = array();
    public $pre_css = array();

    public function  __construct()
    {
        $this->CI = get_instance();
    }

    public function load_javascript($source)
    {
        $this->javascript[] = $source;
    }

    public function load_css($source)
    {
        $this->css[] = $source;
    }

    public function load_pre_css($source)
    {
        $this->pre_css[] = $source;
    }

    public function generate_rightCol_default()
    {
        $data = array();


        return $data;
    }

    public function set_header_data($data)
    {
        $this->header_data = array_merge($this->header_data, $data);
    }

    public function set_sublinks($data)
    {
        $this->header_data['sub_links'] = $data;
    }

    
    /**
     *
     * @param string $main_page     The main view file to load
     * @param array $data           Data to load. Each page has an index.
     *                                  IE: $data['header'] is for the header
     * @param string $other_col     The other view file to load
     */
    public function render($leftCol, $leftCol_data, $rightCol = null, $rightCol_data = array())
    {
        $header_data = array();
        $header_data['javascript'] = $this->javascript;
        $header_data['css'] = $this->css;
        $header_data['pre_css'] = $this->pre_css;
        //Util::printr($header_data);
        if(isset($_SESSION['loggedIn']))
        {
            $header_data['login_link'] = '<a href="'.site_url('login/logout').'">Logout</a> | <a href="'.site_url('account').'">Account</a>';
        }
        else
        {
            $header_data['login_link'] = '<a href="'.site_url('login').'">Login/Register</a>';
        }

        

        $header_data = array_merge($this->header_data, $header_data);
        
        // load header
        $this->CI->load->view('template/header_view', $header_data);
        $this->CI->load->view($leftCol, $leftCol_data);
        if($rightCol != null)
        {

            $this->CI->load->view($rightCol, $rightCol_data);
        }
        else
        {
            $colData = array_merge($rightCol_data, $this->generate_rightCol_default());
            //Util::printr($colData);
            $this->CI->load->view('template/rightCol_view', $colData);
        }
        
        $this->CI->load->view('template/footer_view');
        
    }
}
?>
