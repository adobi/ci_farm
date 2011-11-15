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

    public function for_breedersite() 
    {
        $siteId = $this->uri->segment(3);
        
        $data = array();
        
        $this->load->model('Stockyards', 'yards');
        $this->load->model('Breedersites', 'sites');
        $this->load->model('Fakks', 'fakk');
        
        $data['site'] = $this->sites->find($siteId);
        
        $this->form_validation->set_rules('stock_yard_id', 'Istálló', 'trim|requierd');
        $this->form_validation->set_rules('number_of', 'Fakkok darabszáma', 'trim|required|numeric');
        
        if ($this->form_validation->run()) {
            
            $data['is_permitted_to_create_fakks'] = $this->fakk->isPermittedToCreate($_POST['stock_yard_id']);
            
            $data['fakks'] = $this->fakk->fetchForStockyard($_POST['stock_yard_id']);
            
            if (isset($_POST['names']) && $_POST['names']) {
                
                $d = array(
                    'stock_yard_id'=>$_POST['stock_yard_id'],
                    'created'=>date('Y-m-d H-i-s', time())
                );
                
                foreach ($_POST['names'] as $item) {
                    $d['name'] = $item;
                    
                    $this->fakk->insert($d);
                }
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        } 
        
        
        $data['stockyards'] = $this->yards->toAssocArray('id', 'name', $this->yards->fetchForBreedersite($siteId));
        
        $this->template->build('fakk/for_breedersite', $data);
    }
    
    /**
     * not used
     *
     * @return void
     * @author Dobi Attila
     */
    public function add_to_group()
    {
        $group = $this->uri->segment(3);
        
        $this->load->model('Fakks', 'fakks');
        
        $this->form_validation->set_rules('name', 'Név', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            $_POST['fakk_group_id'] = $group;
            
            $fakkId = $this->fakks->insert($_POST);

            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('fakk/edit');
    }
    /**
     * not used
     *
     * @return void
     * @author Dobi Attila
     */
    public function change_group()
    {
        if ($_POST) {
            
            $this->load->model('Fakks', 'fig');
            
            echo $this->fig->update(
                array('fakk_group_id'=>$_POST['new_group']), 
                array('id'=>$_POST['fakk_id'])
            );
        }
        die;
    }    
}