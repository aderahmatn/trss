<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_m extends CI_Model {
	public $prefs;
	public function __construct()
	{
		parent::__construct();
		$this->prefs = array(
			'start_day'    => 'monday',
			'month_type'   => 'long',
			'day_type'     => 'short',
			'show_next_prev' => FALSE,
		);
		$this->prefs['template'] = '
		{table_open}
		<table border="0" cellpadding="0" cellspacing="0" class="calender">{/table_open}
		{heading_row_start}<tr>{/heading_row_start}
		{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
		{heading_row_end}</tr>{/heading_row_end}
		{week_row_start}<tr>{/week_row_start}
		{week_day_cell}<td>{week_day}</td>{/week_day_cell}
		{week_row_end}</tr>{/week_row_end}
		{cal_row_start}<tr class="days">{/cal_row_start}
		{cal_cell_start}<td>{/cal_cell_start}
		{cal_cell_start_today}<td>{/cal_cell_start_today}
		{cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
		{cal_cell_content}
		<div class="day_num">{day}</div>
		<div class="content"><a href="schedule/detail/{content}">{content}</a></div>
		{/cal_cell_content}
		{cal_cell_content_today}
		<div class="">
		<div class="day_num highlight">{day}</div>
		<div class="content"><a href="schedule/detail/{content}">{content}</a></div>
		</div>
		{/cal_cell_content_today}
		{cal_cell_no_content}{day}{/cal_cell_no_content}
		{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}
		{cal_cell_blank}&nbsp;{/cal_cell_blank}
		{cal_cell_other}{day}{/cal_cel_other}
		{cal_cell_end}</td>{/cal_cell_end}
		{cal_cell_end_today}</td>{/cal_cell_end_today}
		{cal_cell_end_other}</td>{/cal_cell_end_other}
		{cal_row_end}</tr>{/cal_row_end}
		{table_close}</table>{/table_close}
		';
	}

	public function getcalendar($year , $month)
	{
		$this->load->library('calendar',$this->prefs);
		$year = date('Y');
		$month = date('m');
		$data = $this->get_calender_data($year,$month);
		return $this->calendar->generate($year , $month , $data);
	}

	public function get_calender_data($year , $month)
	{
		$query =  $this->db->select('Date,IdSchedule')->from('tschedule')->like('date',"$year-$month",'after')->get();
		$cal_data = array();
		foreach ($query->result() as $row) {
            $calendar_date = date("Y-m-j", strtotime($row->Date)); 
            $cal_data[substr($calendar_date, 8,2)] = $row->IdSchedule;
        }
        return $cal_data;
    }

}

/* End of file calendar_m.php */
/* Location: ./application/models/calendar_m.php */