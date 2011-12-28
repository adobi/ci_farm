<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggtypes extends MY_Model 
{
    protected $_name = "egg_type";
    protected $_primary = "id";
    
    public function fetchByType($type) 
    {
        if ($type !== 1 && $type !== 2) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('type'=>$type)));
    }

}