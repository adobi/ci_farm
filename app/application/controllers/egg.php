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
        $data['can_start_new_hatching'] = false;
	    if ($this->session->userdata('selected_breedersite') && $this->session->userdata('selected_stockyard')) {
	        
	        $this->load->model('Hutchings', 'hutching');
	        
	        /**
	         * ha nincs aktualis betelepites akkor mutatjuk au uj betelepites gombot
	         *
	         * @author Dobi Attila
	         */
	        
	        if (!$this->hutching->hasActual($this->session->userdata('selected_breedersite'), $this->session->userdata('selected_stockyard'))) {
	            $data['can_start_new_hatching'] = true;
	        }
	         
    	    if ($this->uri->segment(3) === 'new_hatching') {
    	        
    	        /**
    	         * beszurni egy sort a betelepites tabalaba a kivalasztott telephely es istallo idvel
    	         *
    	         * @author Dobi Attila
    	         */
                $this->hutching->insert(array(
                    'breeder_site_id'=>$this->session->userdata('selected_breedersite'),
                    'stock_yard_id'=>$this->session->userdata('selected_stockyard'),
                    'created'=>date('Y-m-d H:i:s', time())
                ));
                
                redirect(base_url() . 'egg');
    	    }
	        
	        /**
	         * listazni az aktualis betelepitest
	         *
	         * @author Dobi Attila
	         */
            $actualHutching = $this->hutching->fetchActual($this->session->userdata('selected_breedersite'), $this->session->userdata('selected_stockyard'));
    	    $data['actual_hatching'] = $actualHutching;
            
    	    /**
    	     * fakkok, allomanyok listaja
    	     *
    	     * @author Dobi Attila
    	     */
	        $this->load->model('Fakks', 'fakk');
	        
	        $data['fakks'] = $this->fakk->fetchForStockyard($this->session->userdata('selected_stockyard'));
	        
	        $this->load->model('Chickenstocks', 'stocks');
	        
	        $data['stocks'] = $this->stocks->fetchForBreedersite($this->session->userdata('selected_breedersite'));
    	    
	    } else {
	        
	        if ($this->uri->segment(3) === 'new_hatching') {
	            redirect(base_url() . 'egg/index');
	        }
	    }
	    
        $this->template->build('egg/index', $data);
    }
    
    public function add_stock_to_fakk() 
    {
        $this->template->build('egg/add_stock_to_fakk');
    }
	
	/**
	 * beallitja session-be a kivalasztott telephelyet a termeles fooldalan
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function set_selected_breedersite()
	{
	    $this->session->unset_userdata('selected_stockyard');
	    
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