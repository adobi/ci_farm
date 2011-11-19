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
/*    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Eggstock', 'model');
        
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
        
        $this->template->build('stockegg/edit', $data);
    }
*/
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Eggstock', 'model');
            
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
    public function edit()
    {
        $data = array();

        $id = $this->uri->segment(3);
        
        $this->load->model('Eggstock', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_stock_item'] = $item;
        
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
        $this->load->model('Chickentypes', 'chicken_type');
        $data['chickentypes'] = $this->chicken_type->toAssocArray('id', 'code+name', $this->chicken_type->fetchAll());
        
        $this->form_validation->set_rules('code', 'Kód', 'required|trim');
                
        if ($this->form_validation->run()) {
            
        
            $this->load->model('Eggstock', 'model');
            
            $_POST['buyer_breeder_site_id'] = $this->session->userdata('selected_breedersite');
            
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }            
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
                
        $this->template->build('stockegg/edit', $data);    
    }    
    
}