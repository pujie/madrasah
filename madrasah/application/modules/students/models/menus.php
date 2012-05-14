<?php
class Menus extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_menus(){
		return '<div class="menus">' . anchor('students/add','Add','class="button"') . "</div>";
	}
}