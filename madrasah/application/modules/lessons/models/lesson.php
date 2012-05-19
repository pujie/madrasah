<?php
class Lesson extends DataMapper{
	var $has_many = array('examination');
	function __construct(){
		parent::__construct();
	}
}