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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */