<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['calendar_prefs'] = array(
    'template' => '

        {table_open}<table border="0" cellpadding="0" cellspacing="0" class = "calendar">{/table_open}
        
        {heading_row_start}<tr>{/heading_row_start}
        
        {heading_previous_cell}<th><a href="{previous_url}" class = "prev-link">&laquo;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th class = "current-month" colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th style = "border-right:1px solid #999"><a href="{next_url}" class = "next-link">&raquo;</a></th>{/heading_next_cell}
        
        {heading_row_end}</tr>{/heading_row_end}
        
        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td class = "calendar-day">{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}
        
        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td class = "calendar-day">{/cal_cell_start}
        
        {cal_cell_content}{day}<br /><a href = "{content}">term.</a><a href = "#">elh.</a>{/cal_cell_content}
        {cal_cell_content_today}{day}<br /><a href = "{content}">term.</a><a href = "#">elh.</a>{/cal_cell_content_today}
        
        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class ="today">{day}</div>{/cal_cell_no_content_today}
        
        {cal_cell_blank}&nbsp;{/cal_cell_blank}
        
        {cal_cell_end}</td>{/cal_cell_end}
        {cal_row_end}</tr>{/cal_row_end}
        
        {table_close}</table>{/table_close}
    ',
    'show_next_prev'=>true,
    
);

?>