<?php
class Menus extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_drop_menus(){
		$menus = '<div class="menu_container">';
		$menus.= '<div id="categories"" class="drop_menus">';
		$menus.= 'Categories';
		$menus.= '<ul>';
		$menus.= '<li>' . anchor('front_office/show_classes','Classes',array('class'=>'text_link')) . '</li>';
		$menus.= '<li>' . anchor('front_office/show_students/per_page/2/page/0','Students',array('class'=>'text_link')) . '</li>';
		$menus.= '<li>' . anchor('front_office/show_lessons','Lessons',array('class'=>'text_link')) . '</li>';
		$menus.= '<li>' . anchor('front_office/show_teachers','Teachers',array('class'=>'text_link')) . '</li>';
		$menus.= '<li>' . anchor('front_office/show_seasons','Seasons',array('class'=>'text_link')) . '</li>';
		$menus.= '</ul>';
		$menus.= '</div>';
		$menus.= '<div id="campus" class="drop_menus">';
		$menus.= 'Campus';
		$menus.= '<ul>';
		$menus.= '<li>News</li>';
		$menus.= '<li>About</li>';
		$menus.= '</ul>';
		$menus.= '</div>';
		$menus.= '</div>';
		return $menus;
	}
}
