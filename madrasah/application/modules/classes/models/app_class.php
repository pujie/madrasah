<?php
class App_class extends DataMapper{
	var $table = 'classes';
	var $has_many = array('student');
	function __construct(){
		parent::__construct();
	}
}