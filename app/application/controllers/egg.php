<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Egg extends MY_Controller {

    public function index()
    {
        redirect(base_url().'egg/week/'.date('W'));
    }
    
	public function week()
	{
	    $week =  $this->uri->segment(3);
	    
	    if (false === $week) {
	        
	        redirect(base_url() . '404');
	    }
	    
	    /**
	     * TODO ha valtozik az ev akkor azt figyelni. amikor a $week eleri a 0-t az ev - 1, ha eleri a veget akkor ev + 1
	     *
	     * @author Dobi Attila
	     */
	    
	    $data = array();
	    
	    $dates = $this->generateWeek($week);
	    $data['week'] = $week;
	    $data['week_begining'] = $dates['weekBegining'];
	    $data['week_end'] = $dates['weekEnd'];
	    $data['selected_week_days'] = $dates['selectedWeekDays'];
	    
	    /**
	     * telephelyek lekerdezese
	     *
	     * @author Dobi Attila
	     */
	    $this->load->model("Breedersites", "sites");
	    $sites = $this->sites->fetchAll();
	    $data['breeder_sites'] = $this->sites->toAssocArray('id', 'code', $sites);
	    
	    /**
	      * tenyeszto lekerdezese
	      *
	      * @author Dobi Attila
	      */ 
	    $this->load->model("Breeders", "breeders");
	    $data['breeder'] = $this->breeders->fetchAll(array(), true);
	    
	    
	    /**
	     * kivalasztott telephelyhez tartozo allaomanyok
	     *
	     * @author Dobi Attila
	     */
	    //$this->load->model('Chickenstock', 'stock');
	    //$stocks = $this->stock->fetchForBreedersite($this->session->userdata('selected_breedersite'));
	    //$data['stocks'] = $this->stock->toAssocArray('id', 'code', $stocks);
	    
		$this->template->build('egg/index', $data);
	}
	
	/**
	 * megjegyzes tojastermeleshez adott napra
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function comment()
	{
	    $data = array();
	    
        echo $this->session->userdata('selected_breedersite');
	    
	    $this->template->build("egg/comment", $data);
	}
	
	/**
	 * vitaminok megadasa tojastermeleshez adott napra
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function vitamin()
	{
        $data = array();
        
        
        $this->template->build("egg/vitamin", $data);
	}
	
	/**
	 * tapanyag felvitele adott naphoz
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function add_food()
	{
	    $data = array();


	    
	    $this->template->build("egg/add_food", $data);
	}
	
	/**
	 * tapanyag torlese adott naphoz
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function delete_food()
	{
	    
	    redirect($_SERVER['HTTP_REFERER']);
	}
	
	/**
	 * elhalalozasok megadasa adott naphoz
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function add_death()
	{
	    $data = array();
	    
	    
	    $this->template->build("egg/add_death", $data);
	}
	
	/**
	 * elhalalozas torlese adott naphoz
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function delete_death()
	{
	    redirect($_SERVER['HTTP_REFERER']);
	}
	
	/**
	 * tojastermelesi adatok felvitele adott naphoz
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function add_production()
	{
	    $data = array();

	    /**
	     * kivalasztott telephelyhez tartozo allaomanyok
	     *
	     * @author Dobi Attila
	     */
        $this->checkSessionForSelectedBreedersite();
	    
        /**
         * allaomanyok lekerdezese
         *
         * @author Dobi Attila
         */
        $data['stocks'] = $this->getStocksForSelectedBreedersite(true);
	    
	    /**
	     * tojastipusok lekerdezese
	     *
	     * @author Dobi Attila
	     */
	    $this->load->model("Eggtypes", "eggtype");
	    $data['egg_types'] = $this->eggtype->fetchAll();
	    
	    $this->form_validation->set_rules('chicken_stock_id', 'trim|required');
	    
	    if ($this->form_validation->run()) {
	        
	        $date = date('Y-m-d', $this->uri->segment(3));
	        
	        $this->load->model('Eggproductions', 'production');

	        $production = $this->production->findByStockid($_POST['chicken_stock_id']);
	        
	        $this->load->model("Eggproductiondays", 'days');
	        
	        $productionDay = $this->days->findByDateAndProduction($date, $production->id);
	        
	        if (!$productionDay) {
	            
	            $productionDayId = $this->days->insert(array('to_date'=>$date, 'egg_production_id'=>$production->id));
	        } else {
	            
	            $productionDayId = $productionDay->id;
	        }
	        
	        if ($_POST['eggtypes_ids'] && $_POST['eggtypes_pieces']) {
	            
	            $this->load->model('Eggproductiondata', 'data');
	            
	            foreach ($_POST['eggtypes_ids'] as $index => $value) {
	                
	                $this->data->insert(array('egg_production_day_id'=>$productionDayId, 'egg_type_id'=>$value, 'piece'=>$_POST['eggtypes_pieces'][$index]));
	            }
	        }
	        
	        redirect($_SERVER['HTTP_REFERER']);
	        
	    } else {
	        
	        /*
	            TODO hibat adni, elohozni a dialogot a napnak  megfeleloen
	        */
	    }
	    
	    
	    $this->template->build("egg/add_production", $data);
	}
	
	/**
	 * tojastermelesi adatok torlese adott naphoz
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function delete_production()
	{
	    redirect($_SERVER['HTTP_REFERER']);
	}
	
	/**
	 * adott napra mutaja meg az adott telephely termelesi adatait (bovebben link)
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function show_production() 
	{
	    $data = array();
	    
	    /**
	     * van a telephely kivalasztva
	     *
	     * @author Dobi Attila
	     */
        $this->checkSessionForSelectedBreedersite();
        
	    $date = date('Y-m-d', $this->uri->segment(3));
	    
	    //$data['date'] = $date;
	    
	    /**
	     * tojastipusok
	     *
	     * @author Dobi Attila
	     */
	    $this->load->model("Eggtypes", 'eggtype');
	    $data['egg_types'] = $this->eggtype->fetchAll();
	    
	    /**
	     * allomanyok
	     *
	     * @author Dobi Attila
	     */
	    $stocks = $this->getStocksForSelectedBreedersite();

        $this->load->model('Eggproductions', 'production');
        
        $this->load->model("Eggproductiondays", 'days');
        
        $this->load->model('Eggproductiondata', 'data');
            
	    $data['stocks'] = array();
	
	    foreach ($stocks as $stock) {

            $production = $this->production->findByStockid($stock->id);
            
            $productionDay = $this->days->findByDateAndProduction($date, $production->id);
            
	        $data['stocks'][] = array(
	            'stock'=>$stock, 
	            'production_day_id'=>$productionDay ? $productionDay->id : false,
	            'data'=>$productionDay ? $this->data->fetchByProductionDayId($productionDay->id) : false
	        );
	    }
	    
	    $this->template->build('egg/show_production', $data);
	}
	
	/**
	 * beallitja session-be a kivalasztott telephelyet a termeles fooldalan
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function set_selected_breedersite()
	{
	    if ($this->uri->segment(3))
	    {
	        $this->session->set_userdata('selected_breedersite', $this->uri->segment(3));
	    }
	    
	    die;
	}
	
	/** 
	 * NEM HASZNALJUK
	 * beallitja a kivalasztott allomanyt a termeles fooldalan
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function set_selected_chickenstock()
	{
	    if ($this->uri->segment(3))
	    {
	        $this->session->set_userdata('selected_chickenstock', $this->uri->segment(3));
	    }
	    
	    die;
	}
	
	/**
	 * a het sorszamanak megfelelo napokat generalja le
	 *
	 * @param string $week 
	 * @return void
	 * @author Dobi Attila
	 */
	private function generateWeek($week) 
	{
	    $now = time();
	    $format = 'Y-m-d';
	    
	    $oneDayInSeconds = 24*60*60;
	    
	    
	    $thisWeek = date('W', $now);
	    $dayOfThisWeek = date('w', $now);
	    
	    if ($week === $thisWeek) {
	        $dateFor = $now;
	    }
	    
	    if ($week < $thisWeek) { //hatra lapozunk
	        
	        $diffOfWeeks = $thisWeek - $week;
	        $dateFor = $now - $diffOfWeeks * 7 * $oneDayInSeconds;
	    }
	    
	    if ($week > $thisWeek) { //elore lapozunk
	        
	        $diffOfWeeks = $week - $thisWeek;
	        $dateFor = $now + $diffOfWeeks * 7 * $oneDayInSeconds;
	    }
	    $weekBeginingTimestamp = $dateFor - ($dayOfThisWeek - 1)*$oneDayInSeconds;
	    $weekBegining = date($format, $weekBeginingTimestamp);
	    $weekEndTimestamp = $dateFor + (7-$dayOfThisWeek)*$oneDayInSeconds;
	    $weekEnd = date($format, $weekEndTimestamp);
	    
	    $selectedWeekDays = array();
	    for ($i = $weekBeginingTimestamp; $i <= $weekEndTimestamp; $i= $i + $oneDayInSeconds) {
	        
	        //$selectedWeekDays[] = date('m-d', $i);
	        $selectedWeekDays[] = $i;
	    }
	    
	    return array('weekBegining'=>$weekBegining, 'weekEnd'=>$weekEnd, 'selectedWeekDays'=>$selectedWeekDays);	    
	}
	
	/**
	 * ellenorzi, hogy lett e kivalasztva telephely
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	private function checkSessionForSelectedBreedersite()
	{
	    if (!$this->session->userdata('selected_breedersite')) {
	        
	        echo '<div class = "error">Előbb válasszon telephelyet</div>';
	        
	        die;
	    }	    
	}
	
	/**
	 * ha vannak, visszaadja a kivalasztott telephely allaomanyait
	 *
	 * @param $assoc select elemhez kellenek e, vagy sima tombkent
	 * @return void
	 * @author Dobi Attila
	 */
	private function getStocksForSelectedBreedersite($assoc = false)
	{
	    $this->load->model('Chickenstock', 'stock');
	    $stocks = $this->stock->fetchForBreedersite($this->session->userdata('selected_breedersite'));
	    
	    if (!$stocks) {
	        
	        echo '<div class = "error">Előbb vigyen fel állomanyt</div>';
	        
	        die;
	    }
	    
	    return $assoc ? $this->stock->toAssocArray('id', 'code', $stocks) : $stocks;	    
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */