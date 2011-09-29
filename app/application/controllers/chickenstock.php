<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Chickenstock extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Chickenstocks', 'model');
        
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