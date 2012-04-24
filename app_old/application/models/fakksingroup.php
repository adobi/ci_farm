<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Fakksingroup extends MY_Model 
{
    protected $_name = "fakk_in_group";
    protected $_primary = "id";
    
    /**
     * $grouphoz tartozo fakkokat adja vissza
     *
     * @param string $group 
     * @return void
     * @author
     */
    public function fetchFakksForGroup($group) 
    {
        if (!$group) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'join'=>array(
                    array('columns'=>array('fakk.name as fakk_name, fakk.id as fakk_id'), 'table'=>'fakk', 'condition'=>'fakk_in_group.fakk_id = fakk.id')    
                ),
                'where'=>array('fakk_in_group.fakk_group_id'=>$group)   
            )
        );
        
        return $result;
    }
}