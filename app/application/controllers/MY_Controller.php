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
        
        if ($this->uri->segment(1) !== 'chickenstock') {
            
            if (!$this->input->is_ajax_request()) {
                
                //$this->session->unset_userdata('selected_breedersite');
            }
        }
       
    }
    
    protected function paginate($url, $uriSegment, $total, $perPage = ITEMS_PER_PAGE) 
    {
        $this->load->library('pagination');
        
	    $config = array();
	    $config['base_url'] = base_url() . $url;
	    $config['total_rows'] = $total;
	    $config['per_page'] = $perPage;
	    $config['num_links'] = 5;
	    $config['uri_segment'] = $uriSegment;
	    $config['first_link'] = 'Első';
	    $config['last_link'] = 'Utolsó';
	    $config['next_link'] = 'Következő &rarr;';
	    $config['prev_link'] = '&larr; Előző';
	    $config['next_tag_open'] = '<span class = "next-page">';
	    $config['next_tag_close'] = '</span>';
	    $config['prev_tag_open'] = '<span class = "prev-page">';
	    $config['prev_tag_close'] = '</span>';
	    //$config['display_pages'] = FALSE;
	    
	    $this->pagination->initialize($config);
	    
	    return $this->pagination->create_links();
	            
    }
}
