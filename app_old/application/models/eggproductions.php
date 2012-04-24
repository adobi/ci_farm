<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggproductions extends MY_Model 
{
    protected $_name = "egg_production";
    protected $_primary = "id";
    
    /**
     * chicken_stock_id alapjan keres
     *
     * @param string $stock 
     * @return void
     * @author
     */
    public function findByStockid($stock)
    {
        if (!$stock) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array("where"=>array('chicken_stock_id'=>$stock)), true    
        );
        
        return $result;
    }
}