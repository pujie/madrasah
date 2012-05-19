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
		$menus.= anchor('teachers','Teachers','class="button"');
		$menus.= anchor('lessons','Lessons','class="button"');
		$menus.= anchor('seasons','Seasons','class="button"');
		$menus.= anchor('syllabuses','Syllabuses','class="button"');
		$menus.= anchor('examinations','Examinations','class="button"');
		$menus.= '</div>';
		return $menus;
	}
	function get_bottom_menus(){
		$menus = anchor('back_office/logout','Log Out','class="button"');
		return $menus;
	}
}