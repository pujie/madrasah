<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		$autoload['packages'] = array(APPPATH.'third_party');
		$autoload['libraries'] = array('pagination','session','common','auth');
		$autoload['helper'] = array('url','form','date','file','directory');
		$autoload['config'] = array();
		$autoload['language'] = array();
		$autoload['model'] = array();
