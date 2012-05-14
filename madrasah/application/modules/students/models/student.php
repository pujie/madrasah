<?php
class Student extends DataMapper{
	var $has_many = array('app_class'); 
	function __construct(){
		parent::__construct();
	}
}