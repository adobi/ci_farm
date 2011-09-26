<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Delivery extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Deliverys', 'model');
        
        if ($_POST && $_POST['serial_number']) {
            
            $data['items'] = $this->model->findBySerialNumber($_POST['serial_number']);
            
        } else {
            
            $page = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
    
    	    $data['pagination_links'] = $this->paginate('delivery/index/page/', 4, $this->model->count(), DELIVERY_ITEMS_PER_PAGE);
    	    $params['limit'] = DELIVERY_ITEMS_PER_PAGE;
    	    $params['offset'] = $page;        
            
            $data['items'] = $this->model->fetchAll($params);
            
        }
        $data['model'] = $this->model;

        $this->template->build('delivery/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Deliverys', 'model');
        
        $data['types'] = $this->model->getType();
        
        $data['intended'] = $this->model->getIntendedUse();
        
        // a fajtak listaja
        $this->load->model('Casts', 'cast');
        $data['casts'] = $this->cast->toAssocArray('id', 'name', $this->cast->fetchAll());
        
        // tenyeszetek listaja
        $this->load->model('Breedersites', 'sites');
        $data['breedersites'] = $this->sites->toAssocArray('id', 'name+city+code', $this->sites->fetchSiteWithBreederInfo());
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_item'] = $item;
        
        $this->form_validation->set_rules('serial_number', 'Sorszám', 'trim|required');
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            //redirect($_SERVER['HTTP_REFERER']);
            redirect(base_url().'delivery');
            
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('delivery/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Deliverys', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}