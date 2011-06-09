<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Productionday extends MY_Controller 
{
    public function edit_feed()
    {
        $id = $this->uri->segment(3);
        
        $this->load->model('Eggproductiondays', 'days');
        
        unset($_POST[$this->security->get_csrf_token_name()]);
        
        echo $this->days->update($_POST, $id);
        
        die;
    }
    
    public function delete_feed()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            
            $this->load->model('Eggproductiondays', 'days');
            
            echo $this->days->update(array('feed_male'=>null, 'feed_female'=>null, 'feed_grain'=>null), $id);
        }
        
        die;
    }
}