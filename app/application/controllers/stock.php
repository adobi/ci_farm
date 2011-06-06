<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Stock extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('ChickenStock', 'model');
        
        $this->template->build('/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Chickenstock', 'model');
        $this->load->model('Chickentypes', 'chickentypes');
        
        $data['chickentypes'] = $this->chickentypes->toAssocArray('id', 'name', $this->chickentypes->fetchAll());
        
        $currentStockItem = false;
        if ($id) {
            if ($id === 'fakk') {
                
                $fakkId = $this->uri->segment('4');
                
                //$currentStockItem = $this->breedersites->find($breederSiteId);
            }
            
            if (is_numeric($id)) {
                
                $fakkId = $this->uri->segment('5');
                
                $currentStockItem = $this->model->find($id);
            }
        }
        $data['current_stock_item'] = $currentStockItem;
        
        
        $this->form_validation->set_rules('code', 'Kód', 'required|trim');
                
        if ($this->form_validation->run()) {
        
            if (is_numeric($id)) {
                $this->model->update($_POST, $id);
            } else {

                $_POST['fakk_id'] = $fakkId;
                
                //$this->load->model('Fakks', 'fakks');
                //$fakk = $this->fakks->find($fakkId);
                
                //$_POST['breeder_site_id'] = $fakk->breeder_site_id;

                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('stock/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('ChickenStock', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    /**
     * nem hasznaljuk!
     *
     * @return void
     * @author Dobi Attila
     */
    public function for_fakk()
    {
        $id = $this->uri->segment(3);
        
        $data = array();
        
        if ($id) {
            
            $this->load->model('ChickenStock', 'stock');
            $this->load->model('Fakks', 'fakks');
            
            $data['current_fakk'] = $this->fakks->find($id);
            $data['stock'] = $this->stock->fetchForFakk($id);
        } 
        
        $this->template->build('stock/for_fakk', $data);
    }
    
    public function sell()
    {
        $id = $this->uri->segment(3);
        
        $data = array();
        
        $this->form_validation->set_rules('buyer_breeder_site_id', 'Vevő telephely kódja', 'trim|required');
        $this->form_validation->set_rules('buy_date', 'Eladás dátuma', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            $this->load->model('Chickenstock', 'stock');
            
            /**
             * innen volt attol kikerul 
             *
             * @author Dobi Attila
             */
            $_POST['fakk_id'] = null;
                        
            $this->stock->update($_POST, array('id'=>$id));
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('stock/sell', $data);    
    }
    
    /**
     * beolazas, fakk valasztoval
     *
     * @return void
     * @author Dobi Attila
     */
    public function add_to_breedersite()
    {
        $data = array();
        
        if (!$this->session->userdata('selected_breedersite')) {
            
            echo 'Előbb válasszon telephelyet';
            
            die;
        }
        
        /**
         * minden olyan fakk ami az adott telephelyen van
         *
         * @author Dobi Attila
         */
        
        $this->load->model("Fakks", 'fakks');
        $fakks = $this->fakks->fetchForBreedersite($this->session->userdata('selected_breedersite'));
        $data['fakks'] = $this->fakks->toAssocArray('id', 'name', $fakks);
        
        /**
         * csirketipusok
         *
         * @author Dobi Attila
         */
        $this->load->model('Chickentypes', 'chickentypes');
        $data['chickentypes'] = $this->chickentypes->toAssocArray('id', 'name', $this->chickentypes->fetchAll());


        $this->form_validation->set_rules('code', 'Kód', 'required|trim');
                
        if ($this->form_validation->run()) {
        
             $this->load->model('Chickenstock', 'model');
            
            $this->model->insert($_POST);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
                
        $this->template->build('stock/add_to_breedersite', $data);    
    }
}