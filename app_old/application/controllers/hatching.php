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
         * @author
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
	     * @author
	     */
	    
	    $data = array();

	    /**
	     * telephelyek lekerdezese
	     *
	     * @author
	     */
	    $this->load->model("Breedersites", "sites");
	    $sites = $this->sites->fetchRows(array('where'=>array('site_type'=>2), 'order'=>array('by'=>'name', 'dest'=>'asc')));
	    
	    $data['breeder_sites'] = $this->sites->toAssocArray('id', 'name+code', $sites);
	    
	    /**
	     * mi van alapbol kivalasztva
	     *
	     * @author
	     */
	    if (!$this->session->userdata('selected_breedersite')) {
	        
    	    $this->session->set_userdata('selected_breedersite', $sites ? $sites[0]->id : 0);
	    }

	    /**
	      * tenyeszto lekerdezese
	      *
	      * @author
	      */ 
	    $this->load->model("Breeders", "breeders");
	    $data['breeder'] = $this->breeders->find($this->breeders->getId());
	    
	    /**
	     * a kivalasztott telephelynek megfeleo gepek lekerdezese 
	     *
	     * @author
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
    
    /**
     * elso lepesben, berak egy tojas allomanyt a gepbe
     *
     * @return void
     * @author
     */
    public function add_to_machine()
    {
        $data = array();
        
        $machine = $this->uri->segment(3);
        
        $this->load->model('Eggstock', 'eggstock');
        $egg_stocks = $this->eggstock->fetchNoInMachine();
        $data['egg_stocks'] = $this->eggstock->toAssocArray('id', 'code+name', $egg_stocks);
        

        if (!$egg_stocks) {
            
            echo '<div class = "error">Nincs olyan tojás állomány ami ne szerepelne gépben.<br />Vigyen fel új állományt.</div>';
            die;
        }
        
        
        $this->form_validation->set_rules('egg_stock_id', 'Tojás állomány', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            $this->load->model('Eggstockinmachine', 'in_machine');
            
            $_POST['put_in_date'] = isset($_POST['put_in_date']) ? $_POST['put_in_date'] : date('Y-m-d H:i:s');
            $_POST['machine_id'] = $machine;
            $this->in_machine->insert($_POST);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('hatching/add_to_machine', $data);
    }
    
    /**
     * azokat az allomanyokat listazzuk amik adott gepben vannak
     *
     * @return void
     * @author
     */
    public function eggstocks_in_machine()
    {
        $machine = $this->uri->segment(3);
        
        $data = array();
        
        $this->load->model('Machines', 'machine');
        
        $data['machine'] = $this->machine->find($machine);
        
        $this->load->model('Eggstockinmachine', 'in_machine');
        
        $data['eggstocks'] = $this->in_machine->fetchStocksInMachine($machine);
        
        $this->template->build('hatching/eggstocks_in_machine', $data);
    }
    
    /**
     * az lampazas, bujtatas, keles lepeseit
     *
     * @return void
     * @author
     */
    public function step()
    {
        $step = $this->uri->segment(3);
        $egg_stock_in_machine_id = $this->uri->segment(4);
        
        if (!$step || $step < 1 || $step > 3) {
            
            echo '<div class = "error">Hibás lépés</div>';
            
            die;
        }
        
        $data = array();
        
        $this->load->model('Hatchingdata', 'hatchingdata');
        $data['step'] = $this->hatchingdata->fetchByStepAndInMachineId($step, $egg_stock_in_machine_id);
        
        $this->form_validation->set_rules('step_date','Dátum', 'trim|required');
        
        if ($this->form_validation->run())
        {
            $_POST['egg_stock_in_machine_id'] = $egg_stock_in_machine_id;
            $_POST['step_id'] = $step;
            
            if ($data['step']) {
                
                $this->hatchingdata->update($_POST, $data['step']->id);
            } else {
                
                $this->hatchingdata->insert($_POST);
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        
        $this->template->build('hatching/step', $data);
    }
}