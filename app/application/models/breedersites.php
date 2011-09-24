<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Breedersites extends MY_Model 
{
    protected $_name = "breeder_site";
    protected $_primary = "id";
    
    private $_types = array('', 'tojás termelés', 'keltetés', 'nevelés');
    
    public function getTypes()
    {
        return $this->_types;
    }
    
    public function getType($index) 
    {
        return $this->_types[$index];
    }
    
    public function fetchWithHoldingCapacity($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(/*
                'join'=>array(
                    array(
                        'table'=>'postal_code pc1',
                        'columns'=>array('pc1.code as postal_code', 'pc1.city'),
                        'condition'=>"pc1.id = $this->_name.postal_code_id"
                    ),
                    array(
                        'table'=>'postal_code pc2',
                        'columns'=>array('pc2.code as postal_postal_code', 'pc2.city as postal_city'),
                        'condition'=>"pc2.id = $this->_name.postal_zip"
                    ),
                    array(
                        'table'=>'postal_code pc3',
                        'columns'=>array('pc3.code as holding_place_postal_code', 'pc3.city as holding_place_city'),
                        'condition'=>"pc3.id = $this->_name.holding_place_zip"
                    )                    
                ),*/
                'where'=>array("$this->_name.$this->_primary"=>$id, 'is_deleted'=>null)
            )
        );
        //dump($result); die;
        if ($result) {
            
            $this->load->model('Holdingcapacities', 'capacity');
            foreach ($result as $i=>$r) {
                $r->capacity = $this->capacity->fetchForBreedersite($r->id);
            }
        }
        //
        return $result ? $result[0] : $result;
    }
/*
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
                        'condition'=>"pc1.id = $this->_name.postal_code_id"
                    ),
                    array(
                        'table'=>'postal_code pc2',
                        'columns'=>array('pc2.code as postal_postal_code', 'pc2.city as postal_city'),
                        'condition'=>"pc2.id = $this->_name.postal_zip"
                    )
                ),
                'where'=>array($this->_name . '.' . $this->_primary=>$id)
            ), true
        );
        
        return $result;
    }
*/
    public function fetchAll($params = array(), $current = false, $showSelfColumns) 
    {
    	$params['where'] = array('breeder_site.is_deleted is null'=>null);
    	
    	return $this->fetchRows($params, $current, false, $showSelfColumns);
    	/*
        $result = parent::fetchAll($params, $current);
        
        $return = false;
        if ($result) {
            
            foreach ($result as $r) {
                
                if (!$r->is_deleted) {
                    $return[] = $r;
                }
            }    
        }
        */
        //return $return;
    }
    
    public function delete($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        return $this->update(array('is_deleted'=>1), $id);
    }
    
    public function searchByCodeOrBreeder($term)
    {
        if (!$term) {
            
            return false;
        }
        
        $db = $this->db;
        
        $query =    $db->select()
                       ->from($this->_name)
                       ->join('breeder', "breeder.id=$this->_name.breeder_id")
                       ->where('code LIKE', $db->escape_like_str($term).'%')
                       ->or_where('name LIKE', $db->escape_like_str($term).'%');
    
        $result = $query->get()->result();
        //dump($result);
        return $result;
    }
    
    public function fetchForBreeder($breeder) 
    {
        if (!$breeder) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('breeder_id'=>$breeder, 'is_deleted'=>null)));
    }
    
    /**
     * osszeszedi az osszes tenyeszetet a tenyeszto adataival
     *
     * @return void
     * @author Dobi Attila
     */
    public function fetchSiteWithBreederInfo($columns = array('breeder_site.id as id', 'breeder_site.code', 'breeder.name', 'breeder.city')) 
    {
    	$result = $this->fetchAll(array(
    		'columns'=>$columns,
    		'join'=>array(
    			array('table'=>'breeder', 'condition'=>'breeder_site.breeder_id = breeder.id')
    		),
    		'order'=>array('by'=>'breeder.name', 'dest'=>'asc')
    	), false, false, false);
    	//dump($result); die;
    	return $result;
    }
 
}