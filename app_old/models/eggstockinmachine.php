<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggstockinmachine extends MY_Model 
{
    protected $_name = "egg_stock_in_machine";
    protected $_primary = "id";
    
    /**
     * adott gepben levo allomanyokat adja vissza
     *
     * @param string $machine 
     * @return void
     * @author Dobi Attila
     */
    public function fetchStocksInMachine($machine)
    {
        if (!$machine) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'join'=>array(
                    array('table'=>'egg_stock', 'condition'=>'egg_stock_in_machine.egg_stock_id = egg_stock.id', 'columns'=>array('egg_stock.code as stock_code', 'egg_stock.piece as piece')),
                    array('table'=>'chicken_type', 'condition'=>'egg_stock.chicken_type_id = chicken_type.id', 'columns'=>array('chicken_type.name as chicken_type_name', 'chicken_type.code as chicken_type_code'))
                ),
                'where'=>array('machine_id'=>$machine)
            )
        );
        
        if ($result) {
            
            $this->load->model('Hatchingdata', 'data');
            foreach ($result as $item) {
                
                $item->step_1 = $this->data->fetchByStepAndInMachineId(1, $item->id);
                $item->step_2 = $this->data->fetchByStepAndInMachineId(2, $item->id);
                $item->step_3 = $this->data->fetchByStepAndInMachineId(3, $item->id);
            }
        }
        
        return $result;
    }
}