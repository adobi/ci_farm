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
                			join fakk_group g on f.fakk_group_id = g.id 
                			join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
                	) 
                )";
                
        $result = $this->execute($sql);
        if ($result) {
            
            return current($result);
        }
        
        return false;
    }
    
    public function getSummarizedDeathForDataAndBreedersite($site, $date) 
    {
        if (!$date || !$site) {
            
            return false;
        }
        
        $sql = "select sum(dead_female) as sum_dead_female, sum(dead_male) as sum_dead_male, sum(reject_male) as sum_reject_male, sum(reject_female) as sum_reject_female from egg_production_day where date(to_date) = '$date' and egg_production_id in (
                	select ep.id as egg_production_id from egg_production ep where ep.chicken_stock_id in (
                		select 
                				c.id as breeders_stock_id
                			from chicken_stock c 
                			join fakk f on c.fakk_id = f.id 
                			join fakk_group g on f.fakk_group_id = g.id
                			join stock_yard sy on g.stock_yard_id = sy.id and sy.breeder_site_id = $site
                	) 
                )";
                
        $result = $this->execute($sql);
        if ($result) {
            
            return current($result);
        }
        
        return false;
    }
    
    public function getLastBlankDate()
    {
        $sql = "select 
                    to_date 
                from 
                    $this->_name epd join egg_production ep on epd.egg_production_id = ep.id
                    join chicken_stock cs on ep.chicken_stock_id = cs.id and cs.fakk_id is not null
                where 
                    dead_male is null or dead_female is null or 
                    reject_male is null or reject_female is null or 
                    feed_male is null or feed_female is null or feed_grain is null or
                    epd.id not in (select egg_production_day_id from egg_production_data)
                order by to_date asc limit 1";
        //dump($sql); die;        
        $result = $this->execute($sql);
        
        $return = false;
        
        if ($result) {
            
            $return = current($result);
            
        } else {
            
            $lastFilled = $this->getLastFilled();
            
            $lastFilled->to_date = date('Y-m-d', strtotime($lastFilled->to_date) + 24*3600); // 1 nap, azaz az utolso kitoltott nap utani nap
            
            $return = $lastFilled;
        }
        //dump($return);die;
        return $return;
    }
    
    public function getLastFilled()
    {
        $sql = "select 
                    max(to_date) as to_date
                from 
                    $this->_name epd 
                    join egg_production ep on epd.egg_production_id = ep.id 
                    join chicken_stock cs on ep.chicken_stock_id = cs.id and cs.fakk_id is not null
                where
                    
                    dead_male is not null and dead_female is not null and 
                    reject_male is not null and reject_female is not null and 
                    feed_male is not null and feed_female is not null and feed_grain is not null and
                    epd.id in (select egg_production_day_id from egg_production_data)
                -- order by to_date asc limit 1";
        //dump($sql); die;        
        $result = $this->execute($sql);
        
        $sql = "select 
                    ep.id 
                from egg_production ep
                    join chicken_stock cs on ep.chicken_stock_id = cs.id and cs.fakk_id is not null
                where ep.is_finished is null and ep.finish_date is null";
        
        $stocks = $this->execute($sql);
        /*
        if (count($result) !== count($stocks)) {
            
            return false;
        }
        */
        
        return $result ? current($result) : false;
        
    }
    
    public function isDayFilled($date)
    {
        $sql = "select 
                    to_date 
                from 
                    $this->_name epd 
                    join egg_production ep on epd.egg_production_id = ep.id 
                    join chicken_stock cs on ep.chicken_stock_id = cs.id and cs.fakk_id is not null
                where
                    date(epd.to_date) = '$date' and 
                    dead_male is not null and dead_female is not null and 
                    reject_male is not null and reject_female is not null and 
                    feed_male is not null and feed_female is not null and feed_grain is not null and
                    epd.id in (select egg_production_day_id from egg_production_data)
                -- order by to_date asc limit 1";
        
        $result = $this->execute($sql);
        //dump($result);
        $sql = "select 
                    ep.id 
                from egg_production ep
                    join chicken_stock cs on ep.chicken_stock_id = cs.id and cs.fakk_id is not null
                where ep.is_finished is null and ep.finish_date is null";
        
        $stocks = $this->execute($sql);
        //dump($stocks);
        return count($result) === count($stocks);
    }
    
}