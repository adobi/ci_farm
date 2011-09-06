<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Casttype extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Casttypes', 'model');
        
        $this->template->build('casttype/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Casttypes', 'model');
        
        $item = false;
        if ($id) {
            if ($id === 'cast') {
                
                $cast = $this->uri->segment('4');
            }
            
            if (is_numeric($id)) {
                
                $cast = $this->uri->segment('5');
                $castType = $this->uri->segment('3');
                
                $item = $this->model->find($castType);
            }
        }

        $data['current_item'] = $item;
        
        $this->form_validation->set_rules('name', 'Név', 'trim|required');
        $this->form_validation->set_rules('code', 'Kód', 'trim');        
        
        if ($this->form_validation->run()) {
        
            if ($item) {
                $this->model->update($_POST, $id);
            } else {
                
                $_POST['cast_id'] = $cast;
                
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
        
        $this->template->build('casttype/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Casttypes', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}