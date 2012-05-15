<?php
class Lessons extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('back_office/menus','lessons/navigators'));
	}
	function index(){
		$lessons = new Lesson();
		$lessons->get();
		$header_data = array('param_title'=>'lessons','param_header'=>'lessons');
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators(),'lessons'=>$lessons);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('lessons/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function add(){
		$header_data = array('param_title'=>'Add Lessons','param_header'=>'Add Lessons');
		$this->load->view('common/header',$header_data);
		$this->load->view('lessons/add');
		$this->load->view('common/footer');
	}
	function add_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		if(isset($params['save'])){
			$lesson = new lesson();
			$lesson->name = $params['name'];
			$lesson->lesson_description = $params['lesson_description'];
			$lesson->save();
		}
		redirect('lessons/index');
	}
	function edit(){
		$lesson = new Lesson();
		$lesson->where('id',$this->uri->segment(4))->get();
		$header_data = array('param_title'=>'Edit Lessons','param_header'=>'Edit Lessons');
		$data = array('lesson'=>$lesson);
		$this->load->view('common/header',$header_data);
		$this->load->view('lessons/edit',$data);
		$this->load->view('common/footer');
	}
	function edit_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		if(isset($params['save'])){
			$lesson = new Lesson();
			$lesson->where('id',$params['id'])->update(array(
			'name'=>$params['name'],
			'lesson_description'=>$params['lesson_description']
			));
		}
		redirect('lessons');
	}
}