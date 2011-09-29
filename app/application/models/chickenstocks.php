<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Chickenstocks extends MY_Model 
{
    protected $_name = "chicken_stock";
    protected $_primary = "id";
    
    public function fetchForDelivery($deliveryId) 
    {
        if (!$deliveryId) {
            
            return false;
        }
        
        return $this->fetchRows(array(
            'where'=>array('delivery_id'=>$deliveryId),
            'join'=>array(
                array('table'=>'breeder_site', 'columns'=>array('breeder_site.code as seller_code'), 'condition'=>'hatching_breeder_site_id = breeder_site.id')
            )
        ));
    }
    
    public function fetchForBreederSite($siteId)
    {
        if (!$siteId) {
            
            return false;
        }
        
        return $this->fetchRows(array(
            'where'=>array('holder_breeder_site_id'=>$siteId),
            //'join'=>array(
            //    array('table'=>'breeder_site', 'columns'=>array('breeder_site.code as seller_code'), 'condition'=>'hatching_breeder_site_id = breeder_site.id')
            //)
        )); 
    }
}