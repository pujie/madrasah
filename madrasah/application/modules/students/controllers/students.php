<?php
class Students extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('back_office/menus','students/navigators'));
	}
	function index(){
		$students = new Student();
		$students->get();
		$header_data = array('param_title'=>'Students','param_header'=>'Students');
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators(),'students'=>$students);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('students/index',$data);
		$this->load->view('common/footer',$footer_data);
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
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		if(isset($params['save'])){
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
	function edit(){
		$student = new Student();
		$student->where('id',$this->uri->segment(4))->get();
		$header_data = array('param_title'=>'Edit Students','param_header'=>'Edit Students');
		$data = array('student'=>$student);
		$this->load->view('common/header',$header_data);
		$this->load->view('students/edit',$data);
		$this->load->view('common/footer');
	}
	function edit_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		if(isset($params['save'])){
			$student = new Student();
			$student->where('id',$params['id'])->update(array(
			'nrp'=>$params['nrp'],
			'first_name'=>$params['first_name'],
			'middle_name'=>$params['middle_name'],
			'last_name'=>$params['last_name'],
			'nick_name'=>$params['nick_name'],
			'sex'=>$params['sex'],
			'birthday'=>$birthday,
			'place_of_birth'=>$params['place_of_birth'],
			'student_description'=>$params['student_description'],
			'address'=>$params['address'],
			'address2'=>$params['address2'],
			'city'=>$params['city'],
			'phone_area'=>$params['phone_area'],
			'phone'=>$params['phone'],
			'handphone'=>$params['handphone'],
			'email'=>$params['email'],
			'father_name'=>$params['father_name'],
			'father_occupation'=>$params['father_occupation'],
			'mother_name'=>$params['mother_name'],
			'mother_occupation'=>$params['mother_occupation']
			));
		}
		redirect('students');
	}
}