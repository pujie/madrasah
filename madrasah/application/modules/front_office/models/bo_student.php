<?php
class Bo_student extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_properties($per_page){
		$per_page_array = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,
		13=>13,14=>14,15=>15,16=>16,17=>17,18=>18,19=>19,20=>20,21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28); 
		$properties = form_open('front_office/student_handler');
		$properties.= '<span>Find</span><span>' . form_input('find','','class="text_medium"') . '</span>'. form_submit('search','Search') .'<br />';
		$properties.= '<span>Row Per Page</span><span>' . form_dropdown('per_page',$per_page_array,$per_page,'class="text_short"') . '</span>' . form_submit('row_per_page','Set') . '<br />';
		$properties.= form_close();
		return $properties;
	} 
}