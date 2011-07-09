<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Holdingplaces extends MY_Model 
{
    protected $_name = "holding_place";
    protected $_primary = "id";
    
    public function fetchForBreederSite($site)
    {
        if (!$site) {
            
            return false;
        }
        
        $result = $this->fetchRows(array(
            'join'=>array(
                array(
                    'table'=>'postal_code pc1',
                    'columns'=>array('pc1.code as postal_code', 'pc1.city'),
                    'condition'=>"pc1.id = $this->_name.zip"
                ),
            ),            
            'where'=>array('breeder_site_id'=>$site)
        ));
        
        if ($result) {
                    
            $this->load->model('Holdingcapacities', 'holdingcapacity');
            $this->load->model('Holdingdatas', 'holdingdata');
            foreach ($result as $place) {
                
                $place->holdingcapacitites = $this->holdingcapacity->fetchForHoldingPlace($place->id);
                $place->holdingdata = $this->holdingdata->fetchForHoldingPlace($place->id);
            }
        }  
        
        return $result;      
    }
    
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
                        'condition'=>"pc1.id = $this->_name.zip"
                    ),
                ),  
                'where'=>array($this->_name . '.' . $this->_primary=>$id)
            ), true
        );
        
        return $result;
    }    
}