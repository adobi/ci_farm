<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Productiondata extends MY_Controller 
{
    /**
     * egg_production_data bejegyzeset szerkeszt, ajaxos, egg_production_day_id alapjan
     *
     * @return void
     * @author
     */
    public function edit()
    {
        $dayId = $this->uri->segment(3);
        
        if ($_POST) {
            
            $this->load->model("Eggproductiondata", 'production');
            
            if ($_POST['pieces'] && $_POST['egg_types']) {
                
                for ($i = 0; $i < sizeof($_POST['pieces']); $i++) {
                    
                    $data = array('piece'=>$_POST['pieces'][$i]);
                    echo $this->production->update($data, array('egg_production_day_id'=>$dayId, 'egg_type_id'=>$_POST['egg_types'][$i]));
                }
                
                echo 1;
            } else {
                echo 0;
            }
        } else {
            
            echo 0;
        }
        
        die;
    }
    
    /**
     * torol minden bejegyzest egy adott egg_production_day_id-hez
     *
     * @return void
     * @author
     */
    public function delete()
    {
        $dayId = $this->uri->segment(3);
        
        if ($dayId) {
            $this->load->model("Eggproductiondata", 'production');
            
            $this->load->model("Eggproductiondays", 'day');
            
            //echo $this->production->delete(array('egg_production_day_id'=>$dayId));
            echo $this->day->delete($dayId);
        } else {
            
            echo 0;
        }
        
        die;
    }
}