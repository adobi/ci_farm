<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Holdingcapacities extends MY_Model 
{
    protected $_name = "holding_capacity";
    protected $_primary = "id";
    
    public function fetchForHoldingPlace($place) 
    {
        if (!$place) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('holding_place_id'=>$place)));
    }
}