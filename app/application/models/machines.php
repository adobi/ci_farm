<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Machines extends MY_Model 
{
    protected $_name = "machine";
    protected $_primary = "id";
    
    public function fetchAllWithBreedersite()
    {
        return $this->fetchAll(
            array(
                'join'=>array(
                    array('table'=>'breeder_site', 'condition'=>'machine.breeder_site_id=breeder_site.id', 'columns'=>array('breeder_site.name as breeder_site_name'))    
                )    
            )    
        );
    }
}