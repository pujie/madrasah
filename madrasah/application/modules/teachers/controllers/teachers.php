<?php
class Teachers extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('teachers/teacher','back_office/menus'));
	}
	function index(){
		$teachers = new Teacher();
		$teachers->get();
		$this->load->model('teachers/navigators');
		$header_data = array('param_title'=>'teachers','param_header'=>'teachers');
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators(),'teachers'=>$teachers);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('teachers/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function add(){
		$header_data = array('param_title'=>'Add teachers','param_header'=>'Add teachers');
		$this->load->view('common/header',$header_data);
		$this->load->view('teachers/add');
		$this->load->view('common/footer');
	}
	function add_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		if(isset($params['save'])){
			$teacher = new teacher();
			$teacher->nrp = $params['nrp'];
			$teacher->first_name = $params['first_name'];
			$teacher->middle_name = $params['middle_name'];
			$teacher->last_name = $params['last_name'];
			$teacher->nick_name = $params['nick_name'];
			$teacher->sex = $params['sex'];
			$teacher->birthday = $birthday;
			$teacher->place_of_birth = $params['place_of_birth'];
			$teacher->teacher_description= $params['teacher_description'];
			$teacher->address = $params['address'];
			$teacher->address2 = $params['address2'];
			$teacher->city = $params['city'];
			$teacher->phone_area = $params['phone_area'];
			$teacher->phone = $params['phone'];
			$teacher->handphone = $params['handphone'];
			$teacher->email = $params['email'];
			$teacher->save();
		}
		redirect('teachers/index');
	}
	function edit(){
		$teacher = new Teacher();
		$teacher->where('id',$this->uri->segment(4))->get();
		$header_data = array('param_title'=>'Edit teachers','param_header'=>'Edit teachers');
		$data = array('teacher'=>$teacher);
		$this->load->view('common/header',$header_data);
		$this->load->view('teachers/edit',$data);
		$this->load->view('common/footer');
	}
	function edit_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		if(isset($params['save'])){
			$teacher = new teacher();
			$teacher->where('id',$params['id'])->update(array(
			'nrp'=>$params['nrp'],
			'first_name'=>$params['first_name'],
			'middle_name'=>$params['middle_name'],
			'last_name'=>$params['last_name'],
			'nick_name'=>$params['nick_name'],
			'sex'=>$params['sex'],
			'birthday'=>$birthday,
			'place_of_birth'=>$params['place_of_birth'],
			'teacher_description'=>$params['teacher_description'],
			'address'=>$params['address'],
			'address2'=>$params['address2'],
			'city'=>$params['city'],
			'phone_area'=>$params['phone_area'],
			'phone'=>$params['phone'],
			'handphone'=>$params['handphone'],
			'email'=>$params['email']
			));
		}
		redirect('teachers');
	}
}