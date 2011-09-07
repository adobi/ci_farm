<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once(BASEPATH.'core/Controller'.EXT);

class MY_Controller extends CI_Controller 
{
    
    
    //php 5 constructor
    public function __construct() 
    {
        parent::__construct();
        
        if ($this->uri->segment(1) !== 'auth' && !$this->session->userdata('current_user_id')) {
            
            if ($this->input->is_ajax_request()) {
                
                echo '<script type="text/javascript">location.reload();</script>';
                die;
            }            
            
            redirect(base_url() . 'auth/login');
        }
        
        if ($this->uri->segment(1) !== 'cast' && $this->uri->segment(1) !== 'casttype') {
            
            if (!$this->input->is_ajax_request())
                $this->session->unset_userdata('selected_cast');
        }
       
    }
}
