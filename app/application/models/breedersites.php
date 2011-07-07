<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Breedersites extends MY_Model 
{
    protected $_name = "breeder_site";
    protected $_primary = "id";
    
    public function fetchForBreeder($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'join'=>array(
                    array(
                        'table'=>'postal_code',
                        'columns'=>array('postal_code.code as postal_code', 'city'),
                        'condition'=>"postal_code.id = $this->_name.postal_code_id"
                    )
                ),
                'where'=>array('breeder_id'=>$id, 'is_deleted'=>null)
            )
        );
        
        //dump($result);
        return $result;
    }
    
    public function fetchAll($params = array(), $current = false) 
    {
        $result = parent::fetchAll($params, $current);
        
        $return = false;
        if ($result) {
            
            foreach ($result as $r) {
                
                if (!$r->is_deleted) {
                    $return[] = $r;
                }
            }    
        }
        
        return $return;
    }
    
    public function delete($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        return $this->update(array('is_deleted'=>1), $id);
    }
    
    public function searchByCodeOrBreeder($term)
    {
        if (!$term) {
            
            return false;
        }
        
        $db = $this->db;
        
        $query =    $db->select()
                       ->from($this->_name)
                       ->join('breeder', "breeder.id=$this->_name.breeder_id")
                       ->where('code LIKE', $db->escape_like_str($term).'%')
                       ->or_where('name LIKE', $db->escape_like_str($term).'%');
    
        $result = $query->get()->result();
        //dump($result);
        return $result;
    }
}