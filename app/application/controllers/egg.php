<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Egg extends MY_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index2()
    {
        $this->session->unset_userdata('selected_breedersite');
        $this->session->unset_userdata('selected_stockyard');
        
        redirect(base_url().'egg');
    }
    
    public function index()
    {
        $data = array();
        
        $this->load->model('Breedersites', 'site');
        $this->load->model('Breeders', 'breeder');
        $sites = $this->site->fetchForBreeder($this->breeder->getId());
	    
	    $data['breeder_sites_select'] = $this->site->toAssocArray('id', 'code+name', $sites);
	    
	    if ($this->session->userdata('selected_breedersite')) {
	        
	        $this->load->model('Stockyards', 'yard');
	        
	        $data['yards_select'] = $this->yard->toAssocArray('id', 'name', $this->yard->fetchForBreedersite($this->session->userdata('selected_breedersite')));
	    }
        
	    if ($this->session->userdata('selected_breedersite') && $this->session->userdata('selected_stockyard')) {
	        
    	    if ($this->uri->segment(3) === 'new_hatching') {
    	        
    	        /**
    	         * beszurni egy sort a betelepites tabalaba a kivalasztott telephely es istallo idvel
    	         *
    	         * @author Dobi Attila
    	         */
    	        
    	        /**
    	          * mikor lehet uj betelepitest kezdeni? (amikor minden fakk kiment)
    	          *
    	          * @author Dobi Attila
    	          */
    	         
    	        $this->load->model('Fakks', 'fakk');
    	        
    	        $data['fakks'] = $this->fakk->fetchForStockyard($this->session->userdata('selected_stockyard'));
    	    }
	    }
	    
        $this->template->build('egg/index', $data);
    }
	
	/**
	 * beallitja session-be a kivalasztott telephelyet a termeles fooldalan
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function set_selected_breedersite()
	{
	    if ($this->uri->segment(3)) {
	        $this->session->set_userdata('selected_breedersite', $this->uri->segment(3));
	    }
	    die;
	}
	
	public function set_selected_stockyard()
	{
	    if ($this->uri->segment(3)) {
	        $this->session->set_userdata('selected_stockyard', $this->uri->segment(3));
	    }

	    die;
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */