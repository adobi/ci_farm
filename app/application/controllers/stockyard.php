<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Stockyard extends MY_Controller 
{
    
    public function index() 
    {
        if ($this->uri->segment(3)) {
            $this->session->unset_userdata('selected_breedersite');
            
            redirect(base_url().'stockyard');
        }
        
        $data = array();
        
        $this->load->model('Stockyards', 'model');
        
        $this->load->model('Breedersites', 'site');
        $this->load->model('Breeders', 'breeder');
        $sites = $this->site->fetchForBreeder($this->breeder->getId());
	    
        $data['breeder'] = $this->breeder->find($this->breeder->getId());
	    $data['breeder_sites_select'] = $this->site->toAssocArray('id', 'name', $sites);
	    
	    $data['stockyards'] = $this->model->fetchForBreedersite($this->session->userdata('selected_breedersite'));
        
        $this->template->build('stockyard/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Stockyards', 'model');
        $this->load->model("Breedersites", "site");
        $item = false; 
        /*
        $currentBreederSite = false;$currentStockYard = false;
        if ($id) {
            // breedersite/edit/breeder/1
            if ($id === 'breeder_site') {
                
                $breederSiteId = $this->uri->segment('4');
                
                $currentBreederSite = $this->site->find($breederSiteId);
            }
            
            // breedersite/edit/1/breeder/1
            if (is_numeric($id)) {
                
                $yardId = $this->uri->segment('5');
                
                $currentStockYard = $this->model->find($yardId);
            }
        }
        //dump($currentStockYard); die;
        $data['current_stockyard'] = $currentStockYard;
        $data['current_breeder_site'] = $currentBreederSite;
        */
        $item = false;
        if ($id) {
            
            $item = $this->model->find($id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules('name', 'Név', 'trime|required');
        
        if ($this->form_validation->run()) {
            
            if (is_numeric($id)) {
                $this->model->update($_POST, $id);
            } else {
                
                //$_POST['breeder_site_id'] = $breederSiteId;
                $_POST['breeder_site_id'] = $this->session->userdata('selected_breedersite');
                
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
    	        $this->session->set_userdata('validation_error',validation_errors());
    	        $this->session->set_userdata('current_dialog_item', (is_numeric($id) ? $id : 0));
    	        
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('stockyard/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Stockyards', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function for_breedersite()
    {
        $id = $this->uri->segment(3);
        
        if (!$id) {
            
            redirect(base_url() . '404');
        }  
        
        $this->load->model("Breedersites", "site");
        $this->load->model("Stockyards", 'yard');
        
        $data = array();
        $data['current_breedersite'] = $this->site->find($id);
        $data['yards'] = $this->yard->fetchForBreedersite($id);
        
        $this->template->build("stockyard/for_breedersite", $data);
    }
}