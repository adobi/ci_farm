<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Hatching extends MY_Controller 
{
    public function _index() 
    {
        /**
         * annak a datumnak a meghatarozasa amelyre meg nem szerpel mind a 3 bejegyzes
         *
         * @author Dobi Attila
         */
        //$this->load->model('Eggproductiondays', 'days');
        $lastBlank = false;//$this->days->getLastBlankDate();

        $date = time();
        if ($lastBlank) {
            
            $date = strtotime($lastBlank->to_date);
        } 

        $week = date('W', $date);
        $dayOfThisWeek = date('w', $date);

        if ($dayOfThisWeek === '0') {
            // vasarnap meg az elozo hethez tartozik
            $week = $week - 1;
        }
        
        redirect(base_url().'hatching/week/'.$week);
    }
    
    public function index()
    {
	    /**
	     * TODO ha valtozik az ev akkor azt figyelni. amikor a $week eleri a 0-t az ev - 1, ha eleri a veget akkor ev + 1
	     *
	     * @author Dobi Attila
	     */
	    
	    $data = array();

	    /**
	     * telephelyek lekerdezese
	     *
	     * @author Dobi Attila
	     */
	    $this->load->model("Breedersites", "sites");
	    $sites = $this->sites->fetchAll(array('order'=>array('by'=>'name', 'dest'=>'asc')));
	    
	    $data['breeder_sites'] = $this->sites->toAssocArray('id', 'name+code', $sites);
	    
	    /**
	     * mi van alapbol kivalasztva
	     *
	     * @author Dobi Attila
	     */
	    if (!$this->session->userdata('selected_breedersite')) {
	        
    	    $this->session->set_userdata('selected_breedersite', $sites ? $sites[0]->id : 0);
	    }

	    /**
	      * tenyeszto lekerdezese
	      *
	      * @author Dobi Attila
	      */ 
	    $this->load->model("Breeders", "breeders");
	    $data['breeder'] = $this->breeders->fetchAll(array(), true);
	    
	    /**
	     * a kivalasztott telephelynek megfeleo gepek lekerdezese 
	     *
	     * @author Dobi Attila
	     */
	    $this->load->model('Machines', 'machines');
	    $data['machines'] = $this->machines->fetchForBreeder($this->session->userdata('selected_breedersite'));
	    
		$this->template->build('hatching/index', $data);	    
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_item'] = $item;
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}