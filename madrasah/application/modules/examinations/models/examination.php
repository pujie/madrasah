<?php
class Examination extends DataMapper{
	var $table = 'examinations';
	var $has_one = array('season');
	var $has_many = array('lesson');
	function __construct(){
		parent::__construct();
	}
}