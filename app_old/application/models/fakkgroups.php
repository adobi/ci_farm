<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Fakkgroups extends MY_Model 
{
    protected $_name = "fakk_group";
    protected $_primary = "id";
    
    public function fetchForStockYard($yard) 
    {
        if (!$yard) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'where'=>array('stock_yard_id'=>$yard)    
            )
        );

        $return = false;
        if ($result) {
            
            $this->load->model('Fakks', 'fakk');
            
            foreach ($result as $r) {
                
                $fakks = $this->fakk->fetchForGroup($r->id);
                
                $return[] = array('group'=>$r, 'fakks'=>$fakks);
            }
        }
                
        return $return;
    }
    
    /**
     * minden csoportot listaz a hozza tartozo fakkokkal egyutt
     *
     * @return void
     * @author Dobi Attila
     */
    public function fetchAll()
    {
        $groups = parent::fetchAll(array(
            'columns'=>array('fakk_group.*'),
            'join'=>array(
                array('table'=>'breeder_site', 'condition'=>'fakk_group.breeder_site_id = breeder_site.id', 'columns'=>array('breeder_site.code as breeder_site_code', 'breeder_site.mgszh as breeder_site_mgszh')),
                array('table'=>'breeder', 'condition'=>'breeder.id = breeder_site.breeder_id', 'columns'=>array('breeder.name as breeder_name'))   
            )    
        ));
        
        $retrun = false;
        if ($groups) {
            
            $this->load->model('Fakks', 'fakk');
            
            foreach ($groups as $group) {
                $fakks = $this->fakk->fetchForGroup($group->id);
                $return[] = array('group'=>$group, 'fakks'=>$fakks);
            }
        }
        //dump($return); die;
        return $return;
    }
}