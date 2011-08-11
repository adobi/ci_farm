<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Breeders extends MY_Model 
{
    protected $_name = "breeder";
    protected $_primary = "id";
    
    public function getId()
    {
        return 3;
    }
}