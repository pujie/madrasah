<?php
class Navigators extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_navigators(){
		return '<div class="menus">' . anchor('seasons/add','Add','class="button"') . "</div>";
	}
}