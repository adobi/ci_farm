<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Chickenstocks extends MY_Model 
{
    protected $_name = "chicken_stock";
    protected $_primary = "id";
    
    public function fetchForDelivery($deliveryId, $params = array()) 
    {
        if (!$deliveryId) {
            
            return false;
        }
        
        $params['where'] = $this->_prepareCondition(isset($params['where']) ? $params['where'] : false);
        
        $params['where']['delivery_id'] = $deliveryId;
        $params['join'] = array(
            array('table'=>'breeder_site', 'columns'=>array('breeder_site.code as seller_code'), 'condition'=>'hatching_breeder_site_id = breeder_site.id')
        );
        
        return $this->fetchRows($params);
        
        /*
        return $this->fetchRows(array(
            'where'=>array('delivery_id'=>$deliveryId),
            'join'=>array(
                array('table'=>'breeder_site', 'columns'=>array('breeder_site.code as seller_code'), 'condition'=>'hatching_breeder_site_id = breeder_site.id')
            )
        ));
        */
    }
    
    public function fetchFor($type, $id, $params = array())
    {
        if (!$id) {
            
            return false;
        }
        
        $params['join'] = $this->_buildJoin();
        
        $params['where'] = $this->_prepareCondition(isset($params['where']) ? $params['where'] : false);
        
        if ('breedersite' === $type) {
            $params['where']['holder_breeder_site_id'] = $id;
        }        
            
        if ('delivery' === $type) {
            $params['where']['delivery_id'] = $id;
        }
        //$params['where'] = array('holder_breeder_site_id'=>$siteId, '(male_piece != 0  or female_piece != 0)' => null);
        
        return $this->fetchRows($params); 
    }
    
    public function count($condition) {
        
        $params['join'] = $this->_buildJoin();

        $params['where'] = $this->_prepareCondition($condition);
        //dump($params['where']);
        $result = parent::fetchRows($params);        
        
        return count($result);
    }    
    
    
    public function delete($id)
    {
        if (!$id) {
            
            return false;
        }
        
        return $this->update(array('is_deleted'=>1), $id);
    }    
    
    public function fetchForBreedersite($site) 
    {
        if (!$site) {
            
            return false;
        }
        $params = array();
        
        $params['join'] = $this->_buildJoin();

        $params['where'] = $this->_prepareCondition(array('holder_breeder_site_id'=>$site));
        
        $result = $this->fetchRows($params);
        
        return $result;
    }
    
    private function _prepareCondition($condition)
    {
        $params = array();
        if ($condition) {
            foreach ($condition as $col => $value) {
                if (!$value) {
                    unset($params[$col]);
                } else {
                    $params["chicken_stock.$col"] = $value;
                }
            }            
        }

        $params['(chicken_stock.male_piece != 0  or chicken_stock.female_piece != 0)'] = null;
        $params['chicken_stock.is_deleted IS NULL'] = null;
        
        return $params;
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