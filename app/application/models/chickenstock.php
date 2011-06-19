<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Chickenstock extends MY_Model 
{
    protected $_name = "chicken_stock";
    protected $_primary = "id";
   
    /** 
     * listazza az allomanyokat a $all-nak megfeleloen. ha igaz akkor minden a rendszerben elofordulo allomanyt hoz,
     * ha hamis akkor csak azokat amik eppen be vannak olazva 
     *
     * @param string $all 
     * @return array
     * @author Dobi Attila
     */
    public function fetchWithDetails($all = false)
    {
        if ($all) {
            $where = array(); // hack :)
        } else {
            $where = array("chicken_stock.fakk_id is not null" => null, "chicken_stock.id in (select chicken_stock_id from egg_production)"=>null);
        }
        
        $join = array(
            array('table'=>'chicken_type ct', 'condition'=>'chicken_stock.chicken_type_id = ct.id', 'columns'=>array('ct.name as chicken_type_name')),
            array('table'=>'fakk f', 'condition'=>'chicken_stock.fakk_id = f.id', 'columns'=>array('f.name as fakk_name')),
            array('table'=>'egg_production ep', 'condition'=>'ep.chicken_stock_id = chicken_stock.id', 'columns'=>array('is_finished', 'conditioning_date', 'finish_date')),
            array('table'=>'fakk_group g', 'condition'=>'f.fakk_group_id = g.id', 'columns'=>array('g.name as fakk_group_name')),
            array('table'=>'stock_yard sy', 'condition'=>'g.stock_yard_id = sy.id', 'columns'=>array('sy.name as stock_yard_name')),
        );
        
        if (!empty($where)) {
            
        }
        
        $result = $this->fetchRows(array(
            'where'=>$where,
            'join'=>$join
        ));
        
        return $result;
    }
     
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
                    c.*, ct.name as chicken_type_name, f.name as fakk_name, sy.name as stock_yard_name
                from $this->_name c 
                join chicken_type ct on c.chicken_type_id = ct.id
                join fakk f on c.fakk_id = f.id 
                join fakk_group g on f.fakk_group_id = g.id 
                join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site";
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
                join fakk_group g on f.fakk_group_id = g.id 
                join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
                where c.id not in (
        			select 
        				chicken_stock_id 
        			from egg_production ep 
        				join egg_production_day epd on ep.id = epd.egg_production_id and date(epd.to_date) = '$date'
        				join egg_production_data d on d.egg_production_day_id = epd.id
                )";
        //dump($sql);
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
                join fakk_group g on f.fakk_group_id = g.id 
                join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
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
                join fakk_group g on f.fakk_group_id = g.id 
                join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
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
                join fakk_group g on f.fakk_group_id = g.id
                join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
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
                join fakk_group g on f.fakk_group_id = g.id
                join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
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