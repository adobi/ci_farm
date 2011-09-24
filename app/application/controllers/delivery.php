<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Delivery extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Deliverys', 'model');
        
        $this->template->build('delivery/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Deliverys', 'model');
        
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
            redirect($_SERVER['HTTP_REFERER']);
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