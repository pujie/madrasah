<?php
class Classes extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('back_office/menus');
	}
	function index(){
		$this->load->model('classes/navigators');
		$classes = new App_class();
		$classes->get();
		$header_data = array('param_title'=>'Class','param_header'=>'Class');
		$footer_data = array('param_menu'=>anchor('back_office/logout','Log Out','class="button"'));
		$data = array('classes'=>$classes,'menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators());
		$this->load->view('common/header',$header_data);
		$this->load->view('classes/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function add(){
		$header_data = array('param_title'=>'Add Class','param_header'=>'Add Class');
		$footer_data = array('param_menu'=>anchor('back_office/logout','Logout','class="button"'));
		$this->load->view('common/header',$header_data);
		$this->load->view('classes/add');
		$this->load->view('common/footer',$footer_data);
	}
	function add_handler(){
		$params = $this->input->post();
		if(isset($params['save'])){
			$classes = new App_class();
			$classes->name = $params['name'];
			$classes->class_description = $params['class_description'];
			$classes->save();
		}
		redirect('classes/index');
	}
}