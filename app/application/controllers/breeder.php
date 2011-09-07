<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Breeder extends MY_Controller {

	public function index()
	{
	    $this->session->unset_userdata('selected_breedersite');
	    
	    $data = array();
	    
	    $this->load->model('Breeders', 'breeder');
	    
	    $data['breeders'] = $this->breeder->fetchAll();
	    $data['actualBreederId'] = $this->breeder->getId();
		$this->template->build('breeder/index', $data);
	}
	
	public function edit()
	{
	    $data = array();
	    
	    $breeder = false;
	    
	    $this->load->model('Breeders', 'breeder');
	    
	    $id = $this->uri->segment(3);
	    
	    if ($id) {
	        $breeder = $this->breeder->find((int)$id);
	    }
	    $data['breeder'] = $breeder;
	    
	    $this->form_validation->set_rules('name', 'Név', 'trim|required');
	    $this->form_validation->set_rules('phone', 'Telefonszám', 'trim|numeric');
	    $this->form_validation->set_rules('cell', 'Mobil', 'trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');	    
        
        if ($this->form_validation->run()) {
            
            if ($id) {
                
                $this->breeder->update($_POST, $id);
            } else {
                
                $this->breeder->insert($_POST);
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        } else {
	        if ($_POST) {
	            
    	        $this->session->set_userdata('validation_error',validation_errors());
    	        $this->session->set_userdata('current_dialog_item', ($id ? $id : 0));
    	        
    	        redirect($_SERVER['HTTP_REFERER']);
	        }
        }
        
	    $this->template->build('breeder/edit', $data);
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    
	    if ($id) {
	        $this->load->model('Breeders', 'breeder');
	        
	        $this->breeder->delete($id);
	    }
	    
	    redirect($_SERVER['HTTP_REFERER']);
	}
}

