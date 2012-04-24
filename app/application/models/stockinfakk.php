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
            'columns'=>array('stock_in_fakk.id, stock_in_fakk.fakk_id', 'stock_in_fakk.stock_id', 'f.hutching_id', 'stock_in_fakk.created', 'sum(stock_in_fakk.piece) as piece'),
            'join'=>$this->_buildJoin(),
            'where'=>array('f.hutching_id'=>$hutchingId, 'stock_in_fakk.closed is null'=>null),
            'group_by'=>'fakk_id'
        ), false, false, false);
    }
    
    
    /**
     * adott sotck_in_fakk id-hez megkeresi az ide tartozo fakkhoz es hutchinghoz tartozo osszes allomanyt
     *
     * @param string $id 
     * @return array
     * @author
     */
    public function findWithDetails($id) 
    {
        if (!$id) return false;
        
        $item = $this->find($id);
        
        if (!$item) return false;
        
        //$allItems = $this->fetchRows(array('where'=>array('hutching_id'=>$item->hutching_id, 'fakk_id'=>$item->fakk_id)));
        
        $sql = "select 
                    sif.*, cs.piece as max_piece, cs.stock_code
                from $this->_name as sif
                join chicken_stock cs on cs.id = sif.stock_id
                where fakk_id = $item->fakk_id
        ";
        
        $allItems = $this->execute($sql);
        
        if (!$allItems) return false;
        
        $this->load->model('Chickenstocks', 'stocks');
        
        $sum = 0;
        foreach ($allItems as $i) {
            $sum += $i->piece;
        }
        
        return array('total_piece'=>$sum, 'items'=>$allItems);
    } 
    
    
    public function delete($id) 
    {
        if (!$id) return false;
        
        $item = $this->find($id);
        
        if (!$item) return false;
        
        return parent::delete(array('fakk_id'=>$item->fakk_id));
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
                'table'=>'delivery d',
                'condition'=>'cs.delivery_id = d.id',
            ),
            array(
                'table'=>'chicken_stok_proof_of_origin cspoo',
                'condition'=>'cspoo.stock_id = cs.id',
            ),  
            array(
                'table'=>'proof_of_origin poo',
                'condition'=>'poo.id = cspoo.proof_id',
            ),                                    
            array(
                'table'=>'cast_type ct', 
                'condition'=>'poo.cast_type_id = ct.id', 
                'columns'=>array('ct.name as cast_type_name')
            ),
        );
    }
}