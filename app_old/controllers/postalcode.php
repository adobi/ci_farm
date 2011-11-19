<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Postalcode extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Postalcodes', 'postalcodes');
        
        $postalcodes = $this->postalcodes->search($_GET['term']);
        
        $return = array();
        if ($postalcodes) {
            
            foreach ($postalcodes as $pc) {
                
                $return[] = array('id'=>$pc->id, 'label'=>$pc->code . ' - ' . $pc->city, 'value' => $pc->code . ' - ' . $pc->city );
            }
        } else {
            
        }
        
        echo json_encode($return);
        
        die;
    }
    
}