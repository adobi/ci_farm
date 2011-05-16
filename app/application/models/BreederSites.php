<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Breedersites extends MY_Model 
{
    protected $_name = "breeder_site";
    protected $_primary = "id";
    
    public function fetchForBreeder($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'where'=>array('breeder_id'=>$id)
            )
        );
        
        return $result;
    }
}