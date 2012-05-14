<?php
class Menus extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_menus(){
		$menus = '<div class="menus">';
		$menus.= anchor('moduls','Modules','class="button"');
		$menus.= anchor('classes','Classes','class="button"');
		$menus.= anchor('students','Students','class="button"');
		$menus.= '</div>';
		return $menus;
	}
}