<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Fakk extends MY_Controller 
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
        
        $id = $this->uri->segment(3);
        
        $this->load->model('', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_item'] = $item;
        
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
        
        $this->template->build('/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Fakks', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function add_to_group()
    {
        $group = $this->uri->segment(3);
        
        $this->load->model('Fakks', 'fakks');
        
        $this->form_validation->set_rules('name', 'Név', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            $fakkId = $this->fakks->insert($_POST);
            //dump($fakkId); dump($group); die;
            if ($fakkId && $group) {
                
                $this->load->model('Fakksingroup', 'fig');
                
                $this->fig->insert(array('fakk_id'=>$fakkId, 'fakk_group_id'=>$group));
            } else {
                
                /*
                    TODO valamilyen hibat adunk
                */
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('fakk/edit');
    }
}