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
        $this->session->unset_userdata('actual_hutching_id');
        
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
        $data['stock_in_fakk'] = false;
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
	         * az aktualis betelepites
	         *
	         * @author Dobi Attila
	         */
            $actualHutching = current($this->hutching->fetchActual($this->session->userdata('selected_breedersite'), $this->session->userdata('selected_stockyard')));
    	    $data['actual_hatching'] = $actualHutching;
            $this->session->set_userdata('actual_hutching_id', $actualHutching ? $actualHutching->id : 0);

    	    /**
    	     * fakkok, allomanyok listaja
    	     *
    	     * @author Dobi Attila
    	     */
	        $this->load->model('Fakks', 'fakk');
	        
	        $data['fakks'] = $this->fakk->fetchForStockyard($this->session->userdata('selected_stockyard'));
	        
	        $this->load->model('Chickenstocks', 'stocks');
	        
	        $data['stocks'] = $this->stocks->fetchForBreedersiteAndHutching($this->session->userdata('selected_breedersite'), $this->session->userdata('actual_hutching_id'));
    	    //dump($data); die;
	        /**
	         * az aktualis betelepitesben szereplo allomanyok fakkokban
	         *
	         * @author Dobi Attila
	         */
	        $this->load->model('Stockinfakk', 'sif');
	        
	        $data['stock_in_fakk'] = $this->sif->fetchForHutching($this->session->userdata('actual_hutching_id'));
	        
	    } else {
	        
	        if ($this->uri->segment(3) === 'new_hatching') {
	            redirect(base_url() . 'egg/index');
	        }
	    }
	    
        $this->template->build('egg/index', $data);
    }
    
    public function add_stock_to_fakk() 
    {
        $data = array(); 
        
        $fakk = $this->uri->segment(3);
        $stock = $this->uri->segment(4);
        
        $this->load->model('Chickenstocks', 'stocks');
        
        $chickenstock = $this->stocks->fetchPieceNotInFakks($stock);
        
        $data['piece'] = $chickenstock->piece;

        $this->form_validation->set_rules('piece', 'trime|required|numeric|less_than['.$data['piece'].']');
        
        if ($this->form_validation->run()) {
            
            $this->load->model('Stockinfakk', 'sif');
            
            $this->sif->insert(array(
                'fakk_id'=>$fakk,
                'stock_id'=>$stock,
                'piece'=>$_POST['piece'],
                'created'=>$_POST['created'],
                'hutching_id'=>$this->session->userdata('actual_hutching_id')
            ));
            
            redirect(base_url() . 'egg');
        } 
        
        $this->template->build('egg/add_stock_to_fakk', $data);
    }
    
    public function edit_stock_in_fakk() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Stockinfakk', 'sif');
        
        $item = $this->sif->find($id);
        
        $data['item'] = $item;
        
        $this->load->model('Chickenstocks', 'stocks');
        
        //$chickenstock = $this->stocks->fetchPieceNotInFakks($item->stock_id);
        $chickenstock = $this->stocks->find($item->stock_id);
        
        $data['piece'] = $chickenstock->piece;
        
        $this->form_validation->set_rules('piece', 'trime|required|numeric|less_than['.$data['piece'].']');
        
        if ($this->form_validation->run()) {
            
            $this->load->model('Stockinfakk', 'sif');
            
            $this->sif->update(array(
                'piece'=>$_POST['piece'],
                'created'=>$_POST['created'],
            ), $id);
            
            redirect(base_url() . 'egg');
        }        
        
        $this->template->build('egg/edit_stock_in_fakk', $data);
    }
    
    public function remove_stock_from_fakk() 
    {
        $this->load->model('Stockinfakk', 'sif');
        
        $this->sif->delete($this->uri->segment(3));
        
        redirect($_SERVER['HTTP_REFERER']);
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
	    $this->session->unset_userdata('actual_hutching_id');
	    
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