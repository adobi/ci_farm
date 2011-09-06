<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Eggtype extends MY_Controller {

	public function index()
	{
	    $data = array();
	    
	    $this->load->model('Eggtypes', 'eggtypes');
	    
	    $data['eggtypes_food'] = $this->eggtypes->fetchByType(1);
	    
	    $data['eggtypes_production'] = $this->eggtypes->fetchByType(2);
	    
		$this->template->build('eggtype/index', $data);
	}
	
	public function edit() 
	{
	    $data = array();
	    
	    $this->form_validation->set_rules('code', 'Kód', 'trim|required');
	    $this->form_validation->set_rules('name', 'Név', 'trim|required');
	    
	    $this->load->model("Eggtypes", 'eggtype');
	    
	    $id = $this->uri->segment(3);
	    $eggtype = false;
	    if ($id) {
	        $eggtype = $this->eggtype->find((int)$id);
	    }
	    $data['eggtype'] = $eggtype;
	    
	    if ($this->form_validation->run()) {
	        
	        if ($id) {
                
	            $this->eggtype->update($_POST, $id);
	        } else {
	            
	            $_POST['cast_id'] = 1;
	            
                $this->eggtype->insert($_POST);
	        }
	        
            redirect($_SERVER['HTTP_REFERER']);
	    } else {
	        if ($_POST) {
	            
    	        $this->session->set_userdata('validation_error',validation_errors());
    	        $this->session->set_userdata('current_dialog_item', ($id ? $id : 0));
    	        
    	        redirect($_SERVER['HTTP_REFERER']);
	        }
	    }
	    
	    $this->template->build('eggtype/edit', $data);
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

