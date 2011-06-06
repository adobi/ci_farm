<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Fakks extends MY_Model 
{
    protected $_name = "fakk";
    protected $_primary = "id";
    
    public function fetchForGroup($group) 
    {
        if (!$group) {
            
            return false;
        }
        
        $result = $this->fetchRows(array(
            'where'=>array('fakk_group_id'=>$group)
        ));
                
        return $result;        
    }
    
    public function fetchForBreedersite ($site) 
    {
        if (!$site) {
            
            return false;
        }    
        
        $sql = "select f.* from $this->_name f join fakk_group fg on f.fakk_group_id = fg.id and fg.breeder_site_id = $site";
        
        return $this->execute($sql);
    }
}