<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Egg extends MY_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->template->build('egg/index');
    }
	
	/**
	 * beallitja session-be a kivalasztott telephelyet a termeles fooldalan
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function set_selected_breedersite()
	{
	    if ($this->uri->segment(3)) {
	        $this->session->set_userdata('selected_breedersite', $this->uri->segment(3));
	    }
	    //dump($this->uri->segment(3));
	    //dump($this->session->userdata('selected_breedersite'));
	    die;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */