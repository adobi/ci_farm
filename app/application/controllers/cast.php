<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Cast extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Casts', 'model');
        
        $data['items'] = $this->model->toAssocArray('id', 'code+name', $this->model->fetchAll(array('order'=>array('by'=>'code', 'dest'=>'asc'))));
                
        
        if ($this->session->userdata('selected_cast')) {
            
            
            $this->load->model('CastTypes', 'castTypes');
            
            $data['types'] = $this->castTypes->fetchForCast($this->session->userdata('selected_cast'));
        } else {
            $data['types'] = false;
        }
        
        $this->template->build('cast/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Casts', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_item'] = $item;
        
        $this->form_validation->set_rules('name', 'Név', 'trim|required');
        $this->form_validation->set_rules('code', 'Kód', 'trim');
        
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
    	        $this->session->set_userdata('current_dialog_item', (is_numeric($id) ? $id : 0));                
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('cast/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Casts', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function set_selected_cast()
    {
	    if ($this->uri->segment(3))
	    {
	        $this->session->set_userdata('selected_cast', $this->uri->segment(3));
	    }
	    
	    die;        
    }
}