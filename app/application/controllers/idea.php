<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Idea extends CI_Controller 
{

    //php 5 constructor
    public function __construct() 
    {
        parent::__construct();
    }

    
    public function edit() 
    {
        $this->form_validation->set_rules('idea', 'Ötlet', 'trim|required');
        
        $response = array();
        
        if ($this->form_validation->run()) {
            $this->load->model('Ideas', 'ideas');
            $data = array(
                'idea' => $_POST['idea'],
                'created' => date('Y-m-d H:i:s'),
                
            );
        
            $result = $this->ideas->insert($data);
            
            if ($result) {
                
                $response['result'] = array('idea'=>$data['idea'], 'created'=>$data['created']);
            } else {
                $response['result'] = 0;
            }
            
        } else {
            $response['result'] = 0;
        }
        echo json_encode($response);
        die;
    }

}