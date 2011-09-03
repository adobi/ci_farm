<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Holdingcapacities extends MY_Model 
{
    protected $_name = "holding_capacity";
    protected $_primary = "id";
    
    public function fetchForBreedersite($site) 
    {
        if (!$site) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('breeder_site_id'=>$site)));
    }
}