<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Proofoforigin extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('', '');
        
        $this->template->build('/index', '');
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Proofoforigins', 'model');
        
        $item = false; $delivery = false; $current_delivery = false;
        if (is_numeric($id)) {

            $item = $this->model->find((int)$id);
        } else {

            $delivery = $this->uri->segment(4);
            $this->load->model('Deliverys', 'delivery');
            $d = $this->delivery->find($delivery);
            
            $current_delivery = ($d ? $d[0] : false);
        }
        
        $data['current_item'] = $item;
        $data['current_delivery'] = $current_delivery;

        $this->load->model('Casttypes', 'casttypes');
        
        $data['cast_types'] = $this->casttypes->toAssocArray('id', 'name', $this->casttypes->fetchForChicken());        
        
        $this->load->model('Chickenstocks', 'stocks');
        
        $data['stocks'] = $this->stocks->toAssocArray('id', 'stock_code+piece', $this->stocks->fetchForDelivery($delivery));

        
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
        
        $this->template->build('proofoforigin/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}