<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Stockegg extends MY_Controller 
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
    
    /**
     * uj tojas allomany
     *
     * @return void
     * @author Dobi Attila
     */
    public function add_to_breedersite()
    {
        $data = array();
        
        /**
         * ha a tojastermeloi oldalrol jott a keres
         *
         * @author Dobi Attila
         */
        if (!$this->session->userdata('selected_breedersite')) {
            
            echo '<div class = "error">Előbb válasszon telephelyet</div>';
            
            die;
        }
        
        /**
         * tojas tipusok
         *
         * @author Dobi Attila
         */
        $this->load->model('Eggtypes', 'eggtypes');
        $data['eggtypes'] = $this->eggtypes->toAssocArray('id', 'code+description', $this->eggtypes->fetchAll());
        
        $this->form_validation->set_rules('code', 'Kód', 'required|trim');
                
        if ($this->form_validation->run()) {
            
        
            $this->load->model('Eggstock', 'model');
            
            $_POST['buyer_breeder_site_id'] = $this->session->userdata('selected_breedersite');
            
            $this->model->insert($_POST);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
                
        $this->template->build('stockegg/add_to_breedersite', $data);    
    }    
    
}