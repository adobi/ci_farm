<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Eggproductiondays extends MY_Model 
{
    protected $_name = "egg_production_day";
    protected $_primary = "id";
    
    /**
     * to_date es egg_production_id alapjan keres meg egy sort
     *
     * @param string $date 
     * @param string $production
     * @return object
     * @author Dobi Attila
     */
    public function findByDateAndProduction($date, $production) 
    {
        if (!$date || !$production) {
            
            return false;
        }
        
        $result = $this->fetchRows(
            array("where"=>array('egg_production_id'=>$production, 'date(to_date)'=>$date)), true    
        );
        
        return $result;        
    }
    
    /**
     * osszesiti a tapanyad mennysegeket adott datumra adott telephely osszes allomanyara amihez van feljegyzes
     *
     * @param string $site 
     * @param string $date 
     * @return void
     * @author Dobi Attila
     */
    public function getSummarizedFoodForDataAndBreedersite($site, $date) 
    {
        if (!$date || !$site) {
            
            return false;
        }
        
        $sql = "select sum(feed_female) as sum_female, sum(feed_grain) as sum_grain, sum(feed_male) as sum_male from egg_production_day where date(to_date) = '$date' and egg_production_id in (
                	select ep.id as egg_production_id from egg_production ep where ep.chicken_stock_id in (
                		select 
                				c.id as breeders_stock_id
                			from chicken_stock c 
                			join fakk f on c.fakk_id = f.id 
                			join fakk_group g on f.fakk_group_id = g.id and g.breeder_site_id = $site
                	) 
                )";
                
        $result = $this->execute($sql);
        
        if ($result) {
            
            return current($result);
        }
        
        return false;
    }
}