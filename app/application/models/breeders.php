<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Breeders extends MY_Model 
{
    protected $_name = "breeder";
    protected $_primary = "id";
    
    public function getId()
    {
        return 3;
    }
    /*
    public function find($id)
    {
        if (!$id) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'join'=>array(
                    array(
                        'table'=>'postal_code pc1',
                        'columns'=>array('pc1.code as postal_code', 'pc1.city'),
                        'condition'=>"pc1.id = $this->_name.postal_code_id"
                    )
                        ),
                'where'=>array($this->_name . '.' . $this->_primary=>$id)
            ), true
        );
        
        return $result;
    } 
    
    public function fetchAll($params = array(), $current = false) 
    {
        $result = parent::fetchAll(
            array(
                'join'=>array(
                    array(
                        'table'=>'postal_code pc1',
                        'columns'=>array('pc1.code as postal_code', 'pc1.city'),
                        'condition'=>"pc1.id = $this->_name.postal_code_id"
                    )
                        ),
                'order'=>array('by'=>'name', 'dest'=>'asc')
            ), true
        );        
        
        return $result;
    } 
    */
    
    public function fetchAll($params = array(), $current = false) 
    {
        if (!array_key_exists('order', $params)) 
        {
            $params['order'] = array('by'=>'priority, name', 'dest'=>'asc');
        }
        
        return parent::fetchAll($params, $current);
    }  
    
    public function priorityExists($priority) 
    {
        if (!is_numeric($priority)) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('priority'=>$priority)));
        
    }
    
    public function incPriorityGreaterThen($priority) 
    {
        if (!$priority) {
            
            return false;
        }
        
        //return $this->update(array('priority = priority + 1'), array('priority >='=>$priority));
        
        return $this->execute("update $this->_name set priority = priority+1 where priority >= $priority");
    }
    
    public function searchByName($term)
    {
        if (!$term) {
            
            return false;
        }
        
        $term = mb_strtolower($term);
        
        $result = $this->execute("select * from $this->_name where lcase(name) like '$term%'");
        
        return $result;        
    }
}