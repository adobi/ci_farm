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
                    array('table'=>'egg_type', 'condition'=>'egg_stock.egg_type_id = egg_type.id', 'columns'=>array('egg_type.description as egg_type_description', 'egg_type.code as egg_type_code'))
                ),
                'where'=>array('machine_id'=>$machine)
            )
        );
        
        return $result;
    }
}