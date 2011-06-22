<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Machine extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Machines', 'model');
        
        $data['machines'] = $this->model->fetchAll();
        
        $this->template->build('machine/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Machines', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_item'] = $item;
        
        $this->form_validation->set_rules('name', 'Név', 'required|trim');
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
    	        $this->session->set_userdata('validation_error',validation_errors());
    	        $this->session->set_userdata('current_dialog_item', ($id ? $id : 0));
    	                        
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('machine/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Machines', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}