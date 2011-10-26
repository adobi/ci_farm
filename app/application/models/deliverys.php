<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Deliverys extends MY_Model 
{
    protected $_name = "delivery";
    protected $_primary = "id";
    
    public function getType($index = false) 
    {
        $types = array('0'=>'', '1'=>'Állat', '2'=>'Tojás');
        
        if ($index && array_key_exists($index, $types)) {
            
            return $types[$index];
        } 
        
        return $types;
    }
    
    public function getIntendedUse($index = false) 
    {
        $use = array('0'=>'', '1'=>'Tenyésztés', '2'=>'Végtermék előállítás');
        if ($index && array_key_exists($index, $use)) {
            
            return $use[$index];
        }
        
        if ($index !== false && $index === '0') return '';
        
        return $use;
    }
    
    public function find($id) 
    {
        $params = array();
        
        $params['join'] = $this->_buildJoin();
        $params['where'] = array('delivery.id'=>$id,'delivery.is_deleted is null' => null);
        
        $result = parent::fetchRows($params, false, true);
        
        if ($result) {
            
            $this->load->model('Chickenstocks', 'stocks');
            
            foreach ($result as $r) {
                $r->chickenstocks = $this->stocks->fetchForDelivery($r->id);
            }
        }
        
        return $result;
    }
    
    public function fetchAll($params = array(), $current = false, $showSelfColumns = true)
    {
        $params['join'] = $this->_buildJoin();

        $params['where'] = $this->_prepareCondition(isset($params['where']) ? $params['where'] : false);
        
        $params['order'] = array('by'=>'delivery.arrival_date', 'dest'=>'desc');
        
        $result = parent::fetchRows($params, $current, $showSelfColumns);
        //dump($params['where']); die;
        if ($result) {
            
            $this->load->model('Chickenstocks', 'stocks');
            
            foreach ($result as $r) {
                $r->chickenstocks = $this->stocks->fetchForDelivery($r->id);
            }
        }
        return $result;
    }
    
    public function findBySerialNumber($serial) 
    {
        if (!$serial) {
            
            return false;
        }
        
        $params['join'] = $this->_buildJoin();
        $params['where'] = array('serial_number'=>$serial);
        $result = $this->fetchRows($params);
        if ($result) {
            
            $this->load->model('Chickenstocks', 'stocks');
            
            foreach ($result as $r) {
                $r->chickenstocks = $this->stocks->fetchForDelivery($r->id);
            }
        }        
        return $result;
    }
    
    public function delete($id)
    {
        if (!$id) {
            
            return false;
        }
        
        return $this->update(array('is_deleted'=>1), $id);
    }
    
    public function count($condition) {
        
        $params['join'] = $this->_buildJoin();

        $params['where'] = $this->_prepareCondition($condition);
        //dump($params['where']);
        $result = parent::fetchRows($params);        
        
        return count($result);
    }
    
    private function _prepareCondition($condition)
    {
        $params = array();
        if ($condition) {
            foreach ($condition as $col => $value) {
                if (!$value) {
                    unset($params[$col]);
                } else {
                    $params["delivery.$col"] = $value;
                }
            }            
        }
        
        $params['delivery.is_deleted is null'] = null;
        
        return $params;
    }
    
    private function _buildJoin()
    {
        return array(
            array('table'=>'cast', 'condition'=>'cast.id = delivery.cast_id', 'columns'=>array('cast.name as cast_name')),
            array('table'=>'breeder_site buyer_site', 'condition'=>'buyer_site.id = delivery.buyer_id', 'columns'=>array('buyer_site.code as buyer_code, buyer_site.address as buyer_address')),
            array('table'=>'breeder buyer_breeder', 'condition'=>'buyer_site.breeder_id = buyer_breeder.id', 'columns'=>array('buyer_breeder.name as buyer_name')),
            array('table'=>'breeder_site seller_site', 'condition'=>'seller_site.id = delivery.seller_id', 'columns'=>array('seller_site.code as seller_code, seller_site.address as seller_address')),
            array('table'=>'breeder seller_breeder', 'condition'=>'seller_site.breeder_id = seller_breeder.id', 'columns'=>array('seller_breeder.name as seller_name')),
            array('table'=>'breeder_site receiver_site', 'condition'=>'receiver_site.id = delivery.receiver_id', 'columns'=>array('receiver_site.code as receiver_code, receiver_site.address as receiver_address')),
            array('table'=>'breeder receiver_breeder', 'condition'=>'receiver_site.breeder_id = receiver_breeder.id', 'columns'=>array('receiver_breeder.name as receiver_name')),
        );
    }

}