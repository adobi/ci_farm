<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Chickenstocks extends MY_Model 
{
    protected $_name = "chicken_stock";
    protected $_primary = "id";
    
    /**
     * adott szallitolevelhez tartozo allomanyokat adja vissza
     *
     * @param string $deliveryId 
     * @param string $params 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForDelivery($deliveryId, $params = array()) 
    {
        if (!$deliveryId) {
            
            return false;
        }
        
        $params['where'] = $this->_prepareCondition(isset($params['where']) ? $params['where'] : false);
        
        $params['where']['delivery_id'] = $deliveryId;
        $params['join'] = array(
            array('table'=>'chicken_stok_proof_of_origin', 'columns'=>array('proof_id'), 'condition'=>'chicken_stok_proof_of_origin.stock_id = chicken_stock.id'),
            array('table'=>'delivery', 'columns'=>array(), 'condition'=>'delivery.id = chicken_stock.delivery_id'),
            array('table'=>'breeder_site', 'columns'=>array('breeder_site.code as seller_code'), 'condition'=>'delivery.seller_id = breeder_site.id')
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
    
    /**
     * return all the stocks for a given delivery
     *
     * @param string $deliveryId 
     * @param string $params 
     * @return void
     * @used_at chickenstock/index search by serial number
     * @author Dobi Attila
     */
    public function fetchForDeliveryAtStocks($deliveryId, $params = array()) 
    {
        if (!$deliveryId) return false;
        

        $sqlAllItems = "select
                	count(cs.id) as all_items
                from chicken_stock cs 
                	join delivery d on cs.delivery_id = d.id
                	left join chicken_stok_proof_of_origin cspoo on cspoo.stock_id = cs.id
                where d.id = $deliveryId and cs.is_deleted is null";
        $allItems = $this->execute($sqlAllItems);

        if (!$allItems) return false;
        
        $sql = "select
                	cs.certificate_code, cs.id as stock_id
                	, c.`name` as cast_name
                	, ct.`name` as cast_type_name
                	, seller.`name` as seller_name
                	, buyer.`name` as buyer_name
                	, buyer_bs.`code` as buyer_code, buyer_bs.address as buyer_address
                	, seller_bs.`code` as seller_code
                	, d.launch_date as hutching_date, d.id as delivery_id
                	, poo.id as proof_id, poo.mgszh_code, poo.female_stock_id, poo.male_stock_id
                from chicken_stock cs 
                	join delivery d on cs.delivery_id = d.id
                	join cast c on d.cast_id = c.id
                	left join chicken_stok_proof_of_origin cspoo on cspoo.stock_id = cs.id
                	left join proof_of_origin poo on poo.id = cspoo.proof_id
                	left join cast_type ct on ct.id = poo.cast_type_id
                	join breeder_site seller_bs on d.seller_id = seller_bs.id
                	join breeder seller on seller_bs.breeder_id = seller.id
                	join breeder_site buyer_bs on d.buyer_id = buyer_bs.id
                	join breeder buyer on buyer.id = buyer_bs.breeder_id
                where d.id = $deliveryId and cs.is_deleted is null";
        
        if ($params) {
            
            if (isset($params['limit'])) $sql .= " limit " . $params['limit'];
            if (isset($params['offset'])) $sql .= " offset " . $params['offset'];
        }
                        
        $result = $this->execute($sql);
        
        if(!$result) return false;
        
        
        foreach ($result as $r) {
            $r->female_stock = $this->find($r->female_stock_id);
            $r->male_stock = $this->find($r->male_stock_id);
        }
        
        return array('count'=>$allItems[0]->all_items, 'items'=>$result);
        
    }
    
    
    /**
     * azokat az allomanyokat adja vissza amelyekhez nincs szarmazasi igazolas
     *
     * @param string $deliveryId 
     * @param string $params 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForDeliveryWithoutProof($deliveryId, $params = array()) 
    {
        if (!$deliveryId) return false;
        
        $sql = "select * from $this->_name where delivery_id = $deliveryId and id not in (select stock_id from chicken_stok_proof_of_origin)";
        //dump($sql); die;
        return $this->execute($sql);
    }
    
    public function fetchFor($type, $id, $params = array())
    {
        if (!$id) {
            
            return false;
        }
        
        $params['join'] = $this->_buildJoin();
        
        $params['where'] = $this->_prepareCondition(isset($params['where']) ? $params['where'] : false);
        
        if ('breedersite' === $type) {
            $params['where']['buyer_id'] = $id;
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
    /*
    public function fetchForBreedersite($site) 
    {
        if (!$site) {
            
            return false;
        }
        $params = array();
        
        $params['join'] = $this->_buildJoin();

        $params['where'] = $this->_prepareCondition(array('buyer_id'=>$site));
        
        $result = $this->fetchRows($params);
        
        return $result;
    }
    */
    /**
     * chickenstock for breedersite and hutching
     *
     * @param string $site 
     * @param string $hutching 
     * @param string $data date of hatching
     * @return array
     * @used_at egg/index
     * @author Dobi Attila
     */
    public function fetchForBreedersiteAndHutching($site, $hutching, $date) 
    {
        if (!$site || !$hutching) {
            
            return false;
        }
        /*
        $params = array();
        
        $params['join'] = $this->_buildJoin();

        $params['where'] = $this->_prepareCondition(array('holder_breeder_site_id'=>$site));
        
        $result = $this->fetchRows($params);
        
        return $result;        
        */
        
        $sql = "select * from (
                    select 
                    	cs.id, 
                    	cs.stock_code,
                    	cs.piece, 
                    	((select sum(piece) from stock_in_fakk sif where sif.hutching_id = $hutching group by sif.stock_id having sif.stock_id = cs.id)) piece_in_fakk,
                    	ct.name as cast_type_name
                    from 
                    	chicken_stock cs 
                    	join delivery d on d.id = cs.delivery_id
                    	left join chicken_stok_proof_of_origin cspoo on cspoo.stock_id = cs.id
                    	left join proof_of_origin poo on poo.id = cspoo.proof_id
                    	left join cast_type ct on poo.cast_type_id = ct.id
                    	left join chicken_stock male_stock on poo.male_stock_id = male_stock.id
                    	left join chicken_stock female_stock on poo.female_stock_id = female_stock.id
                    where 
                    	-- cs.holder_breeder_site_id = $site
                    	d.buyer_id = $site
                    	and date(cs.hatching_date) = '$date'
                    	-- and (male_stock.piece != 0 or female_stock.piece != 0)
                    	and (cs.is_deleted IS NULL)
                    	and (
                    		cs.piece > (
                    			select sum(piece) from stock_in_fakk sif where sif.hutching_id = $hutching group by sif.stock_id having sif.stock_id = cs.id
                    		) or (
                    		cs.id not in (select id from stock_in_fakk)
                    		)
                        )
                    ) r
                    where r.piece - r.piece_in_fakk > 0 or r.piece - r.piece_in_fakk is null
                ";
        //dump($sql); die;
        return $this->execute($sql);
    }
    
    public function fetchPieceNotInFakks($stock) 
    {
        if (!$stock) {
            
            return false;
        }
        
        $sql = "select 
                	(piece - (
                				select sum(piece) from stock_in_fakk sif where sif.hutching_id = 2 group by sif.stock_id having sif.stock_id = $stock
                			)
                	) piece
                from chicken_stock where id = $stock";
        
        $result = $this->execute($sql);
        
        return $result[0]->piece ? $result[0] : $this->find($stock);
    }
    
    /**
     * adott tenyeszethez adja vissza az allomanyokat
     *
     * @param string $site 
     * @param array $params
     * @return array
     * @used_at chickenstock/index
     * @author Dobi Attila
     */
    public function fetchForBreedersite($site, $params = array()) 
    {
        if (!$site) return false;

        $sqlAllItems = "select
                	count(cs.id) as all_items
                from chicken_stock cs 
                	join delivery d on cs.delivery_id = d.id
                	join chicken_stok_proof_of_origin cspoo on cspoo.stock_id = cs.id
                where d.buyer_id = $site and cs.is_deleted is null";
        $allItems = $this->execute($sqlAllItems);
        //dump($allItems); die;
        if (!$allItems) return false;
        
        $sql = "select
                	cs.certificate_code, cs.id as stock_id
                	, c.`name` as cast_name
                	, ct.`name` as cast_type_name
                	, seller.`name` as seller_name
                	, buyer.`name` as buyer_name
                	, buyer_bs.`code` as buyer_code, buyer_bs.address as buyer_address
                	, seller_bs.`code` as seller_code
                	, d.launch_date as hutching_date
                	, poo.id as proof_id, poo.mgszh_code, poo.female_stock_id, poo.male_stock_id
                from chicken_stock cs 
                	join delivery d on cs.delivery_id = d.id
                	join cast c on d.cast_id = c.id
                	join chicken_stok_proof_of_origin cspoo on cspoo.stock_id = cs.id
                	join proof_of_origin poo on poo.id = cspoo.proof_id
                	join cast_type ct on ct.id = poo.cast_type_id
                	join breeder_site seller_bs on d.seller_id = seller_bs.id
                	join breeder seller on seller_bs.breeder_id = seller.id
                	join breeder_site buyer_bs on d.buyer_id = buyer_bs.id
                	join breeder buyer on buyer.id = buyer_bs.breeder_id
                where d.buyer_id = $site and cs.is_deleted is null";
        
        if ($params) {
            
            if (isset($params['limit'])) $sql .= " limit " . $params['limit'];
            if (isset($params['offset'])) $sql .= " offset " . $params['offset'];
        }
                        
        $result = $this->execute($sql);
        
        if(!$result) return false;
        
        
        foreach ($result as $r) {
            $r->female_stock = $this->find($r->female_stock_id);
            $r->male_stock = $this->find($r->male_stock_id);
        }
        
        return array('count'=>$allItems[0]->all_items, 'items'=>$result);
    }
    
    private function _prepareCondition($condition)
    {
        $params = array();
        if ($condition) {
            foreach ($condition as $col => $value) {
                if (!$value) {
                    unset($params[$col]);
                } else {
                    $params["$col"] = $value;
                }
            }            
        }

        //$params['(chicken_stock.male_piece != 0  or chicken_stock.female_piece != 0)'] = null;
        $params['chicken_stock.is_deleted IS NULL'] = null;
        
        return $params;
    }
    
    private function _buildJoin()
    {
        return array(
            array('table'=>'delivery', 'condition'=>'delivery.id = chicken_stock.delivery_id'),
            array('table'=>'cast', 'condition'=>'delivery.cast_id = cast.id', 'columns'=>array('cast.name as cast_name')),
            //array('table'=>'cast_type ct', 'condition'=>'ct.id = chicken_stock.cast_type_id', 'columns'=>array('ct.name as cast_type_name')),
            array('table'=>'breeder_site buyer_site', 'condition'=>'buyer_site.id = delivery.buyer_id', 'columns'=>array('buyer_site.code as buyer_code, buyer_site.address as buyer_address')),
            array('table'=>'breeder buyer_breeder', 'condition'=>'buyer_site.breeder_id = buyer_breeder.id', 'columns'=>array('buyer_breeder.name as buyer_name')),
            array('table'=>'breeder_site seller_site', 'condition'=>'seller_site.id = delivery.seller_id', 'columns'=>array('seller_site.code as seller_code, seller_site.address as seller_address')),
            array('table'=>'breeder seller_breeder', 'condition'=>'seller_site.breeder_id = seller_breeder.id', 'columns'=>array('seller_breeder.name as seller_name')),
        );
    }    
}