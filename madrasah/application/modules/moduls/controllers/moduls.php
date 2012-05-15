<?php
class Moduls extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('modul');
		$this->load->model('back_office/menus');
	}
	function index(){
		$moduls = new Modul();
		$header_data = array('param_title'=>'Modules','param_header'=>'Modules');
		$data = array('modules'=>$moduls->get_moduls(),'menus'=>$this->menus->get_menus());
		$footer_data = array('param_menu'=>
			anchor('back_office/logout','Log Out','class="button"') . 
			anchor('back_office','Back Office','class="button"')
		);
		$this->load->view('common/header',$header_data);
		$this->load->view('moduls/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
}