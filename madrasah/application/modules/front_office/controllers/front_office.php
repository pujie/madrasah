<?php 
class Front_office extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('menus');
		$this->load->model('classes/app_class');
	}
	function index(){
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office');
		$data = array('drop_menus'=>$this->menus->get_drop_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/index',$data);
		$this->load->view('common/footer');
	}
	function show_classes(){
		$classes = new App_class();
		$classes->get();
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Classes');
		$data = array('drop_menus'=>$this->menus->get_drop_menus(),'classes'=>$classes);
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/classes',$data);
		$this->load->view('common/footer');
	}
	function show_students(){
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Students');
		$data = array('drop_menus'=>$this->menus->get_drop_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/students',$data);
		$this->load->view('common/footer');
	}
	function show_lessons(){
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Lessons');
		$data = array('drop_menus'=>$this->menus->get_drop_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/lessons',$data);
		$this->load->view('common/footer');
	}
	function show_teachers(){
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Teachers');
		$data = array('drop_menus'=>$this->menus->get_drop_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/teachers',$data);
		$this->load->view('common/footer');
	}
	function show_seasons(){
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Seasons');
		$data = array('drop_menus'=>$this->menus->get_drop_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/seasons',$data);
		$this->load->view('common/footer');
	}
}