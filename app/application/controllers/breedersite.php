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
        $currentBreederSite = false;

        if ($id) {
            // breedersite/edit/breeder/1
            if ($id === 'breeder') {
                
                $breederId = $this->uri->segment('4');
                
                $currentBreeder = $this->breeder->find($breederId);
            }
            
            // breedersite/edit/1/breeder/1
            if (is_numeric($id)) {
                
                $breederId = $this->uri->segment('5');
                
                $currentBreederSite = $this->model->find($id);
            }
        }

        $data['current_breeder'] = $currentBreeder;
        $data['current_breeder_site'] = $currentBreederSite;
        $data['current_item'] = $item;
        
        $this->form_validation->set_rules('code', 'Kód', 'trime|required');
        $this->form_validation->set_rules('mgszh', 'MGSZH', 'trime|required');
        $this->form_validation->set_rules('postal_code_id', 'Irányítószám', 'trime|required');
        $this->form_validation->set_rules('address', 'Cím', 'trime|required');
        
        
        if ($this->form_validation->run()) {
            
            if (is_numeric($id)) {
                $this->model->update($_POST, $id);
            } else {
                
                $_POST['breeder_id'] = $breederId;
                
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
        $data['breeder_sites'] = $this->site->fetchForBreeder($id);
        
        $this->template->build('breeder_site/for_breeder', $data);
    }
    
    /**
     * autocomplete functiohoz listazza a telephely kodokatny tenyeszto nevevel egyutt
     *
     * @return void
     * @author Dobi Attila
     */
    public function search_code_and_name()
    {
        $this->load->model('Breedersites', 'sites');
        
        $sites = $this->sites->searchByCodeOrBreeder($_GET['term']);
        
        $result = array();
        if ($sites) {
            
            foreach ($sites as $item) {
                $result[] = array('id'=>$item->id, 'label'=>$item->name . ' - ' . $item->code, 'value' =>$item->name . ' - ' . $item->code);
            }
        }
        //dump($sites);
        echo json_encode($result);
        
        die;
    }
}