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
     * @author
     */
    public function fetchNoInMachine() 
    {
        $result = $this->fetchRows(
            array(
                'join'=>array(
                    array('table'=>'chicken_type', 'condition'=>'chicken_type.id = egg_stock.chicken_type_id', 'columns'=>array('chicken_type.code as chicken_type_code', 'chicken_type.name as name'))    
                ),
                'where'=> array(
                    'egg_stock.id not in (select egg_stock_id from egg_stock_in_machine)' => null   
                )
            )
        );
        
        return $result;
    }
    
    public function fetchWithDetails($all = false)
    {
        if ($all) {
            $where = array(); // hack :)
        } else {
            $where = array("egg_stock.is_deleted is null" => null);
        }
        $join = array(
            array('table'=>'chicken_type ct', 'condition'=>'egg_stock.chicken_type_id = ct.id', 'columns'=>array('ct.name as chicken_type_name')),
        );
        
        if (!empty($where)) {
            
        }
        
        $result = $this->fetchRows(array(
            'where'=>$where,
            'join'=>$join
        ));
        
        return $result;
    }  
    
    public function delete($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        return $this->update(array('is_deleted'=>1), $id);
    }       
}