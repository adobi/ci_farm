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
    
    public function fetchForStockyard($yard) 
    {
        if (!$yard) {
            
            return false;
        }
        
        $result = $this->fetchRows(array(
            'where'=>array('stock_yard_id'=>$yard),
            'order'=>array('by'=>'closed', 'dest'=>'asc')
        ));
                
        return $result;        
    }    
    
    public function fetchForBreedersite ($site) 
    {
        if (!$site) {
            
            return false;
        }    
        
        $sql = "select f.* from $this->_name f join fakk_group g on f.fakk_group_id = g.id join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site";

        return $this->execute($sql);
    }
    
    /**
     * eldonti, hogy adott istalloba lehet e letrehozni uj fakkokat: ha az eddig szereplo osszes fakk ures akkor igaz
     *
     * @param string $stockYardId 
     * @return void
     * @author Dobi Attila
     */
    public function isPermittedToCreate($stockYardId) 
    {
        if (!$stockYardId) {
            
            return false;
        }
        
        $result = $this->fetchRows(array(
            'where' => array(
                'stock_yard_id' => $stockYardId,
                'closed is null' => null
            )
        ));
        
        return count($result) === 0;
    }
}