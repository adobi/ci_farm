<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Casts extends MY_Model 
{
    protected $_name = "cast";
    protected $_primary = "id";
    
    public function fetchAllWithType()
    {
        $result = $this->fetchAll();
        
        if ($result) {
            
            $this->load->model('Casttypes', 'casttype');
            
            foreach ($result as $item) {
                $item->cast_types = $this->casttype->fetchForCast($item->id);
            }
        }
        //dump($result); die;
        return $result;
    }
}