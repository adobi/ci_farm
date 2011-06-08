<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggproductiondata extends MY_Model 
{
    protected $_name = "egg_production_data";
    protected $_primary = "id";
    
    /**
     * egg_production_day_id alapja keres
     *
     * @param string $id 
     * @return void
     * @author Dobi Attila
     */
    public function fetchByProductionDayId($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array("where"=>array('egg_production_day_id'=>$id), 'order'=>array('by'=>'egg_type_id', 'dest'=>'desc'))
        );
        
        return $result;         
    }
}