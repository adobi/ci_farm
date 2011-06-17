<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Fakkgroup extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Fakkgroups', 'groups');
        
        $this->template->build('fakkgroup/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Fakkgroups', 'model');
        $this->load->model('Stockyards', 'yard');
        
        $currentFakkGroup = false;
        if ($id) {
            if ($id === 'stockyard') {
                
                $yardId = $this->uri->segment('4');
                
                $currentStockYard = $this->yard->find($yardId);
            }
            
            if (is_numeric($id)) {
                
                $yardId = $this->uri->segment('5');
                
                $currentFakkGroup = $this->model->find($id);
            }
        } 
               
        $data['current_fakk_group'] = $currentFakkGroup;
        
        
        $this->form_validation->set_rules('name', 'Név', 'trim|required');
        
        if ($this->form_validation->run()) {
        
            if (is_numeric($id)) {
                
                $this->model->update($_POST, $id);
            } else {
                
                $_POST['stock_yard_id'] = $yardId;
                 
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
        
        $this->template->build('fakkgroup/edit', $data);
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
    

    /**
     * adott telephelyhez tartozo fakkcsoportokat adja vissza
     *
     * @return void
     * @author Dobi Attila
     */
    public function for_stockyard()
    {
        $yard = $this->uri->segment(3);
        
        $this->load->model('Stockyards', 'yard');
        $this->load->model('Fakkgroups', 'groups');
        
        $groups = $this->groups->fetchForStockYard($yard);
        
        $data['current_stock_yard'] = $this->yard->find($yard);
        
        $data['groups'] = $groups;
        
        $this->template->set_partial('fakk_groups', '_partials/fakk_groups');
        
        $this->template->build('fakkgroup/for_stockyard', $data);
    }    
}