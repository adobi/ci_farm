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
	        
	        $selectedWeekDays[] = date('m-d', $i);
	    }
	    
	    $data['week'] = $week;
	    $data['week_begining'] = $weekBegining;
	    $data['week_end'] = $weekEnd;
	    $data['selected_week_days'] = $selectedWeekDays;
	    
	    
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
	    $this->load->model('Chickenstock', 'stock');
	    $stocks = $this->stock->fetchForBreedersite($this->session->userdata('selected_breedersite'));
	    $data['stocks'] = $this->stock->toAssocArray('id', 'code', $stocks);
	    
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */