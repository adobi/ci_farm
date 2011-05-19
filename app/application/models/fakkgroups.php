<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Fakkgroups extends MY_Model 
{
    protected $_name = "fakk_group";
    protected $_primary = "id";
    
    public function fetchForBreederSite($site) 
    {
        if (!$site) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'where'=>array('breeder_site_id'=>$site)    
            )
        );

        $return = false;
        if ($result) {
            
            $this->load->model('Fakksingroup', 'fig');
            
            foreach ($result as $r) {
                
                $fakks = $this->fig->fetchFakksForGroup($r->id);
                
                $return[] = array('group'=>$r, 'fakks'=>$fakks);
            }
        }
                
        return $return;
    }
}