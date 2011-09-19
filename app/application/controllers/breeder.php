<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MY_Controller.php';

class Breeder extends MY_Controller {

	public function index()
	{
	    $this->session->unset_userdata('selected_breedersite');
	    
	    $data = array();
	    
	    $this->load->model('Breeders', 'breeder');
	    
	    $params = array();
	    
	    if ($this->uri->segment(3) && $this->uri->segment(4)) {
	        $params['order'] = array('by'=>$this->uri->segment(3), 'dest'=>$this->uri->segment(4));
	    }
	    
	    $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
	    
	    $data['pagination_links'] = $this->paginate('breeder/index/'.$this->uri->segment(3) . '/' . $this->uri->segment(4) . '/page/', 6, $this->breeder->count());
	    
	    $params['limit'] = ITEMS_PER_PAGE;
	    $params['offset'] = $page;
	    
	    //dump($data); die;
	    $data['breeders'] = $this->breeder->fetchAll($params);
	    $data['actualBreederId'] = $this->breeder->getId();
	    
	    $data['by'] = $this->uri->segment(3);
	    $data['dest'] = ($this->uri->segment(4) === 'asc' ? 'desc' : 'asc');
	    
		$this->template->build('breeder/index', $data);
	}
	
	public function edit()
	{
	    $data = array();
	    
	    $breeder = false;
	    
	    $this->load->model('Breeders', 'breeder');
	    
	    $id = $this->uri->segment(3);
	    
	    if ($id) {
            $breeder = $this->_find($id);
	    }
	    $data['breeder'] = $breeder;
	    
	    $this->form_validation->set_rules('name', 'Név', 'trim|required');
	    $this->form_validation->set_rules('phone[]', 'Telefon', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');	    
        
        if ($this->form_validation->run()) {
            
            //dump($_POST);
            
            if (isset($_POST['phone'])) {
                $phone = join('-', $_POST['phone']);
                
                $_POST['phone'] = (strlen($phone) === 5 ? '' : $phone);
            }
            
            if (isset($_POST['cell'])) {
                $cell = join('-', $_POST['cell']);
                $_POST['cell'] = (strlen($cell) === 5 ? '' : $cell);
            }
            
            if (!isset($_POST['priority']) || !$_POST['priority']) {
                $_POST['priority'] = 10000;
            } else {
                
                if ($this->breeder->priorityExists($_POST['priority'])) {
                    
                    $this->breeder->incPriorityGreaterThen($_POST['priority']);
                }
            }
            
            if ($id) {
                
                $this->breeder->update($_POST, $id);
            } else {
                
                $this->breeder->insert($_POST);
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        } else {
	        if ($_POST) {
	            
    	        $this->session->set_userdata('validation_error',validation_errors());
    	        $this->session->set_userdata('current_dialog_item', ($id ? $id : 0));
    	        
    	        $this->session->set_userdata('filled_data', $_POST);
    	        
    	        redirect($_SERVER['HTTP_REFERER']);
	        }
        }
        
	    $this->template->build('breeder/edit', $data);
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    
	    if ($id) {
	        $this->load->model('Breeders', 'breeder');
	        
	        $this->breeder->delete($id);
	    }
	    
	    redirect($_SERVER['HTTP_REFERER']);
	}
	
	/**
	 * id alapjan megkeres egy breedert
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function get()
	{
	    $data = array();
	    
	    $id = $this->uri->segment(3);
	    
	    $breeder = false;
	    if ($id) {
	        $breeder = $this->_find($id);
	    }
	    $data['breeder'] = $breeder;
	    $this->template->build('breeder/get', $data);
	}
	
	public function autocomplete_search()
	{
	    $this->load->model('Breeders', 'breeder');
	    
	    $result = $this->breeder->searchByName(urldecode($_GET['term']));
	    
	    $return = array();
	    if ($result) {
	        foreach ($result as $item) {
	            $return[] = array('id'=>$item->id, 'label'=>$item->name, 'value'=>$item->name);
	        }
	    }
	    
	    echo json_encode($return);
	    
	    die;
	}
	
	/**
	 * id alapjan megkeres egy tenyesztot majd atakaitja a megjeleniteshez
	 *
	 * @param string $id 
	 * @return void
	 * @author Dobi Attila
	 */
	private function _find($id) 
	{
	    $this->load->model('Breeders', 'breeder');
	    
        $breeder = $this->breeder->find((int)$id);
        $breeder->phone = $breeder->phone ? explode('-', $breeder->phone) : '';
        $breeder->cell = $breeder->cell ? explode('-', $breeder->cell) : '';
        
        if ($breeder->priority == 10000) {
            $breeder->priority = '';
        }	    
        
        return $breeder;
	}
}

