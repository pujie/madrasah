<?php
class Seasons extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('back_office/menus','seasons/navigators','syllabuses/syllabus','classes/app_class'));
	}
	function index(){
		$seasons = new Season();
		$seasons->get();
		$header_data = array('param_title'=>'Seasons','param_header'=>'Seasons');
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators(),'seasons'=>$seasons);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('seasons/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function add(){
		$app_classes = new App_class();
		$app_classes->get();
		$classes_array = array();
		foreach ($app_classes as $app_class){
			$classes_array[$app_class->id]=$app_class->name;
		}
		$syllabuses = new Syllabus();
		$syllabuses->get();
		$syllabus_array = array();
		foreach ($syllabuses as $syllabus){
			$syllabus_array[$syllabus->id] = $syllabus->syllabus_description;
		}
		$header_data = array('param_title'=>'Add Seasons','param_header'=>'Add Seasons');
		$data = array('classes'=>$classes_array,'syllabuses'=>$syllabus_array);
		$this->load->view('common/header',$header_data);
		$this->load->view('seasons/add',$data);
		$this->load->view('common/footer');
	}
	function add_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		$start_array = explode('/', $params['start']);
		$start = $start_array[2] . '-' . $start_array[1] . '-' . $start_array[0];
		$end_array = explode('/', $params['end']);
		$end = $end_array[2] . '-' . $end_array[1] . '-' . $end_array[0];
		$is_current = (isset($params['is_current']))?'1':'0';
		if(isset($params['save'])){
			$season = new Season();
			$season->name = $params['name'];
			$season->date1= $start;
			$season->date2= $end;
			$season->class_id = $params['app_class'];
			$season->syllabus_id= $params['syllabus'];
			$season->is_current = $is_current;
			$season->season_description = $params['season_description'];
			$season->save();
		}
		redirect('seasons/index');
	}
	function edit(){
		$app_classes = new App_class();
		$app_classes->get();
		$classes_array = array();
		foreach ($app_classes as $app_class){
			$classes_array[$app_class->id]=$app_class->name;
		}
		$syllabuses = new Syllabus();
		$syllabuses->get();
		$syllabus_array = array();
		foreach ($syllabuses as $syllabus){
			$syllabus_array[$syllabus->id] = $syllabus->syllabus_description;
		}
		$season = new Season();
		$season->where('id',$this->uri->segment(4))->get();
		$header_data = array('param_title'=>'Edit seasons','param_header'=>'Edit seasons');
		$data = array('season'=>$season,'syllabuses'=>$syllabus_array,'classes'=>$classes_array);
		$this->load->view('common/header',$header_data);
		$this->load->view('seasons/edit',$data);
		$this->load->view('common/footer');
	}
	function edit_handler(){
		$params = $this->input->post();
		$birthday_array = explode('/', $params['birthday']);
		$birthday = $birthday_array[2] . '-' . $birthday_array[1] . '-' . $birthday_array[0];
		$start_array = explode('/', $params['start']);
		$start = $start_array[2] . '-' . $start_array[1] . '-' . $start_array[0];
		$end_array = explode('/', $params['end']);
		$end = $end_array[2] . '-' . $end_array[1] . '-' . $end_array[0];
		$is_current = (isset($params['is_current']))?'1':'0';
		if(isset($params['save'])){
			$season = new Season();
			$season->where('id',$params['id'])->update(array(
			'name'=>$params['name'],
			'date1'=>$start,
			'date2'=>$end,
			'class_id'=>$params['class'],
			'syllabus_id'=>$params['syllabus'],
			'is_current'=>$is_current,
			'season_description'=>$params['season_description'],
			));
		}
		redirect('seasons');
	}
}