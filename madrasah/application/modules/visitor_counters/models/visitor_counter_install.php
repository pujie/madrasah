<?php
class Visitor_counter_install extends CI_Model{
	var $obj;
	function __construct(){
		parent::__construct();
		$this->obj = & get_instance();
	}
	function create_table(){
		if($this->drop_table()){
			$query = 'create table visitor_counters (id int primary key auto_increment,val int) ';
			if($this->obj->db->query($query)){
				return true;
			}
			else {
				return false;
			}
		}else{
			return false;
		}
		
	}
	function drop_table(){
		$query = 'drop table if exists visitor_counters';
		if($this->obj->db->query($query)){
			return true;
		}
		else {
			return false;
		}
	}
}