<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Holdingdata extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('', '');
        
        $this->template->build('/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $place = false;
        $id = false;
        if (is_numeric($this->uri->segment(3))) {
            
            $id = $this->uri->segment(3);
        } else {
            
            $place = $this->uri->segment(4);
        }
        
        
        $this->load->model('Holdingdatas', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_item'] = $item;
        
        $this->form_validation->set_rules('type', 'Faj', 'trim|required');        
        $this->form_validation->set_rules('start_date', 'Tartás kezdete', 'trim|required');        
        
        if ($this->form_validation->run()) {
        
            if (is_numeric($id)) {
                $this->model->update($_POST, $id);
            } else {
                
                $_POST['holding_place_id'] = $place;
                
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('holdingdata/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Holdingdatas', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}