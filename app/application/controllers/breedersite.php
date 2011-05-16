<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Breedersite extends MY_Controller 
{
    public function index() 
    {
        
        $data = array();
        
        $this->load->model('Breedersites', 'model');
        
        $this->template->build('breeder_site/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Breedersites', 'model');
        $this->load->model('Breeders', 'breeder');
        
        $item = false; $breederId = false; $currentBreeder = false;
        if ($id) {
            // breedersite/edit/breeder/1
            if ($id === 'breeder') {
                
                $breederId = $this->uri->segment('4');
                
                $currentBreeder = $this->breeder->find($breederId);
                
                $data['current_breeder'] = $currentBreeder;
            }
            
            $currentBreederSite = false;
            // breedersite/edit/1/breeder/1
            if (is_numeric($id)) {
                
                $currentBreederSite = $this->model->find($id);
                
                $data['current_breeder_site'] = $currentBreederSite;
            }
        }
        $data['current_item'] = $item;
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('breeder_site/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Breedersites', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function for_breeder()
    {
        $id = $this->uri->segment(3);
        
        if (!$id) {
            
            redirect(base_url() . '404');
        }
        
        
        $this->load->model('Breeders', 'breeder');
        $this->load->model('Breedersites', 'site');
        
        $data = array();
        
        $breeder = $this->breeder->find((int)$id);
        
        if (!$breeder) {
            
            redirect(base_url() . '404');
        }
        
        $data['breeder'] = $breeder;
        $data['site'] = $this->site->fetchForBreeder($id);
        
        $this->template->build('breeder_site/for_breeder', $data);
    }
}