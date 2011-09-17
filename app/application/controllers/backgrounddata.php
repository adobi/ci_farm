<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Backgrounddata extends MY_Controller {

	public function index()
	{
	    
	    $this->session->unset_userdata('selected_breedersite');
	    
	    redirect(base_url() . 'breeder/index/priority/asc');
	    
		//$this->template->build('backgrounddata/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */