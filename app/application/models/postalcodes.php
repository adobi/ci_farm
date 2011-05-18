<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Postalcodes extends MY_Model 
{
    protected $_name = "postal_code";
    protected $_primary = "id";
    
    public function search($term) 
    {
        if (!$term) {
            
            return false;
        }
        
        $result = $this->execute("select * from $this->_name where code like '$term%' or city like '$term%'");
        
        return $result;
    }
}