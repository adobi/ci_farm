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
     * @author Dobi Attila
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
     * @author Dobi Attila
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
                	egg_production_day_id in (
                		select id from egg_production_day where date(to_date) = '$date' and egg_production_id in (
                			select ep.id as egg_production_id from egg_production ep where ep.chicken_stock_id in (
                				select 
                						c.id as breeders_stock_id
                					from chicken_stock c 
                					join fakk f on c.fakk_id = f.id 
                					join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site
                			) 
                		)
                	) 
                group by egg_type_id order by et.id desc ";
        
        return $this->execute($sql);
    }
}