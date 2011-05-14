<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Chickentype extends MY_Controller {

	public function index()
	{
	    $data = array();
	    
	    $this->load->model('Chickentypes', 'chickentypes');
	    
	    $data['chickentypes'] = $this->chickentypes->fetchAll();
	    
		$this->template->build('chickentype/index', $data);
	}
	
	public function edit() 
	{
	    $data = array();
	    
	    $this->form_validation->set_rules('code', 'Kód', 'trim|required');
	    $this->form_validation->set_rules('name', 'Leírás', 'trim|required');
	    
	    $id = $this->uri->segment(3);
	    
	    $this->load->model("Chickentypes", 'chickentype');
	    
	    $chickentype = false;
	    if ($id) {
	        $chickentype = $this->chickentype->find((int)$id);
	        
	    }
        $data['chickentype'] = $chickentype;
	    
	    if ($this->form_validation->run()) {
	        
	        if ($id) {
	            
	            $this->chickentype->update($_POST, array('id'=>$id));
	        } else {
	            
    	        $this->chickentype->insert($_POST);
	        }
	        	    
            redirect($_SERVER['HTTP_REFERER']);
	    } else {
	        if ($_POST) {
	            
    	        $this->session->set_userdata('validation_error',validation_errors());
    	        $this->session->set_userdata('current_dialog_item', ($id ? $id : 0));
    	        
    	        redirect($_SERVER['HTTP_REFERER']);
	        }
	    }
	    
	    $this->template->build('chickentype/edit', $data);
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    
	    if ($id) {
	        
	        $this->load->model('Chickentypes', 'chickentypes');
	        
	        $this->chickentypes->delete($id);
	        
	        redirect($_SERVER['HTTP_REFERER']);
	    }
	}
}

