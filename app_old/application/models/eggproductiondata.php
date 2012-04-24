<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggproductiondata extends MY_Model 
{
    protected $_name = "egg_production_data";
    protected $_primary = "id";
    
    /**
     * egg_production_day_id alapja keres
     *
     * @param string $id 
     * @return void
     * @author
     */
    public function fetchByProductionDayId($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array("where"=>array('egg_production_day_id'=>$id), 'order'=>array('by'=>'egg_type_id', 'dest'=>'desc'))
        );
        
        return $result;         
    }
    
    /**
     * adott telephely osszes allomanyaban levo tojasok szamat adja vissza tipusr szerint summazva egy adott napra
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author
     */
    public function getSummarizedForBreedersiteForDayByEggtype($site, $date) 
    {
        if (!$date || !$site) {
            
            return false;
        }
        
        $sql = "select 
                	sum(epd.piece) as pieces_sum, 
                	et.* 
                from 
                	egg_production_data epd join egg_type et on epd.egg_type_id = et.id
                where
                    egg_type_id != 1 
                	and egg_production_day_id in (
                		select id from egg_production_day where date(to_date) = '$date' and egg_production_id in (
                			select ep.id as egg_production_id from egg_production ep where ep.chicken_stock_id in (
                				select 
                						c.id as breeders_stock_id
                					from chicken_stock c 
                					join fakk f on c.fakk_id = f.id 
                					join fakk_group g on f.fakk_group_id = g.id 
                					join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
                					where c.is_deleted is null
                			) 
                		)
                	) 
                group by egg_type_id order by et.id desc ";
        
        return $this->execute($sql);
    }
    
    /**
     * termeloi tojastipus tyuktipusra bontra adott telephelyhez adott napra
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author
     */
    public function getSummarizedFarmerForBreedersiteByDay($site, $date)
    {
        if (!$date || !$site) {
            
            return false;
        }
        
        $sql = "select 
                	sum(epdata.piece) as pieces_sum, ct.name as chicken_type_name
                from
                	egg_production_data epdata
                	join egg_production_day epday on epday.id = epdata.egg_production_day_id
                	join egg_production ep on ep.id = epday.egg_production_id
                	join chicken_stock cs on cs.id = ep.chicken_stock_id and cs.is_deleted is null 
                	join chicken_type ct on ct.id = cs.chicken_type_id
                	join fakk f on f.id = cs.fakk_id
                	join fakk_group fg on fg.id = f.fakk_group_id
                	join stock_yard sy on fg.stock_yard_id = sy.id and sy.breeder_site_id = $site
                where 
                	epdata.egg_type_id = 1 and date(epday.to_date) = '$date'
                group by ct.id
        
        ";
        
        return $this->execute($sql);
    }
}