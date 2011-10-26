<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Chickenstock extends MY_Controller 
{
    
    public function index2() 
    {
        $this->session->unset_userdata('selected_breedersite');
        $this->session->unset_userdata('delivery_id');
        $this->session->unset_userdata('delivery_serial_number');
        
        redirect(base_url() . 'chickenstock/index');
    }
    
    public function index() 
    {
        $data = array();
        
        $this->load->model('Chickenstocks', 'model');
        $this->load->model('Breedersites', 'site');
        $this->load->model('Breeders', 'breeder');

        $data['breeder_id'] = $this->breeder->getId();
        $sites = $this->site->fetchForBreeder($this->breeder->getId());
	    $data['breeder_sites_select'] = $this->site->toAssocArray('id', 'code+name', $sites);

        $page = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
    
        if ($_POST && isset($_POST['serial_number']) && $_POST['serial_number']) {
            
            $this->session->set_userdata('delivery_serial_number', $_POST['serial_number']);
            
            $this->load->model('Deliverys', 'delivery');
            
            $delivery = $this->delivery->findBySerialNumber($_POST['serial_number'], true);
            
            if ($delivery) {
                $delivery = $delivery[0];
                $this->session->set_userdata('delivery_id', $delivery->id);
            }
        }
        
        $params['limit'] = DELIVERY_ITEMS_PER_PAGE;
        $params['offset'] = $page; 
        
        if ($this->session->userdata('selected_breedersite')) {
            
            $this->session->unset_userdata('delivery_id');            
            
            $data['pagination_links'] = $this->paginate(
                                                'chickenstock/index/page/', 
                                                4, 
                                                $this->model->count(array('holder_breeder_site_id'=>$this->session->userdata('selected_breedersite'))), 
                                                DELIVERY_ITEMS_PER_PAGE);
            
    	    $data['items'] = $this->model->fetchFor('breedersite', $this->session->userdata('selected_breedersite'), $params);
        
    	} elseif ( $this->session->userdata('delivery_id')) {
            
    	    $this->session->unset_userdata('selected_breedersite');
    	    
            $data['pagination_links'] = $this->paginate(
                                                'chickenstock/index/page/', 
                                                4, 
                                                $this->model->count(array('delivery_id'=>$this->session->userdata('selected_breedersite'))), 
                                                DELIVERY_ITEMS_PER_PAGE);
            
    	    $data['items'] = $this->model->fetchFor('delivery', $this->session->userdata('delivery_id'), $params);
    	        	    
    	} else {
    	    $data['pagination_links'] = false;
    	    $data['items'] = false;
    	}
        
        

        $this->template->build('chickenstock/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Chickenstocks', 'model');
        
        $item = false; $delivery = false;
        if (is_numeric($id)) {

            $item = $this->model->find((int)$id);
            //$delivery = $this->uri->segment(5);
        } else {

            $delivery = $this->uri->segment(4);
        }
        
        $data['current_item'] = $item;
        
        //$this->form_validation->set_rules('stock_code', 'Törzsállomány', 'trim|required');
        //$this->form_validation->set_rules('hatching_breeder_site_id', 'Keltető tenyészet kódja', 'trim|required');
        $this->form_validation->set_rules('hatching_date', 'Kelés dátuma', 'trim|required');
        $this->form_validation->set_rules('piece', 'Darabszám', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            if (is_numeric($id)) {
                $this->model->update($_POST, $id);
            } else if ($delivery) {


                $_POST['delivery_id'] = $delivery;
                
                $this->load->model('Deliverys', 'delivery');
                
                $d = $this->delivery->find($delivery);
                
                if ($d) {
                    
                    $_POST['hatching_breeder_site_id'] = $d->seller_id;
                    $_POST['holder_breeder_site_id'] = $d->buyer_id;
                }
                
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->load->model('Casttypes', 'casttypes');
        
        $data['cast_types'] = $this->casttypes->toAssocArray('id', 'name', $this->casttypes->fetchForChicken());
        
        $this->template->build('chickenstock/edit', $data);
    }
    
    public function show()
    {
        $id = $this->uri->segment(3);
        
        $this->load->model('Chickenstocks', 'model');
        
        $data['item'] = $this->model->find($id);
        
        $this->template->build('chickenstock/show', $data);
    }
    
    public function add_certificate()
    {
        $id = $this->uri->segment(3);
        
        $this->load->model('Chickenstocks', 'model');
        
        $this->form_validation->set_rules('certificate_code', 'Törzsállomány azonosító száma', 'trim|required');
        
        $data['item'] = $this->model->find($id);
        
        if ($this->form_validation->run()) 
        {
            $this->model->update($_POST, $id);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('chickenstock/add_certificate', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Chickenstocks', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}