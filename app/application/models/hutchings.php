<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Hutchings extends MY_Model 
{
    protected $_name = "hutching";
    protected $_primary = "id";
    
    public function hasActual($breedersite, $stockyard)
    {
        return count($this->fetchActual($breedersite, $stockyard)) === 1;
    }
    
    public function fetchActual($breedersite, $stockyard) 
    {
        if (!$breedersite || !$stockyard) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array('where'=>array(
                'breeder_site_id'=>$breedersite,
                'stock_yard_id'=>$stockyard,
                'closed is null'=>null
            ))
        );
        
        return $result;        
    }
}