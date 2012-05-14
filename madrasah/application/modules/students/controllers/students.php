<?php
class Students extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$students = new Student();
		$students->get();
		$menus = $this->load->model('students/menus');
		$header_data = array('param_title'=>'Students','param_header'=>'Students');
		$data = array('menus'=>$this->menus->get_menus(),'students'=>$students);
		$this->load->view('common/header',$header_data);
		$this->load->view('students/index',$data);
		$this->load->view('common/footer');
	}
	function add(){
		$header_data = array('param_title'=>'Add Students','param_header'=>'Add Students');
		$this->load->view('common/header',$header_data);
		$this->load->view('students/add');
		$this->load->view('common/footer');
	}
	function add_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . $birthday_array[0];
		if(isset($params['save'])){
			echo 'test';
			$student = new Student();
			$student->nrp = $params['nrp'];
			$student->first_name = $params['first_name'];
			$student->middle_name = $params['middle_name'];
			$student->last_name = $params['last_name'];
			$student->nick_name = $params['nick_name'];
			$student->sex = $params['sex'];
			$student->birthday = $birthday;
			$student->place_of_birth = $params['place_of_birth'];
			$student->student_description= $params['student_description'];
			$student->address = $params['address'];
			$student->address2 = $params['address2'];
			$student->city = $params['city'];
			$student->phone_area = $params['phone_area'];
			$student->phone = $params['phone'];
			$student->handphone = $params['handphone'];
			$student->email = $params['email'];
			$student->father_name = $params['father_name'];
			$student->father_occupation = $params['father_occupation'];
			$student->mother_name = $params['mother_name'];
			$student->mother_occupation = $params['mother_occupation'];
			$student->save();
		}
		redirect('students/index');
	}
}