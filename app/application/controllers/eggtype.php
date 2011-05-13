<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Eggtype extends MY_Controller {

	public function index()
	{
	    $data = array();
	    
	    $this->load->model('Eggtypes', 'eggtypes');
	    
	    $data['eggtypes'] = $this->eggtypes->fetchAll();
	    
		$this->template->build('eggtype/index', $data);
	}
	
	public function edit() 
	{
	    if ($_POST) {
	        
	        $this->load->model("Eggtypes", 'eggtype');
	        
	        $this->eggtype->insert($_POST);
	        	    
            redirect($_SERVER['HTTP_REFERER']);
	    }
	    $this->template->build('eggtype/edit');
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    
	    if ($id) {
	        
	        $this->load->model('Eggtypes', 'eggtypes');
	        
	        $this->eggtypes->delete($id);
	        
	        redirect($_SERVER['HTTP_REFERER']);
	    }
	}
}

