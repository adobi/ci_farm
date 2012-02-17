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
    
    /**
     * adott istallohoz szedi ossze a fakkokat
     *
     * @param string $yard 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForHatching($hatching) 
    {
        if (!$hatching) {
            
            return false;
        }
        /*
        $result = $this->fetchRows(array(
            'where'=>array('stock_yard_id'=>$yard),
            'order'=>array('by'=>'closed', 'dest'=>'asc')
        ));
                
        return $result;        
        */
        
        $sql = "select 
                	f.*, (select count(fakk_id) from stock_in_fakk sif where sif.fakk_id = f.id) as in_stock
                from 
                	fakk f
                where f.hutching_id = $hatching and f.closed is null";
        
        $result = $this->execute($sql);
        
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
    public function isPermittedToCreate($hatching) 
    {
        if (!$hatching) {
            
            return false;
        }
        /*
        $result = $this->fetchRows(array(
            'where' => array(
                'stock_yard_id' => $stockYardId,
                'closed is null' => null
            )
        ));
        */
        
        $sql = "select 
                	f.*, sif.id as sif_id
                from 
                	fakk f
                	left join stock_in_fakk sif on f.id = sif.fakk_id
                where f.hutching_id = $hatching and f.closed is null";
        
        $result = $this->execute($sql);
        
        if ($result) {
            
            foreach ($result as $r) {
                
                if ($r->sif_id) {
                    return false;
                }
            }
        }
        
        return true;
        //return count($result) === 0;
    }
}