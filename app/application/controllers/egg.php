<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Egg extends MY_Controller {

	public function index()
	{
	    $data = array();
	    
	    //$this->load->model('Fakkgroups', 'groups');
	    
	    //$data['groups'] = $this->groups->fetchAll();
	    
        //$this->template->set_partial('fakk_groups', '_partials/fakk_groups');
	    
		$this->template->build('egg/index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */