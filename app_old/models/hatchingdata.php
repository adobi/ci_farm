<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Hatchingdata extends MY_Model 
{
    protected $_name = "hatching_data";
    protected $_primary = "id";
    
    /**
     * adott gepben levo tolyasalomanyhoz lett mar adat felvive adott lepesben
     *
     * @param string $step 
     * @param string $inMachineId 
     * @return object
     * @author Dobi Attila
     */
    public function fetchByStepAndInMachineId($step, $inMachineId)
    {
        if (!$step || !$inMachineId) {
            
            return false;
        }
        
        $result = $this->fetchRows(array('where'=>array('step_id'=>$step, 'egg_stock_in_machine_id'=>$inMachineId)), true);
        
        return $result;
    }
}