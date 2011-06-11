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
    
    public function fetchForBreedersite($site) 
    {
        if (!$site) {
            
            return false;
        }
        
        $sql = "select 
                    c.* 
                from $this->_name c 
                join fakk f on c.fakk_id = f.id 
                join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site";
        //echo $sql;
        return $this->execute($sql);
    }
    
    /**
     * adott telephely azon allamanyait adja vissza amihez meg nem szerepel adott naphoz tojastermelési bejegyzes
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForBreedersiteWithoutData($site, $date) 
    {
        if (!$site) {
            
            return false;
        }
        
        $sql = "select 
                    c.* 
                from $this->_name c 
                join fakk f on c.fakk_id = f.id 
                join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site
                where c.id not in (
        			select 
        					chicken_stock_id 
        			from egg_production ep 
        				join egg_production_day epd on ep.id = epd.egg_production_id and date(epd.to_date) = '$date'
                )";

        return $this->execute($sql);
        
    }
    
    /**
     * adott telephely azon allamanyait adja vissza amihez meg nem szerepel adott naphoz kaja bejegyzes
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForBreedersiteWithoutFood($site, $date) 
    {
        if (!$site) {
            
            return false;
        }
        
        $sql = "select 
                    c.* 
                from $this->_name c 
                join fakk f on c.fakk_id = f.id 
                join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site
                where c.id not in (
        			select 
        					chicken_stock_id 
        			from egg_production ep 
        				join egg_production_day epd on ep.id = epd.egg_production_id and date(epd.to_date) = '$date' and 
        				    (feed_male is not null or feed_female is not null or feed_grain is not null)
                )";

        return $this->execute($sql);
        
    }  
    
    /**
     * adott telephely azon allamanyait adja vissza amihez meg nem szerepel adott naphoz comment bejegyzes
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForBreedersiteWithoutComment($site, $date) 
    {
        if (!$site) {
            
            return false;
        }
        
        $sql = "select 
                    c.* 
                from $this->_name c 
                join fakk f on c.fakk_id = f.id 
                join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site
                where c.id not in (
        			select 
        					chicken_stock_id 
        			from egg_production ep 
        				join egg_production_day epd on ep.id = epd.egg_production_id and date(epd.to_date) = '$date' and 
        				    (comment is not null)
                )";

        return $this->execute($sql);
    }      
    
    /**
     * adott telephely azon allamanyait adja vissza amihez meg nem szerepel adott naphoz vitamin bejegyzes
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForBreedersiteWithoutVitamin($site, $date) 
    {
        if (!$site) {
            
            return false;
        }
        
        $sql = "select 
                    c.* 
                from $this->_name c 
                join fakk f on c.fakk_id = f.id 
                join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site
                where c.id not in (
        			select 
        					chicken_stock_id 
        			from egg_production ep 
        				join egg_production_day epd on ep.id = epd.egg_production_id and date(epd.to_date) = '$date' and 
        				    (vitamin is not null)
                )";

        return $this->execute($sql);
    }      

    /**
     * adott telephely azon allamanyait adja vissza amihez meg nem szerepel adott naphoz elhalalozasi bejegyzes
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author Dobi Attila
     */
    public function fetchForBreedersiteWithoutDeath($site, $date) 
    {
        if (!$site) {
            
            return false;
        }
        
        $sql = "select 
                    c.* 
                from $this->_name c 
                join fakk f on c.fakk_id = f.id 
                join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site
                where c.id not in (
        			select 
        					chicken_stock_id 
        			from egg_production ep 
        				join egg_production_day epd on ep.id = epd.egg_production_id and date(epd.to_date) = '$date' and 
        				    (dead_male is not null or dead_female is not null or reject_male is not null or reject_female is not null)
                )";

        return $this->execute($sql);
    }          
    
}