<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Chickenstockproofoforigin extends MY_Model 
{
    protected $_name = "chicken_stok_proof_of_origin";
    protected $_primary = "id";
    
    public function findByProof($proofId) 
    {
        if (!$proofId) return false;
        
        $sql = "select 
                    p.male_stock_id, p.female_stock_id, 
                    c1.piece as male_piece, c1.stock_code as male_stock_code, 
                    c2.piece as female_piece, c2.stock_code as female_stock_code  
                from $this->_name cp 
                    join proof_of_origin p on cp.proof_id = p.id
                    join chicken_stock c1 on c1.id = p.male_stock_id
                    join chicken_stock c2 on c2.id = p.female_stock_id
                where cp.proof_id = $proofId
                group by p.male_stock_id and p.female_stock_id
                ";
        return $this->execute($sql);
    }
}