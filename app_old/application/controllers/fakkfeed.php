<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Fakkfeed extends MY_Controller 
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
            $this->load->model('Fakkfeeds', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    /**
     * adott fakkcsoporthoz visz fel tapanya bejegyzest
     *
     * @return void
     * @author Dobi Attila
     */
    public function for_fakk_group()
    {
        $id = $this->uri->segment('3');
        
        $data = array();
        
        $data['id'] = $id;
        
        $this->load->model('Fakkfeeds', 'feed');
        
        if ($id) {
            
            $this->load->model('Fakks', 'fakks');
            
            $data['last_empty_date'] = $this->feed->getLastEmptyDate($id);
                        
            $data['fakks'] = $this->fakks->toAssocArray('id', 'name', $this->fakks->fetchForGroup($id));
        }
        
        $this->form_validation->set_rules('fakk_id', 'Fakk', 'trim', 'required');
        $this->form_validation->set_rules('to_date', 'Dátum', 'trim', 'required');
        
        if ($this->form_validation->run()) {
            
            if ($_POST['is_for_group']) {
                
                $_POST['fakk_id'] = "-1";
            }
            
            $this->feed->insert($_POST);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('fakkfeed/for_fakk_group', $data);
    }
    
    public function list_for_group()
    {
        $data = array();

        $id = $this->uri->segment(3);
        
        $this->load->model("Fakkfeeds", "feeds");
        
        $data['feeds'] = $this->feeds->fetchForGroup($id);
        
        $this->template->build("fakkfeed/list_for_group", $data);
    }
    
}