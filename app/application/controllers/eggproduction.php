<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Eggproduction extends MY_Controller 
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
            $this->load->model('', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function for_fakk()
    {
        $id = $this->uri->segment(3);
        
        $data = array();
        
        
        $this->config->load('calendar');
        //dump($this->config->item('calendar_prefs')); die;
        $prefs = $this->config->item('calendar_prefs');
        $prefs['next_prev_url'] = base_url() . 'eggproduction/for_fakk/' . $id . '/';
        $this->load->library('calendar', $prefs);
        $content = array();
        for ($i = 1; $i<=31; $i++) $content[$i] = base_url();
        $data['calendar'] = $this->calendar->generate($this->uri->segment(4), $this->uri->segment(5), $content);
        
        $this->template->build("eggproduction/for_fakk", $data);
    }
}