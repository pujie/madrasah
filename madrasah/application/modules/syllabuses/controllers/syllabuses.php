<?php
class Syllabuses extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('back_office/menus','syllabuses/syllabus','syllabuses/navigators'));
	}
	function index(){
		$syllabuses = new Syllabus();
		$syllabuses->get();
		$header_data = array('param_title'=>'Syllabuses','param_header'=>'Syllabuses');
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators(),'syllabuses'=>$syllabuses);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('syllabuses/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function add(){
		$header_data = array('param_title'=>'Add Syllabuses','param_header'=>'Add Syllabuses');
		$this->load->view('common/header',$header_data);
		$this->load->view('syllabuses/add');
		$this->load->view('common/footer');
	}
	function add_handler(){
		$params = $this->input->post();
		if(isset($params['save'])){
			$syllabus = new Syllabus();
			$syllabus->syllabus_description= $params['syllabus_description'];
			$syllabus->save();
		}
		redirect('syllabuses/index');
	}
	function edit(){
		$syllabus = new Syllabus();
		$syllabus->where('id',$this->uri->segment(4))->get();
		$header_data = array('param_title'=>'Edit Syllabuses','param_header'=>'Edit Syllabuses');
		$data = array('syllabus'=>$syllabus);
		$this->load->view('common/header',$header_data);
		$this->load->view('syllabuses/edit',$data);
		$this->load->view('common/footer');
	}
	function edit_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		if(isset($params['save'])){
			$syllabus = new Syllabus();
			$syllabus->where('id',$params['id'])->update(array(
			'syllabus_description'=>$params['syllabus_description']
			));
		}
		redirect('syllabuses');
	}
	}