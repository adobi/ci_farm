<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Stockyards extends MY_Model 
{
    protected $_name = "stock_yard";
    protected $_primary = "id";
    
    public function fetchForBreedersite($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'where'=>array('breeder_site_id'=>$id)
            )
        );
        
        //dump($result);
        return $result;
    }    
}