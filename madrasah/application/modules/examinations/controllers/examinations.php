<?php
class Examinations extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('back_office/menus','examinations/examination','examinations/navigators','seasons/season','lessons/lesson'));
	}
	function index(){
		$examinations = new Examination();
		$examinations->get();
		$header_data = array('param_title'=>'examinations','param_header'=>'examinations');
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators(),'examinations'=>$examinations);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('examinations/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function add(){
		$seasons = new Season();
		$seasons->get();
		$seasons_array = array();
		foreach ($seasons as $season){
			$seasons_array[$season->id]=$season->name;
		}
		$header_data = array('param_title'=>'Add examinations','param_header'=>'Add examinations');
		$data = array('seasons'=>$seasons_array);
		$this->load->view('common/header',$header_data);
		$this->load->view('examinations/add',$data);
		$this->load->view('common/footer');
	}
	function add_handler(){
		$params = $this->input->post();
		$start_array = explode('/', $params['date1']);
		$start = $start_array[2] . '-' . $start_array[1] . '-' . $start_array[0];
		$end_array = explode('/', $params['date1']);
		$end = $end_array[2] . '-' . $end_array[1] . '-' . $end_array[0];
		if(isset($params['save'])){
			$examination = new Examination();
			$examination->session_id = $params['season_id'];
			$examination->date1 = $start;
			$examination->date2 = $end;
			$examination->examination_description= $params['examination_description'];
			$examination->save();
		}
		redirect('examinations/index');
	}
	function edit(){
		$seasons = new Season();
		$seasons->get();
		$seasons_array = array();
		foreach ($seasons as $season){
			$seasons_array[$season->id]=$season->name;
		}
		$examination = new Examination();
		$examination->where('id',$this->uri->segment(4))->get();
		$header_data = array('param_title'=>'Edit examinations','param_header'=>'Edit examinations');
		$data = array('examination'=>$examination,'seasons'=>$seasons_array);
		$this->load->view('common/header',$header_data);
		$this->load->view('examinations/edit',$data);
		$this->load->view('common/footer');
	}
	function edit_handler(){
		$params = $this->input->post();
		$start_array = explode('/', $params['date1']);
		$start = $start_array[2] . '-' . $start_array[1] . '-' . $start_array[0];
		$end_array = explode('/', $params['date1']);
		$end = $end_array[2] . '-' . $end_array[1] . '-' . $end_array[0];
			if(isset($params['save'])){
			$examination = new Examination();
			$examination->where('id',$params['id'])->update(array(
				'examination_description'=>$params['examination_description'],
				'date1'=>$start,
				'date2'=>$end,
				'season_id'=>$params['season_id']
			));
		}
		redirect('examinations');
	}
	function detail(){
		$header_data = array('param_title'=>'Examination Lesson','param_header'=>'Examination Lesson');
		$examination = new Examination();
		$examination->where('id',$this->uri->segment(4))->get();
//		$examination_lessons = array();
//		foreach ($examination->lesson as $lesson){
//			$examination_lessons[$lesson->id]=$lesson->name;
//		}
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_examinations_lessons_navigators(),'examination'=>$examination);
//		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_examinations_lessons_navigators(),'examination_lessons'=>$examination_lessons);
		$this->load->view('common/header',$header_data);
		$this->load->view('examinations/examination_lesson',$data);
		$this->load->view('common/footer');
	}
	function detail_add(){
		$header_data = array('param_title'=>'Examination Lesson','param_header'=>'Examination Lesson');
		$examination = new Examination();
		$examination->where('id',$this->uri->segment(4))->get();
		$lessons=new Lesson();
		$lessons->get();
		$lesson_array = array();
		foreach ($lessons as $lesson){
			$lesson_array[$lesson->id]=$lesson->name;
		}
		$data = array('menus'=>$this->menus->get_menus(),'navigators'=>$this->navigators->get_navigators(),'examination'=>$examination,'lessons'=>$lesson_array);
		$this->load->view('common/header',$header_data);
		$this->load->view('examinations/examination_lesson_add',$data);
		$this->load->view('common/footer');
	}
	function detail_handler(){
		$params = $this->input->post();
		if(isset($params['save'])){
//			echo 'LEsson : ' . $params['lesson_id'];
//			echo 'Examin : ' . $params['examination_id'];
			$examination = new Examination();
			$examination->where('id',$params['examination_id'])->get();
			$lesson = new Lesson();
			$lesson->where('id',$params['lesson_id'])->get();
			$examination->save(array('lesson'=>$lesson,'date'=>$params['date']));
//			$examination->save($lesson);
		}
		redirect('examinations');
	}
	function remove_detail(){
		$params = $this->uri->uri_to_assoc();
		$examination = new Examination();
		$lesson = new Lesson();
		$examination->where('id',$params['examination'])->get();
		$lesson->where('id',$params['lesson'])->get();
		$examination->delete($lesson);
		redirect('examinations/detail');
	}
	}