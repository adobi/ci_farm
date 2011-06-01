<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Chickenstock extends MY_Model 
{
    protected $_name = "chicken_stock";
    protected $_primary = "id";
    
    /**
     * adott fakkhoz tartozo allomanyokat adja vissza
     *
     * @param string $fakkId 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForFakk($fakkId) 
    {
        if (!$fakkId) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array(
                'join'=>array(
                    array('table'=>'chicken_type', 'condition'=>'chicken_type.id=chicken_stock.chicken_type_id', 'columns'=>array('chicken_type.name as chicken_type_name')),
                    //array('table'=>'breeder_site', 'condition'=>'breeder_site.id=chicken_stock.breeder_site_id', 'columns'=>array('breeder_site.code as breeder_site_code'))
                ),
                'where'=>array('fakk_id'=>$fakkId)
            )  
        );
        
        return $result;
    }
}