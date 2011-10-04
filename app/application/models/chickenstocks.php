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
    
    public function fetchForBreederSite($siteId, $params = array())
    {
        if (!$siteId) {
            
            return false;
        }
        
        $params['join'] = $this->_buildJoin();
        
        $params['where'] = array('holder_breeder_site_id'=>$siteId, '(male_piece != 0  or female_piece != 0)' => null);
        
        return $this->fetchRows($params); 
    }
    
    
    private function _buildJoin()
    {
        return array(
            array('table'=>'delivery', 'condition'=>'delivery.id = chicken_stock.delivery_id'),
            array('table'=>'cast', 'condition'=>'delivery.cast_id = cast.id', 'columns'=>array('cast.name as cast_name')),
            array('table'=>'cast_type ct', 'condition'=>'ct.id = chicken_stock.cast_type_id', 'columns'=>array('ct.name as cast_type_name')),
            array('table'=>'breeder_site buyer_site', 'condition'=>'buyer_site.id = chicken_stock.holder_breeder_site_id', 'columns'=>array('buyer_site.code as buyer_code, buyer_site.address as buyer_address')),
            array('table'=>'breeder buyer_breeder', 'condition'=>'buyer_site.breeder_id = buyer_breeder.id', 'columns'=>array('buyer_breeder.name as buyer_name')),
            array('table'=>'breeder_site seller_site', 'condition'=>'seller_site.id = chicken_stock.hatching_breeder_site_id', 'columns'=>array('seller_site.code as seller_code, seller_site.address as seller_address')),
            array('table'=>'breeder seller_breeder', 'condition'=>'seller_site.breeder_id = seller_breeder.id', 'columns'=>array('seller_breeder.name as seller_name')),
        );
    }    
}