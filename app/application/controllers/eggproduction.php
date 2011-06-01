<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Eggproduction extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('', '');
        
        $this->template->build('/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['current_item'] = $item;
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function for_fakk()
    {
        $id = $this->uri->segment(3);
        $year = $this->uri->segment(4);
        $month = $this->uri->segment(5);
        $linkUrlProduction = base_url() . '';
        
        $data = array();
                
        $prefs = array(
            'template' => '
        
                {table_open}<table border="0" cellpadding="0" cellspacing="0" class = "calendar">{/table_open}
                
                {heading_row_start}<tr>{/heading_row_start}
                
                {heading_previous_cell}<th><a href="{previous_url}" class = "prev-link">&laquo;</a></th>{/heading_previous_cell}
                {heading_title_cell}<th class = "current-month" colspan="{colspan}">{heading}</th>{/heading_title_cell}
                {heading_next_cell}<th style = "border-right:1px solid #999"><a href="{next_url}" class = "next-link">&raquo;</a></th>{/heading_next_cell}
                
                {heading_row_end}</tr>{/heading_row_end}
                
                {week_row_start}<tr>{/week_row_start}
                {week_day_cell}<td style = "border-top:1px solid #999" class = "calendar-day">{week_day}</td>{/week_day_cell}
                {week_row_end}</tr>{/week_row_end}
                
                {cal_row_start}<tr>{/cal_row_start}
                {cal_cell_start}<td class = "calendar-day">{/cal_cell_start}
                
                {cal_cell_no_content}
                    <span class = "day">{day}</span><br />
                    <a href = "'.$linkUrlProduction.'">• tojás</a><br />
                    <a href = "'.$linkUrlProduction.'">• termelés</a><br />
                    <a href = "'.base_url().'">• elhalálozás</a>
                {/cal_cell_no_content}
                {cal_cell_no_content_today}
                    <span class = "day">{day}</span><br />
                    <a href = "'.$linkUrlProduction.'">• tojás</a><br />
                    <a href = "'.$linkUrlProduction.'">• termelés</a><br />
                    <a href = "'.base_url().'">• elhalálozás</a>
                {/cal_cell_no_content_today}
                
                {cal_cell_blank}&nbsp;{/cal_cell_blank}
                
                {cal_cell_end}</td>{/cal_cell_end}
                {cal_row_end}</tr>{/cal_row_end}
                
                {table_close}</table>{/table_close}
            ',
            'show_next_prev'=>true,
            
        );        
        
        $prefs['next_prev_url'] = base_url() . 'eggproduction/for_fakk/' . $id . '/';
        
        $this->load->library('calendar', $prefs);


        $data['calendar'] = $this->calendar->generate($year, $month);
        
        $this->template->build("eggproduction/for_fakk", $data);
    }
}