<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Week 
{
	/**
	 * a het sorszamanak megfelelo napokat generalja le
	 *
	 * @param string $week 
	 * @param timestamp $date a het egy datuma
	 * @return void
	 * @author
	 */
	public function generate($week, $date) 
	{
	    $now = $date;
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
}