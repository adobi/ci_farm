<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggstock extends MY_Model 
{
    protected $_name = "egg_stock";
    protected $_primary = "id";
    
    /**
     * azokat a tojas allomanyokat adja vissza amik nincsennek gepbe teve
     *
     * @return array
     * @author Dobi Attila
     */
    public function fetchNoInMachine() 
    {
        $result = $this->fetchRows(
            array(
                'join'=>array(
                    array('table'=>'egg_type', 'condition'=>'egg_type.id = egg_stock.egg_type_id', 'columns'=>array('egg_type.code as egg_type_code', 'egg_type.description as description'))    
                ),
                'where'=> array(
                    'egg_stock.id not in (select egg_stock_id from egg_stock_in_machine)' => null   
                )
            )
        );
        
        return $result;
    }
}