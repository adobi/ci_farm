<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Proofoforigin extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('', '');
        
        $this->template->build('/index', '');
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Proofoforigins', 'model');
        
        $this->load->model('Chickenstockproofoforigin', 'cp');
        
        $item = false; $delivery = false; $current_delivery = false;
        if (is_numeric($id)) {

            $item = $this->model->find((int)$id);
            
            $proofs = $this->cp->findByProof($id);
            
            $item->stock_info = $proofs ? $proofs[0] : false;
            
            //dump($item); die;
            $delivery = $this->uri->segment(5);
        } else {

            $delivery = $this->uri->segment(4);
        }
        $this->load->model('Deliverys', 'delivery');
        $d = $this->delivery->find($delivery);
        
        $current_delivery = ($d ? $d[0] : false);        
        
        $data['current_item'] = $item;
        $data['current_delivery'] = $current_delivery;

        $this->load->model('Casttypes', 'casttypes');
        
        $data['cast_types'] = $this->casttypes->toAssocArray('id', 'name', $this->casttypes->fetchForChicken());        
        
        $this->load->model('Chickenstocks', 'stocks');
        
        $data['stocks'] = $this->stocks->toAssocArray('id', 'stock_code+piece', $this->stocks->fetchForDeliveryWithoutProof($delivery));
        
        if ($_POST && ($id || $_POST['male_stock_id'] || $_POST['female_stock_id'])) {
        
            //dump($_POST); die;
            
            if (is_numeric($id)) {
                $this->model->update($_POST, $id);
            } else {
                $inserted = $this->model->insert($_POST);
                
                $stock_ids = array();
                if ($_POST['male_stock_id']) {
                    $stock_ids[] = $_POST['male_stock_id'];
                }
                if ($_POST['female_stock_id']) {
                    $stock_ids[] = $_POST['female_stock_id'];
                }
                foreach ($stock_ids as $s) {
                    $this->cp->insert(array('stock_id'=>$s, 'proof_id'=>$inserted));
                }
                
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('proofoforigin/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Proofoforigins', 'model');
            
            $this->model->delete($id);
            
            $this->load->model('Chickenstockproofoforigin', 'cp');
            
            $this->cp->delete(array('proof_id'=>$id));
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}