<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Stockinfakk extends MY_Model 
{
    protected $_name = "stock_in_fakk";
    protected $_primary = "id";
    
    public function fetchForHutching($hutchingId) 
    {
        if (!$hutchingId) {
            
            return false;
        }
        
        return $this->fetchRows(array(
            'columns'=>array('stock_in_fakk.fakk_id', 'stock_in_fakk.stock_id', 'stock_in_fakk.hutching_id', 'stock_in_fakk.created', 'sum(stock_in_fakk.piece) as piece'),
            'join'=>$this->_buildJoin(),
            'where'=>array('hutching_id'=>$hutchingId, 'stock_in_fakk.closed is null'=>null),
            'group_by'=>'fakk_id'
        ), false, false, false);
    }
    
    private function _buildJoin()
    {
        return array(
            array(
                'table'=>'fakk f',
                'condition'=>'f.id = fakk_id',
                'columns'=>array('f.name as fakk_name')
            ),
            array(
                'table'=>'chicken_stock cs',
                'condition'=>'cs.id = stock_id',
                'columns'=>array('cs.stock_code')
            ),
            array(
                'table'=>'cast_type ct', 
                'condition'=>'ct.id = cs.cast_type_id', 
                'columns'=>array('ct.name as cast_type_name')
            ),
        );
    }
}