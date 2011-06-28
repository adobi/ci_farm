<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Fakkfeeds extends MY_Model 
{
    protected $_name = "fakk_feed";
    protected $_primary = "id";
    
    /**
     * azt a datumot adja vissza amire meg nincs bejegyzes, ha tobb van akkor a legregebbit
     *
     * @param string $group 
     * @return void
     * @author Dobi Attila
     */
    public function getLastEmptyDate($group)
    {
        if (!$group) {
            
            return false;
        }
        
        //$query = "select max(to_date) from $this->_name";
        
        return false;
    }
    
    public function fetchForGroup($group) 
    {
        if (!$group) {
            
            return false;
        }
        
        $sql = "select * from $this->_name where fakk_id in (select id from fakk where fakk_group_id = $group) or is_for_group = $group";
        
        $return = $this->execute($sql);
        
        //dump($return); die;
        
        return $return;
    }
}