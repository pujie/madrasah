<?php
class Navigators extends CI_Model{
	var $obj;
	function __construct(){
		parent::__construct();
		$this->obj = & get_instance();
	}
	function get_navigators(){
		return '<div class="menus">' . anchor('examinations/add','Add','class="button"') . "</div>";
	}
	function get_examinations_lessons_navigators(){
		return '<div class="menus">' . anchor('examinations/detail_add/examination_id/' . $this->obj->uri->segment(4),'Add','class="button"') . "</div>";
	}
}