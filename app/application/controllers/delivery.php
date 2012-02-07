<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Delivery extends MY_Controller 
{
    
    public function index2() 
    {
        $this->session->unset_userdata('delivery_filter_params');
        
        redirect(base_url() . 'delivery/index/all');
    }
    
    public function index() 
    {
        $data = array();
        
        $this->load->model('Deliverys', 'model');
        
        
        $data['types'] = $this->model->getType();
        
        $data['intended'] = $this->model->getIntendedUse();
        
        // a fajtak listaja
        $this->load->model('Casts', 'cast');
        $data['casts'] = $this->cast->toAssocArray('id', 'name', $this->cast->fetchAll());      
        
        $listType = $this->uri->segment(3);

        $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

        $params = array();
        
        $data['type'] = $listType;
        
        $where = array();
        
        $params['type'] = $listType;
        
        if ($_POST) {

            $this->session->set_userdata('delivery_filter_params', $_POST);
        }
        
        if ($this->session->userdata('delivery_filter_params')) {
            
            $params['where'] = $this->session->userdata('delivery_filter_params');
    
        }
        
        $condition = $this->session->userdata('delivery_filter_params');
        $condition['type'] = $listType;
	    $data['pagination_links'] = $this->paginate('delivery/index/'.$listType.'/page/', 5, $this->model->count($condition), DELIVERY_ITEMS_PER_PAGE);
	    
	    //$params['where'] = $where;
	    
	    $params['limit'] = DELIVERY_ITEMS_PER_PAGE;
	    $params['offset'] = $page;  
	    
        $data['items'] = $this->model->fetchAll($params);


        $data['model'] = $this->model;

        $this->template->set_partial('delivery_item', '_partials/delivery', $data)->build('delivery/index', $data);
    }

	public function autocomplete_search()
	{
	    $this->load->model('Deliverys', 'model');
	    
	    $result = $this->model->searchBySerial(urldecode($_GET['term']));
	    
	    $return = array();
	    if ($result) {
	        foreach ($result as $item) {
	            $return[] = array('id'=>$item->id, 'label'=>$item->serial_number, 'value'=>$item->serial_number);
	        }
	    }
	    
	    echo json_encode($return);
	    
	    die;
	}
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Deliverys', 'model');
        
        $data['types'] = $this->model->getType();
        
        $data['intended'] = $this->model->getIntendedUse();
        
        // a fajtak listaja
        $this->load->model('Casts', 'cast');
        $data['casts'] = $this->cast->toAssocArray('id', 'name', $this->cast->fetchAll());
        
        // tenyeszetek listaja
        $this->load->model('Breedersites', 'sites');
        $data['breedersites'] = $this->sites->toAssocArray('id', 'code+name+address', $this->sites->fetchSiteWithBreederInfo());
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        
        $data['current_item'] = $item ? $item[0] : false;
        
        $this->form_validation->set_rules('serial_number', 'Sorszám', 'trim|required');
        
        if ($this->form_validation->run()) {
            $recordId = false;
            
            if (!$_POST['seller_id']) {
                $_POST['seller_id'] = -1;
            }
            
            if (!$_POST['buyer_id']) {
                $_POST['buyer_id'] = -1;
            } 
            
            if (!$_POST['receiver_id']) {
                $_POST['receiver_id'] = -1;
            }                        
            
            //dump($_POST); die;
            
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $recordId = $this->model->insert($_POST);
            }
            //redirect($_SERVER['HTTP_REFERER']);
            redirect(base_url().'delivery/'.($recordId ? "show/$recordId" : ''));
            
        } else {
            if ($_POST) {
                
                //redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('delivery/edit', $data);
    }
    
    public function delivery_serial_exists() 
    {
        $this->load->model("Deliverys", 'model');
        
        //$this->form_validation->set_message('delivery_serial_exists', 'Ilyen sorszámmal már létezik szállítólevél');
        
        //return !$this->model->serialExists($_POST['serial_number']);
        if ($this->model->serialExists($_POST['serial_number'])) {
            echo 'Ilyen sorszámmal már létezik szállítólevél';
        } else {
            echo '';
        }
        
        die;
    }
    
    public function show() 
    {
        $id = $this->uri->segment(3);
        
        $data = array();
        
        if ($id) {

            $this->load->model("Deliverys", 'model');
                                   
            $data['items'] = $this->model->find($id);
            $data['model'] = $this->model;
        }
        
        $this->template->set_partial('delivery_item', '_partials/delivery', $data)->build('delivery/show', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Deliverys', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}