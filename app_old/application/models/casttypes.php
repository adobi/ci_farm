<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Casttypes extends MY_Model 
{
    protected $_name = "cast_type";
    protected $_primary = "id";
    
    public function fetchForCast($cast) 
    {
        if (!$cast) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('cast_id'=>$cast)));
    }
    
    public function fetchForChicken()
    {
        return $this->fetchForCast(10);
    }
}