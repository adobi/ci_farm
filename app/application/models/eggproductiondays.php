<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggproductiondays extends MY_Model 
{
    protected $_name = "egg_production_day";
    protected $_primary = "id";
    
    /**
     * to_date es egg_production_id alapjan keres meg egy sort
     *
     * @param string $date 
     * @param string $production
     * @return object
     * @author Dobi Attila
     */
    public function findByDateAndProduction($date, $production) 
    {
        if (!$date || !$production) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array("where"=>array('egg_production_id'=>$production, 'date(to_date)'=>$date)), true    
        );
        
        return $result;        
    }
}